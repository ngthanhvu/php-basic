<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['email']) && isset($_POST['password'])) {
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
	}
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dleohr - Bootstrap Admin HTML Template</title>

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
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>
							<form action="./login.php" method="post">
								<div class="form-group">
									<label class="form-control-label">Email Address</label>
									<input name="email" type="email" class="form-control">
									<?php
									if (isset($errors['email'])) {
										echo "<span class='erros-style' style='color:red;'>Error: " . $errors['email'] . "</span><br>";
									}
									?>
								</div>
								<div class="form-group">
									<label class="form-control-label">Password</label>
									<div class="pass-group">
										<input name="password" type="password" class="form-control pass-input">
										<span class="fas fa-eye toggle-password"></span>
										<?php
										if (isset($errors['password'])) {
											echo "<span class='erros-style' style='color:red;'>Error: " . $errors['password'] . "</span><br>";
										}
										?>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cb1">
												<label class="custom-control-label" for="cb1">Remember me</label>
											</div>
										</div>
										<div class="col-6 text-right">
											<a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
										</div>
									</div>
								</div>
								<button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>

								<div class="social-login mb-3">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
								</div>

								<div class="text-center dont-have">Don't have an account yet? <a href="register.php">Register</a></div>
							</form>
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