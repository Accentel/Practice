
<!-- This code is auto_mark_absent.php code starts here -->
 <!-- With this code, the absent will when work when the load this page only, otherwise it won't work -->
<?php
include("connection.php");

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
$current_time = date('H:i:s');

// Run indefinitely (be careful with this approach)
while (true) {
    // Check the current time
    if ($current_time >= '12:52:00' && $current_time < '12:53:00') {
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
        break; // Exit the loop after running the task for today
    }

    // Wait for 60 seconds before checking again
    sleep(60);
    $current_time = date('H:i:s'); // Update the current time
}

$conn->close();
?>
<!-- This code is auto_mark_absent.php code End here -->

<!-- This code is in emp_atendance.php starts here -->
<!-- this script will use when the direct absent need to work, otherwise no need to use this code -->
<script>
        function checkTimeAndMarkAbsent() {
            const now = new Date();

            // Format the current time as HH:mm:ss
            const currentTime = now.toTimeString().split(' ')[0];

            // Define the target time range
            const targetStartTime = "12:45:00";
            const targetEndTime = "12:46:00";

            // Check if the current time is within the target range
            if (currentTime >= targetStartTime && currentTime < targetEndTime) {
                // Send an AJAX request to mark absentees
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "auto_mark_absent.php", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText); // Log the response from the server
                    }
                };
                xhr.send();
            }
        }

        // Run the function every minute
        setInterval(checkTimeAndMarkAbsent, 60000); // 60000ms = 1 minute
    </script>

    <!-- This code is in emp_atendance.php End here -->
