<?php include('sidemenu.php'); ?>
<?php include('header.php'); ?>
<!-- //include('config.php');
// session_start();
// include('connection.php');
// if($_SESSION['user'])
// {
// // $name=$_SESSION['user'];
// //include('org1.php');
// // include'dbfiles/org.php';
// //include'dbfiles/iqry_emp.php'; -->

<!DOCTYPE html>
<html lang="en">
    <!-- <?php include'template/headerfile.php'; ?> -->
	 <!-- <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" /> -->
    
    <body >
        <!-- <?php include'template/logo.php'; ?> -->

        

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-user"></i>
                                <a href="#">User Management</a>
                            </li>
                           
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Employee Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Employee Details</h3>
								</div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="user_insert.php">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-10 control-label">Employee Name:</label>

                  <div class="col-sm-12">
				  <input type="hidden" name="user" id="user" value="<?php echo $name; ?>" />
                    <select class="form-control" name="first_name" id="first_name">
					<option value="">Select Emp Name</option>
					<?php 
											$r=mysqli_query($link,"select ab.emp_id,ab.first_name from (select emp_id,first_name from employees union select employeeid as emp_id,first_name from empoyees)ab order by ab.first_name") or die(mysqli_error($link));
											while($r1=mysqli_fetch_array($r)){?>
												
												<option value="<?php echo $r1['emp_id'] ?>"><?php echo $r1['first_name']; ?></option>
										<?php	}
											?>
					</select>
                  </div>
				  
                </div>	


				<div class="form-group">			
                  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="2" /><b>Settings</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="21" />Update Organization<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="22" />Add Employee<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="23" />Add Material<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="91" />Add Supervisor Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="92" />Add Company  Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="93" />Add AFM Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="94" />Add Co-Ordinatior Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="95" />Add Account Details<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="97" />Add Item Details<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="96" />Add Store List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="99" />Add Upload Store List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="98" />Add KL Items List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="100" />Add TN Items List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="101" />Add Upload TN Items List<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="102" />Add Change User Names<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="103" />Add Change Status<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="104" />KN Item List<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="105" />TG Item List<br/>
				    
				  </div>

                  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="3" /><b>Upload Formats</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="24" />Upload Products Format<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="25" />Upload Add Billing Format <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="26" />Upload Employee Salary Format<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="31" />Upload Employee Salary<br/>
				  
				  				  
				  </div>
				<!--  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="8" /><b>Employee</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="81" />Add Tools<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="82" />Add Tool Purchase <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="83" />Add Accessories<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="84" />Add Employee<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="85" />Assign users<br/>
				  				  
				  </div>-->
				  
				 <!-- <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="4" /><b>AP Track </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="41" />Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" />RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="43" />Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="44" />Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="45" />Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="46" />Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="47" />To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="405" />Raised Invoice List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="48" />Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="49" />Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="400" />Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="401" />GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="406" />Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="408" />Request Amount  Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="402" />Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="403" />Quotation Details <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="404" />Supervisor <br/>
				  
				  
				  				  
				  </div>
											-->
				  
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="5" /><b>TS Track </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="51" />Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="52" />RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="53" />Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="54" />Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="55" />Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="56" />Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="57" />To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="505" />Raised Invoice List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="58" />Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="59" />Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="500" />Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="501" />GST Bills Pending <br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="506" />Amount Approved Excel <br/>
				     &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="508" />Requested Amount  Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="502" />Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="503" />Quotation Details <br/>
				  <!-- &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="504" />Supervisor <br/> -->
				  
				  
				  				  
				  </div>
				  
				  <!--
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="6" /><b>KL Track </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="61" />Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="62" />RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="63" />Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="64" />Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="65" />Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="66" />Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="67" />To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="605" />Raised Invoice List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="68" />Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="69" />Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="600" />Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="601" />GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="606" />Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="608" />Requested Amount  Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="602" />Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="603" />Quotation Details <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="604" />Supervisor <br/>
				  				  
				  </div>
				  
				  
				   <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="7" /><b>TN Track </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" />Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" />RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" />Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" />Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="75" />Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="76" />Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="77" />To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="705" />Raised Invoice List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="78" />Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="79" />Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="700" />Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="701" />GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="706" />Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="708" />Requested Amount  Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="702" />Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="703" />Quotation Details <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="704" />Supervisor <br/>
				  				  
				  </div>-->
				  
				  	  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="10" /><b>KN Track </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="11" />Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="12" />RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="13" />Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="14" />Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="15" />Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="116" />Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="17" />To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="18" />Raised Invoice List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="19" />Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="20" />Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="121" />Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="122" />GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="126" />Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="128" />Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="123" />Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="124" />Quotation Details <br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="125" />Supervisor <br/>
				  
				  
				  				  
				  </div>
				<!--  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="240" /><b>OD Track </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="241" />Quotations<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="242" />RO Required <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="243" />Work To Be Started<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="244" />Requested Amount List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="245" />Amount Approved List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="246" />Document Required List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="247" />To Be Raise Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="248" />Raised Invoice List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="249" />Payment Pending Invoice<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2410" />Payment Received<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2411" />Mark Not Required<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2412" />GST Bills Pending <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2413" />Amount Approved Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2414" />Requested Amount  Excel <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2415" />Tracker <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2416" />Quotation Details <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="2417" />Supervisor <br/>
				  				  
				  </div>
				   
                	
				<div class="form-group">
				  
				  				
				
				<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="16" /><b>User Management</b>
				  
				  				  
				  </div>
				  	<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="9" /><b>Reports</b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="999" />Working Hours <br/>
				  				  
				  </div>
											--> 				  		  
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="1111" /><b>Reports </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="110" />Add Expenses<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="111" />AP Expenses List <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="112" />TS Expenses List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="113" />TN Expenses List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="114" />KL Expenses List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="115" />KN Expenses List <br/>


				  
				  
				  
				  
				  				  
				  </div>

				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="9000" /><b>ADMIN LOGIN </b><br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="9001" />AP ADMIN<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="9002" />TG ADMIN<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="9003" />KN ADMIN<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="9004" />TN ADMIN<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="9005" />KL ADMIN<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="9006" />OD ADMIN<br/>


				  
				  
				  
				  
				  				  
				  </div>
				  <!--
				
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="7" /><b>Reports</b><br/>
				   &nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" />Maharashtra Bills<br/>
				  	 &nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" />AP & TS Bills<br/>	
					&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" />Gujarat Bills<br/>	
					&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" />AP Bills<br/>						
				  </div>
				  </div>
				  
				  
				
				 
			 /Employee Name< -->
				
					 <!-- /Admission No -->
				
				
					 <!-- /Roll.No -->
						
					
				
				
				
			 		  
			  <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
											&nbsp; &nbsp; &nbsp;
                                           <a href="usermanagement.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
									<br/>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
					
					
					<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       

                                        
                                        <div class="table-header">
                                         Users  List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                        <th>S No</th>
														 <th>Emp Name</th>
														 <th>User Name</th>
														 <th>Password</th>
                                                         
                                                                                                    
                                                      
                                                       <th ></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $q="select a.user,a.empname,COALESCE(b.emp_name,c.emp_name) as emp_name,coalesce(b.password,c.password) as password from admin_login a 
left join employee b on a.empname=b.empid 
left join  emp c on a.empname=c.employeeid
where a.user!='admin'";
                                                    $rs= mysqli_query($link,$q) or die(mysqli_error($link));
                                                    $i=1;
                                                    while($rs1= mysqli_fetch_array($rs)){
                                                    
                                                    ?>
                                                    <tr>
                                                        
<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
                                                        <td><?php echo $i; ?></td>
                                                       
                                                      <td class="hidden-480"><?php echo $rs1['emp_name']; ?></td>
													     <td class="hidden-480"><?php echo $rs1['user']; ?></td>
													  <td class="hidden-480"><?php echo $rs1['password']; ?></td>
                                                     
                                                                                           
                                                       <td class="hidden-480"><a href="edituser.php?id=<?php echo $rs1['empname']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteuser.php?id=<?php echo $rs1['empname']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                       
                                                       
                                                       
                                                    </tr>
                                                    <?php $i++; }?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
					
					
					
					
					
					
					
					
					
					
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.custom.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {

                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                            window.location.href=window.location.href;
                        });
                        //$( '#validation-form' ).reset();


                        $('.date-picker').datepicker({
                            autoclose: true,
                            todayHighlight: true
                        })
                                //show datepicker when clicking on the icon
                                .next().on(ace.click_event, function () {
                            $(this).prev().focus();
                        });

                       

                        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                       


                       



                      


                    });


</script>		<!-- inline scripts related to this page -->
</body>
</html>
<?php 

// }else
// {
// session_destroy();

// session_unset();

// header('Location:index.php?authentication failed');

// }

?>