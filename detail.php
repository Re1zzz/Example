<?php 
    include('connect.php');
    session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href=”css/bootstrap.min.css” rel=”stylesheet”>
    <script src=”js/bootstrap.bundle.min.js”></script>
    <script type=”js/bootstrap.min.js”> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Bakso Solo Baru</title>
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
  <!-- Jumbotron -->
      
  <!-- Akhir Jumbotron -->
  <?php 

$id = $_SESSION['id'];
          
          $query = mysqli_query($c, "SELECT * FROM login WHERE id='$id'");
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

<?php foreach($result as $result) : ?>    
  <!-- Navbar -->
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
          <a class="nav-link" href="indexadmin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="homeadmin.php">Shop</a>
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
  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold text-black">DETAIL PESANAN PELANGGAN</h3>
        <br>
      </div>
      <table class="table table-bordered shadow" id="example">
        <thead class="table-dark">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">ID Pemesanan</th>
            <th scope="col">Nama Pesanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subharga</th>
          </tr>
        </thead>
        <tbody class="table-light">
          <?php $nomor=1; ?>
          
          <?php $totalbelanja = 0; ?>
          <?php 
              $ambil = $c->query("SELECT * FROM pemesanan_chara JOIN chara ON pemesanan_chara.id=chara.id 
                WHERE pemesanan_chara.id_pemesanan='$_GET[id]'");
           ?>
           <?php while ($pecah=$ambil->fetch_assoc()) { ?>
           <?php $subharga1=$pecah['harga']*$pecah['jumlah']; ?>
          <tr>
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $pecah['id_pemesanan_produk']; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
              Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja+=$subharga1; ?>
            
          <?php $paid=$pecah['paid']; ?>
          <?php $kembalian=$pecah['kembalian']?>
         <?php } ?>
          
        </tbody>
        <?php 
              $ambil = $c->query("SELECT * FROM pemesanan_chara JOIN chara ON pemesanan_chara.id=chara.id 
                WHERE pemesanan_chara.id_pemesanan='$_GET[id]'");
                $take=mysqli_fetch_assoc($ambil);
           ?>
         <tfoot class="table-light">
          <tr>
            <th colspan="5">Total Seluruh</th>
            <th>Rp. <?php echo number_format($totalbelanja) ?></th>
          </tr>
          
            
          <tr>
            
            <th colspan="5">Uang Bayar</th>
            <th>Rp. <?php echo number_format($paid)?></th>
          </tr><tr>
            <th colspan="5">Sisa</th>
            <th>Rp. <?php echo number_format($kembalian) ?></th>
           
          </tr>
        
        </tfoot>
      </table><br>
      
      <form method="POST" action="">
        <a href="order.php" class="btn btn-success btn-sm shadow">Kembali</a>
        <a href='fpdf.php?id=<?php echo $take['id_pemesanan'] ?>' class="btn btn-primary btn-sm shadow">Cetak Invoice</a>
      </form>  
      
      <?php 
        if(isset($_POST["bayar"]))
        {
          echo "<script>alert('Pembayaran Telah Selesai dan Data Telah di Hapus!');</script>";
          echo "<script>location= 'order.php'</script>";
        }
      ?>
     
    </div>
  

<br>



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
