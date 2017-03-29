<?php

require_once 'db_connect.php';

class Library extends db_connect {

    public function get_books() {
        $this->sql = "SELECT * FROM LIBRARY_APP";
        $this->query = $this->db->prepare($this->sql);
        $this->query->execute();
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_book_by_id($param) {
        $this->sql = "SELECT * FROM LIBRARY_APP WHERE LIB_ID = :lib_id";
        $this->query = $this->db->prepare($this->sql);
        $this->query->bindParam(":lib_id", $param);
        $this->query->execute();
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register_new_book($param) {
        try {
            $temp = array();
            $this->sql = "INSERT INTO LIBRARY_APP(LIB_ID,BOOK_NAME,AUTHOR,LOAN)"
                    . "VALUES (LIB_APP_SEQ.NEXTVAL,:BOOK_NAME,:AUTHOR,'false')";
            $this->query = $this->db->prepare($this->sql);
            $this->query->bindParam(":BOOK_NAME", $param["book_name"]);
            $this->query->bindParam(":AUTHOR", $param["book_author"]);
            $this->query->execute();
            if ($this->query->rowCount()) {
                $temp['status'] = "Done";
            }
            return $temp;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function loan_book($param) {
        $temp = array();
       
        $this->sql = "UPDATE LIBRARY_APP SET LOAN = '1' WHERE LIB_ID = :lib_id";
        $this->query = $this->db->prepare($this->sql);
        $this->query->bindParam(":lib_id", $param);
        $this->query->execute();
        if ($this->query->rowCount()) {
            
        }
       
    }

    public function delete_book($param) {
        $temp = array();
        $this->sql = "DELETE FROM  LIBRARY_APP WHERE LIB_ID = :lib_id";
        $this->query = $this->db->prepare($this->sql);
        $this->query->bindParam(":lib_id", $param);
        $this->query->execute();
        if ($this->query->rowCount()) {
           $temp = $this->get_books();
        }
        return $temp;
    }

}

?>