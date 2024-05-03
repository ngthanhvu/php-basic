<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    session_start();
    $errors = [];
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
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
    }

    /**
     * validate username and password ko duoc trong
     * username, password, role, email
     */

    $ds_users = array(
        array(
            'username' => 'pk003',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            "role" => 'admin',
        ),
        array(
            'username' => 'pk004',
            'email' => 'user@gmail.com',
            'password' => '123456',
            "role" => 'user',
        ),
    );
    if (!isset($_SESSION['ds_users'])) {
        $_SESSION['ds_users'] = array(
            array(
                'username' => 'pk003',
                'email' => 'admin@gmail.com',
                'password' => '123456',
                "role" => 'admin',
            ),
            array(
                'username' => 'pk004',
                'email' => 'user@gmail.com',
                'password' => '123456',
                "role" => 'user',
            ),
        );
    }
    ?>

    <div class="container mt-3">
        <h2>List User <span>

                <?php
                if (isset($_SESSION['username'])) {
                    echo "hello " . $_SESSION['username'];
                }

                ?>
            </span></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>username</th>
                    <th>password</th>
                    <th>role</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_SESSION['ds_users'])) {
                    $ds_users = $_SESSION['ds_users'];
                    foreach ($ds_users as $user) {
                        echo "<tr>";
                        echo "<td>$user[username]</td>";
                        echo "<td>$user[password]</td>";
                        echo "<td>$user[role]</td>";
                        echo "<td>$user[email]</td";
                        echo "<td>
                        <a href='./delete-user.php?username=$user[username]' target='_blank'>Delete</a>
                        </td>";
                        echo "<tr/>";
                    }
                }


                ?>

                <tr>
                    <td>John</td>
                    <td>john123</td>
                    <td>john@example.com</td>
                    <td>email</td>
                </tr>
            </tbody>
        </table>
    </div>



    <div class="container">

    </div>
</body>

</html>