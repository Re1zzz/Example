<?php 

include('connect.php');
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
$id = $_GET['id'];

$hapus= mysqli_query($c, "DELETE FROM pemesanan WHERE id_pemesanan='$id'");

if($hapus){
echo "<script>alert('Pembayaran Telah Selesai dan Data Telah di Hapus!');</script>";
          
echo "<script>location= 'order.php'</script>";
}else{
	echo "Hapus data gagal";
}
 ?>