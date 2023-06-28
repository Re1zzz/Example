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
    <title>All Account</title>
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
            <li><a class="dropdown-item " href="useraccount.php">All Account</a></li>
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

        
       </div> 
      </nav>
  
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold text-black">DATA SEMUA AKUN</h3>
        <br>
      </div>
      <table class="table table-bordered shadow" id="example">
        <thead class="table-dark" align="center">
          <tr>
            <th scope="col">No.</th>
            <th scope="coL">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Role</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody class="table-light " align="center">
          <?php $nomor=1; ?>
          <?php 
            $ambil = mysqli_query($c, 'SELECT * FROM login');
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
          ?>
          <?php foreach($result as $result) : ?>
          
          <tr>
            <center>
            <th scope="row"><?php echo $nomor; ?></th>
            </center>
            <td><?php echo $result["rlname"];?></td>
            <td><?php echo $result["username"]; ?></td>
            <td><?php echo $result["ttl"]; ?></td>
            <td><?php echo $result["kelamin"]; ?></td>
            <td><?php echo $result["email"]; ?></td>
            <td><?php echo $result["role"]; ?></td>
            <td><?php echo $result["number"]; ?></td>
            <td>
              <center>
              
              <a href="deleteacc.php?id=<?php echo $result['id'] ?>" class="btn btn-danger">Delete</a>
              </center>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>


            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>