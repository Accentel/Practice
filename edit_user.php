<?php
$menu2 = $menu0200 = $menu4 = $menu41 = $menu5 = $menu51 = ''; 
include("header.php");
session_start(); // Ensure session is started

if (isset($_SESSION['user'])) {
    $ses = $_SESSION['user'];

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Include other necessary files
    include('userinsert.php');
    include('connection.php');
    include('sidemenu.php');
?>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-topline::before {
            content: "";
            display: block;
            width: 100%;
            height: 3px; /* Adjust height as needed */
            background-color: red; /* Change color as needed */
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 4px 4px 0 0; /* Optional: for rounded edges */
        }
    </style>
    
    <!-- Page Content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class="pull-left">
                        <div class="page-title"><b>User Management</b></div>
                    </div>
                    <div class="d-flex justify-content-end" style="margin-top:-30px">
                        <ol class="breadcrumb page-breadcrumb ms-auto">
                            <li class="breadcrumb-item">
                                <i class="fa fa-home"></i>
                                <a class="parent-item" href="dashboard.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="parent-item" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div>
                </div>
            </div>
            
            <div class="card card-topline">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h4><b>User Management</b></h4>
                    </div>
                </div>
                <div class="card-body" id="bar-parent">
                    <?php
                    // Retrieve the user details
                    $id = $_GET['id'];
                    $r = mysqli_query($conn, "SELECT * FROM login WHERE name1='$id'") or die(mysqli_error($conn));
                    $r1 = mysqli_fetch_array($r);
                    $ename = $r1['ename'];
                    $id1 = $r1['id1'];
                    ?>
                    
                    <!-- Form to edit user details -->
                    <form action="#" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <table width="100%" border="0" cellpadding="2" cellspacing="0">
                                <tr>
                                    <td width="40%" align="right">Employee Nam
										e :</td>
                                    <td width="60%" align="left">
                                        <select name="ename" id="ename" class="home_textbox" style="width:180px;" required>
                                            <option value="">Select Emp Name</option>
                                            <?php
                                            // Fetch employee names
                                            $qry = "SELECT * FROM practice";
                                            $r = mysqli_query($conn, $qry) or die(mysqli_error($conn));
                                            while ($rt = mysqli_fetch_array($r)) {
                                            ?>
                                                <option value="<?php echo $rt['empcode'] ?>" <?php if ($ename == $rt['empcode']) { echo 'selected'; } ?>>
                                                    <?php echo $rt['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td width="40%" align="right">User Name :</td>
                                    <td width="60%" align="left">
                                        <input type="text" name="user_id" id="user_id" class="home_textbox" value="<?php echo $id; ?>" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Password :</td>
                                    <td align="left">
                                        <input type="password" name="pwd" id="pwd" class="home_textbox" value="<?php echo $r1['pass1']; ?>" required/>
                                        <input type="hidden" name="user" id="user" value="<?php echo isset($_SESSION['name1']) ? $_SESSION['name1'] : ''; ?>" class="home_textbox"/>
                                        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" class="home_textbox"/>
                                        <input type="hidden" name="uname" id="uname" value="<?php echo $id1; ?>" class="home_textbox"/>
                                    </td>
                                </tr>
					<?php
					 $a="select * from hr_user where emp_id='$ename'";
$t=mysqli_query($conn,$a) or die(mysqli_error($conn));
while($row1=mysqli_fetch_array($t)){
$menu= $row1['menus'];
	if($menu == "2"){$menu2="2";}
	if($menu == "0200"){$menu0200="0200";}
	 
	
	 
	if($menu == "4"){$menu4="4";}
	if($menu == "41"){$menu41="41";}
	 
	
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	 
	
}
 ?>
					<tr>
					<td align="left" colspan="2">
		<table width="100%" id="mainmenu" style="text-align:left;margin-left:20px;" cellpadding="0" cellspacing="0" border="0">
		<tr >
            <td colspan="8"><div align="center"><font color="#FF0000"><b>Main Menu</b></font></div></td>
            </tr>
		
		
         <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="2" <?php if($menu2=='2'){echo "checked='checked'";} ?> />&nbsp;&nbsp; <b>DASHBOARD</b>
        </div>
		<div class="checkcust" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			
		
			<input type="checkbox" name="menu[]" value="0200" <?php if($menu0200=='0200'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Dashboard <br>
			
			
			
			
		</div>
		</td>
        
        
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" <?php if($menu4=='4'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>Attendance</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" <?php if($menu41=='41'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Attendance<br>
		</div>
		</td>
		
        
        
		
		 <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" <?php if($menu5=='5'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>PAYSLIPS</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" <?php if($menu51=='51'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Payslips<br>
        </div>
		</td>
        <td ></td>

		</tr>

        <tr >     
		</div>
		</td>
        <td ></td>
        </tr>
       
                </table>
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="user_list.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include('footer.php');?>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>