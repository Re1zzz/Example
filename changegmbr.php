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
        
        $nama_file = $_FILES['gambar']['name'];
        $source = $_FILES['gambar']['tmp_name'];
        $folder = './upload/';
    
        move_uploaded_file($source, $folder.$nama_file);
    
        $q=mysqli_query($c, "UPDATE chara SET gambar='$nama_file' WHERE id=$id");
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
    <title>Update Picture</title>
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
<center>
<div class="position-absolute top-50 start-50 translate-middle">

    
    
    <div class="card p-4 shadow">
        
    
    <form method="POST" action="" enctype="multipart/form-data">
        

        
          
          <input type="file" class="form-control shadow" id="gambar" name="gambar" value="<?php echo $result[0]['nama_file'] ?>" required>
        <br>
        <button type="submit" class="btn btn-primary shadow" name="tambah">SAVE</button>
        


      

</div>
  </div>
  </center>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>