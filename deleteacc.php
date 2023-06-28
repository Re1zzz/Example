<?php 

include('connect.php');
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
$id = $_GET['id'];

$hapus= mysqli_query($c, "DELETE FROM login WHERE id='$id'");

if($hapus)
echo "<script>alert('Akun berhasil dihapus!');</script>";
echo "<script>location= 'useraccount.php'</script>";
else
	echo "Hapus data gagal";

 ?>