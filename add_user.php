<?php include "header.php"; ?>
<?php //include('config.php');
session_start();
if ($_SESSION['user']) {
    $ses = $_SESSION['user'];
//include('../db/insert_employee.php');
error_reporting(E_ALL);
ini_set('display_error',1);
    include "connection.php";
    include "sidemenu.php";
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
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
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
                            <!-- <div class="card card-box">
                                <div class="card-head"> -->
                                    <h4><b>User Management</b></h4>


                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form action="userinsert.php" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">

										<table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <tr >
                        <td width="40%" align="right" >Employee Name :</td>
                        <td width="60%"  align="left" >
                            <select  name="ename" id="ename" class="home_textbox" style="width:180px;" required>
                            <option value="">Select Emp Name</option>
                            <?php
                                $qry = "select * from practice";
                                    $r = mysqli_query($conn, $qry) or die(mysql_error());
                                    while ($rt = mysqli_fetch_array($r)) {?>
								<option value="<?php echo $rt['empcode'] ?>"><?php echo $rt['name'] ?></option>
								<?php   }?>
                            </select>
                        </td>
                    </tr>
                    <tr >
                        <td width="40%" align="right" >User Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="user_id" id="user_id" class="home_textbox"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Password :</td>
                        <td align="left">
                             <input type="password" name="pwd" id="pwd" class="home_textbox"/>
                             <!-- <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['name1']; ?>" class="home_textbox"/> -->
                             <input type="hidden" name="user" id="user" value="<?php echo isset($_SESSION['name1']) ? $_SESSION['name1'] : ''; ?>" class="home_textbox"/>
                       
                            </td>
                    </tr>
					<tr>
					<td align="left" colspan="2">
		<table width="100%" id="mainmenu" style="text-align:left;margin-left:20px;" cellpadding="0" cellspacing="0" border="0">
		<tr >
            <td colspan="8"><div align="center"><font color="#FF0000"><b>Main Menu</b></font></div></td>
            </tr>


        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="2" />&nbsp;&nbsp; <b>DASHBOARD</b>
        </div>
		        <div class="checkcust" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			 	 <input type="checkbox" name="menu[]" value="0200" />&nbsp;&nbsp; Employee <br>
				 <input type="checkbox" name="menu[]" value="0201" />&nbsp;&nbsp; Add Mandal <br>
				 <input type="checkbox" name="menu[]" value="0202" />&nbsp;&nbsp; Add Address <br>

			 <input type="checkbox" name="menu[]" value="201" />&nbsp;&nbsp; Employee Department <br>
			 <input type="checkbox" name="menu[]" value="202" />&nbsp;&nbsp; Employee Details <br>
			<!-- <input type="checkbox" name="menu[]" value="203" />&nbsp;&nbsp; Birth Certificate Format <br>
			 <input type="checkbox" name="menu[]" value="204" />&nbsp;&nbsp; Delivery / Birth Certificate Format <br>
			<input type="checkbox" name="menu[]" value="205" />&nbsp;&nbsp;Sterilisation Certificate Format<br>-->
			<input type="checkbox" name="menu[]" value="206" />&nbsp;&nbsp; Change Password<br>
			<input type="checkbox" name="menu[]" value="207" />&nbsp;&nbsp; User Management<br>
		</div>
		</td>

        <td ></td>

        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" />&nbsp;&nbsp; <b>DOCTOR</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" />&nbsp;&nbsp; Doctor<br>
			<input type="checkbox" name="menu[]" value="42" />&nbsp;&nbsp; Doctor Department<br>
		</div>
		</td>
		<td ></td>

         
		 <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" />&nbsp;&nbsp; <b>Appointment</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" />&nbsp;&nbsp; Book Appointment<br>

            <input type="checkbox" name="menu[]" value="53" />&nbsp;&nbsp; Registration Card<br>
			<!--<input type="checkbox" name="menu[]" value="52" />&nbsp;&nbsp; OP Cancellation<br>-->
			<input type="checkbox" name="menu[]" value="54" />&nbsp;&nbsp;Out Patient History<br>
		</div>
		</td>
        <td ></td>
		</tr>

        <tr >
        <td ></td>
        </tr>

        <tr >


        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="9" />&nbsp;&nbsp; <b>Pharmacy</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="90" />&nbsp;&nbsp; <B>Masters</B><br>-->

                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="91" />&nbsp;&nbsp; UOM<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="92" />&nbsp;&nbsp; Product Type<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="93" />&nbsp;&nbsp; Supplier Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="94" />&nbsp;&nbsp; Supplier Amount<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="95" />&nbsp;&nbsp; Packing Information<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="96" />&nbsp;&nbsp; Product Details<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="97" />&nbsp;&nbsp; Product Details Edit<br>


		</td>
        <td colspan="2" class="label1" ></td>



		 <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="90" />&nbsp;&nbsp; <b>Pharmacy Purchase</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			     &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="98" />&nbsp;&nbsp; Purchase Invoice<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99" />&nbsp;&nbsp; Product Adjustment<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="990" />&nbsp;&nbsp; Stock Adjustment<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="991" />&nbsp;&nbsp; Stock Adjustment Report<br>

		</div>
		</td>

		<td ></td>


		 <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12903" />&nbsp;&nbsp; <b>Pharmacy Reports</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="9996" />&nbsp;&nbsp; DAY-SALES REPORT<br>
			<input type="checkbox" name="menu[]" value="9998" />&nbsp;&nbsp; Drug Inspector Report<br> -->
			<input type="checkbox" name="menu[]" value="106" />&nbsp;&nbsp; Sales Entry Report<br>
		<input type="checkbox" name="menu[]" value="138" />&nbsp;&nbsp; Pharmacy Account Summery<br>
		<input type="checkbox" name="menu[]" value="1388" />&nbsp;&nbsp; Pharmacy History<br>
	  <input type="checkbox" name="menu[]" value="1389" />&nbsp;&nbsp; Pharmacy History With Amount<br>



		</div>
		</td>
        <td ></td>
        </tr>
        <tr >

        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12" />&nbsp;&nbsp; <b>REPORTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="030" />&nbsp;&nbsp; Out Patient Report<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1205" />&nbsp;&nbsp; Dialy Collected Amount Report<br>
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1299" />&nbsp;&nbsp; Daily  Amount Summary<br>
		</td>

		<td ></td>
		<td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="10" />&nbsp;&nbsp; <b>Pharmacy Sales</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="101" />&nbsp;&nbsp; Sales Entry<br>
            <input type="checkbox" name="menu[]" value="102" />&nbsp;&nbsp; Sales Return<br>
		</div>
		</td>
        <td ></td>


		<td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="15" />&nbsp;&nbsp; <b>Cancellation</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="151" />&nbsp;&nbsp; OP Cancellation<br>
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
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
       <?php include('footer.php');?>
	    <?php

} else {
    session_destroy();

    session_unset();

    header('Location:../../index.php?authentication failed');

}

?>