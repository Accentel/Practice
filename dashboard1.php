

<?php
//session_start();
$name = $_SESSION['user'] ?? ''; // Check if 'name1' exists in $_SESSION
?>
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
                        <h5 class="card-title">Total Leaves</h5>
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
                        <h5 class="card-title">Pending Leave Request </h5>
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
                        <h5 class="card-title">Remaining Leaves</h5>
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
                try {
                    const response = await fetch('fetch_attendance.php'); // Fetch data from your server
                    const data = await response.json();
                    successCallback(data);
                } catch (error) {
                    console.error('Error fetching attendance data:', error);
                    failureCallback(error);
                }
            },
            dayCellDidMount: function(info) {
                // Apply a light block color for Sundays
                if (info.date.getDay() === 0) { // 0 = Sunday
                    info.el.style.backgroundColor = '#eaf4fc'; // Light blue background
                    info.el.style.color = '#004085'; // Dark blue text
                    info.el.style.border = '1px solid #bee5eb'; // Light blue border
                }
            }
        });

        calendar.render();
    });
</script>
