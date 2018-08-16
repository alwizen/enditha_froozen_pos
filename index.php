<?php
session_start();
if( isset($_SESSION['akses']) )
{
	header('location:'.$_SESSION['akses']);
	exit();
}
$error = '';
if( isset($_SESSION['error']) ) {
 	$error = $_SESSION['error']; 
 	unset($_SESSION['error']);
} ?>
<?php echo $error;?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enditha Froozen</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
			<div class="container main-section">
				<div class="row">
					<div class="col-md-12 text-center user-login-header">
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
						<div class="row">
							<!-- <img src="img/lo2.png" style="height: 100px;" alt=""> -->
							<strong><h1><font face="verdana">Silahkan Login</font></h1></strong>
							<div class="col-md-12 col-sm-12 col-xs-12 user-login-box">
							<form action="proseslogin.php" method="POST">
								<div class="form-group">
							  		<input type="text" class="form-control" name="username" placeholder="User Name" id="">
								</div>
								<div class="form-group">
							  		<input type="password" name="password" class="form-control" placeholder="Password" id="">
								</div>
							
											
								<!-- <a href="#" class="btn btn-defualt">Login</a> -->
								<input type="submit" name="login" class="btn btn-danger btn-block" value="Login" /><br>

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- <br><br><br><br>
					<p style="text-align: center; color: #000;"><span></span>Made with <span style="font-size:120%;color:red;">&hearts;</span> | Copyright &copy; <a href="index.php"><strong>Karimah Hijab Store 2018</strong></a> </p> -->
</body>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>