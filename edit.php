<?php
include("connection.php");


// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch employee data based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT first_name, last_name, email, mobile_number, gender, password FROM practice WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name, $email, $mobile_number, $gender, $password);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No employee ID provided!";
    exit;
}

// Update employee data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mobile_number = filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("UPDATE practice SET first_name = ?, last_name = ?, email = ?, mobile_number = ?, gender = ?, password = ? WHERE id = ?");
    $stmt->bind_param('sssssss', $first_name, $last_name, $email, $mobile_number, $gender, $password, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        // Redirect back to the index page after updating
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <!-- Include Bootstrap CSS for styling (optional) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <table>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <tr>
            <td><label for="first_name">First Name:</label></td>
            <td><input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required></td>
</tr>
            <tr>
            <td><label for="last_name">Last Name:</label></td>
            <td><input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required></td>
</tr>
            <tr>
            <td> <label for="email">Email:</label></td>
            <td> <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required></td>
</tr>
            <tr>
            <td> <label for="mobile_number">Mobile Number:</label></td>
            <td> <input type="text" id="mobile_number" name="mobile_number" value="<?php echo htmlspecialchars($mobile_number); ?>" required></td>
</tr>

<tr>
            <td> <label for="password">Password:</label></td>
            <td> <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required></td>
</tr>
            <tr>
           <td> <label for="gender">Gender:</label></td>
            <td><input type="radio" id="male" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?> required>Male
            <!-- <td><label for="male">Male</label></td> -->
            <input type="radio" id="female" name="gender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?> required>Female</td>
            <!-- <td><label for="female">Female</label></td> -->

            
        
</tr>
            <td><input type="submit" value="Update"></td>
            <td><button onclick="location.href='index.php';" class="btn btn-group">Close</button></td>
        </form>
        </table>
    </div>

    <!-- Include jQuery and Bootstrap JS for dynamic behavior (optional) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
