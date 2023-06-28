<?php
include 'connect.php';
session_start();
if (isset($_GET['stats'])) {
	echo "<script>alert('ID atau Password Anda salah!')</script>";
}

if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
$id = $_SESSION['id'];

$ambil = mysqli_query($c, "SELECT * FROM login WHERE id='$id'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
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
<?php foreach($result as $result) : ?>
	<section class="py-5 my-5">
		<div class="container">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right shadow">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="upload/<?php echo $result['gambar']; ?>" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><b>Hai, <?php echo $result['rlname']; ?>!</b></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Profile Account&nbsp;<a href="updateacc.php?id=<?= $result['id']; ?>"><button class="btn btn-primary shadow">Update</button></a></h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Name</label>
								  	<p class="form-control shd"><?php echo $result['rlname']; ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Username</label>
								  	<p class="form-control"><?php echo $result['username']; ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<p class="form-control"><?php echo $result['email']; ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Number Phone</label>
								  	<p class="form-control"><?php echo $result['number']; ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Gender</label>
								  	<p class="form-control"><?php echo $result['kelamin']; ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Date of Birth</label>
								  	<p class="form-control"><?php echo $result['ttl']; ?></p>
								</div>
							</div>
							
						</div>
						
					</div>
					
					<a href="homeuser.php"><button class="btn btn-primary">Back</button></a>
				</div>
			
		</div>
	</section>
	<?php endforeach; ?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>