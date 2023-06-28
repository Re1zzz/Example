<?php 
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
$id = $_GET['id'];

if (isset($_SESSION['pesanan'][$id]))
{
	$_SESSION['pesanan'][$id]+=1;
}

else 
{
	$_SESSION['pesanan'][$id]=1;
}

echo "<script>alert('Your character has been added!');</script>";
echo "<script>location= 'buy.php'</script>";

 ?>