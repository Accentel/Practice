<?php include('header.php'); ?>
<?php include('sidemenu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    /* Table styling& */
      table, th, td {
    border: 1px solid;
    text-align: center;
     }

  </style>
 
</head>
<body>

    <h4>Employee List</h4>


                  <button onclick="location.href='insert.php';" class="btn btn-group">Add New</button>


                                                         <div class="table-scrollable">
                                      					   <table class="table table-hover table-striped table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>ID</th>
					                                                <th> First Name </th>
					                                                <th> Last Name </th>
					                                                <th> Email  </th>
					                                                <th> Mobile Number </th>
					                                                <th> Gender </th>
                                                          <th> Password </th>
                                                          <th> Actions </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php
                                                  include("connection.php");

                                                 // Fetch employees
                                                   $result = $conn->query("SELECT id, first_name, last_name, email, mobile_number, gender, password FROM practice");

                                                   if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                            <td>" . $row['id'] . "</td>
                                                            <td>" . $row['first_name'] . "</td>
                                                            <td>" . $row['last_name'] . "</td>
                                                            <td>" . $row['email'] . "</td>
                                                            <td>" . $row['mobile_number'] . "</td>
                                                            <td>" . $row['gender'] . "</td>
                                                            <td>" . $row['password'] . "</td>
                                                            
                                                          <td>  <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                                                            <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>
                                                        </tr>";
                                                            }
                                                            } else {
                                                                echo "<tr><td colspan='7'>No employees found</td></tr>";
                                                            }

                                                            $conn->close();
                                                            ?>
                                                        </tbody>
																
															<!-- </tbody> -->
					                 </table>
					               </div>

                                                        
 <?php include('footer.php'); ?>

</body>
</html>