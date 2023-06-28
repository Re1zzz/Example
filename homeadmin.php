<?php
include 'connect.php';
session_start();
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
    <title>Shop</title>
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
    .sett{
      padding-top: 2%;
      padding-bottom: 2.9%;
      padding-right: 3%;
      padding-left: 3%
    }
    .pp{
      margin-left: 1%;
    }
    
</style>
<?php 

$id = $_SESSION['id'];
          
          $query = mysqli_query($c, "SELECT * FROM login WHERE id='$id'");
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

<?php foreach($result as $result) : ?>    
<body>

<nav class="navbar navbar-expand-lg bg-light fixed-top">
  <div class="container">
  <img src="logo.jpeg" class="rounded-5" alt="" width="50px" height="50px">
  <a class="navbar-brand pp"><b><?php echo $result['username']; ?></b></a>
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="navbarNavDropdown" href="homeadmin.php">
    
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link " href="indexadmin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homeadmin.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php"><img src="keranjangan.png" height="20px" width="20px"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="homeadmin.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Features
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="useraccount.php">All Account</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php endforeach; ?>
<br>
<br>
<br>
  

<div class="container sett">
<?php

$query = mysqli_query($c, 'SELECT * FROM chara');
if(isset($_GET['cari'])){
  $query = mysqli_query($c, "SELECT * FROM chara WHERE nama OR region OR weapon OR element LIKE '%".$_GET['cari']."%'");
  
}

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>
<form class="d-flex" role="search" method="get">
        <input class="form me-2 shadow" type="search" placeholder="Cari Apapun Itu" aria-label="Search" name="cari">
        <a href="homeuser.php"><button class="btn btn-primary me-2 shadow">Search</button></a>
        <a href="addchara.php" class="btn btn-primary shadow">ADD</a>
      </form>

        
        
        <div class="row mt-3">

          

<?php foreach($result as $result) : ?>
          <div class="col-md-3 mt-3 ">
            <div class="card brder-dark shadow">
            <img src="upload/<?php echo $result['gambar'] ?>" class="card-img-top" alt="..." height="300px" width="150px">
              <div class="card-body">
                <h5 class="card-title font-weight-bold text-center"><?php echo $result['nama'] ?></h5>
               <label class="card-text harga">Bahan Utama <b><?php echo $result['element'] ?></b></label><br>
               <label class="card-text harga">Expired <b><?php echo $result['bd'] ?></b></label><br>
               <label class="card-text harga">Asal <b><?php echo $result['region'] ?></label></b><br>
               <label class="card-text harga">Jenis <b><?php echo $result['weapon'] ?></b></label><br>
               <label class="card-text harga">Harga <b>Rp. <?php echo number_format($result['harga']); ?></b></label><br><br>
               <a href="editchara.php?id=<?= $result['id']?>" class="btn btn-success btn-sm btn-block">EDIT</a>

                <a href="deletechara.php?id=<?= $result['id']?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
         
         </div> 
      </div>


            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>