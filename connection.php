<?php
$servername="localhost";
$username="root";
$password="";
$db="crud_operations";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error){
     die("connection Failed:" . $conn->connect_error);
}
//echo "Connection successfully";
?>