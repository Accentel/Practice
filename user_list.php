<?php include('header.php'); ?>
<?php include('sidemenu.php'); ?>
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .icon-block {
        color: white; /* Icon color */
        background-color: red; /* Background color */
        padding: 5px;
        border-radius: 4px;
        display: inline-block;
        margin-right: 5px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
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

    .custom-blue {
        background-color: blue; /* Change to desired blue color */
        color: white; /* Text color white */
        border: none; /* Remove border */
    }

    .custom-blue:hover {
        background-color: darkblue; /* Darker blue on hover (optional) */
    }

    body {
        overflow-x: hidden; /* Prevent horizontal scrolling */
    }

    .pagination {
        display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            background-color: #f0f0f0; /* Change to desired background color */
            padding: 10px;
            border-radius: 5px;
    }
    .pagination a {
		margin: 0 5px;
            text-decoration: none;
            color: blue;
    }
    .pagination a.active {
        font-weight: bold;
            text-decoration: underline;
    }
	
</style>
</head>
<body>
    <!-- end sidebar menu -->
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <h4>User List</h4>
                        <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 10px">
                            <div class="btn-group">
                                <a href="add_user.php" id="addRow"  class="btn custom-blue" style="margin-left:-15px">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="card card-topline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-left:830px; margin-top:-25px">
                                        <a class="btn btn-outline dropdown-toggle" style="background-color: red; color: white;" data-toggle="dropdown">
                                            Tools <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;" class="dropdown-item">
                                                    <i class="fa fa-print icon-block"></i> Print
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="dropdown-item">
                                                    <i class="fa fa-file-pdf-o icon-block"></i> Save as PDF
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="dropdown-item">
                                                    <i class="fa fa-file-excel-o icon-block"></i> Export to Excel
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><br>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
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
                                        <input type="text" name="search" id="search" placeholder="Search User Name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                        <input type="hidden" name="limit" value="<?php echo isset($_GET['limit']) ? htmlspecialchars($_GET['limit']) : 10; ?>">
                                        <input type="submit" value="Search">
                                    </form>
                                </div>

                                <div class="table-scrollable">
                                    <table class="table table-hover table-striped table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr style='text-align:center'>
                                                <th>ID</th>
                                                <th> Name </th>
                                                <th> User Name </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Set limit for pagination
                                                $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
                                                $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

                                                // Get total count of records
                                                $countQuery = "SELECT COUNT(*) AS total FROM login WHERE name1 LIKE '%$search%'";
                                                $countResult = mysqli_query($conn, $countQuery);
                                                $totalRow = mysqli_fetch_array($countResult);
                                                $total = $totalRow['total'];
                                                
                                                // Calculate total pages
                                                $totalPages = ceil($total / $limit);
                                                
                                                // Get the current page
                                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                                $offset = ($page - 1) * $limit;

                                                $query = "SELECT * FROM login WHERE name1 LIKE '%$search%' ORDER BY id DESC LIMIT $offset, $limit";
                                                $result = mysqli_query($conn, $query);

                                                $i = $offset + 1;
                                                while ($r = mysqli_fetch_array($result)) {
                                                    $ename = $r['ename'];
                                                    $names = $r['name1'];

                                                    $b = "SELECT * FROM practice where empcode='$ename' ";
                                                    $query2 = mysqli_query($conn, $b);

                                                    if ($query2 && mysqli_num_rows($query2) > 0) {
                                                        $res = mysqli_fetch_array($query2);
                                                        $name = $res['name'];
                                                    }
                                            ?>
                                            <tr class="odd gradeX"style='text-align:center'>
                                                <td class="patient-img"><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td class="left"><?php echo $names; ?></td>
                                                <td>
                                                    <a href='edit_user.php?id=<?php echo $names; ?>'>Edit</a> |
                                                    <a href='delete_user.php?id=<?php echo $names; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                                </td>
                                            </tr>
                                            <?php 
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination -->
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
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
	<?php include("footer.php");?>
    <!-- end page content -->
</body>
</html>

