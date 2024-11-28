<?php
include("connection.php");

if (isset($_GET['empcode'])) {
    $empcode = $_GET['empcode'];

    echo "Empcode received: " . $empcode . "<br>"; // Debugging: Ensure empcode is received correctly

    // Fetch attendance records for the given employee
    $sql = "SELECT * FROM emp_attendance WHERE empcode = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Query preparation failed: " . $conn->error); // Debugging: Check if query preparation failed
    }

    $stmt->bind_param("s", $empcode);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h4>Attendance List for Employee: $empcode</h4>";
    echo "<table border='1'>";
    echo "<tr><th>Date</th><th>Check-In</th><th>Check-Out</th><th>Status</th></tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['date']}</td>
                <td>{$row['check_in_time']}</td>
                <td>{$row['check_out_time']}</td>
                <td>{$row['status']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No attendance records found for empcode: $empcode.</td></tr>";
    }

    echo "</table>";
} else {
    echo "No employee selected.";
}
$conn->close();
?>
