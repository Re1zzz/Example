<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>INVOICE</title>
  </head>
  <body>
    
    <iframe src="terms and conditions.pdf#toolbar=0" width="100%" height="630px">
    </iframe>
  </body>
</html