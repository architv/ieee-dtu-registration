<?php
session_start();
	
if(!isset($_SESSION['email'])){
	echo '<p class="error">Please <a href="checkstatus_login.php">login </a> to access the page';
	exit();
}
else {
	echo 'You are logged in as ' . $_SESSION['email'] . ' <a href="logout.php">Log Out</a>';
}
?>