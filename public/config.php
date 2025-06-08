
<?php
$host = "localhost";
$users = "root";
$passowrd = "";
$database = "final_project";

$conn = new  mysqli($host,$users,$passowrd,$database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>