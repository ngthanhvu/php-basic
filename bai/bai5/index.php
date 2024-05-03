<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    // khoi tao session
    session_start();

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // var_dump($_POST['username']); empty
        if (isset($_POST['username'])) {
            if (empty($_POST['username'])) {
                // them item vao mang
                $errors['username'] = "username is required";
            }
        }
        if (isset($_POST['password'])) {
            if (empty($_POST['password'])) {
                $errors['password'] = "username is required";
            }
        }
        if (count($errors) == 0) {
            // success for validation
            var_dump($_POST);
            if ($_POST['username'] == "admin" && $_POST['password'] == "123456") {
                $_SESSION["username"] = $_POST['username'];
                $_SESSION["isAuth"] = true;
                header("Location: user.php");
            }
        }
    }

    /**
     * validate username and password ko duoc trong
     */
    ?>
    <div class="container">
        <h1>Login </h1>
        <form method="post" action="./index.php">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username"  placeholder="nhap tai khoan">
            <?php
            if (isset($errors['username'])) {
                echo "<p class='error'>$errors[username]</p>";
            }

            ?>
            <label for="password">Password</label>

            <input class="form-control" type="text" name="password"  placeholder="nhap mat khau">
            <?php
            if (isset($errors['password'])) {
                echo "<p class='error'>$errors[password]</p>";
            }
            ?>
            <input class="btn btn-primary " type="submit" name=submit value="login" />
            <?php
            echo "<pre>";
            var_dump($_SESSION);
            echo "</pre>";
            ?>
        </form>
    </div>
</body>

</html>