<?php 
	require_once('connectvars.php');
	session_start();
	$error_msg = '';
	
	if(!isset($_SESSION['email'])) { 
		if(isset($_POST['submit'])) {
	
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to the MySQL server.');
			
			$user_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
			$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
			
			if(!empty($user_email) && !empty($user_password)) {
				//Look up the email and password in the database
				$query = "SELECT id,mobile,name,email FROM reg_table WHERE email = '$user_email' AND pass = SHA('$user_password')";
				$data = mysqli_query($dbc, $query);
		
				if(mysqli_num_rows($data) == 1) {
					//The login is OK so set the user ID and email cookies, redirect to the home page
					$row = mysqli_fetch_array($data);
					$_SESSION['id'] = $row['id'];
					$_SESSION['email'] = $row['email'];
					/*setcookie('id', $row['id'], time() + (60*60*24*30));
					setcookie('email', $row['email'], time() + (60*60*24*30));*/
					$home_url = 'http://' . $_SERVER['HTTP_HOST'] .dirname($_SERVER['PHP_SELF']) . '/checkstatus_status.php';
					header('Location: '. $home_url);
				}
				else {
					//The email/password is incorrect so set an error message
					$error_msg = 'The email/password is invalid';
				}
			}
			else {
				//The email/password weren't entered, so set an error message
				$error_msg = 'Please enter both the email and password';
			}
		}
	}
?>
<html>
<head>

	<link type = "text/css" rel = "stylesheet" href = "style1.css">
    	<link type = "text/css" rel = "stylesheet" href = "default2.css">
	  <link rel="icon" type="image/ico" href="http://www.dcetech.com/favicon.ico"/> </head>
	 <title>Check Status </title>
	 	 <link href="bootstrap.css" rel="stylesheet" media="screen">
		 <link href="bootstrap.min.css" rel="stylesheet" media="screen">

<body>
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <div id="logo-wrap">
<div id="logo">
  <img src="ieee-logo.jpeg" width="25%" height="100%"/>
    </div>
	</div>
		<div id="header1">
	<div id="menu1">
		<ul>
			<li ><a href="index.html">Home</a></li>
			<li ><a href="register.php">Register</a></li>
			<li class="current_page_item"><a href="checkstatus_login.php">Check Status</a></li>
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
			

		<!--<h1 style=" margin-left: 650px ; color:blue ">CHECK STATUS</h1>-->
<?php
	//If the cookie is empty show the error message, otherwise confirm the log in
	if(empty($_SESSION['email'])) {
		echo '<p class="error"> ' .$error_msg. '</p>';
?>
<form class="form-horizontal" id="checkform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<fieldset>
		<legend>Log In</legend>
		
			<div class="control-group">
				<label class="control-label">Email</label>

				<div class="controls">
		<input class="input-xlarge" type="text" id="email" name="email" value="<?php if(!empty($user_email)) echo $user_email; ?>" /><br />
		</div>
</div>
		
		
	<div class="control-group">
				<label class="control-label">Password</label>

				<div class="controls">
		<input class="input-xlarge" type="password" id="password" name="password" /><br />
	</div>
</div>
	</fieldset>
	<input id="checkstatus" type="submit" value="CHECK STATUS" name="submit" />
</form>
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
<div id="footer1">
	<div id="footer1-wrap">
	<p id="legal1">Designed by <a href="webteam.html#">IEEE DTU Web Development Team</a>.</p>
	</div>
</div>
</body>
</html>
<?php 
	}
	else {
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/checkstatus_status.php';
		header('Location: ' . $home_url);
	}	
?>
