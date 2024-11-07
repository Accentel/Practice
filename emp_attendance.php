<?php include('header.php'); ?>
<?php include('sidemenu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Table styling */
        /* table, th, td {
            border: 1px solid;
            text-align: center;
        } */

        /* Card styling */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-topline::before {
            content: "";
            display: block;
            width: 100%;
            height: 3px; /* Adjust height as needed */
            background-color: red; /* Change color as needed */
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 4px 4px 0 0; /* Optional: for rounded edges */
        }

        /* Pagination styling */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            background-color: #f0f0f0; /* Change to desired background color */
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

        /* Style for the button to stand out */
        button {
            background-color: blue;
            color: white;
        }
        
    </style>
</head>
<body>

<h4>Employee Attendance</h4>
<!-- <button onclick="location.href='add_employee.php';" class="btn btn-group">Add New</button> -->

<!-- Card for the Employee Table -->
<div class="card card-topline">
    <!-- Container for Search and Entries Form -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <!-- Show Entries -->
        <div>
            <form method="get" action="" style="display: inline;">
                <label for="limit">Show entries:</label>
                <select name="limit" id="limit" onchange="this.form.submit()">
                    <?php
                    $options = [10, 15, 20]; // Options for entries
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
            <input type="text" name="search" id="search" placeholder="Search employees" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <input type="hidden" name="limit" value="<?php echo isset($_GET['limit']) ? htmlspecialchars($_GET['limit']) : 10; ?>">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="table-scrollable">
        <table class="table table-hover table-striped table-checkable order-column full-width" id="employeeTable">
            <thead>
                <tr class="" style="text-align: center">
                    <th>ID</th>
                    <th> Emp Code </th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>In-Time</th>
                    <th>Out Time</th>
                    <th>Status</th>
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
                $searchQuery = $search ? "WHERE empcode LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'" : '';

                // Fetch employee data
                $sql = "SELECT id, empcode, name, email, mobile_number, gender, password FROM practice $searchQuery LIMIT $offset, $limit";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='text-align:center'>
                            <td>{$row['id']}</td>
                            <td>{$row['empcode']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['mobile_number']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['password']}</td>
                            <td>
                                <a href='edit_employee.php?id={$row['id']}'>Edit</a> | 
                                <a href='delete_employee.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' style='text-align: center;'>No employees found</td></tr>";
                }

                // Total record count for pagination
                $countResult = $conn->query("SELECT COUNT(*) AS total FROM practice $searchQuery");
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
