<?php
include 'connect.php';
session_start();
if (isset($_GET['stats'])) {
	echo "<script>alert('ID atau Password Anda salah!')</script>";
}
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
    <title>Basket</title>
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
    .pp{
      margin-left: 1%;
    }
</style>
<body>
<?php 

$id = $_SESSION['id'];
          
          $query = mysqli_query($c, "SELECT * FROM login WHERE id='$id'");
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

<?php foreach($result as $result) : ?>    
  <nav class="navbar navbar-expand-lg bg-light fixed-top">
  <div class="container">
  <img src="upload/<?php echo $result['gambar']; ?>" class="rounded-5" alt="" width="50px" height="50px">
  <a class="navbar-brand pp"><b><?php echo $result['username']; ?></b></a>
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="navbarNavDropdown" href="homeadmin.php">
    
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="homeuser.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="buy.php"><img src="keranjangan.png" height="20px" width="20px"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="homeuser.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Features
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profileuser.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php endforeach; ?>


<div class="container">
      <div class="mt-5">
       
        <h3 class="text-center font-weight-bold text-black">YOUR ORDER</h3>
        
      </div>
      <br>
      <table class="table table-bordered shadow" id="example">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">QTY</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        
        <tbody class="table-light">
           
            
            
            
            <td>-</td>
            <td>-</td>
            <td>$0</td>
            <td>0</td>
            <td>$0</td>
            <td>
              -
            </td>
          </tr>
           
            
        </tbody>
        <tfoot class="table-light">
          <tr>
            <th colspan="4">Total</th>
            <th colspan="2">$0</th>
          </tr>
        </tfoot>
      </table><br>
      <form method="POST" action="">
        <a href="homeuser.php" class="btn btn-primary btn-sm shadow">BACK</a>
        
      </form>        

      <?php 
      if(isset($_POST['konfirm'])) {
          $tanggal_pemesanan=date("Y-m-d");

          $insert = mysqli_query($c, "INSERT INTO pemesanan (tanggal_pemesanan, total_belanja) VALUES ('$tanggal_pemesanan', '$total')");

          // Mendapatkan ID barusan
          $id_terbaru = $koneksi->insert_id;

          // Menyimpan data ke tabel pemesanan produk
          foreach ($_SESSION["pesanan"] as $id => $jumlah)
          {
            $insert = mysqli_query($c, "INSERT INTO pemesanan_chara (id_pemesanan, id, jumlah) 
              VALUES ('$id_terbaru', '$id', '$jumlah') ");
          }          

          // Mengosongkan pesanan
          unset($_SESSION["pesanan"]);

          // Dialihkan ke halaman nota
          echo "<script>alert('Ordered Succes!');</script>";
          echo "<script>location= 'homeuser.php'</script>";
      }
      ?>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>