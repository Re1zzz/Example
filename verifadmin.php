<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verif Admin</title>
    <style>
        body {
            
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .imgcap{
            margin-top: 80px;
            text-align: center;

        }
        .gap{
          padding-bottom: 200px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous">
  </head>
  <body>
  
  <div class="position-absolute top-50 start-50 translate-middle gap">
  <div class="imgcap">
  <img src="bgbg.png" width="150px" height="150px" margin-left="5px">
  <br>
  <br>
  </div>
  <div class="card text-bg-light mb-3 shadow" style="max-width: 18rem;" align="center" >
  
  <div class="card-header">INPUT YOUR CODE</div>
  <div class="card-body">
  <form name="verifadming" method="post" >
<table border="0" cellpadding="5" cellspacing="0" class="exe" align="center">
	<tr>
    	<td><input class="form-control" type="text" name="verif" required placeholder="ANSWER" /></td>
    </tr>
	
        <tr align="center">
    <td colspan="3"><input class="btn btn-primary shadow" type="submit" name="verifadming" value="NEXT" /></td>
    </tr>
    </table>
    </form>
  
  </div>
</div>
</div>
    
  
  <!-- Akhir Form Login -->

  <!-- Eksekusi Form Login -->
      <?php 

if (isset($_POST['verifadming'])) {
    $verif = $_POST['verif'];
    $query = "SELECT * FROM login WHERE verif='$verif'";
    $sql = mysqli_query($c, $query);
    if ($sql->num_rows > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['verif'] = $row['verif'];
        header("Location: indexadmin.php");
        
    } else {
      echo '<div class="alert alert-danger" role="alert">
      Kode verifikasi salah!
    </div>';
      
    }
}
 ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    
  </body>
</html>