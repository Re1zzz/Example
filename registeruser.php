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
    <title>Register</title>
    <link href=”css/bootstrap.min.css” rel=”stylesheet”>
    <script src=”js/bootstrap.bundle.min.js”></script>
    <script type=”js/bootstrap.min.js”> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
    body{
        background-image: url("wpp.jpg");
        background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
    }
    .textjudul{
        text-align: center;
        font-size: 72px;

    }
</style>
<body>
<div class="container">
    <h3 class="text-center mt-3 mb-5">CREATE YOUR ACCOUNT</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Name</label>
          <input type="text" class="form-control" id="menu1" name="rlname" required>
        </div>
        <div class="form-group">
          <label for="menu1">Username</label>
          <input type="text" class="form-control" name="username" id="menu1"required>
         </div>
         <div class="form-group">
          <label for="menu1">Password</label>
          <input type="password" class="form-control" id="menu1" name="pw" required>
        </div>
        <div class="form-group">
          <label for="stok1">Born</label>
          <input type="date" name="ttl" class="form-control" id="ttl" required>
        </div>
        
        <div class="form-group">
        <label for="email1">Gender</label>
          <select class="form-select" aria-label="Default select example" name="kelamin" required>
            <option selected disabled>Select Gender</option>
            <option disabled>----------------------</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Netral">Netral</option>
        </select>
        </div>
        <div class="form-group">
          <label for="menu1">Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="menu1">Phone Number</label>
          <input type="number" class="form-control" name="number" id="number" required>
        </div>
        <br>
        <div class="form-group">
          <label for="gambar">Photo Profile &nbsp;[</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar">]
        </div>
        <br>
        <div class="form-group">
          <input type="checkbox" name="role" id="role" value="user" required><a href="agree.php">&nbsp;I agree Terms & Condition<label for="role"></label></a>
        </div>
        <br>
       <br>
        <button type="submit" class="btn btn-primary" name="tambah">Add</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $rlname = $_POST['rlname'];
    $username = $_POST['username'];
    $pw = $_POST['pw'];
    $ttl = $_POST['ttl'];
    $kelamin = $_POST['kelamin'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $role = $_POST['role'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './upload/';
    move_uploaded_file($source, $folder.$nama_file);
    $insert = mysqli_query($c, "INSERT INTO login (rlname, username, pw, ttl, kelamin, email, number, role, gambar)VALUES ('$rlname', '$username', '$pw', '$ttl', '$kelamin', '$email', '$number', '$role', '$nama_file')");

    if($insert){
    echo "Done";
    echo "<script>alert('Akun berhasil dibuat! Silahkan login!');</script>";
    echo "<script>location= 'login.php'</script>";
    }
    else {
      echo "Register failed.";
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