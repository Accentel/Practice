<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<table>
    <form action="user_insert.php" method="POST">
  <tr>
    <td><lable for="first name">First Name:</lable></td>
    <td><input type="text" name="first_name" id="first_name" autocomplete="off" required></td>
</tr>

<tr>
    <td><lable for="last name">Last Name:</lable></td>
    <td><input type="text" name="last_name" id="last_name"></td>
</tr>

<tr>
    <td><lable for="email">Email:</lable></td>
    <td><input type="text" name="email" id="email" autocomplete="off"></td>
</tr>

<tr>
    <td> <lable for="mobile">Mobile Number:</lable></td>
    <td> <input type="text" name="mobile_number" id="mobile_number"></td>
</tr>

<tr>
     <td><lable for="Password">Password:</lable></td>
     <td> <input type="passwo" name="password" id="password"></td>
      <!-- <span class="toggle-password">👁️</span> -->
</tr>

<tr>
     <td><lable for="gender">Gender:</lable></td>
     <td> <input type="radio" name="gender" value="Male">Male
      <input type="radio" name="gender" value="Female">Female</td>
</tr>


      

     
      <td><input type="submit" value="submit"></td>
      <td><button onclick="location.href='index.php';" class="btn btn-group">Close</button></td>
     </form>
</table>





</body>
</html>