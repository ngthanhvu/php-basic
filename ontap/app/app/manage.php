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
      $query = "INSERT INTO film (title,image,year,description,linkvideo) VALUES (:title,:image,:year,:description,:linkvideo)";
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
  <title>Danh sách diễn viên</title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="sidebar">
        <a class="sidebar__brand" href="/">MOVIE</a>
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <div class="sidebar__icon">
                <i class="fa fa-home"></i>
              </div>
              Trang chủ <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="discover.html">
              <div class="sidebar__icon">
                <i class="fa fa-bullseye"></i>
              </div>
              Khám phá
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.html">
              <div class="sidebar__icon">
                <i class="fa fa-newspaper-o"></i>
              </div>
              Tin tức
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="cast.html">
              <div class="sidebar__icon">
                <i class="fa fa-plus"></i>
              </div>
              Thêm Film
            </a>
          </li>
        </ul>
      </nav>

      <main role="main" class="main">
        <!-- <nav class="navbar top-menu">
            <ul class="navbar-nav d-flex flex-row">
              <li class="nav-item active">
                <a class="nav-link" href="list-movies.html">Đề cử <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list-movies.html">Phim lẻ mới</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list-movies.html">Phim bộ mới</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="list-movies.html">Phim sắp chiếu</a>
                </li>
            </ul>
          </nav> -->
        <!-- /.top-menu -->

        <div class="container-fluid pading-md">
          <section class="wrap">

            <div class="wrap-heading">
              <h2 class="wrap-heading__title"><a href="cast.html">Thêm film</a></h2>
            </div>
            <form action="manage.php" method="POST">
              <div class="form-group">
                <label for="username">Title:</label>
                <input type="text" class="form-control" id="username" name="title">
              </div>
              <div class="form-group">
                <label for="username">Image:</label>
                <input type="text" class="form-control" id="username" name="image">
              </div>
              <div class="form-group">
                <label for="username">Year:</label>
                <input type="date" class="form-control" id="username" name="year">
              </div>
              <div class="form-group">
                <label for="username">Mota:</label>
                <input type="text" class="form-control" id="username" name="description">
              </div>
              <div class="form-group">
                <label for="username">Linkvideo:</label>
                <input type="text" class="form-control" id="username" name="linkvideo">
              </div>
              <button type="submit" class="btn btn-primary btn-block">add</button>
            </form>
            <!-- /.wrap-heading -->


          </section>
          <!-- /.section -->
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