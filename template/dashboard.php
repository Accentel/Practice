<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

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
                <div class="card text-white bg-danger mb-3">
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
            <!-- <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Other Employees</h5>
                        <p class="card-text">
                            <?php
                            $result = $conn->query("SELECT COUNT(*) AS total FROM practice WHERE gender='Other'");
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- Employee List -->
        <!-- <h3>Employee List</h3>
        <div class="table-responsive">
            <table class="table table-hover table-checkable order-column full-width">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM practice");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["mobile_number"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No employees found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> -->
    </div>
</div>




<?php include('footer.php'); ?>

  
</body>
</html>