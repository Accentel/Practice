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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
        <a class="navbar-brand" href="index.php">DASHBOARD</a>
        <div class="ml-auto d-flex align-items-center">
            <!-- Placeholder text -->
            <span id="datetime" class="text-white mr-4" style="font-weight: bold;">Loading time...</span>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employeelist.php">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Logout</a>
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
             <!-- Run JS immediately after DOM renders -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const options = {
                year: 'numeric', month: 'short', day: '2-digit',
                hour: '2-digit', minute: '2-digit', second: '2-digit',
                hour12: true
            };
            document.getElementById('datetime').innerText = now.toLocaleString('en-IN', options);
        }

        updateDateTime(); // Show immediately
        setInterval(updateDateTime, 1000); // Then keep updating every second
    </script>
</body>
</html>