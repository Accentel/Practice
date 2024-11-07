<!DOCTYPE html>
<html lang="en">
<head>
  
<style>

  /* Sidebar styling */
.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #111;
    padding-top: 20px;
}

.sidebar a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: white;
    display: block;
}

.sidebar a:hover {
    background-color: #575757;
}




/* Page content */
.content {
    margin-left: 260px; /* Same as the width of the sidebar */
    padding: 20px;
}



/* Sidebar styling */
.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #111;
    padding-top: 20px;
    display: block;
}

.sidebar a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: white;
    display: block;
}

.sidebar a:hover {
    background-color: #575757;
}

/* Page content */
.content {
    margin-left: 110px; /* Same as the width of the sidebar */
    padding: 20px;
}


  </style>
  <title>Employee Management</title>
    <!-- Include Bootstrap CSS for styling (optional) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Include custom CSS for sidebar -->
    <link rel="stylesheet" href="styles.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</style>

</head>
<body>
 <!-- Sidebar -->
<div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="employeelist.php">Employees</a>
        <a href="user_list.php">Usermanagement</a>
        <a href="emp_attendance.php">Attendance</a>
        <a href="">Payslips</a>
        <!-- <a href="projects.php">Projects</a>
        <a href="settings.php">Settings</a> -->
    </div>

    <!-- Page content -->
    <div class="content">
        <div class="container">
            

            <?php
            if (isset($_GET['message']) && $_GET['message'] == 'inserted') {
                echo '<div class="alert alert-success" role="alert">Record inserted successfully</div>';
            } elseif (isset($_GET['message']) && $_GET['message'] == 'deleted') {
                echo '<div class="alert alert-success" role="alert">Record deleted successfully</div>';
            }
            ?>
</body>
</html>