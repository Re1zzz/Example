<?php
include 'connect.php';
session_start();
if (isset($_GET['stats'])) {
	echo "<script>alert('ID atau Password Anda salah!')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
</style>
<body>
  <br>
<div class="textjudul">
   
    <img src="bgbg.png" height="150px" width="200px">
</div>
<div class="position-absolute top-50 start-50 translate-middle">
<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
  <div class="card text-bg-light mb-3 shadow" style="max-width: 18rem;" align="center">
  <div class="card-header">LOGIN YOUR ACCOUNT</div>
  <div class="card-body">
  <form name="login" method="post" >
<table border="0" cellpadding="5" cellspacing="0" class="exe" align="center">
	<tr>
    	<td><input class="form-control shadow" type="text" name="username" required placeholder="USERNAME" /></td>
    </tr>
	<tr>
    	<td><input class="form-control shadow" type="password" name="pw" required placeholder="PASSWORD" /></td>
		
	</tr>
        <tr align="center">
    <td colspan="3"><input class="btn btn-primary shadow" type="submit" name="login" value="Login" /></td>

    </tr>
   
    </table>
    </form>
    <a href="registeruser.php">Make an account?</a>

  
  </div>
</div>
</div>
  
  
  <!-- Akhir Form Login -->

  <!-- Eksekusi Form Login -->
      <?php 
        if(isset($_POST['login'])) {
          
          $username = $_POST['username'];
          $pw = $_POST['pw'];
          

          // Query untuk memilih tabel
          $cek_data = mysqli_query($c, "SELECT * FROM login WHERE username = '$username' AND pw = '$pw'");
          
          $hasil = mysqli_fetch_array($cek_data);
          $id = $hasil['id'];
          
          $role = $hasil['role'];
          $rlname=$hasil['rlname'];
          $login_user = $hasil['username'];
          $number = $hasil['number'];
          
          $row = mysqli_num_rows($cek_data);

          // Pengecekan Kondisi Login Berhasil/Tidak
            if ($row > 0) {
                session_start();  
                $_SESSION['id'] = $id; 
                $_SESSION['rlname']=$rlname;
                $_SESSION['number']=$number;
                $_SESSION['login_user'] = $login_user;
                
                if ($role == 'admin') {
                  header('location: verifadmin.php');
                }elseif ($role == 'user') {
                  header('location: captcha.php'); 
                }
            }else{
              echo "<script>alert('Username atau Password tidak sesuai!');</script>";
              header('Location: login.php');
                
            }
        }
       ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>