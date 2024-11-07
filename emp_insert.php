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

    // Collect data from the form
    $name = $_POST['name'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    // SQL query to insert the data
    $sql = "INSERT INTO practice (empcode, name, email, mobile_number, gender, password, user)
            VALUES ('$ecode', '$name', '$email', '$mobile_number', '$gender', '$password', '$user')";

    if ($conn->query($sql)) {
        // Success: Redirect to prevent form resubmission
        header("Location: employeelist.php"); // Redirect to the employeelist page
        exit();
    } else {
        // Display error if query fails
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
