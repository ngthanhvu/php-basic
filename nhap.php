<?php

require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
     try {
          if (isset($connection)) {
               $idEdit = $_GET['id'];
               $query = "SELECT * FROM blog WHERE id = :id";
               $statement = $connection->prepare($query);
               $statement->bindParam(":id", $idEdit, PDO::PARAM_INT);
               $statement->execute();
               $blog = $statement->fetch(PDO::FETCH_ASSOC);

               ?>

<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Blog</title>
            </head>
            <body>
                <h2>Edit Blog</h2>
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" value="<?php echo $blog['name']; ?>"><br>
                    <label for="picture">Picture:</label><br>
                    <input type="text" id="picture" name="picture" value="<?php echo $blog['picture']; ?>"><br>
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message"><?php echo $blog['message']; ?></textarea><br>
                    <input type="submit" value="Update">
                </form>
            </body>
            </html>

            <?php

          }
     } catch (\Exception $th) {
          echo "Lỗi:" . $th->getMessage();
     }
}




?>




if (isset($connection) && count($errors) == 0) {
     try {
         if (isset($_POST['username'])) { // Kiểm tra xem $_POST['username'] có tồn tại không
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
                     header("Location: index.php");
                     exit();
                 } else {
                     $errors['password'] = "Username or password incorrect";
                 }
             }
         }
     } catch (\Exception $e) {
         echo $errors = $e->getMessage();
     }
}



if (isset($connection) && count($errors) == 0) {
     try {
         if (isset($_POST['username'])) { 
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
                     // Kiểm tra role
                     if ($result[0]['role'] === 'admin') {
                         header("Location: admin.php");
                         exit();
                     } else {
                         header("Location: index.php");
                         exit();
                     }
                 } else {
                     $errors['password'] = "Username or password incorrect";
                 }
             }
         }
     } catch (\Exception $e) {
         echo $errors = $e->getMessage();
     }
 }