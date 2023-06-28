<?php 
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
$id = $_GET["id"];

unset($_SESSION["pesanan"][$id]);

echo "<script>alert('Produk telah dihapus');</script>"; 
echo "<script>location= 'buy.php'</script>";


?>