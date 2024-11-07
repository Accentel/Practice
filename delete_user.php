<?php
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
                    <div class="d-flex justify-content-end">
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
                        <h4>User Management</h4>
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
                                    <td width="40%" align="right">Employee Name :</td>
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
                                        <input type="text" name="user_id" id="user_id" class="home_textbox" value="<?php echo $id; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Password :</td>
                                    <td align="left">
                                        <input type="password" name="pwd" id="pwd" class="home_textbox" value="<?php echo $r1['pass1']; ?>" />
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
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	/*if($menu == "023"){$menu023="023";}
	if($menu == "024"){$menu024="024";}
	if($menu == "025"){$menu025="025";}
	if($menu == "026"){$menu026="026";}*/
	if($menu == "24"){$menu24="24";}
	if($menu == "25"){$menu25="25";}
	if($menu == "26"){$menu26="26";}
	if($menu == "27"){$menu27="27";}
	if($menu == "28"){$menu28="28";}
	if($menu == "29"){$menu29="29";}
		if($menu == "029"){$menu029="029";}
	if($menu == "200"){$menu200="200";}
	if($menu == "201"){$menu201="201";}
	if($menu == "202"){$menu202="202";}
	if($menu == "203"){$menu203="203";}
	if($menu == "204"){$menu204="204";}
	if($menu == "205"){$menu205="205";}
	if($menu == "206"){$menu206="206";}
	if($menu == "207"){$menu207="207";}
	if($menu == "0206"){$menu0206="0206";}
	if($menu == "0200"){$menu0200="0200";}
	if($menu == "0201"){$menu0201="0201";}
	if($menu == "0202"){$menu0202="0202";}
	if($menu == "2020"){$menu2020="2020";}
	/*if($menu == "208"){$menu208="208";}
	if($menu == "209"){$menu209="209";}*/
	
	if($menu == "3"){$menu3="3";}
	if($menu == "31"){$menu31="31";}
	if($menu == "32"){$menu32="32";}
	if($menu == "33"){$menu33="33";}
	if($menu == "34"){$menu34="34";}
	if($menu == "35"){$menu35="35";}
	if($menu == "36"){$menu36="36";}
	/*if($menu=="37"){ $menu37="37";}*/
	
	
	
	if($menu == "4"){$menu4="4";}
	if($menu == "41"){$menu41="41";}
	if($menu == "42"){$menu42="42";}
	if($menu == "43"){$menu43="43";}
	if($menu == "44"){$menu44="44";}
	if($menu == "45"){$menu45="45";}
	
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	if($menu == "52"){$menu52="52";}
	if($menu == "53"){$menu53="53";}
	
	if($menu == "05"){$menu05="05";}
	if($menu == "054"){$menu054="054";}
	if($menu == "056"){$menu056="056";}
	if($menu == "055"){$menu055="055";}
	if($menu == "54"){$menu54="54";}
	
		if($menu == "99096"){$menu99096="99096";}
		if($menu == "99097"){$menu99097="99097";}
	if($menu == "54"){$menu54="54";}
	if($menu == "55"){$menu55="55";}
	if($menu == "56"){$menu56="56";}
	
	if($menu == "57"){$menu57="57";}
	if($menu == "58"){$menu58="58";}
	if($menu == "59"){$menu59="59";}
	if($menu == "541"){$menu541="541";}
	

	
	if($menu == "6"){$menu6="6";}
	if($menu == "61"){$menu61="61";}
	if($menu == "62"){$menu62="62";}
	if($menu == "63"){$menu63="63";}
	if($menu == "64"){$menu64="64";}
	if($menu == "65"){$menu65="65";}
	if($menu == "66"){$menu66="66";}
	if($menu == "67"){$menu67="67";}
	if($menu == "68"){$menu68="68";}
	if($menu == "69"){$menu69="69";}
	if($menu == "690"){$menu690="690";}
	
	if($menu == "7"){$menu7="7";}
	if($menu == "71"){$menu71="71";}
	if($menu == "72"){$menu72="72";}
	/*if($menu == "73"){$menu73="73";}
	if($menu == "74"){$menu74="74";}*/
	
	
	if($menu == "8"){$menu8="8";}
	if($menu == "81"){$menu81="81";}
	if($menu == "82"){$menu82="82";}
	if($menu == "83"){$menu83="83";}
	if($menu == "84"){$menu84="84";}
	if($menu == "85"){$menu85="85";}
	if($menu == "86"){$menu86="86";}
	if($menu == "87"){$menu87="87";}
	if($menu == "88"){$menu88="88";}
	if($menu == "89"){$menu89="89";}
	if($menu == "890"){$menu890="890";}
	if($menu == "891"){$menu891="891";}
	if($menu == "892"){$menu892="892";}
	
	if($menu == "9"){$menu9="9";}
	if($menu == "90"){$menu90="90";}
	if($menu == "91"){$menu91="91";}
	if($menu == "92"){$menu92="92";}
	if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
	if($menu == "96"){$menu96="96";}
	if($menu == "97"){$menu97="97";}
	if($menu == "98"){$menu98="98";}
	if($menu == "99"){$menu99="99";}
	if($menu == "990"){$menu990="990";}
	if($menu == "991"){$menu991="991";}
	
	
	
	if($menu == "992"){$menu992="992";}
	if($menu == "993"){$menu993="993";}
	if($menu == "994"){$menu994="994";}
	if($menu == "995"){$menu995="995";}
	if($menu == "996"){$menu996="996";}
	if($menu == "997"){$menu997="997";}
	if($menu == "998"){$menu998="998";}
	if($menu == "999"){$menu999="999";}
	if($menu == "9990"){$menu9990="9990";}
	if($menu == "9991"){$menu9991="9991";}
	if($menu == "9992"){$menu9992="9992";}
	if($menu == "9993"){$menu9993="9993";}
	if($menu == "9994"){$menu9994="9994";}
	if($menu == "9995"){$menu9995="9995";}
	if($menu == "9996"){$menu9996="9996";}
	if($menu == "9997"){$menu9997="9997";}
	if($menu == "9998"){$menu9998="9998";}
	if($menu == "9999"){$menu9999="9999";}
	
	
	if($menu == "10"){$menu10="10";}
	
	if($menu == "101"){$menu101="101";}
	if($menu == "102"){$menu102="102";}
	if($menu == "103"){$menu103="103";}
	
	
	
	
	if($menu == "104"){$menu104="104";}
	if($menu == "105"){$menu105="105";}
	if($menu == "106"){$menu106="106";}
	if($menu == "107"){$menu107="107";}
	
	if($menu == "11"){$menu11="11";}
	if($menu == "111"){$menu111="111";}
	if($menu == "112"){$menu112="112";}
	if($menu == "113"){$menu113="113";}
	
	if($menu == "12"){$menu12="12";}
	if($menu == "121"){$menu121="121";}
	if($menu == "122"){$menu122="122";}
	if($menu == "123"){$menu123="123";}
	if($menu == "124"){$menu124="124";}
	if($menu == "125"){$menu125="125";}
	if($menu == "126"){$menu126="126";}
	if($menu == "127"){$menu127="127";}
	if($menu == "128"){$menu128="128";}
	if($menu == "129"){$menu129="129";}
	if($menu == "1290"){$menu1290="1290";}
	if($menu == "12901"){$menu12901="12901";}
	if($menu == "12902"){$menu12902="12902";}
	
	if($menu == "12903"){$menu12903="12903";}
	if($menu == "1293"){$menu1293="1293";}
	if($menu == "1294"){$menu1294="1294";}
	if($menu == "1295"){$menu1295="1295";}
	if($menu == "1296"){$menu1296="1296";}
	if($menu == "1297"){$menu1297="1297";}

if($menu == "13"){$menu13="13";}
	if($menu == "131"){$menu131="131";}
	if($menu == "132"){$menu132="132";}
	if($menu == "133"){$menu133="133";}
	if($menu == "134"){$menu134="134";}
	if($menu == "135"){$menu135="135";}
	if($menu == "136"){$menu136="136";}
	if($menu == "137"){$menu137="137";}
	if($menu == "138"){$menu138="138";}
	if($menu == "139"){$menu139="139";}
	
	if($menu == "1388"){$menu1388="1388";}
	if($menu == "1389"){$menu1389="1389";}
	
	if($menu == "1390"){$menu1390="1390";}
	if($menu == "1391"){$menu1391="1391";}
	if($menu == "1392"){$menu1392="1392";}	
	
	if($menu == "14"){$menu14="14";}
	if($menu == "141"){$menu141="141";}
	if($menu == "142"){$menu142="142";}
	if($menu == "143"){$menu143="143";}
	
	if($menu == "144"){$menu144="144";}
	if($menu == "145"){$menu145="145";}
	if($menu == "146"){$menu146="146";}
	if($menu == "601"){$menu601="601";}
	if($menu == "602"){$menu602="602";}
	if($menu == "541"){$menu541="541";}
	if($menu == "603"){$menu603="603";}
	if($menu == "604"){$menu604="604";}
	if($menu == "605"){$menu605="605";}
	if($menu == "606"){$menu606="606";}
	if($menu == "607"){$menu607="607";}
	if($menu == "608"){$menu608="608";}
	if($menu == "609"){$menu609="609";}
	if($menu == "100"){$menu100="100";}
	if($menu == "1002"){$menu1002="1002";}
	if($menu == "1003"){$menu1003="1003";}
	if($menu == "108"){$menu108="108";}
	
	if($menu == "1298"){$menu1298="1298";}
	if($menu == "1299"){$menu1299="1299";}
	if($menu == "1004"){$menu1004="1004";}
	if($menu == "222"){$menu222="222";}
	if($menu == "223"){$menu223="223";}
	if($menu == "05"){$menu05="05";}
	if($menu == "027"){$menu027="027";}
	if($menu == "028"){$menu028="028";}
	if($menu == "029"){$menu029="029";}
	if($menu == "030"){$menu030="030";}
	if($menu == "031"){$menu031="031";}
	if($menu == "0200"){$menu0200="0200";}
	if($menu == "0201"){$menu0201="0201";}
	if($menu == "0202"){$menu0202="0202";}
	if($menu == "0203"){$menu0203="0203";}
	if($menu == "0204"){$menu0204="0204";}
	if($menu == "12910"){$menu12910="12910";}
	if($menu == "9994"){$menu9994="9994";}
	if($menu == "12911"){$menu12911="12911";}
	if($menu == "1205"){$menu1205="1205";}
	if($menu == "12096"){$menu12096="12096";}
	if($menu == "12097"){$menu12097="12097";}
	if($menu == "12098"){$menu12098="12098";}
	
	if($menu == "1820"){$menu1820="1820";}
	if($menu == "1821"){$menu1821="1821";}
	if($menu == "1822"){$menu1822="1822";}
	if($menu == "1823"){$menu1823="1823";}
	if($menu == "1824"){$menu1824="1824";}
	if($menu == "1825"){$menu1825="1825";}

									
	
	if($menu == "15"){$menu15="15";}
	if($menu == "151"){$menu151="151";}
	if($menu == "152"){$menu152="152";}
	if($menu == "153"){$menu153="153";}
	
	if($menu == "16"){$menu16="16";}
	if($menu == "161"){$menu161="161";}
	if($menu == "162"){$menu162="162";}
	if($menu == "163"){$menu163="163";}
	
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
			<!-- <input type="checkbox" name="menu[]" value="21" <?php if($menu21=='21'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Hospital Details<br>
		<input type="checkbox" name="menu[]" value="22" <?php if($menu22=='22'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Pharmacy Details<br>
	
			<input type="checkbox" name="menu[]" value="23" <?php if($menu23=='23'){echo "checked='checked'";} ?> />&nbsp;&nbsp; Lab Details<br>
			<input type="checkbox" name="menu[]" value="24" <?php if($menu24=='24'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Procedure<br>
			<input type="checkbox" name="menu[]" value="25" <?php if($menu25=='25'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Test Department<br>
			<input type="checkbox" name="menu[]" value="26" <?php if($menu26=='26'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Test Details<br>
		    <input type="checkbox" name="menu[]" value="29" <?php if($menu29=='29'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Insurance Companies<br>
			<input type="checkbox" name="menu[]" value="200" <?php if($menu200=='200'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Hospital Tarrif List<br>
			<input type="checkbox" name="menu[]" value="2020" <?php if($menu2020=='2020'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Insurance Tarrif List<br>
			<input type="checkbox" name="menu[]" value="0206" <?php if($menu0206=='0206'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Update Validity Days<br> -->
		
			<input type="checkbox" name="menu[]" value="0200" <?php if($menu0200=='0200'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add City <br>
			<input type="checkbox" name="menu[]" value="0201" <?php if($menu0201=='0201'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Mandal <br>
			<input type="checkbox" name="menu[]" value="0202" <?php if($menu0202=='0202'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Address <br>
			
			<input type="checkbox" name="menu[]" value="201" <?php if($menu201=='201'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Employee Department<br>
			<input type="checkbox" name="menu[]" value="202" <?php if($menu202=='202'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Employee Details <br>
			
			<input type="checkbox" name="menu[]" value="206" <?php if($menu206=='206'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Change Password<br>
			<input type="checkbox" name="menu[]" value="207" <?php if($menu207=='207'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; User Management <br>
			
			
			
			
		</div>
		</td>
        
        
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" <?php if($menu4=='4'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>DOCTOR</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" <?php if($menu41=='41'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Doctor<br>
			<input type="checkbox" name="menu[]" value="42" <?php if($menu42=='42'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Doctor Department<br>
			<!-- <input type="checkbox" name="menu[]" value="43" <?php if($menu43=='43'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Referal Doctor<br> -->
			<!--<input type="checkbox" name="menu[]" value="44" <?php if($menu44=='44'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Add Doctor<br>
			-->
		</div>
		</td>
		
        
        <!-- <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="3" <?php if($menu3=='3'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>WARD</b>
        </div>
		<div class="checkprd" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		
		<input type="checkbox" name="menu[]" value="31" <?php if($menu31=='31'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Locations<br>
		
		<input type="checkbox" name="menu[]" value="32" <?php if($menu32=='32'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Room Types<br>
		<input type="checkbox" name="menu[]" value="33" <?php if($menu33=='33'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Rooms<br>
		<input type="checkbox" name="menu[]" value="34" <?php if($menu34=='34'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Beds<br> -->
		<!--<input type="checkbox" name="menu[]" value="35" <?php if($menu35=='35'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Room Tarrif<br>-->
		
		<!-- <input type="checkbox" name="menu[]" value="36" <?php if($menu36=='36'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Beds Status<br>
		
			<br>
      
		
		</div>
		</td> -->
       


        
		
		 <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" <?php if($menu5=='5'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>Appointment</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" <?php if($menu51=='51'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Book Appointment<br>
		
            	<input type="checkbox" name="menu[]" value="53" <?php if($menu53=='53'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Registration Card<br>
            <!--	<input type="checkbox" name="menu[]" value="52" <?php if($menu52=='52'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; OP Cancellation<br>-->
		<input type="checkbox" name="menu[]" value="54" <?php if($menu54=='54'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;Out Patient History<br>
        </div>
		</td>
        <td ></td>

		</tr>

        <tr >
	
	    <!-- <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="05" <?php if($menu05=='05'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>In Paitents</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="54" <?php if($menu54=='54'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Admission<br>
			<input type="checkbox" name="menu[]" value="055" <?php if($menu055=='055'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; IP Room Transfer<br>
		<input type="checkbox" name="menu[]" value="056" <?php if($menu056=='056'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Patient History<br>
	
		<input type="checkbox" name="menu[]" value="0203" <?php if($menu0203=='0203'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Report<br>
		</div>
		</td> -->
        <td ></td>
        
        <!-- <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="6" <?php if($menu6=='6'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>BILLING</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="61" <?php if($menu61=='61'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Advance Payment<br>
   			<input type="checkbox" name="menu[]" value="62" <?php if($menu62=='62'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Bill<br>
			<input type="checkbox" name="menu[]" value="63" <?php if($menu63=='63'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Procedure Lab Bill<br>
			<input type="checkbox" name="menu[]" value="64" <?php if($menu64=='64'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Discharge Summary<br>
			<input type="checkbox" name="menu[]" value="65" <?php if($menu65=='65'){echo "checked='checked'";} ?> />&nbsp;&nbsp; Final Bill Insurance<br>
            <input type="checkbox" name="menu[]" value="0204" <?php if($menu0204=='0204'){echo "checked='checked'";} ?> />&nbsp;&nbsp; Final Bill<br>
            
        
		</div>
		</td> -->
		
		

		<!-- <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="16" <?php if($menu16=='16'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>Return Amount</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="161" <?php if($menu161=='161'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; IP Return<br> -->
       <!-- <input type="checkbox" name="menu[]" value="162" <?php if($menu162=='162'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Lab Bill Return<br>
		<input type="checkbox" name="menu[]" value="163" <?php if($menu163=='163'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Procedure Lab Bill Return<br>-->
		
        <!-- </div>
		</td> -->
	
	       
		<!-- <td colspan="2" class="label1" ></td>
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="7" <?php if($menu7=='7'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>Lab</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			
            
           
            <input type="checkbox" name="menu[]" value="71" <?php if($menu71=='71'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Results Entry<br> -->
            <!--<input type="checkbox" name="menu[]" value="72" <?php if($menu72=='72'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Print Lab Results<br>
         -->
            
		<!-- </div>
		</td> -->
       
        </tr>
       
       
  
       
               <tr >
       
        
		 <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="9" <?php if($menu9=='9'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>PHARMACY</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>-->
            
                &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="91" <?php if($menu91=='91'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; UOM<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="92" <?php if($menu92=='92'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Product Type<br>                
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="93" <?php if($menu93=='93'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Supplier Information<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="94" <?php if($menu94=='94'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Supplier Amount<br>
                  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="95" <?php if($menu95=='95'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Packing Information<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="96" <?php if($menu96=='96'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Product Details<br>
				    &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="97" <?php if($menu97=='97'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Product Details Edit<br>
          
            
                
		</td>
		 <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="90" <?php if($menu90=='90'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>PHARMACY PURCHASE</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>-->
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="98" <?php if($menu98=='98'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Invoice<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99" <?php if($menu99=='99'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Product Adjustment<br>                
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="990" <?php if($menu990=='990'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Adjustment<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="991" <?php if($menu991=='991'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Adjustment Report<br>
                  
            
                
		</td>
		<td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="10" <?php if($menu10=='10'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>PHARMACY SALES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>-->
            
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="101" <?php if($menu101=='101'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Entry<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="102" <?php if($menu102=='102'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Return<br>                
				   <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="103" <?php if($menu103=='103'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Due Patient/Customer<br> -->
				   
            
                
		</td>
		
		</tr><tr>
		
		
		<td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12903" <?php if($menu12903=='12903'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>PHARMACY REPORTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>-->
            
                 <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="992" <?php if($menu992=='992'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Entry Report<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="993" <?php if($menu993=='993'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Purchase Return Report<br>                
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="994" <?php if($menu994=='994'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Supplier Items<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="995" <?php if($menu995=='995'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; GST Report<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="996" <?php if($menu996=='996'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Position Report<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="997" <?php if($menu997=='997'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Medicine Short List<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="998" <?php if($menu998=='998'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Search Medicine<br>
				   &nbsp;&nbsp;  <input type="checkbox" name="menu[]" value="999" <?php if($menu999=='999'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Compare Medicine<br>
				     &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9990" <?php if($menu9990=='9990'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Drug Expiry Report<br>
					  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9991" <?php if($menu9991=='9991'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; FSN Analysis<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9992" <?php if($menu9992=='9992'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; ABC Analysis<br> -->
			<!--	  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9993" <?php if($menu9993=='9993'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Position Report<br>-->
				  
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9996" <?php if($menu9996=='9996'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Day Sales Report<br>
				  
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9997" <?php if($menu9997=='9997'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Sales Entry Report<br>
				  <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="9998" <?php if($menu9998=='9998'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Drug Inspector Report<br>
				  
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="106" <?php if($menu106=='106'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Entry Report<br>
				  
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="107" <?php if($menu107=='107'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Sales Return Report<br> -->
				  
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="138" <?php if($menu138=='138'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Pharmacy Account Summary<br>
				  
				  <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="139" <?php if($menu139=='139'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Stock Adjustment Report<br> -->
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1388" <?php if($menu1388=='1388'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Pharmacy History<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1389" <?php if($menu1389=='1389'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Pharmacy History With Amount<br>
				  
				  
                 
          
            
                
		</td>
		
		
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="12" <?php if($menu12=='12'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>REPORTS</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<!--<input type="checkbox" name="menu[]" value="121" />&nbsp;&nbsp; <B>RECEPTION</B><br>-->
            
                 <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="122" <?php if($menu122=='122'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Total Patiens List<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="028" <?php if($menu028=='028'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Doctor wise Patient Report<br>                
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="124" <?php if($menu124=='124'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; In Patient Payment History<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="126" <?php if($menu126=='126'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Admitted Patients Report<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1294" <?php if($menu1294=='1294'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Referal Doctors List<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="029" <?php if($menu029=='029'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Date Wise Referal Doctors Amount Report<br> -->
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="030" <?php if($menu030=='030'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Out Patient Report<br>
				   <!-- &nbsp;&nbsp;  <input type="checkbox" name="menu[]" value="1297" <?php if($menu1297=='1297'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Admited In Patients Report<br>
				     &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1293" <?php if($menu1293=='1293'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Referal Patients Report<br>
					  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="031" <?php if($menu031=='031'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Advance Bill Report<br>
				  &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12902" <?php if($menu12902=='12902'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Lab Bill Report<br>
				  
				    &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12910" <?php if($menu12910=='12910'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Total Lab Test List<br>
				   &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12911" <?php if($menu12911=='12911'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Doctor wise Patient Report<br> -->
				  
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1205" <?php if($menu1205=='1205'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Dialy Amount Collected Report<br>
				  
				 
				 <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1296" <?php if($menu1296=='1296'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Daily  Amount Pharmacy<br> -->
				  
				 
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1299" <?php if($menu1299=='1299'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Daily  Amount Summary<br>
				  
				 <!-- &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12096" <?php if($menu12096=='12096'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Year Wise Report<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12097" <?php if($menu12097=='12097'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Disount Wise Report<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="12098" <?php if($menu12098=='12098'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Village Report<br>
				 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99096" <?php if($menu99096=='99096'){echo "checked='checked'";} ?> />&nbsp;&nbsp; Test Wise Lab Report<br>
				&nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="99097" <?php if($menu99097=='99097'){echo "checked='checked'";} ?> />&nbsp;&nbsp; Test Wise Procedure Lab Report<br>
				
                 
                 &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1820" <?php if($menu1820=='1820'){echo "checked='checked'";} ?> />&nbsp;&nbsp;Discharge Patient Report<br>
          
            &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1821" <?php if($menu1821=='1821'){echo "checked='checked'";} ?> />&nbsp;&nbsp;Lab Due Bill Report<br>
            
            &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1822" <?php if($menu1822=='1822'){echo "checked='checked'";} ?> />&nbsp;&nbsp;Procedure Lab Bill Report<br>
            
            &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1823" <?php if($menu1823=='1823'){echo "checked='checked'";} ?> />&nbsp;&nbsp;Procedure Lab Due Bill Report<br>
            
            &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1824" <?php if($menu1824=='1824'){echo "checked='checked'";} ?> />&nbsp;&nbsp;Final Bill Report<br>
            
            
            &nbsp;&nbsp;   <input type="checkbox" name="menu[]" value="1825" <?php if($menu1825=='1825'){echo "checked='checked'";} ?> />&nbsp;&nbsp;Insurance Final Bill  Report<br> -->
                
		</td>

		<td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="15" <?php if($menu15=='15'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>Cancellation</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		<input type="checkbox" name="menu[]" value="151" <?php if($menu151=='151'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; OP Cancel<br>
        <!-- <input type="checkbox" name="menu[]" value="152" <?php if($menu152=='152'){echo "checked='checked'";} ?>/>&nbsp;&nbsp;  Lab Bill Cancel<br>
		<input type="checkbox" name="menu[]" value="153" <?php if($menu153=='153'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Procedure Lab Bill Cancel<br> -->
	    </div>
		</td>


        <td colspan="2" class="label1" ></td>
        
        <!--<td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="13" <?php if($menu13=='13'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; <b>CERTIFICATES</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
		 <input type="checkbox" name="menu[]" value="131" <?php if($menu131=='131'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Essentiality Certificate<br>
		<input type="checkbox" name="menu[]" value="132" <?php if($menu132=='132'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Emergency Certificate<br>
		
			<input type="checkbox" name="menu[]" value="133" <?php if($menu133=='133'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Non Drawal Certificate<br>
            
           
            <input type="checkbox" name="menu[]" value="134" <?php if($menu134=='134'){echo "checked='checked'";} ?>/>&nbsp;&nbsp; Genuine Certificate<br>
            -->
                 
            
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