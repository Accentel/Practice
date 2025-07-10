<?php
include("connection.php");

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the highest empcode and increment it
    $result = $conn->query("SELECT empcode FROM practice ORDER BY id DESC LIMIT 1");
    if ($result && $row = $result->fetch_assoc()) {
        $lastCode = $row['empcode'];
        $num = intval(substr($lastCode, 1)) + 1; // Extract the number part and increment
        $ecode = "A" . $num; // Generate the new empcode, e.g., A2, A3
    } else {
        $ecode = "A1"; // Default if no records exist
    }

     // Collect and validate data from the form
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $salary = $conn->real_escape_string($_POST['salary']);
    $password = $conn->real_escape_string($_POST['password']);
    
    // Handle the `user` field: Set a default value if not provided
    $user = isset($_POST['user']) && !empty($_POST['user']) ? $conn->real_escape_string($_POST['user']) : 'employee';

    // SQL query to insert the data
    $sql = "INSERT INTO practice (empcode, name, email, mobile_number, gender, salary, password, user)
            VALUES ('$ecode', '$name', '$email', '$mobile_number', '$gender','$salary', '$password', '$user')";

    if ($conn->query($sql)) {
        // Success: Redirect to prevent form resubmission
        header("Location: employeelist.php"); // Redirect to the employeelist page
        exit();
    } else {
        // Display error if query fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
