<?php
  // If the user is logged in, delete the cookie to log them out
  session_start();
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

  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/checkstatus_login.php';
  header('Location: ' . $home_url);
?>
