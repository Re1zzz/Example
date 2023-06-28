<?php
include 'connect.php';
session_start();
if (isset($_GET['stats'])) {
	echo "<script>alert('ID atau Password Anda salah!')</script>";
}

if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href=”css/bootstrap.min.css” rel=”stylesheet”>
    <script src=”js/bootstrap.bundle.min.js”></script>
    <script type=”js/bootstrap.min.js”> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
    body{
        
        background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
    }
    .textjudul{
        text-align: center;
        font-size: 72px;

    }
    .eme{
            width:50px;
            height:50px;
        }
    .top{
     

      text-align: center;
    
    }
</style>
<body>

<div class="container">
  <br>
    <h3 class="text-center mt-3 mb-5 text-black">CREATE YOUR DATA</h3>
    <div class="card p-5 mb-5 shadow">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama</label>
          <input type="text" class="form-control shadow" id="menu1" name="nama">
        </div>
        <div class="form-group">
          <label for="stok1">Bahan Utama</label>
          <input type="text" class="form-control shadow" id="menu1" name="element">
        </div>
        <div class="form-group">
          <label for="#">Expired</label>
          
          <input type="text" class="form-control shadow" id="harga1" name="bd">
         </div>
         <div class="form-group">
         <label for="harga1">Asal</label>
         <select class="form-select shadow" aria-label="Default select example" name="region">
            <option selected disabled>Asal</option>
                <option disabled>----------------------</option>
                <option value="Dalam Negeri">Dalam Negeri</option>
                <option value="Luar Negeri">Luar Negeri</option>
                
        
        </select>
          
        </div>
        
        <div class="form-group">
          <label for="harga1">Jenis</label>
          <select class="form-select shadow" aria-label="Default select example" name="weapon">
            <option selected disabled>Pilih Jenis</option>
            <option disabled>----------------------</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Snack">Snack</option>
        </select>
        </div>
        <div class="form-group shadow">
          <label for="harga1">Harga</label>
          <input type="text" class="form-control" id="harga1" name="harga">
        </div>
        <br>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar">
        </div><br>
        <button type="submit" class="btn btn-primary shadow" name="tambah">Add</button>
        <a href="homeadmin.php" class="btn btn-danger shadow">Back</a>
        
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $region = $_POST['region'];
    $bd = $_POST['bd'];
    $element = $_POST['element'];
    $weapon = $_POST['weapon'];
    $harga = $_POST['harga'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './upload/';

    move_uploaded_file($source, $folder.$nama_file);
    $insert = mysqli_query($c, "INSERT INTO chara VALUES (NULL, '$nama', '$region', '$bd', '$element', '$weapon', '$harga', '$nama_file')");

    if($insert){
      echo "<script>alert('Data berhasil ditambahkan!');</script>";
            echo "<script>location= 'homeadmin.php'</script>";
    }
    else {
      echo "Sorry, can't add your data.";
    }
  }

   ?>

  </div>
  </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>