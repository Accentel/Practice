<?php 
include('header.php');
session_start();
include('sidemenu.php'); 

$attendanceResult = null;
$totalDays = 0;
$workingDays = 0;
$presentDays = 0;
$absentDays = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empcode = $_POST['empcode'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    include("connection.php");

    // Fetch attendance records for the selected employee, month, and year
    $stmt = $conn->prepare("SELECT ea.id, ea.date, ea.check_in_time, ea.check_out_time, ea.status, ea.work_hours, e.name, e.empcode AS emp_code
                            FROM emp_attendance AS ea
                            INNER JOIN practice AS e ON ea.empcode = e.id
                            WHERE ea.empcode = ? AND MONTH(ea.date) = ? AND YEAR(ea.date) = ?
                            ORDER BY ea.date ASC");
    $stmt->bind_param("sii", $empcode, $month, $year);
    $stmt->execute();
    $attendanceResult = $stmt->get_result();

// Fetch total days in the selected month
$totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Fetch working days, present, and absent counts
$workingDaysStmt = $conn->prepare("SELECT COUNT(*) AS workingDays, 
                                           COALESCE(SUM(CASE WHEN ea.status = 'Present' THEN 1 ELSE 0 END), 0) AS presentDays,
                                           COALESCE(SUM(CASE WHEN ea.status = 'Absent' THEN 1 ELSE 0 END), 0) AS absentDays
                                    FROM emp_attendance AS ea
                                    WHERE ea.empcode = ? AND MONTH(ea.date) = ? AND YEAR(ea.date) = ?");
$workingDaysStmt->bind_param("sii", $empcode, $month, $year);
$workingDaysStmt->execute();
$result = $workingDaysStmt->get_result()->fetch_assoc();

$workingDays = $result['workingDays'];
$presentDays = $result['presentDays'];
$absentDays = $result['absentDays'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            width: 105%;          /* or 100% if you want it flush edge‑to‑edge */
            margin-left: auto;
            margin-right: auto;
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
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        .form-container select,
        .form-container button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 170px;
            box-sizing: border-box;
        }
        .summary-cards {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin: 20px 0;
            margin-top: -60px;
        }

        .summary-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 150px;
            text-align: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
        }

        .summary-card h4 {
            margin: 0;
            font-size: 20px;
        }

        .summary-card p {
            margin: 5px 0 0;
            font-size: 16px;
        }

        /* Color customizations */
        .total-days {
            background-color: #e7f7ff;
            border: 1px solid #b3d7ff;
        }

        .working-days {
            background-color: #e1f7e1;
            border: 1px solid #a3d8a3;
        }

        .present-days {
            background-color: #d1f7c4;
            border: 1px solid #a3d8a3;
        }

        .absent-days {
            background-color: #f8d7da;
            border: 1px solid #f5b2b2;
        }

        /* Text color */
        .summary-card h4, .summary-card p {
            color: #333;
        }

        .present-days h4 {
            color: #28a745;
        }

        .absent-days h4 {
            color: #dc3545;
        }

        /* Hover effect */
        .summary-card:hover {
            transform: translateY(-5px); /* Slight upward movement */
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.2); /* Stronger shadow */
        }

        /* Hover color change (optional) */
        .summary-card.total-days:hover {
            background-color: #d0efff;
        }

        .summary-card.working-days:hover {
            background-color: #c3f3c3;
        }

        .summary-card.present-days:hover {
            background-color: #b4f1a4;
        }

        .summary-card.absent-days:hover {
            background-color: #f5c2c2;
        }
    </style>
</head>
<body>
<h5>Employee Overall Attendance</h5>

<div class="summary-cards">
    <div class="summary-card total-days">
        <h4><?php echo $totalDays; ?></h4>
        <p>Total Days</p>
    </div>
    <div class="summary-card working-days">
        <h4><?php echo $workingDays; ?></h4>
        <p>Working Days</p>
    </div>
    <div class="summary-card present-days">
        <h4><?php echo $presentDays; ?></h4>
        <p>Present Days</p>
    </div>
    <div class="summary-card absent-days">
        <h4><?php echo $absentDays; ?></h4>
        <p>Absent Days</p>
    </div>
</div>

<div class="card">
    <div class="card-topline"></div>

    <form method="post" action="" class="form-container">
        <select name="empcode" id="empcode" required>
            <option value="" disabled selected>Select Employee</option>
            <?php
                include("connection.php");
                $result = $conn->query("SELECT id, name FROM practice");
                while ($row = $result->fetch_assoc()) {
                    $selected = isset($empcode) && $empcode == $row['id'] ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                }
            ?>
        </select>

        <select name="month" id="month" required>
            <option value="" disabled selected>Select Month</option>
            <?php
                for ($m = 1; $m <= 12; $m++) {
                    $monthName = date('F', mktime(0, 0, 0, $m, 1));
                    $selected = isset($month) && $month == $m ? 'selected' : '';
                    echo "<option value='$m' $selected>$monthName</option>";
                }
            ?>
        </select>

        <select name="year" id="year" required>
            <option value="" disabled selected>Select Year</option>
            <?php
                $currentYear = date('Y');
                for ($y = $currentYear; $y > $currentYear - 5; $y--) {
                    $selected = isset($_POST['year']) && $_POST['year'] == $y ? 'selected' : '';
                    echo "<option value='$y' $selected>$y</option>";
                }
            ?>
        </select>

        <button type="submit" style="background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;">
            View Attendance
        </button>
    </form>

    <div class="table-scrollable">
        <table class="table table-hover table-striped table-checkable order-column full-width">
            <thead>
                <tr style="text-align: center">
                    <th>ID</th>
                    <th>Emp Name</th>
                    <th>Emp Code</th>
                    <th>Date</th>
                    <th>In-Time</th>
                    <th>Out-Time</th>
                    <th>Work Hours</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($attendanceResult && $attendanceResult->num_rows > 0) {
                    while ($row = $attendanceResult->fetch_assoc()) {
                        $formattedDate = date('d-m-Y', strtotime($row['date']));
                        echo "<tr style='text-align:center'>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['emp_code']}</td>
                            <td>{$formattedDate}</td>
                            <td>{$row['check_in_time']}</td>
                            <td>{$row['check_out_time']}</td>
                            <td>{$row['work_hours']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='view_attendance.php?id={$row['id']}'>View</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' style='text-align: center;'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php include('footer.php'); ?>
