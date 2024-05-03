<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
		if (empty($_POST['username'])) {
			$errors['username'] = "Username is required";
		}
		if (empty($_POST['email'])) {
			$errors['email'] = "Email is required";
		}
		if (empty($_POST['password'])) {
			$errors['password'] = "Password is required";
		} else {
			if (strlen($_POST['password']) < 6) {
				$errors['password'] = "Password must be 6 character";
			}
		}
		if (isset($_POST['confimpassword'])) {
			if ($_POST['password'] != $_POST['confimpassword']) {
				$errors['confimpassword'] = "Password not matches";
			}
		}
	}
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Kanakku - Bootstrap Admin HTML Template</title>

	<link rel="shortcut icon" href="assets/img/favicon.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<link rel="stylesheet" href="assets/css/style.css">
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<img class="img-fluid logo-dark mb-2" src="assets/img/logo.png" alt="Logo">
				<div class="loginbox">
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Register</h1>
							<p class="account-subtitle">Access to our dashboard</p>

							<form action="register.php" method="post">
								<div class="form-group">
									<label class="form-control-label">User Name</label>
									<input name="username" class="form-control" type="text">
									<?php
									if (isset($errors['username'])) {
										echo "<span class='erros-style' style='color:red;'>Error: " . $errors['username'] . "</span><br>";
									}
									?>
								</div>
								<div class="form-group">
									<label class="form-control-label">Email Address</label>
									<input name="email" class="form-control" type="email">
									<?php
									if (isset($errors['email'])) {
										echo "<span class='erros-style' style='color:red;'>Error: " . $errors['email'] . "</span><br>";
									}
									?>
								</div>
								<div class="form-group">
									<label class="form-control-label">Password</label>
									<input name="password" class="form-control" type="password">
									<?php
									if (isset($errors['password'])) {
										echo "<span class='erros-style' style='color:red;'>Error: " . $errors['password'] . "</span><br>";
									}
									?>
								</div>
								<div class="form-group">
									<label class="form-control-label">Confirm Password</label>
									<input name="confimpassword" class="form-control" type="password">
									<?php
									if (isset($errors['confimpassword'])) {
										echo "<span class='erros-style' style='color:red;'>Error: " . $errors['confimpassword'] . "</span><br>";
									}
									?>
								</div>
								<div class="form-group mb-0">
									<button class="btn btn-lg btn-block btn-primary" type="submit">Register</button>
								</div>
							</form>

							<div class="login-or">
								<span class="or-line"></span>
								<span class="span-or">or</span>
							</div>

							<div class="social-login">
								<span>Register with</span>
								<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
							</div>

							<div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="assets/js/jquery-3.5.1.min.js"></script>

	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/feather.min.js"></script>

	<script src="assets/js/script.js"></script>
</body>

</html>