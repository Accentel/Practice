<?php
// session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empcode = $_POST['emp_id'];
    $action = $_POST['action'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if ($action === 'check_in') {
        $stmt = $conn->prepare("SELECT * FROM emp_attendance WHERE empcode = ? AND date = ? AND check_in_time IS NOT NULL");
        $stmt->bind_param("is", $empcode, $date);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Already checked in.";
        } else {
            $stmt = $conn->prepare("INSERT INTO emp_attendance (empcode, date, check_in_time, status) VALUES (?, ?, ?, 'Present')");
            $stmt->bind_param("iss", $empcode, $date, $time);
            $stmt->execute();
            echo "Check-in successful.";
        }
    } elseif ($action === 'check_out') {
        $stmt = $conn->prepare("UPDATE emp_attendance SET check_out_time = ? WHERE empcode = ? AND date = ? AND check_out_time IS NULL");
        $stmt->bind_param("sis", $time, $empcode, $date);
        $stmt->execute();
        echo "Check-out successful.";
    }
}
?>
