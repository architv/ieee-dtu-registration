<!doctype html>

<html>
<head>
	
 <title>Register</title>    
	<link rel="icon" type="image/ico" href="http://www.dcetech.com/favicon.ico"/> 
	<script type = "text/javascript" src="validation.js"></script>
	<!--<link type = "text/css" rel = "stylesheet" href = "style.css">-->
	<link type = "text/css" rel = "stylesheet" href = "default2.css">
	 <link href="bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="bootstrap.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body>
 <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<div class="wrapper">
 <div id="logo-wrap">
<div id="logo">
  <img src="ieee-logo.jpeg" width="25%" height="100%"/>
    </div>
	</div>
   
	
<?php
	require_once('connectvars.php');
	error_reporting(0);
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to the MySQL server.');
	$name = mysqli_real_escape_string($dbc, trim($_POST['name']));
	$fathername = mysqli_real_escape_string($dbc, trim($_POST['fathername']));
	$dob = mysqli_real_escape_string($dbc, trim($_POST['dob']));
	$year = $_POST['year'];
	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	$pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	$confirmpass = mysqli_real_escape_string($dbc, trim($_POST['confirmpass']));
	$address = mysqli_real_escape_string($dbc, trim($_POST['address']));
	$mobile = mysqli_real_escape_string($dbc, trim($_POST['mobile']));
	$rollno = mysqli_real_escape_string($dbc, trim($_POST['rollno']));
	$coordinator = $_POST['coordinator'];
	
		
	
	if(isset($_POST['submit'])) {
	
		
		$output_form = false;
		
		//To check if all the form entries have been filled or not
		if(!empty($name) && !empty($fathername) && !empty($dob) && !empty($email) && !empty($pass) && !empty($confirmpass) && !empty($address) && !empty($mobile) && !empty($rollno) ){
		
			//Code to validate the form entries
			$domain = preg_replace('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', '', $email);
			
			//function to check if the domain name is valid and it exists in the Domain Name System(if the web server is on Windows )
			function win_checkdnsrr($domain, $recType='') {
				if(!empty($domain)) {
					if($recType == '') $recType="MX";	
					exec("nslookup -type=$recType $domain",$output);
					foreach($output as $line) {
						if (preg_match("/^$domain/", $line)) return true;
					}
				}
			}
			
//preg_match('/^[A-Za-z]+(\s[A-Za-z])*$/', $name) && preg_match('/^[A-Za-z]+(\s[A-Za-z])*$/', $fathername) && is_numeric($mobile)  			
			if(preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $email) && preg_match('/^\d{10}$/', $mobile) && preg_match('/(DTU\/)? ?\w{4}\/\w{2,3}\/\d{3,4}$/', $rollno) && preg_match('/^.{6,20}$/', $pass) && ($pass == $confirmpass)) {
			
		
				$query = "SELECT * FROM reg_table WHERE email = '$email'";
				
				$data = mysqli_query($dbc, $query);
				if(mysqli_num_rows($data) == 0) {
					
					//The user is registering for the first time, so insert into database
					$query = "INSERT INTO reg_table(name, fathername, dob, collegeyear, email, pass, address, mobile, rollno, coordinator) VALUES ('$name','$fathername', '$dob', $year, '$email', SHA('$pass'), '$address', $mobile, '$rollno', '$coordinator')";
					
					$result = mysqli_query($dbc, $query) or die('Error querrying database');
					
							
					mysqli_close($dbc);
					$output_form = false;
					
					
			        echo '	
					<div id="header1">
					<div id="menu1">
					<ul>
						<li class="current_page_item"><a href="register.php">Register</a></li>
						<li ><a href="checkstatus_login2.php">Check Status</a></li>
					</ul>
					</div>
			
			
					<div id="wrapper1">
					<div id="page1">
					<!-- start content -->
					<div id="content1">
					<div class="post1">
					<h1 class="title1"><center> </center> </h1>
					<div class="entry1">
						<p class="success">Data Submitted</p>
					</div>
					</div>	
					</div>
					<div class="post1">
					<h2 class="title1"></h2>
					<div class="entry1">
					</div>
					</div>
					</div>
					<div style="clear: both;">&nbsp;</div>
					</div>
					<!-- end page -->';
				}
				
				else {
					//A user with same email-id exists
					echo '<p class="error">A person with this email-id is already registered</p>';
					$output_form = true;
				}
			}
			else {
				//the data entered is invalid
				echo '<p class="error">Please enter valid data</p>';
				$output_form = true;
			}
		}
		else {
			echo '<p class="error">Please fill all the form fields</p>';
			$output_form = true;
		}
	}
	else {
		$output_form = true;
	}
	
	if($output_form) {
?>
			
			
			<div id="header1">
	<div id="menu1">
		<ul>
			<li ><a href="index.html">Home</a></li>
			<li class="current_page_item"><a href="register.php">Register</a></li>
			<li ><a href="checkstatus_login.php">Check Status</a></li>
			<li ><a href="contactus.html">Contact Us</a></li>
		</ul>
	</div>
			
			
			<div id="wrapper1">
<div id="page1">
	<!-- start content -->
	<div id="content1">
		<div class="post1">
			<!--<h1 class="title1">REGISTER </h1>-->
			<div class="entry1">
			
			
			

			
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="format">	
			
				<div class="control-group">
				<label class="control-label">Name</label>

				<div class="controls">
				<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $name; ?>" onkeyup = "validateName(this)" /><br />
				<span id = "name_help" class = "help"></span><br />
 </div>
</div>

				
			<div class="control-group">
  <label class="control-label">Father's Name</label>
  <div class="controls">
				<input type="text" id="fathername" class="input-xlarge" name="fathername" value="<?php echo $fathername; ?>" onkeyup = "validateFathername(this)" /><br />
				<span id = "fathername_help" class = "help"></span><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Date Of Birth</label>
  <div class="controls">
				<input type="text" id="dob" class="input-xlarge" name="dob" value="<?php echo $dob; ?>" onkeyup = "validateDate(this)" /><br />
				<span id = "dob_help" class = "help"></span><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Year</label>
  <div class="controls">
				<select class="input-xlarge" name="year" id="year">
					<option value="1">1st Year</option>
					<option value="2">2nd Year</option>
					<option value="3">3rd Year</option>
					<option value="4">4th Year</option>
				</select><br /><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Email</label>
  <div class="controls">
				<input type="text" id="email" name="email" value="<?php echo $email; ?>" onkeyup = "validateEmail(this)" /><br />
				<span id = "email_help" class = "help"></span><br />
 </div>
</div>

				
			<div class="control-group">
  <label class="control-label">Password</label>
  <div class="controls">
				<input type="password" id="pass" name="pass"  class="input-xlarge" onkeyup = "validatePassword(this)"/><br />
				<span id = "pass_help" class = "help"></span><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Confirm Password</label>
  <div class="controls">
				<input type="password" id="confirmpass" name="confirmpass" class="input-xlarge" onkeyup = "validateConfirmpassword(this)"/><br />
				<span id = "confirmpass_help" class = "help"></span><br />
 </div>
</div>

				
			<div class="control-group">
  <label class="control-label">Address</label>
  <div class="controls">
				<textarea id="address" name="address" rows="10" cols="40s" onkeyup = "validateAddress(this)" ><?php echo $address; ?></textarea><br />
				<span id = "address_help" class = "help"></span><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Mobile</label>
  <div class="controls">
				<input type="text" id="mobile" name="mobile" class="input-xlarge" value="<?php echo $mobile; ?>" onkeyup = "validateNumber(this)" /><br />
				<span id = "mobile_help" class = "help"></span><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Roll No</label>
  <div class="controls">
				<input type="text" id="rollno" name="rollno" class="input-xlarge" value="<?php echo $rollno; ?>" onkeyup = "validateRollno(this)" /><br />
				<span id = "rollno_help" class = "help"></span><br />
 </div>
</div>

				
				<div class="control-group">
  <label class="control-label">Coordinator</label>
  <div class="controls">
				<select id="coordinator" name="coordinator" class="input-xlarge">
					<option value="Jayant">Jayant Kaushik</option>
					<option value="Mayank">Mayank Jain</option>
					<option value="Nimish">Nimish Aggarwal</option>
					<option value="Pragya">Pragya Tripathi</option>
					<option value="Udit">Udit Khera</option>
					<option value="Vaibhav">Vaibhav Saini</option>
				</select><br />
			 </div>
</div>
	
				
				
		<input type="submit" id="register" value="Submit" name="submit" onclick = "formSubmit(this.form)" />		
				
				
			
			</form>

	
	<!-- code to enable register button only if all the fields have been filled out -->
	<!--<script>
		$(document).ready(function() {
			$('form > input').keyup(function() {

				var empty = false;
				$('form > input').each(function() {
					if ($(this).val() == '') {
						empty = true;
					}
				});

				if (empty) {
					$('#submit').attr('disabled', 'disabled'); 
				} else {
					$('#submit').removeAttr('disabled'); 
				}
			});
		});
	</script>-->
	
	
	<!-- Code for datepicker -->
	<script type="text/javascript" src="Zebra_Datepicker-master/public/javascript/zebra_datepicker.js"></script>
	<link rel="stylesheet" href="Zebra_Datepicker-master/public/css/default.css" type="text/css">
	
	<script>
		$(document).ready(function() {
		$('#dob').Zebra_DatePicker();
		});
	</script>
	
  
<?php 
	}
?>
</div>
	</div>	
		</div>
		<div class="post1">
			<h2 class="title1"></h2>
			<div class="entry1">
				<p></p>
				<p></p>
			</div>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->

<!-- start footer -->
<!--<div id="footer1">
	<div id="footer1-wrap">
	<p id="legal1">Designed by <a href="webteam.html#">IEEE DTU Web Development Team</a>.</p>
	</div>
</div>-->
<div class="push"></div>
</div>

<div id="footer">
    <ul>
	<li>Contact Us</li>
	<li>Facebook Page</li>
	</ul>
 </div>






</body>
</html>	