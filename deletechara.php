<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = mysqli_query($c, "DELETE FROM chara WHERE id=$id");
    if($q){
        echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>location= 'homeadmin.php'</script>";
    }
}
?>