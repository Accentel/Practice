<?php
include("connection.php");

if(isset($_REQUEST['Submit'])) {
    $ename = $_REQUEST['ename'];
    $uname = $_REQUEST['user_id'];
    $pwd1 = $_REQUEST['pwd'];
    $user = $_REQUEST['user'];

    $pwd = md5($pwd1);

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check if the menu is set and is an array
    $menu = isset($_REQUEST['menu']) ? $_REQUEST['menu'] : [];

    // Check if the user already exists
    $result = mysqli_query($conn, "SELECT * FROM login WHERE name1='$uname'");
    $rows = mysqli_num_rows($result);

    // Default query success flag
    $querySuccess = false;

    // If user exists, update, else insert
    if ($rows > 0) {
        // Update the existing user
        $query1 = "UPDATE login SET name1='$uname', passowrd='$pwd', pass1='$pwd1' WHERE ename='$ename'";
        $query = mysqli_query($conn, $query1);
        if ($query) {
            $querySuccess = true; // Update successful
        }
    } else {
        // Insert a new user
        $query1 = "INSERT INTO login(name1, passowrd, ename, pass1) VALUES('$uname', '$pwd', '$ename', '$pwd1')";
        $query = mysqli_query($conn, $query1);
        if ($query) {
            $querySuccess = true; // Insert successful
        }
    }

    // Delete the previous hr_user data
    $sql = mysqli_query($conn, "DELETE FROM hr_user WHERE emp_id='$ename'");

    // Insert new menu permissions if $menu is an array and has values
    if (is_array($menu) && count($menu) > 0) {
        foreach ($menu as $menuname) {
            $t = "INSERT INTO hr_user(emp_id, menus, currentdate, auth_by) VALUES('$ename', '$menuname', NOW(), '$user')";
            $qry = mysqli_query($conn, $t);
            if ($qry) {
                $querySuccess = true; // Menu insertion successful
            }
        }
    }

    // Final check for success
    if ($querySuccess) {
        echo "<script>";
        echo "alert('Successfully added');";
        echo "self.location='user_list.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Unable to add');";
        echo "self.location='user_list.php';";
        echo "</script>";
    }
}
?>
