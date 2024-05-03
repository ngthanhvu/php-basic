<?php
require("config.php");
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (isset($_POST['title']) && empty($_POST['title'])) {
          $errors['title'] = "Name is required";
     }

     if (isset($_POST['image']) && empty($_POST['image'])) {
          $errors['image'] = "Picture is required";
     }

     if (isset($_POST['year']) && empty($_POST['year'])) {
          $errors['year'] = "Description is required";
     }

     if (isset($_POST['linkvideo']) && empty($_POST['linkvideo'])) {
          $errors['linkvideo'] = "Description is required";
     }

     if (isset($_POST['description']) && empty($_POST['description'])) {
          $errors['description'] = "Description is required";
     }

     if (isset($connection)) {
          try {
               $query = "INSERT INTO movies (title,image,year,description,linkvideo) VALUES (:title,:image,:year,:description,:linkvideo)";
               $statement = $connection->prepare($query);
               $statement->execute([
                    "title" => $_POST['title'],
                    "image" => $_POST['image'],
                    "year" => $_POST['year'],
                    "description" => $_POST["description"],
                    "linkvideo" => $_POST['linkvideo']
               ]);
          } catch (\Exception $th) {
               echo "Lỗi" . $th->getMessage();
          }
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Trang chủ</title>
     <link rel="stylesheet" href="css/main.css">
</head>

<style>
     .error {
          color: red;
     }
</style>

<body>
     <div class="container-fluid">
          <div class="row">
               <nav class="sidebar">
                    <a class="sidebar__brand" href="/">MOVIE</a>
                    <ul class="nav nav-pills flex-column">
                         <li class="nav-item">
                              <a class="nav-link" href="index.php">
                                   <div class="sidebar__icon">
                                        <i class="fa fa-home"></i>
                                   </div>
                                   Trang chủ <span class="sr-only">(current)</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link active" href="themfilm.php">
                                   <div class="sidebar__icon">
                                        <i class="fa fa-plus"></i>
                                   </div>
                                   THÊM POSTCAST
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="quanly.php?keyword=">
                                   <div class="sidebar__icon">
                                        <i class="fa fa-edit"></i>
                                   </div>
                                   QUẢN LÝ POSTCAST
                              </a>
                         </li>
                    </ul>
               </nav>
               <main role="main" class="main">

                    <div class="container-fluid pading-md">
                         <section class="wrap">

                              <div class="wrap-heading">
                                   <h2 class="wrap-heading__title"><a href="#">THÊM POSTCAST</a></h2>
                              </div>
                              <form action="themfilm.php" method="POST">
                                   <div class="form-group">
                                        <label for="username">Title:</label>
                                        <input type="text" class="form-control" name="title">
                                        <?php
                                        if (isset($errors['title'])) {
                                             echo "<span class='error'>" . $errors['title'] . "</span>";
                                        }
                                        ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="username">Image:</label>
                                        <input type="text" class="form-control" name="image">
                                        <?php
                                        if (isset($errors['image'])) {
                                             echo "<span class='error'>" . $errors['image'] . "</span>";
                                        }
                                        ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="username">Thoi luong:</label>
                                        <input type="number" class="form-control" name="year">
                                        <?php
                                        if (isset($errors['year'])) {
                                             echo "<span class='error'>" . $errors['year'] . "</span>";
                                        }
                                        ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="username">Mota:</label>
                                        <input type="text" class="form-control" name="description">
                                        <?php
                                        if (isset($errors['description'])) {
                                             echo "<span class='error'>" . $errors['description'] . "</span>";
                                        }
                                        ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="username">LinkPostCast (.mp3):</label>
                                        <input type="text" class="form-control" name="linkvideo">
                                        <?php
                                        if (isset($errors['linkvideo'])) {
                                             echo "<span class='error'>" . $errors['linkvideo'] . "</span>";
                                        }
                                        ?>
                                   </div>
                                   <button type="submit" class="btn btn-primary btn-block">add</button>
                              </form>
                         </section>
                    </div>
               </main>
          </div>
     </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/jquery-3.2.1.slim.min.js"></script>
     <script>
          window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
     </script>
     <script src="js/vendor/popper.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>

</html>