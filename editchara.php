<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q="SELECT * FROM chara WHERE id=$id";
    $s=mysqli_query($c, $q);
    $d=mysqli_fetch_assoc($s);
    if(mysqli_num_rows($s)<1){
        echo"<script>alert('ga bisa')</script>";
    }
    if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $region = $_POST['region'];
        $bd = $_POST['bd'];
        $element = $_POST['element'];
        $weapon = $_POST['weapon'];
        $harga = $_POST['harga'];
        
    
        
    
        $q=mysqli_query($c, "UPDATE chara SET nama='$nama', region='$region', bd='$bd', element='$element', weapon='$weapon', harga='$harga' WHERE id=$id");
        if($q){
            header('Location: homeadmin.php');
    
    }
    }

}
$id = $_GET['id'];

$ambil = mysqli_query($c, "SELECT * FROM chara WHERE id='$id'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Character</title>
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
    
    <div class="card p-5 mb-5 shadow">
        <center>
    <img src="upload/<?php echo $result[0]['gambar'] ?>"alt="..." height="325px" width="225px">
    <b><p>UPDATE DATA</p></b>
    </center>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name1">Name</label>
          <input type="text" class="form-control shadow" id="name1" name="nama" value="<?php echo $result[0]['nama'] ?>">
        </div>
        <div class="form-group">
          <label for="element">Bahan Utama</label>
          <input type="text" class="form-control shadow" id="element" name="element" value="<?php echo $result[0]['element'] ?>">
        </div>
        <div class="form-group">
          <label for="bd1">Expired</label>
          <input type="text" class="form-control shadow" id="bd1" name="bd" value="<?php echo $result[0]['bd'] ?>">
        </div>
        <div class="form-group">
          <label for="#">Asal</label>
          <select class="form-select shadow" aria-label="Default select example" name="region">
                <option value="Dalam Negeri" <?php if($result[0]['region']=='Dalam Negeri')echo'selected="selected"'?>>Dalam Negeri</option>
                <option value="Luar Negeri" <?php if($result[0]['region']=='Luar Negeri')echo'selected="selected"'?>>Luar Negeri</option>
                
        
        </select>
         </div>
         
        
        <div class="form-group">
          <label for="harga1">Weapon</label>
          <select class="form-select shadow" aria-label="Default select example" name="weapon">
          <option value="Makanan" <?php if($result[0]['weapon']=='Makanan')echo'selected="selected"'?>>Makanan</option>
                <option value="Minuman" <?php if($result[0]['weapon']=='Minuman')echo'selected="selected"'?>>Minuman</option>
                <option value="Snack" <?php if($result[0]['weapon']=='Snack')echo'selected="selected"'?>>Snack</option>
                
        </select>
        </div>
        <div class="form-group">
          <label for="harga1">Harga</label>
          <input type="text" class="form-control shadow" id="harga1" name="harga" value="<?php echo $result[0]['harga'] ?>">
        </div>
        <br>
        <div class="form-group">
          
          <a href="changegmbr.php?id=<?= $result[0]['id']; ?>">Ganti Gambar Disini!</a>
        </div><br>
        <button type="submit" class="btn btn-primary shadow" name="tambah">SAVE</button>
        


      

  </div>
  </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>