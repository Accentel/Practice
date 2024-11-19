<?php
// include_once("Crud.php");
include("connection.php");


// $crud = new Crud();

//getting id of the data from url
$id = $_GET['id'];
$id1=$_GET['id1'];
// echo $id;
// echo $id1;
//deleting the row from table
// $result1 = $crud->execute("DELETE FROM login WHERE name1='$id'");


$query1="delete from login where name1='$id'";
$query2="delete from hr_user where emp_id='$id1'";
$query = mysqli_query($conn,$query1) or die(mysql_error());
$query = mysqli_query($conn,$query2) or die(mysql_error());
 

// }else{
// 	$query1="insert into login(name1,passowrd,ename,pass1) values('$uname','$pwd','$ename','$pwd1')";

// }
// $query = mysqli_query($link,$query1) or die(mysql_error());


// $sql = mysqli_query($link,"delete from login where id='$id'");
// $sql = mysqli_query($link,"delete from hr_user where emp_id='$id1'");

// $result = $crud->execute("DELETE FROM hr_user WHERE emp_id='$id1'");
//$result = $crud->delete($id, 'hospital_tarrif');
// if($result){
// 	print "<script>";
// 			//print "alert('Successfully Deleted ');";
// 			print "self.location='delete_user1.php?id=$id';";
			
			
// 			print "</script>";
// }


//For redirection.
// if($query2){ 
// 	print "<script>";
// 	print "alert('Deleted Successfully');";
// 	print "self.location='userview.php';";
// 	print "</script>";
// }

?>


