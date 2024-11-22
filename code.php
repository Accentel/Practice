<?php 
include('header.php');
include('sidemenu.php');
include("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// Check user role (assuming 'admin' or 'user')
$is_admin = ($_SESSION['role'] === 'admin');

// Get logged-in user's ID
$user_id = $_SESSION['user_id'] ?? 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card {
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
    </style>
</head>
<body>
    <h5>Employee Attendance - <?php echo date('F Y'); ?></h5>
    <div class="card">
        <div class="card-topline"></div>
        <form method="get" action="emp_attendance.php" style="margin: 10px 0; display: flex; gap: 10px; align-items: center;">
            <label for="month" style="font-size: 14px; margin-right: 5px;"><b>Month:</b></label>
            <select name="month" id="month" style="width: 100px; height: 35px; font-size: 15px;" class="form-control">
                <?php
                for ($m = 1; $m <= 12; $m++) {
                    $monthName = date('F', mktime(0, 0, 0, $m, 1));
                    $selected = (isset($_GET['month']) && $_GET['month'] == $m) ? 'selected' : '';
                    echo "<option value='$m' $selected>$monthName</option>";
                }
                ?>
            </select>
            <label for="year" style="font-size: 14px; margin-left: 5px; margin-right: 5px;"><b>Year:</b></label>
            <select name="year" id="year" style="width: 100px; height: 35px; font-size: 15px;" class="form-control">
                <?php
                $currentYear = date('Y');
                for ($y = $currentYear; $y >= $currentYear - 5; $y--) {
                    $selected = (isset($_GET['year']) && $_GET['year'] == $y) ? 'selected' : '';
                    echo "<option value='$y' $selected>$y</option>";
                }
                ?>
            </select>
            <button type="submit" style="background-color: green; color: white; padding: 4px 10px; border: none; border-radius: 5px; cursor: pointer;">Search</button>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    // Query based on admin or user role
                    $sql = "SELECT 
                                ea.id, ea.date, ea.check_in_time, ea.check_out_time, 
                                ea.status, ea.work_hours, 
                                e.empcode, e.name
                            FROM emp_attendance AS ea
                            JOIN practice AS e ON ea.empcode = e.id ";

                    if (!$is_admin) {
                        $sql .= "WHERE ea.empcode = ? ";
                    }

                    $sql .= "LIMIT $offset, $limit";
                    $stmt = $conn->prepare($sql);

                    if (!$is_admin) {
                        $stmt->bind_param("i", $user_id);
                    }

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $formattedDate = date('d-m-Y', strtotime($row['date']));

                            echo "<tr style='text-align:center'>
                                <td>{$row['id']}</td>
                                <td>{$row['empcode']}</td>
                                <td>{$row['name']}</td>
                                <td>{$formattedDate}</td>
                                <td>{$row['check_in_time']}</td>
                                <td>{$row['check_out_time']}</td>
                                <td>{$row['work_hours']}</td>
                                <td>{$row['status']}</td>
                                <td>
                                    <a href='edit_employee.php?id={$row['id']}'>View</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' style='text-align: center;'>No attendance records found</td></tr>";
                    }

                    $stmt->close();

                    // Pagination logic
                    $countQuery = $is_admin ? "SELECT COUNT(*) AS total FROM emp_attendance" : "SELECT COUNT(*) AS total FROM emp_attendance WHERE empcode = ?";
                    $countStmt = $conn->prepare($countQuery);

                    if (!$is_admin) {
                        $countStmt->bind_param("i", $user_id);
                    }

                    $countStmt->execute();
                    $countResult = $countStmt->get_result();
                    $total = $countResult->fetch_assoc()['total'];
                    $countStmt->close();

                    $totalPages = ceil($total / $limit);
                    ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <div>
                <?php
                $start = $offset + 1;
                $end = min($offset + $limit, $total);
                echo "<p>Showing $start to $end of $total entries</p>";
                ?>
            </div>

            <nav>
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>&limit=<?php echo $limit; ?>">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>" <?php echo ($i === $page) ? 'class="active"' : ''; ?>>
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>&limit=<?php echo $limit; ?>">Next</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</body>
</html>

<?php include('footer.php'); ?>
