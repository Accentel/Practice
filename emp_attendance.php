<?php include('header.php'); ?>
<?php include('sidemenu.php'); ?>
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
            height: 5px;
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

<h4>Employee Attendance</h4>

<div class="card">
    <div class="card-topline"></div>
    <form method='post' action='update_attendance.php'; style="margin-left:750px">
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit' name='check_in' value='1'>Check-in</button>
                                    <button type='submit' name='check_out' value='1'>Check-out</button>
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
                    <th>Status</th>
                    <th>Work Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connection.php");

                $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                $sql = "SELECT 
                            ea.id, ea.date, ea.check_in_time, ea.check_out_time, 
                            ea.status, ea.work_hours, 
                            e.empcode, e.name
                        FROM employee_attendance AS ea
                        JOIN practice AS e ON ea.empcode = e.id
                        LIMIT $offset, $limit";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='text-align:center'>
                            <td>{$row['id']}</td>
                            <td>{$row['empcode']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['check_in_time']}</td>
                            <td>{$row['check_out_time']}</td>
                            <td>{$row['status']}</td>
                            <td>{$row['work_hours']}</td>
                            <td>
                                <a href='edit_employee.php?id={$row['id']}'>Edit</a> | 
                                <a href='delete_employee.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' style='text-align: center;'>No attendance records found</td></tr>";
                }

                $countResult = $conn->query("SELECT COUNT(*) AS total FROM employee_attendance");
                $total = $countResult->fetch_assoc()['total'];
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

<?php include('footer.php'); ?>
</body>
</html>
