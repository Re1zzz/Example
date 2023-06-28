<?php
include 'connect.php';
session_start();
if (isset($_GET['stats'])) {
	echo "<script>alert('ID atau pw Anda salah!')</script>";
}

if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}

?>
<?php
include 'connect.php'; 

if (isset($_GET['id'])) {
    $id =$_GET['id'];
    $q = "SELECT * FROM login WHERE id=$id";
    $sql = mysqli_query($c, $q);
    $data = mysqli_fetch_assoc($sql); 
    if (mysqli_num_rows($sql) < 1) {
      echo "<script>alert('Data tidak ditemukan')</script>";
    }
if (isset($_POST['tambah'])) {
  $rlname = $_POST['rlname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $ttl = $_POST['ttl'];
  $kelamin = $_POST['kelamin'];
  

  $q = mysqli_query($c, "UPDATE login SET rlname='$rlname', username='$username', email='$email', number='$number', kelamin='$kelamin' WHERE id=$id");

  if ($q)  {
    echo "<script>alert('Data Updated!');</script>";
    echo "<script>location= 'profileuser.php'</script>";
  } 
}
}
$id = $_GET['id'];

$ambil = mysqli_query($c, "SELECT * FROM login WHERE id='$id'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Account</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
  body{

    background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
  }
</style>
<body>
	<section class="py-5 my-5">
		<div class="container">
		<form method="post" action="">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
					<center>
					<h3 class="mb-4">Update Account</h3>
   					 <img src="upload/<?php echo $result[0]['gambar'] ?>"alt="..." height="150px" width="150px">
    				
    				
					<br>
					|<a href="changepp.php?id=<?= $result[0]['id']; ?>">Update Photo</a>| |<a href="changepw.php?id=<?= $result[0]['id']; ?>">Update Password</a>|
					</center>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Name</label>
								  	<input type="text" class="form-control" name="rlname" id="rlname" value="<?php echo $result[0]['rlname'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Username</label>
								  	<input type="text" class="form-control" name="username" id="username" value="<?php echo $result[0]['username'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="email" class="form-control" name="email" id="email" value="<?php echo $result[0]['email'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Number Phone</label>
								  	<input type="number" class="form-control" name="number" id="number" value="<?php echo $result[0]['number'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Gender</label>
								  	<select class="form-control" aria-label="Default select example" name="kelamin">
                					<option value="Male" <?php if($result[0]['kelamin']=='Male')echo'selected="selected"'?>>Male</option>
               		 				<option value="Female" <?php if($result[0]['kelamin']=='Female')echo'selected="selected"'?>>Female</option>
										<option value="Netral" <?php if($result[0]['kelamin']=='Netral')echo'selected="selected"'?>>Netral</option>
        
        </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Date of Birth</label>
								  	<input type="date" class="form-control" name="ttl" id="date" value="<?php echo $result[0]['ttl'] ?>">
								</div>
							</div>
							
						</div>
						<button type="submit" class="btn btn-primary" name="tambah" value="SAVE">Save</button>
						<a href="profileuser.php" class="btn btn-danger">Back</a>
					</div>
					
						
				</div>
			
		</div>
	</section>

  	
	<script src="https://code.jq.com/jq-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>