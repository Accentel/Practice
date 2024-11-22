<?php
include("connection.php");

// Set timezone
date_default_timezone_set('Asia/Kolkata');

// Get current time and date
$current_time = date('H:i:s');
$current_date = date('Y-m-d');

// Define the target time range
$target_start_time = "18:00:00";
$target_end_time = "18:01:00";

// Ensure this script runs only during the target time range
if ($current_time >= $target_start_time && $current_time < $target_end_time) {
    // Fetch employees
    $sql = "SELECT id AS empcode FROM practice";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empcode = $row['empcode'];

            // Check if attendance record exists for today
            $stmt = $conn->prepare("SELECT id FROM emp_attendance WHERE empcode = ? AND date = ?");
            $stmt->bind_param("is", $empcode, $current_date);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 0) {
                // If no record exists, mark as absent
                $absent_stmt = $conn->prepare("INSERT INTO emp_attendance (empcode, date, check_in_time, check_out_time, status) VALUES (?, ?, '00:00:00', '00:00:00', 'Absent')");
                $absent_stmt->bind_param("is", $empcode, $current_date);
                $absent_stmt->execute();
                $absent_stmt->close();
            }

            $stmt->close();
        }
    }

    echo "Absent marking process completed successfully.";
} else {
    echo "Outside target time range.";
}

$conn->close();
?>