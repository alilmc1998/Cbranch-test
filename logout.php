<?php
session_start(); // start session

// Unset all session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Redirect to login page
header("Location:login.php");
exit();
?>