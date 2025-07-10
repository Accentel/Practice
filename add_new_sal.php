<?php
include('header.php'); ?>
<?php
session_start();
include('sidemenu.php');
include("connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Form styling */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <h4>Add New Salary Record</h4>

    <div class="form-container">
        <form method="POST" action="payroll.php">
            <div>
                <label for="empcode">Employee Code:</label>
                <input type="text" name="empcode" id="empcode" required>
            </div>

            <div>
                <label for="basic_salary">Basic Salary:</label>
                <input type="number" name="basic_salary" id="basic_salary" required>
            </div>

            <div>
                <label for="allowances">Allowances:</label>
                <input type="number" name="allowances" id="allowances" required>
            </div>

            <div>
                <label for="deductions">Deductions:</label>
                <input type="number" name="deductions" id="deductions" required>
            </div>

            <div>
                <label for="deductions">Net Salary:</label>
                <input type="number" name="net_salary" id="net_salary" required>
            </div>

            <div>
                <label for="salary_month">Salary Month:</label>
                <input type="text" name="salary_month" id="salary_month" required>
            </div>

            <button type="submit" name="submit">Add Salary</button>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Debugging statement
        echo "Form is being submitted.<br>";
    
        // Get form data
        $empcode = $_POST['empcode'];
        $basic_salary = $_POST['basic_salary'];
        $allowances = $_POST['allowances'];
        $deductions = $_POST['deductions'];
        $salary_month = $_POST['salary_month'];
    
        // Calculate net salary
        $net_salary = $basic_salary + $allowances - $deductions;
    
        // Prepared SQL query to insert data
        $stmt = $conn->prepare("INSERT INTO salaries (empcode, basic_salary, allowances, deductions, net_salary, salary_month)
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $empcode, $basic_salary, $allowances, $deductions, $net_salary, $salary_month);
    
        // Execute the statement and check for errors
        if ($stmt->execute()) {
            echo "<p>Salary record added successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
    
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

<?php include('footer.php'); ?>
</body>
</html>
