<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];?>
<?php
include "connection.php";

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch employee data based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT empcode, name, email, mobile_number, gender, password FROM practice WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($empcode, $name, $email, $mobile_number, $gender, $password);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No employee ID provided!";
    exit;
}

// Update employee data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empcode = filter_input(INPUT_POST, 'empcode', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mobile_number = filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("UPDATE practice SET empcode = ?, name = ?, email = ?, mobile_number = ?, gender = ?, password = ? WHERE id = ?");
    $stmt->bind_param('ssssssi', $empcode, $name, $email, $mobile_number, $gender, $password, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        header("Location: employeelist.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .form-container {
            width: 50%;
            max-width: 600px;
            margin: auto;
            border: 2px solid #333;
            border-radius: 8px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.15);
            margin-top: 50px;
        }

        /* Style for the input and progress bar container */
    #input-container {
        position: relative;
        width: 100%;
    }

    /* Style for the progress bar container and bar */
    #progress-bar-container {
        width: 90%; /* Smaller width for the progress bar */
        height: 8px;
        background-color: #ddd;
        border-radius: 5px;
        margin: 3px auto 0; /* Center and add spacing above */
        margin-top: 1px; /* Adjust to lift the bar */
        margin-right: -8px;
    }

    #progress-bar {
        height: 100%;
        width: 0%;
        background-color: green;
        border-radius: 5px;
        transition: width 0.3s;
    }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <div class="form-container">
        <h2 class="text-center" style="text-decoration: underline;">EDIT EMPLOYEE</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label"><b>Emp Code:</b><span class="required" style="color: red; font-weight: bold;"> * </span></label>
                <div class="col-sm-8">
                    <input type="text" id="empcode" name="empcode" value="<?php echo htmlspecialchars($empcode); ?>" class="form-control" autocomplete="off" readonly>
                    <input type="hidden" name="user" data-required="1" value="<?php echo $ses; ?>" id="user"  class="form-control" />
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label"><b>Name:</b><span class="required" style="color: red; font-weight: bold;"> * </span></label>
                <div class="col-sm-8">
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" class="form-control" autocomplete="off">
                    <input type="hidden" name="user" data-required="1" value="<?php echo $ses; ?>" id="user"  class="form-control" />
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label"><b>Email:</b><span class="required" style="color: red; font-weight: bold;"> * </span></label>
                <div class="col-sm-8">
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="mobile_number" class="col-sm-4 col-form-label"><b>Mobile Number:</b><span class="required" style="color: red; font-weight: bold;"> * </span></label>
                <div class="col-sm-8">
                    <input type="text" id="mobile_number" name="mobile_number" value="<?php echo htmlspecialchars($mobile_number); ?>" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label"><b>Password:</b><span class="required" style="color: red; font-weight: bold;"> * </span></label>
                <div class="col-sm-8">
                    <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" class="form-control"autocomplete="off" required>
                </div>
            </div>

            <div id="input-container" class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div id="progress-bar-container">
                                            <div id="progress-bar"></div>
                                        </div>
                                    </div>
                                </div>

            <div class="form-group row">
    <label class="col-sm-4 col-form-label"><b>Gender:</b><span class="required" style="color: red; font-weight: bold;"> * </span></label>
    <div class="col-sm-8 d-flex align-items-center">
        <div class="form-check form-check-inline">
            <input type="radio" id="male" name="gender" value="Male" <?php if ($gender == 'Male') {
    echo 'checked';
}
?> class="form-check-input" required>
            <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" id="female" name="gender" value="Female" <?php if ($gender == 'Female') {
    echo 'checked';
}
?> class="form-check-input" required>
            <label for="female" class="form-check-label">Female</label>
        </div>
    </div>
</div>

            <div class="form-group row text-center">
                <!-- <div class="col-sm-4"></div> -->
                <div class="col-12">
                    <input type="submit" value="Update" class="btn btn-primary">
                    <button type="button" onclick="location.href='employeelist.php';" class="btn btn-secondary ml-2">Close</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("progress-bar").style.width = "100%";
});
document.getElementById("password").addEventListener("input", function() {
    const password = this.value;
    let criteriaMet = 0;

    // Validation criteria regex patterns
    const lengthCriteria = /.{8,}/;
    const uppercaseCriteria = /[A-Z]/;
    const numberCriteria = /\d/;
    const specialCriteria = /[\W_]/;

    // Check each criterion and increase criteriaMet count if met
    if (lengthCriteria.test(password)) criteriaMet++;
    if (uppercaseCriteria.test(password)) criteriaMet++;
    if (numberCriteria.test(password)) criteriaMet++;
    if (specialCriteria.test(password)) criteriaMet++;

    // Calculate progress percentage based on criteria met
    const progressPercentage = (criteriaMet / 4) * 100;
    document.getElementById("progress-bar").style.width = progressPercentage + "%";
});

function validatePassword() {
    const password = document.getElementById("password").value;
    const lengthCriteria = /.{8,}/;
    const uppercaseCriteria = /[A-Z]/;
    const numberCriteria = /\d/;
    const specialCriteria = /[\W_]/;

    if (!lengthCriteria.test(password) || !uppercaseCriteria.test(password) || !numberCriteria.test(password) || !specialCriteria.test(password)) {
        alert("Password does not meet all the requirements.");
        return false;
    }
    return true;
}

function validateMobileNumber(input) {
            const value = input.value;
            if (!/^\d{10}$/.test(value) && value.length > 0) {
                input.setCustomValidity("Please enter exactly 10 digits.");
            } else {
                input.setCustomValidity(""); // Reset custom validity
            }
        }

</script>
</html>
<?php 
}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}
?>