<?php
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $error['email'] = "Email is required";
        } else {
            if (strlen($_POST['email']) < 6) {
                $error['email'] = "Email must be at least 6 characters";
            }
        }
    }
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $error['password'] = "Password is required";
        } else {
            if (strlen($_POST['password']) < 6) {
                $error['password'] = "Password must be at least 6 characters";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab4 Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>
<style>
    * {
        font-family: monospace;
    }
</style>

<body>

    <div class="container">
        <h1>Login Form</h1>
        <form action="index.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" name="email">
                <?php
                if (isset($error['email'])) {
                    echo "<span style='color:red;'>Error: " . $error['email'] . "</span><br>";
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password"
                    name="pswd">
                <?php
                if (isset($error['password'])) {
                    echo "<span style='color:red;'>Error: " . $error['password'] . "</span><br>";
                }
                ?>
            </div>
            <button type="submit" name="submit" value="Login" class="btn btn-primary">Login</button>
        </form>
    </div>

    <?php
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    ?>

</body>

</html>
