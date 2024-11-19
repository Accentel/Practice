<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user ID (assuming it is stored in the session or passed with the form)
    $id = $_POST['id'];
    $current_date = date('Y-m-d');  // Get today's date
    date_default_timezone_set('Asia/Kolkata');  // Adjust the timezone
    $current_time = date('H:i:s');  // Get current time for check-in/check-out

    // Check if the user clicked "check-in"
    if (isset($_POST['check_in'])) {
        // Check if the user has already checked in today
        $sql_check = "SELECT id FROM emp_attendance WHERE id = ? AND date = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('is', $id, $current_date);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows == 0) {
            // Insert new row for check-in if no record exists
            $sql_insert = "INSERT INTO emp_attendance (id, date, check_in_time, status) VALUES (?, ?, ?, 'Present')";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('iss', $id, $current_date, $current_time);
            $stmt_insert->execute();

            if ($stmt_insert->affected_rows > 0) {
                echo "Check-in successful.";
            } else {
                echo "Failed to record check-in.";
            }
        } else {
            echo "You have already checked in for today.";
        }
    }

    // Check if the user clicked "check-out"
    elseif (isset($_POST['check_out'])) {
        // Get the check-in time to calculate work hours
        $sql_check = "SELECT check_in_time FROM emp_attendance WHERE id = ? AND date = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('is', $id, $current_date);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        // Check if a record exists
        if ($row = $result_check->fetch_assoc()) {
            $check_in_time = new DateTime($row['check_in_time']);
            $check_out_time = new DateTime($current_time);

            // Calculate the difference (work hours)
            $interval = $check_in_time->diff($check_out_time);
            $work_hours = $interval->format('%h:%i'); // Example: 8:30 for 8 hours and 30 minutes

            // Update the check-out time and work hours in the record
            $sql_update = "UPDATE emp_attendance SET check_out_time = ?, work_hours = ? WHERE id = ? AND date = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param('ssis', $current_time, $work_hours, $id, $current_date);
            $stmt_update->execute();
        } else {
            echo "No check-in time found for today. Please check-in first.";
        }
    }

    // Check if the user clicked "absent"
    elseif (isset($_POST['absent'])) {
        // Check if a record exists for the user on the current date
        $sql_check = "SELECT id FROM emp_attendance WHERE id = ? AND date = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('is', $id, $current_date);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        // If no record exists, insert a new one with status "Absent"
        if ($result_check->num_rows == 0) {
            $sql_insert = "INSERT INTO emp_attendance (id, date, status, check_in_time, check_out_time, work_hours) VALUES (?, ?, 'Absent', '00:00:00', '00:00:00', '00:00')";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('iss', $id, $current_date, $current_date);
            $stmt_insert->execute();

            if ($stmt_insert->affected_rows > 0) {
                echo "Marked as absent for today.";
            } else {
                echo "Failed to mark as absent.";
            }
        } else {
            echo "Attendance record already exists for today.";
        }
    }

    // Redirect back to the attendance page after handling the request
    header("Location: emp_attendance.php");
    exit();
}
?>
