<?php 
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
if (isset($_POST['tambah'])) {
    $rlname = $_POST['rlname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $ttl = $_POST['ttl'];
    $kelamin = $_POST['kelamin'];
  
    $q = mysqli_query($c, "UPDATE login SET rlname='$rlname', name='$name', email='$email', number='$number', kelamin='$kelamin' WHERE id=$id");
  
    if ($q)  {
      header('Location: profileuser.php');
    } 
  }
}


 ?>