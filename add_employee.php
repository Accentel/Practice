<?php 
session_start();
if($_SESSION['user']) {
$ses=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .form-container {
            width: 50%;
            max-width: 600px;
            margin: auto;
            border: 2px solid black;
            border-radius: 8px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
        }
        
        /* Style for the input and progress bar container */
        #input-container {
            position: relative;
            width: 100%;
        }

        /* Style for the progress bar container and bar */
        #progress-bar-container {
            width: 90%;
            height: 8px;
            background-color: #ddd;
            border-radius: 5px;
            margin: 3px auto 0;
            margin-top: 1px;
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
        <h2 class="text-center" style="text-decoration: underline;">ADD EMPLOYEE</h2>
        <form action="emp_insert.php" method="POST">
            <div class="form-group row">
                <label for="ecode" class="col-sm-4 col-form-label"><b>Emp Code </b><span style="color: red;"> * </span></label>
                <div class="col-sm-8">
                    <input type="text" name="ecode" id="ecode" placeholder="Enter Employee Code" class="form-control" readonly required/>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label"><b>Name:</b><span style="color: red;"> * </span></label>
                <div class="col-sm-8">
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                    <input type="hidden" name="user" value="<?php echo $ses; ?>" id="user" class="form-control"/> 
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label"><b>Email:</b><span style="color: red;"> * </span></label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="mobile_number" class="col-sm-4 col-form-label"><b>Mobile Number:</b><span style="color: red;"> * </span></label>
                <div class="col-sm-8">
                    <input type="text" name="mobile_number" id="mobile_number" class="form-control" pattern="^\d{10}$" maxlength="10" required 
                        oninput="validateMobileNumber(this)" title="Please enter exactly 10 digits">
                </div>
            </div>

            <div class="form-group row">
                <label for="mobile_number" class="col-sm-4 col-form-label"><b>Salary/Annum:</b><span style="color: red;"> * </span></label>
                <div class="col-sm-8">
                    <!-- <input type="text" name="salary" id="salary" class="form-control" pattern="^\d{10}$" maxlength="10" required 
                        oninput="validateMobileNumber(this)" title="Please enter exactly 10 digits"> -->
                        <input type="number" name="salary" id="salary" class="form-control" min="0" step="0.01" required>

                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label"><b>Password:</b><span style="color: red;"> * </span></label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <small>Password must be at least 8 characters, with at least one uppercase letter, one number, and one special character.</small><br>
                    <input type="checkbox" id="show-password"> <label for="show-password">Show Password</label>
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
                <label class="col-sm-4 col-form-label"><b>Gender:<span style="color: red;"> * </span></b></label>
                <div class="col-sm-8 d-flex align-items-center">
                    <div class="form-check form-check-inline mr-3">
                        <input type="radio" name="gender" value="Male" class="form-check-input" id="male" required>
                        <label class="form-check-label" for="male"><b>Male</b></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="Female" class="form-check-input" id="female" required>
                        <label class="form-check-label" for="female"><b>Female</b></label>
                    </div>
                </div>
            </div>

            <div class="form-group row text-center">
                <div class="col-12">
                    <input type="submit" value="Submit" class="btn btn-primary" onclick="return validatePassword()">
                    <button type="button" onclick="location.href='employeelist.php';" class="btn btn-secondary ml-2">Close</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("password").addEventListener("input", function() {
            const password = this.value;
            let criteriaMet = 0;

            const lengthCriteria = /.{8,}/;
            const uppercaseCriteria = /[A-Z]/;
            const numberCriteria = /\d/;
            const specialCriteria = /[\W_]/;

            if (lengthCriteria.test(password)) criteriaMet++;
            if (uppercaseCriteria.test(password)) criteriaMet++;
            if (numberCriteria.test(password)) criteriaMet++;
            if (specialCriteria.test(password)) criteriaMet++;

            const progressPercentage = (criteriaMet / 4) * 100;
            document.getElementById("progress-bar").style.width = progressPercentage + "%";
        });

        document.getElementById("show-password").addEventListener("change", function() {
            const passwordInput = document.getElementById("password");
            if (this.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
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
                input.setCustomValidity("");
            }
        }
    </script>
</body>
</html>
<?php 
} else {
    session_destroy();
    session_unset();
    header('Location:../../index.php?authentication failed');
}
?>
