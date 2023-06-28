<?php  
include('connect.php');
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
?>
<?php 
if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{
  
  echo "<script>location= 'donthave.php'</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
          <a class="nav-link" aria-current="page" href="homeuser.php">Shop</a>
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
<br>
<br>

  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5">
       
  <b><h3 class="text-center font-weight-bold text-black">YOUR ORDER</h3></b>
  <br>
        
      </div>
      <table class="table table-bordered shadow" id="example">
        <thead class="table-dark" align="center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">QTY</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody class="table-light" align="center">
            <?php $paid =0;?>
            <?php $nomor=1; ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan"] as $id => $jumlah) : ?>

            <?php 
              include('connect.php');
              $ambil = mysqli_query($c, "SELECT * FROM chara WHERE id='$id'");
              $pecah = $ambil -> fetch_assoc();
              $subharga = $pecah["harga"]*$jumlah;
            ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["nama"]; ?></td>
            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
            <td>
              <a href="deleteorder.php?id=<?php echo $id ?>" class="badge badge-danger"><img src="delete-icon.png" width="30px" height="30px"></a>
            </td>
          </tr >
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
        </tbody>
        <tfoot class="table-light">
          <tr>
            <th colspan="4">Total</th>
            <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
            <form method="POST" action="">
          </tr><tr>
            <th colspan="4">Pay</th>
            
            <th colspan="2"><input type="number" name="paid" id="" placeholder="Rp." required></th>
            
          </tr>
        </tfoot>
        
      </table><br>
      <form method="POST" action="">
        <a href="homeuser.php" class="btn btn-primary btn-sm shadow">Back</a>
        <button class="btn btn-success btn-sm shadow" name="konfirm">Order</button>
      </form>        

      <?php 
      if(isset($_POST['konfirm'])) {
          $paid = $_POST['paid'];
          $tanggal_pemesanan=date("Y-m-d");
          $nick = $_SESSION['rlname'];
          $nameuser = $_SESSION['login_user'];
          $id = $_SESSION['id'];
          $realname = $_SESSION['rlname'];
          $kembalian = $paid-$totalbelanja;
          
          // Menyimpan data ke tabel pemesanan
          $insert = mysqli_query($c, "INSERT INTO pemesanan (nick, tanggal_pemesanan, total_belanja) VALUES ('$nick', '$tanggal_pemesanan', '$totalbelanja')");

          // Mendapatkan ID barusan
          $id_terbaru = $c->insert_id;
          function random_strings($length_of_string){
            $str_result = '01234567890123456789135ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            return substr(str_shuffle($str_result),0, $length_of_string);
}      
          $number = random_strings(6);
          // Menyimpan data ke tabel pemesanan produk
          foreach ($_SESSION["pesanan"] as $id => $jumlah)
          {
            $insert = mysqli_query($c, "INSERT INTO pemesanan_chara (id_pemesanan, id, jumlah, paid, nameuser, number, realname, kembalian) 
              VALUES ('$id_terbaru', '$id', '$jumlah', '$paid', '$nameuser', 'GI-$number', '$realname', '$kembalian') ");
          }          

          // Mengosongkan pesanan
          unset($_SESSION["pesanan"]);

          // Dialihkan ke halaman nota
          echo "<script>alert('Order succes!');</script>";
          echo "<script>location= 'homeuser.php'</script>";
      }
      ?>
    </div>
    <br>
  <!-- Akhir Menu -->
  

  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
  </body>
</html>
