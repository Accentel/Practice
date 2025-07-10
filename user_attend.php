<?php 
// include('connection.php');
// session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name1']) && isset($_POST['pass1'])) {
        
    $username = $_POST['name1']; 
    $password = $_POST['pass1'];

    // Validate user credentials
    $stmt = $conn->prepare("SELECT ename, empcode FROM login WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($ename, $empcode);
        $stmt->fetch();
        
    if ($empcode) { // If credentials match
        $_SESSION['user'] = $username;
        $_SESSION['empcode'] = $empcode;
        $_SESSION['ename'] = $ename;  // Storing ename for use
        // header('Location: dashboard.php'); // Redirect to dashboard
        exit();
    } else {
        echo "<script>alert('Invalid credentials.'); window.location.href='index.php';</script>";
        exit();
    }
    $stmt->close(); // Always close prepared statements
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        .card {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .card-topline {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: red;
            border-radius: 5px 5px 0 0;
        }
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }
        nav a {
            margin: 0 5px;
            text-decoration: none;
            color: blue;
        }
        nav a.active {
            font-weight: bold;
            text-decoration: underline;
        }
        nav a:hover {
            border-color: #4CAF50;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            max-width: 300px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        body {
    margin: 0; /* Remove any default margin */
    overflow-x: hidden; /* Disable horizontal scrolling */
}

button {
    width: 100px; /* Set a fixed width */
    padding: 5px 10px; /* Adjust padding */
    font-size: 14px; /* Ensure consistent font size */
    background-color: blue; 
    color: white; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer;
}
    </style>
    <script>
        function openModal(action) {
            document.getElementById("modal").style.display = "block";
            document.getElementById("action").value = action;

            // Get current date
            const now = new Date();

            // Format the date as dd-mm-yyyy
            const formattedDate = now.getDate().toString().padStart(2, '0') + '-' +
                                  (now.getMonth() + 1).toString().padStart(2, '0') + '-' +
                                  now.getFullYear();

            // Set the formatted date to the input field
            document.getElementById("date").value = formattedDate;

            // Format the time as HH:mm:ss
            const formattedTime = now.toTimeString().split(' ')[0];

            // Set the time to the input field
            document.getElementById("time").value = formattedTime;
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }

        function showAlert(message) {
            alert(message); 
        }
    </script>
</head>
<body>
    <h5>Welcome <?php echo htmlspecialchars($name); ?> - <?php echo date('F Y'); ?></h5>

    <div class="card">
    <div class="card-topline"></div>
        <form method="post" action="emp_attendance.php" style="margin-left:680px; margin-bottom:10px; display: flex; gap: 13px; align-items: center;">
            <button type="button" onclick="openModal('check_in')" style="background-color: blue; color: white; padding: 4px 10px; border: none; border-radius: 5px; cursor: pointer;">Check-in</button>
            <button type="button" onclick="openModal('check_out')" style="background-color: blue; color: white; padding: 4px 10px; border: none; border-radius: 5px; cursor: pointer;">Check-out</button>
            <button type="button" onclick="openModal('leave_request')" style="background-color: blue; color: white; padding: 4px 10px; border: none; border-radius: 5px; cursor: pointer;">Leave</button>
        </form>

        <div class="table-scrollable">
            <table class="table table-hover table-striped table-checkable order-column full-width">
                <thead>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Emp Code</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>In-Time</th>
                        <th>Out-Time</th>
                        <th>Work Hours</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    $sql = "SELECT 
                                ea.id, ea.empcode, ea.name, ea.date, ea.check_in_time, ea.check_out_time, ea.work_hours, ea.status
                            FROM emp_attendance AS ea
                            WHERE ea.empcode = ? OR ea.name = ?
                            ORDER BY ea.date ASC, ea.id ASC";

                                // $sql = "SELECT 
                                // ea.id, ea.empcode, ea.name, ea.date, ea.check_in_time, ea.check_out_time, ea.work_hours, ea.status
                                // FROM emp_attendance AS ea
                                // WHERE ea.empcode = ?
                                // ORDER BY ea.date ASC, ea.id ASC";
                            
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("is", $id, $name); // Replace $id and $name with actual variables
                                $stmt->execute();
                                $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align:center'>
                                <td>{$row['id']}</td>
                                <td>{$row['empcode']}</td>
                                <td>{$row['name']}</td>
                                <td>" . date('d-m-Y', strtotime($row['date'])) . "</td>
                                <td>{$row['check_in_time']}</td>
                                <td>{$row['check_out_time']}</td>
                                <td>{$row['work_hours']}</td>
                                <td>{$row['status']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' style='text-align: center;'>No attendance records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()" style="position: absolute; top: 10px; right: 10px; font-size: 30px; cursor: pointer;">&times;</span>
            <form method="post" action="emp_attendance.php">
                <input type="hidden" name="empcode" value="<?php echo $empcode; ?>">
                <input type="hidden" name="action" id="action">
                <label for="date"><b>Date:</b></label>
                <input type="text" id="date" name="date" class="form-control" readonly>
                <br>
                <label for="time"><b>Time:</b></label>
                <input type="text" id="time" name="time" class="form-control" readonly>
                <br>
                <div style="display: flex; justify-content: center; gap: 10px;">
                    <button type="submit" name="check_in" style="background-color: green; color: white; padding: 5px 14px; border: none; border-radius: 5px; cursor: pointer;">Check-in</button>
                    <button type="submit" name="check_out" style="background-color: red; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Check-out</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include('connection.php');
        $action = $_POST['action'];
        $current_date = date('Y-m-d');
        date_default_timezone_set('Asia/Kolkata');
        $current_time = date('H:i:s');
        $empcode = $_POST['empcode'];

        if ($action == 'check_in') {
            $sql = "SELECT * FROM emp_attendance WHERE empcode = ? AND date = ? AND check_in_time IS NOT NULL";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $empcode, $current_date);
            $stmt->execute();
            
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "<script>showAlert('Check-in already recorded for today');</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO emp_attendance (empcode, name, date, check_in_time, status) VALUES (?, ?, ?, ?, 'Present')");
                $stmt->bind_param("isss", $id, $name, $current_date, $current_time);
                $stmt->execute();
                echo "<script>showAlert('Check-in successful');</script>";
            }
        }

        if ($action == 'check_out') {
            $sql = "SELECT id, check_in_time FROM emp_attendance WHERE empcode = ? AND name = ? AND date = ? AND check_out_time IS NULL";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $empcode, $name, $current_date);
            $stmt->execute();
            $stmt->bind_result($attendance_id, $check_in_time);
            $stmt->fetch();
            $stmt->close();

            if ($attendance_id) {
                $check_in = new DateTime($check_in_time);
                $check_out = new DateTime($current_time);
                $interval = $check_in->diff($check_out);
                $work_hours = $interval->format('%H:%I:%S');

                $stmt = $conn->prepare("UPDATE emp_attendance SET check_out_time = ?, work_hours = ? WHERE id = ?");
                $stmt->bind_param("ssi", $current_time, $work_hours, $attendance_id);
                $stmt->execute();
                echo "<script>showAlert('Check-out successful');</script>";
            } else {
                echo "<script>showAlert('Check-out failed: No valid check-in found');</script>";
            }
        }
    }
    ?>
</body>
</html>
