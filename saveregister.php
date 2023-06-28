<?php
//Include file koneksi ke database
include "koneksi.php";
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}

$name=$_POST["name"];
$pw=$_POST["pw"];
$ttl=$_POST["ttl"];
$kelamin=$_POST["kelamin"];
$role = $_POST['role'];



  $hasil=mysqli_query($koneksi, "INSERT INTO login (name, pw, ttl, kelamin, role) VALUES('$name','$pw','$ttl','$kelamin', '$role')");

//Kondisi apakah berhasil atau tidak
  if ($hasil) 
  {
	echo "<script>
				alert('Anda Berhasil Registrasi !');
				document.location='login.php';
		  </script>";
  }
  else 
  {
	echo "<script>
				alert('Registrasi Anda Gagal !');
				document.location='register.php';
		  </script>";
  }

?>