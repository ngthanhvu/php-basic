<?php
require('./mysql.php');

// Kiểm tra xác thực token từ URL
if (isset($connection) &&  isset($_GET['token'])) {
     $token = $_GET['token'];

     // Kiểm tra token có trong cơ sở dữ liệu không
     $query = "SELECT * FROM user WHERE reset_token = :token AND reset_token_expires > NOW()";
     $statement = $connection->prepare($query);
     $statement->execute([
          ':token' => $token
     ]);
     $user = $statement->fetch(PDO::FETCH_ASSOC);

     if (!$user) {
          echo "Token không hợp lệ hoặc đã hết hạn!";
          exit;
     }
} else {
     echo "Thiếu thông tin token!";
     exit;
}

// Xử lý khi người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (isset($connection) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];

          // Kiểm tra mật khẩu và mật khẩu xác nhận
          if ($password === $confirm_password) {
               // Hash mật khẩu mới
               $hashed_password = password_hash($password, PASSWORD_DEFAULT);

               // Cập nhật mật khẩu mới vào cơ sở dữ liệu
               $update_query = "UPDATE user SET password = :password, reset_token = NULL, reset_token_expires = NULL WHERE id = :id";
               $update_statement = $connection->prepare($update_query);
               $update_statement->execute([':password' => $hashed_password, ':id' => $user['id']]);

               echo "Mật khẩu đã được đặt lại thành công!";
               // Có thể chuyển hướng người dùng đến trang đăng nhập ở đây
          } else {
               echo "Mật khẩu và mật khẩu xác nhận không khớp!";
          }
     } else {
          echo "Thiếu thông tin mật khẩu!";
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Đặt lại mật khẩu</title>
</head>

<body>
     <h2>Đặt lại mật khẩu</h2>
     <form action="" method="post">
          <div>
               <label for="password">Mật khẩu mới:</label>
               <input type="password" id="password" name="password" required>
          </div>
          <div>
               <label for="confirm_password">Xác nhận mật khẩu mới:</label>
               <input type="password" id="confirm_password" name="confirm_password" required>
          </div>
          <button type="submit">Đặt lại mật khẩu</button>
     </form>
</body>

</html>