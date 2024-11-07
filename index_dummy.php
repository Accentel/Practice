<?php 
include('connection.php'); 
session_start(); // Start the session at the beginning

// Clear the error message if the user has refreshed the page
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Clear the message after displaying
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and sanitize input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check for matching credentials
    $query = "SELECT * FROM practice WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login, set session variables
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        // Store the error message in the session
        $_SESSION['error_message'] = "Invalid username or password. Please try again.";
        // Reload the page to show the error message
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        background-image: url('background1.jpg'); /* Set the background image */
        background-size: cover;                   /* Cover the entire viewport */
        background-position: center;              /* Center the image */
        background-repeat: no-repeat;             /* Prevent the image from repeating */
        background-attachment: fixed;             /* Fix the background image in place */
    }

    table {
        border: 1px solid;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.5); /* White background with transparency */
    }

    #type {
        width: 300px;                 /* Fixed width */
        height: 15px;                /* Fixed height */
        border: 0;                   /* No border */
        outline: 0;                  /* No outline */
        background: #1a1a1a;        /* Dark background color (change as needed) */
        border-bottom: 3px solid black; /* Bottom border */
        color: white;                /* Text color */
        font-size: 15px;             /* Font size */
        padding: 5px;                /* Optional: Add padding for better spacing */
        border-radius: 5px;          /* Optional: Add rounded corners */
    }

    input::-webkit-input-placeholder {
        font-size: 20px;
        line-height: 3;
        color: white;
    }

    #btn {
        width: 300px;
        height: 35px;
        font-size: 20px;
        border-bottom: 3px solid black;
    }
</style>

<title>Login Page</title>
</head>
<body>

<table width="20%" border="3" align="center" cellspacing="20" style="margin-top:100px">
    <form action="" method="POST">
        <tr>
            <td align="center">
                <img src="https://img.icons8.com/?size=100&id=3225&format=png&color=000000" width="150px">
            </td>
        </tr> 
        <tr>
            <td><input type="text" name="email" placeholder="Email" id="type"></td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder="Password" id="type"></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" value="Login" id="btn"></td>
        </tr>
    </form>
</table>

<?php
// Display the error message if it exists
if (isset($error_message)) {
    echo "<p style='color: red; text-align: center;'>$error_message</p>";
}
?>

</body>
</html>
