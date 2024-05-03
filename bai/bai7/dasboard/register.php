<?php

session_start();

require("./mysql.php");

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        if (empty($_POST['username'])) {
            $errors['username'] = "User is required";
        }
        if (empty($_POST['email'])) {
            $errors['email'] = "Email is required";
        }
        if (empty($_POST['password'])) {
            $errors['password'] = "Password is required";
        } else {
            if (strlen($_POST['password']) < 6 ) {
                $errors['password'] = "Password must be 6 characters";
            }
        }
        if (isset($_POST['confimpassword'])) {
            if ($_POST['password'] != $_POST['confimpassword']) {
                $errors[] = "password not matches";
            }
        }
    }
    // kiểm tra xem có trùng user không
    if (isset($connection) && count($errors) == 0) {
        $querycheckuser = "SELECT * from user WHERE email = :email and username = :username";
        $statementcheck = $connection->prepare($querycheckuser);
        $statementcheck->execute([
            "username" => $_POST['username'],
            "email" => $_POST['email'],
        ]);
        if ($statementcheck->rowCount() > 0) {
            $errors["username"] = "Username da ton tai";
        } else {
            $query = "insert into user (username, email, password) values(:username, :email, :password)";
            $statement = $connection->prepare($query);
            $isCreated = $statement->execute([
                "username" => $_POST['username'],
                "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                "email" => $_POST['email'],
            ]);
            if ($isCreated) {
                // thong bao
                header(("Location: login.php"));
            }
        }
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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
    .erros-style {
        margin-left: 16px;
        font-size: 13px;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="./register.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleName" placeholder="Enter Username">
                                    <?php
                                    if (isset($errors['username'])) {
                                        echo "<span class='erros-style' style='color:red;'>Error: " . $errors['username'] . "</span><br>";
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <?php
                                    if (isset($errors['email'])) {
                                        echo "<span class='erros-style' style='color:red;'>Error: " . $errors['email'] . "</span><br>";
                                    }
                                    ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        <?php
                                        if (isset($errors['password'])) {
                                            echo "<span class='erros-style' style='color:red;'>Error: " . $errors['password'] . "</span><br>";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confimpassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <?php
                                        if (isset($errors['confimpassword'])) {
                                            echo "<span class='erros-style' style='color:red;'>Error: " . $errors['confimpassword'] . "</span><br>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Register Accounts">
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>