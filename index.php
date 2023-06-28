<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home/style.css">
    <link href=”css/bootstrap.min.css” rel=”stylesheet”>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src=”js/bootstrap.bundle.min.js”></script>
    <script type=”js/bootstrap.min.js”> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
    body{
        background-image: url("2505746.jpg");
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
  <img src="upload/<?php echo $result['gambar']; ?>" class="rounded-5" alt="" width="50px" height="50px">
  <a class="navbar-brand pp"><b><?php echo $result['username']; ?></b></a>
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="navbarNavDropdown" href="homeadmin.php">
    
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
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
<header class="bg-dark py-5">
    <br>
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-6 fw-bolder text-white mb-2">Cafe Mayoritas x Minoritas feat. 212</h1>
                            <p class="lead text-white-50 mb-4">Tempat penjualan makanan dan minuman maupun snack yang ada didunia ini! Harga murah tapi sayangnya masih murah harga dirimu!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="homeuser.php">Mulai Beli</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="agree.php">Terms and Conditions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom bg-white" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="img-circle text-center mb-3">
							<img src="bgbg.png" alt="Image" class="shadow">
						</div>
                        <h2 class="h4 fw-bolder">About Us</h2>
                        <p>Cafe kolaborasi antara mayoritas dan minoritas yang berdamai.</p>
                        
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="img-circle text-center mb-3">
							<img src="wpp.jpg" alt="Image" class="shadow">
						</div>
                        <h2 class="h4 fw-bolder">Product</h2>
                        <p>Tempat kami menjual berbagai makanan dan minuman segala jenis yang pastinya aman untuk dikonsumsi.</p>
                        
                    </div>
                    <div class="col-lg-4">
                    <div class="img-circle text-center mb-3">
							<img src="verify.png" alt="Image" class="shadow">
						</div>
                        <h2 class="h4 fw-bolder">Trusted</h2>
                        <p>Tempat kami telah menjual berbagai jenis makanan dan minuman yang pastinya aman dan juga terpercaya.</p>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing section-->
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; PT. SHINING PRODUCTION</p></div>
        </footer>


            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>