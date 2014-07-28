<html>
<head>
	<link type = "text/css" rel = "stylesheet" href = "style1.css">
    	<link type = "text/css" rel = "stylesheet" href = "default3.css">
	  <link rel="icon" type="image/ico" href="http://www.dcetech.com/favicon.ico"/> </head>
	 <title>Check Status </title>
	 	 <link href="bootstrap.css" rel="stylesheet" media="screen">
</head>
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
			<li class="current_page_item"><a href="checkstatus_status.php">Check Status</a></li>
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

<?php
	//error_reporting(0);
	require_once('connectvars.php');
	require_once('startsession.php');
	
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Retrieve the students registered under the admin
	$query = "SELECT * FROM reg_table WHERE email = '".$_SESSION['email']. "'";
	$data = mysqli_query($dbc, $query);
	echo "<br><br>";
	echo "<table width=100% border='6' bordercolor='#3B5998' cellpadding='10'>";
	echo "<tr>";
	echo  "<strong>" ;

	echo "<th> Name </th>";
	echo "<th> Father </th>";
	echo "<th> DOB </th>";
	echo "<th> Email </th>";
	echo "<th> Mobile </th>";
	echo "<th> Roll No </th>";
	echo "<th> Amount Paid (RS.)</td>";
	echo "<th> Status</th>";
	echo "</strong>";

	echo "</tr>";
	
	while ($row = mysqli_fetch_array($data)) {
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['fathername']."</td>";
		echo "<td>".$row['dob']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['mobile']."</td>";
		echo "<td>".$row['rollno']."</td>"; 
		echo "<td>".$row['amount']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "</tr>";	 
	}
	echo '</table>';
	if (isset($_SESSION['email'])) {
    // Delete the user ID and email cookies by setting their expirations to an hour ago (3600)
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time() - 3600);
   }
   
   session_destroy();
  }
  
  //Delete the user ID and username by setting their expiration to an hour ago 
  setcookie('id', '', time() - 3600);
  setcookie('email', '', time() - 3600);
	
	mysqli_close($dbc);
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
<div id="footer1">
	<div id="footer1-wrap">
	<p id="legal1">Designed by <a href="webteam.html#">IEEE DTU Web Development Team</a></p>
	</div>
</div>
</body> 
</html>
	
    
		
    
	





