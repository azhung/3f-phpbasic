<?php

session_start();
include_once('../config.php');

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {

	$username = trim($_POST['username']);
	$password = md5(trim($_POST['password']));

	if (checkLogin($username, $password)) {
		// Tao session username va chuyen huong nguoi dung vao trang index
		$_SESSION['username'] = $username;
		header('Location: index.php');
	} else {
		// Xoa toan bo session va chuyen huong nguoi dung vao trang login
		session_destroy();
		header('Location: login.php');
	}

}

function checkLogin($username, $password) {

	global $conn;

	$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}

}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Login</title>
		<!-- Bootstrap core CSS-->
		<link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom styles for this template-->
		<link href="public/css/sb-admin.css" rel="stylesheet">
	</head>
	<body class="bg-dark">
		<div class="container">
			<div class="card card-login mx-auto mt-5">
				<div class="card-header">Login</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="exampleInputUser">Username</label>
							<input class="form-control" id="exampleInputUser" type="text" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
						</div>
						
						<button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
					</form>
					<div class="text-center">
						<a class="d-block small mt-3" href="register.html">Register an Account</a>
						<a class="d-block small" href="forgot-password.html">Forgot Password?</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript-->
		<script src="public/vendor/jquery/jquery.min.js"></script>
		<script src="public/vendor/popper/popper.min.js"></script>
		<script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>
	</body>
</html>