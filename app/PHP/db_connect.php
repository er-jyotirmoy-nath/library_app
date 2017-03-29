<?php

class db_connect {

    protected $db, $sql, $query, $result, $row;

    public function __construct() {
        $tns = "(DESCRIPTION =(ADDRESS_LIST =(ADDRESS = (PROTOCOL = TCP)(HOST = 127.0.0.1)(PORT = 1521)))
        (CONNECT_DATA =(SERVICE_NAME = XE)) )";
        $db_username = "sa";
        $db_password = "sa";

        try {
            $this->db = new PDO("oci:dbname=" . $tns, $db_username, $db_password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
    }

}

$db_new = new db_connect();
?>
