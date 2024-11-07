<?php
include("connection.php");

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Delete employee data based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM practice WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No employee ID provided!";
}

$conn->close();

// Redirect back to the index page
header("Location: employeelist.php");
exit();
?>
