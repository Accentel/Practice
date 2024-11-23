<?php include('header.php'); ?>
<?php include('sidemenu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<style>
        body, html {
            overflow-x: hidden;
        }
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
#calendar {
            max-width: 100%;
            margin: 0 auto;
        }

    </style>
</head>
        <body>

        <h4>Employees Summary</h4>
        
        <!-- Summary Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <p class="card-text">
                            <?php
                            include("connection.php");
                            $result = $conn->query("SELECT COUNT(*) AS total FROM practice");
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Male </h5>
                        <p class="card-text">
                            <?php
                            $result = $conn->query("SELECT COUNT(*) AS total FROM practice WHERE gender='Male'");
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Female</h5>
                        <p class="card-text">
                            <?php
                            $result = $conn->query("SELECT COUNT(*) AS total FROM practice WHERE gender='Female'");
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Present Employees</h5>
                        <p class="card-text">
                            <?php
                            // Replace 'attendance_date' with the actual column name for the attendance date in your table
                            $today_date = date('Y-m-d'); // Get today's date in 'YYYY-MM-DD' format
                            $query = "
                                SELECT COUNT(*) AS total 
                                FROM emp_attendance 
                                WHERE status = 'Present' AND date = '$today_date'
                            ";
                            $result = $conn->query($query);
                            if ($result) {
                                $row = $result->fetch_assoc();
                                echo $row['total'];
                            } else {
                                echo "0"; // Handle query errors gracefully
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Absent Employees</h5>
                    <p class="card-text">
                        <?php
                        // Replace 'attendance_date' with the actual column name for the attendance date in your table
                        $today_date = date('Y-m-d'); // Get today's date in 'YYYY-MM-DD' format
                        $query = "
                            SELECT COUNT(*) AS total 
                            FROM emp_attendance 
                            WHERE status = 'Absent' AND date = '$today_date'
                        ";
                        $result = $conn->query($query);
                        if ($result) {
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                        } else {
                            echo "0"; // Handle query errors gracefully
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        

            <div class="col-md-4">
    <div class="card text-white bg-primary mb-3">
        <div class="card-body">
            <h5 class="card-title">Late By(9:45:00)</h5>
            <p class="card-text">
                <?php
                // Replace 'attendance_date' with the actual column name for the attendance date in your table
                $today_date = date('Y-m-d'); // Get today's date in 'YYYY-MM-DD' format
                $query = "
                    SELECT COUNT(*) AS total 
                    FROM emp_attendance 
                    WHERE check_in_time > '09:45:00' AND date = '$today_date'
                ";
                $result = $conn->query($query);
                if ($result) {
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                } else {
                    echo "0"; // Handle query errors gracefully
                }
                ?>
            </p>
        </div>
    </div>
</div>
        </div>

    </div>

    <!-- Full Calendar Section -->
<div id="calendar"></div>

            <!-- <br><br><br><br><br><br><br> -->
</div>
<div class="footer-container">
    <footer>
      <?php include("footer.php");?>
    </footer>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: async function(fetchInfo, successCallback, failureCallback) {
                // Fetch attendance data from the server
                try {
                    const response = await fetch('fetch_attendance.php'); // This script fetches data from the database
                    const data = await response.json();
                    successCallback(data);
                } catch (error) {
                    console.error('Error fetching attendance data:', error);
                    failureCallback(error);
                }
            }
        });

        calendar.render();
    });
</script>
</body>
</html>