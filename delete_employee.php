<?php 
include("connection.php");

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, delete related records from emp_attendance
    $stmt1 = $conn->prepare("DELETE FROM emp_attendance WHERE empcode = ?");
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
    $stmt1->close();

    // Now, delete the employee from practice
    $stmt2 = $conn->prepare("DELETE FROM practice WHERE id = ?");
    $stmt2->bind_param("i", $id);

    if ($stmt2->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt2->error;
    }

    $stmt2->close();
} else {
    echo "No employee ID provided!";
}

$conn->close();

// Redirect back to the index page
header("Location: employeelist.php");
exit();
?>
