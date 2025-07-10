<?php include('header.php'); ?>
<?php 
session_start();
include('sidemenu.php') ?>
<style>
    .footer-container {
        width: 101%;
        text-align: center;
        padding: 0px 0;
        background-color: #f8f9fa; /* Adjust as needed */
    }

    footer {
        margin: 0 auto;
        display: flex;
        justify-content: center;
    }

    .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            width: 105%;          /* or 100% if you want it flush edge‑to‑edge */
            margin-left: auto;
            margin-right: auto;
        }
        .card-topline {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: red;
            border-radius: 5px 5px 0 0;
        }
</style>
<div class="card">
<div class="card-topline"></div>
<div class="container mt-2">
    <h3>Leave Request</h3>
    <!-- Leave Request Form -->
    <form method="POST" action="" id="leaveRequestForm">
        <div class="mb-1 d-flex justify-content-end">
            <label for="leaveType" class="form-label"><b>Leave Type: </b></label>
            <select class="form-select" id="leaveType" name="leave_type" required>
                <option value="" selected>Select Leave Type</option>
                <option value="Sick Leave">Sick Leave</option>
                <option value="Casual Leave">Casual Leave</option>
                <option value="Paid Leave">Paid Leave</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label"><b>Start Date</b></label>
            <input type="date" class="form-control" id="startDate" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label"><b>End Date </b></label>
            <input type="date" class="form-control" id="endDate" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label"><b>Reason </b></label>
            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" name="submit_leave" class="btn btn-primary">Submit Leave Request</button>
        </div>
    </form>
    </div>
</div>
    <?php
    include('connection.php'); // Include the database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_leave'])) {
        // Get the user ID from the session (assume it's stored during login)
        $userId = $_SESSION['user_id'];
        $leaveType = $_POST['leave_type'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $reason = $_POST['reason'];

        // Insert the leave request into the database
        $query = "INSERT INTO leave_requests (user_id, leave_type, start_date, end_date, reason, status) 
                  VALUES ('$userId', '$leaveType', '$startDate', '$endDate', '$reason', 'Pending')";

        if ($conn->query($query) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Leave request submitted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error submitting leave request: " . $conn->error . "</div>";
        }
    }
    ?>
</div>

<div class="footer-container">
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</div>
