<?php include('header.php'); ?>
<?php 
session_start();
include('sidemenu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Card styling */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 105%;          /* or 100% if you want it flush edge‑to‑edge */
            margin-left: auto;
            margin-right: auto;
        }
        .card-topline::before {
            content: "";
            display: block;
            width: 100%;
            height: 3px;
            background-color: red;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 4px 4px 0 0;
        }

        /* Pagination styling */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
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

        /* Style for buttons */
        button {
            background-color: blue;
            color: white;
        }

        /* .table-scrollable {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            text-align: center;
        }

        td {
            text-align: center;
        }

        .btn-group {
            margin: 10px 0;
        } */
    </style>
</head>
<body>

<h4>Payroll Details</h4>
<button onclick="location.href='add_new_sal.php';" class="btn btn-group">Add New Salary Record</button>

<!-- Card for the Payroll Table -->
<div class="card card-topline">
    <!-- Container for Search and Entries Form -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <!-- Show Entries -->
        <div>
            <form method="get" action="" style="display: inline;">
                <label for="limit">Show entries:</label>
                <select name="limit" id="limit" onchange="this.form.submit()">
                    <?php
                    $options = [10, 15, 20];
                    foreach ($options as $option) {
                        $selected = (isset($_GET['limit']) && $_GET['limit'] == $option) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    ?>
                </select>
            </form>
        </div>

        <!-- Search Form -->
        <form method="get" action="" style="display: inline;">
            <label for="search">Search:</label>
            <input type="text" name="search" id="search" placeholder="Search by Emp Code or Name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <input type="hidden" name="limit" value="<?php echo isset($_GET['limit']) ? htmlspecialchars($_GET['limit']) : 10; ?>">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="table-scrollable">
        <table class="table table-hover table-striped table-checkable order-column full-width" id="salaryTable">
            <thead>
                <tr style="text-align: center">
                    <th>ID</th>
                    <th>Emp_Code</th>
                    <th>Emp_Name</th>
                    <th>Basic_Sal</th>
                    <th>Allowances</th>
                    <th>Deductions</th>
                    <th>Salary/Month</th>
                    <th>Net Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connection.php");

                // Define limit and pagination
                $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Handle search filter
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $searchQuery = $search ? "WHERE e.empcode LIKE '%$search%' OR e.name LIKE '%$search%'" : '';

                // Fetch salary data
                $sql = "SELECT s.salary_id, s.basic_salary, s.allowances, s.deductions, s.net_salary, s.salary_month, e.empcode, e.name 
                        FROM salaries s 
                        JOIN practice e ON s.id = e.id
                        $searchQuery LIMIT $offset, $limit";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='text-align:center'>
                            <td>{$row['salary_id']}</td>
                            <td>{$row['empcode']}</td>
                            <td><a href='employee_details.php?empcode={$row['empcode']}'>{$row['name']}</a></td>
                            <td>₹{$row['basic_salary']}</td>
                            <td>₹{$row['allowances']}</td>
                            <td>₹{$row['deductions']}</td>
                            <td>₹{$row['net_salary']}</td>
                            <td>₹{$row['salary_month']}</td>
                            <td>
                                <a href='edit_salary.php?id={$row['salary_id']}'>Edit</a> | 
                                <a href='delete_salary.php?id={$row['salary_id']}' onclick=\"return confirm('Are you sure you want to delete this salary record?');\">Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' style='text-align: center;'>No salary records found</td></tr>";
                }

                // Total record count for pagination
                $countResult = $conn->query("SELECT COUNT(*) AS total FROM salaries s JOIN practice e ON s.id = e.id $searchQuery");
                $total = $countResult->fetch_assoc()['total'];
                $totalPages = ceil($total / $limit);
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Showing current entries information -->
    <div class="pagination">
        <div>
            <?php
            $start = $offset + 1;
            $end = min($offset + $limit, $total);
            echo "<p>Showing $start to $end of $total entries</p>";
            ?>
        </div>

        <nav>
            <!-- Previous link -->
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>&limit=<?php echo $limit; ?>">Previous</a>
            <?php endif; ?>

            <!-- Page number links -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>&limit=<?php echo $limit; ?>" <?php echo ($i === $page) ? 'class="active"' : ''; ?>>
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <!-- Next link -->
            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>&limit=<?php echo $limit; ?>">Next</a>
            <?php endif; ?>
        </nav>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
