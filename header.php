<!DOCTYPE html>
<html lang="en">
<head>
  
<style>

  /* Sidebar styling */
/* .sidebar {
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
} */

/* .sidebar a:hover {
    background-color: #575757;
} */




/* Page content */
/* .content {
    margin-left: 260px; 
    padding: 20px;
} */



/* Sidebar styling */
/* .sidebar {
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
} */

/* Page content */
/* .content {
    margin-left: 260px; 
    padding: 20px;
} */

/* Header styling */
.header {
    margin-top: -20px;
    margin-left: 235px; /* Same as the width of the sidebar */
    padding: 15px;
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
<!-- <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="index.php">Employees</a>
        <a href="departments.php">Departments</a>
        <a href="projects.php">Projects</a>
        <a href="settings.php">Settings</a>
    </div> -->

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employees.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="departments.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

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