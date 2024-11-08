<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Check if it's check-in or check-out
    if (isset($_POST['check_in'])) {
        $check_in_time = date('H:i:s'); // current time for check-in (only time)

        $sql = "UPDATE employee_attendance SET check_in_time = ?, status = 'Present' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $check_in_time, $id);
        $stmt->execute();

    } elseif (isset($_POST['check_out'])) {
        $check_out_time = date('H:i:s'); // current time for check-out (only time)

        // Get the check-in time first to calculate work hours
        $sql = "SELECT check_in_time FROM employee_attendance WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there's a valid check-in time
        if ($row = $result->fetch_assoc()) {
            $check_in_time = new DateTime($row['check_in_time']);
            $check_out_time = new DateTime($check_out_time);
            
            // Calculate work hours
            $interval = $check_in_time->diff($check_out_time);
            $work_hours = $interval->format('%h:%i'); // Example: 8:30 for 8 hours and 30 minutes

            // Update the check-out time and work hours
            $sql = "UPDATE employee_attendance SET check_out_time = ?, work_hours = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssi', $check_out_time->format('H:i:s'), $work_hours, $id);
            $stmt->execute();
        } else {
            // Handle case where there's no check-in time found
            echo "No check-in time found for the specified record.";
        }
    }

    // Redirect back to the attendance page
    header("Location: emp_attendance.php");
    exit();
}
?>
