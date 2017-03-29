<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   header( "HTTP/1.1 200 OK" );
   exit;
}

require_once "manage_class.php";
$obj = new Library();
switch ($_SERVER['REQUEST_METHOD']) {
    case "GET": 
    //echo $_SERVER['REQUEST_URI'];
        $id = explode("http://127.0.0.2/library_app/app/php/manage_lib.php/", $_SERVER['REQUEST_URI']);
        if (isset($id[1])) {
            /* Query the database to get the information about the book with ID = $id[1] */
            $result = $obj->get_book_by_id($id[1]);
        } else {
            /* Query the database to get the information about all the books */
            
            $result = $obj->get_books();
        }
        break;
    case "POST":
         
             $d = json_decode(file_get_contents("php://input"), true);

        // Save a new record in the database 
       $result = $obj->register_new_book($d);
        break;
    case "PUT":
        // Retrieve additional data 
 
        $d = json_decode(file_get_contents("php://input"), true);
        $obj->loan_book($d["book_id"]);
        $result = $obj->get_books();
        break;

    case "DELETE": 
    
    $id = explode("/library_app/app/PHP/manage_lib.php/", $_SERVER['REQUEST_URI']);
       
        if (isset($id[1])) {
            $result = $obj->delete_book($id[1]);
        }
        break;
}

$json = json_encode($result,JSON_FORCE_OBJECT);
echo $json;
?>