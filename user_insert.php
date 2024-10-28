<?php

include("connection.php");

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$gender = $_POST['gender'];
$password = $_POST['password'];


$sql = "INSERT INTO practice (first_name, last_name, email, mobile_number, gender, password)
VALUES ('$first_name', '$last_name', '$email', '$mobile_number', '$gender', '$password')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

if ($conn->query($sql)) {
     echo "New record created successfully";
     include("index.php");
   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
?>