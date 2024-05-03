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
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // var_dump($_POST['username']); empty
          if (isset($_POST['username'])) {
               if (empty($_POST['username'])) {
                    // them item vao mang
                    $errors['username'] = "username is required";
               }
          }
          /**
           * password not empty > 6 lenth
           * password confirm same as password
           */

          if (isset($_POST['password'])) {
               if (empty($_POST['password'])) {
                    $errors['password'] = "username is required";
               } else {
                    if (strlen($_POST['password']) < 6) {
                         $errors['password'] = "password must be at least 6 characters";
                    }
               }
          }
          if (isset($_POST['passwordconfirm'])) {
               if ($_POST['password'] != $_POST['passwordconfirm']) {
                    $errors['passwordconfirm'] = "password not matches";
               }
          }
          if (isset($_POST["role"])) {
               if (empty($_POST['role'])) {
                    $errors['role'] = " role not empty ";
               }
          }

          // validate email 
          /**
           *  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           *$emailErr = "Invalid email format";
           * }
           */

          if (isset($_POST['email'])) {
               if (empty($_POST['email'])) {
                    $errors['email'] = "email is required";
               } else {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                         $errors['email'] = "invalid email format";
                    }
               }
          }
          // create session if session ds_user not exits
          // if has session => thêm 1 user vào array session và cập nhật lại session
          if (count($errors) == 0) {
               $user = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'role' => $_POST['role'],
               );
               if (!isset($_SESSION['ds_users'])) {
                    $_SESSION['ds_users'] = array(0 => $user);
               } else {
                    // thêm user vào session
                    $ds_users = $_SESSION['ds_users'];
                    array_push($ds_users, $user);
                    // cập nhật session
                    $_SESSION['ds_users'] = $ds_users;
               }
               // echo "<pre>";
               // var_dump($_SESSION);
               // echo "</pre>";
          }
     }

     /**
      * validate username and password ko duoc trong
      */
     ?>
     <div class="container">
          <h1>Đăng ký</h1>
          <form method="post" action="./register.php">
               <label for="username">Username</label>
               <?php
               //$a = 3 > 4 ? 'a' : 'b';
               /**
                * isset($_POST["username"] ? echo $_POST["username"] : ''
                */
               $username = "";
               if (isset($_POST["username"])) {
                    $username = $_POST["username"];
               }

               ?>
               <input class="form-control mb-3" type="text" name="username" placeholder="nhap tai khoan">
               <?php
               if (isset($errors['username'])) {
                    echo "<p class='error'>$errors[username]</p>";
               }

               ?>

               <label for="username">Email</label>
               <input class="form-control mb-3" type="text" name="email" placeholder="nhap email">
               <?php
               if (isset($errors['email'])) {
                    echo "<p class='error'>$errors[email]</p>";
               }

               ?>

               <label for="password">Password</label>

               <input class="form-control  mb-3" type="text" name="password" placeholder="nhap mat khau">
               <?php
               if (isset($errors['password'])) {
                    echo "<p class='error'>$errors[password]</p>";
               }
               ?>

               <label for="password">Confirm password</label>

               <input class="form-control  mb-3" type="text" name="passwordconfirm" placeholder="nhap lai mat khau">
               <?php
               if (isset($errors['passwordconfirm'])) {
                    echo "<p class='error'>$errors[passwordconfirm]</p>";
               }
               ?>

               <select class="form-select mb-3" name="role">
                    <option value="">chọn quyền</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
               </select>
               <?php
               if (isset($errors['role'])) {
                    echo "<p class='error'>$errors[role]</p>";
               }

               ?>
               <input class="btn btn-primary " type="submit" name=submit value="register" />
               <?php
               // if (count($errors) > 0) {
               //     foreach ($errors as $err) {
               //         echo "<p class='error'>$err</p>";
               //     }
               // }
               ?>
          </form>
     </div>
     <?php
     echo "<pre>";
     var_dump($errors);
     var_dump($_POST);
     var_dump($_SESSION);
     echo "</pre>";
     ?>
</body>

</html>