<?php
session_start();
$errors = [];
require('./mysql.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (empty($_POST['username'])) {
            $errors['username'] = "Username is required";
        }
        if (empty($_POST['password'])) {
            $errors['password'] = "Password is required";
        } else {
            if (strlen($_POST['password']) < 6) {
                $errors['password'] = "Password must be 6 characters";
            }
        }
    }
    if (isset($connection) && count($errors) == 0) {
        try {
            $query = "SELECT * FROM user where username = :username";
            $statement = $connection->prepare($query);
            $statement->execute([
                "username" => $_POST['username']
            ]);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $storeHashPassword = $result[0]['password'];
                if (password_verify($_POST['password'], $storeHashPassword)) {
                    $_SESSION['username'] = $_POST['username'];
                    var_dump($_POST['password']);
                    header("Location: index.php");
                } else {
                    $errors['password'] = "username or password incorrect";
                }
            }
        } catch (\Exception $e) {
            echo $errors = $e->getMessage();
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

    <title>SB Admin 2 - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="./login.php">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                                            <?php
                                            if (isset($errors['username'])) {
                                                echo "<span class='erros-style' style='color:red;'>Error: " . $errors['username'] . "</span><br>";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            <?php
                                            if (isset($errors['password'])) {
                                                echo "<span class='erros-style' style='color:red;'>Error: " . $errors['password'] . "</span><br>";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                        <!-- <a type="submit" href="#" class="btn btn-primary btn-user btn-block">
                    Login
                </a> -->
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
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