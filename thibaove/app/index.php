<?php
require("config.php");
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// $is_admin = ($_SESSION['role'] === 'admin')
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

<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="sidebar">
        <a class="sidebar__brand" href="/">MOVIE</a>
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/">
              <div class="sidebar__icon">
                <i class="fa fa-home"></i>
              </div>
              Trang chủ <span class="sr-only">(current)</span>
            </a>
          </li>

          <?php
          $userRole = 'user';
          if (isset($connection)) {
            $query = "SELECT role FROM user WHERE username = :username";
            $statement = $connection->prepare($query);
            $statement->execute([
              'username' => $_SESSION['username']
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
              $userRole = $result['role'];
            }
          }

          if ($userRole === "admin") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="themfilm.php">
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
          <?php
          }

          ?>


          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <div class="sidebar__icon">
                <i class="fa fa-user"></i>
              </div>
              LOGOUT
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

        <!-- <div id="carouselMovieIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselMovieIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselMovieIndicators" data-slide-to="1"></li>
            <li data-target="#carouselMovieIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="images/slide/movie1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/slide/movie2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/slide/movie3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselMovieIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselMovieIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> -->

        <!-- /.carousel -->

        <div class="container-fluid pading-md">
          <section class="wrap">

            <div class="wrap-heading">
              <h2 class="wrap-heading__title"><a href="list-movies.html">Post Cast</a></h2>
            </div>
            <!-- /.wrap-heading -->
            <div class="row">
              <?php
              if (isset($connection)) {
                try {
                  $query = "SELECT * FROM movies";
                  $statement = $connection->prepare($query);
                  $statement->execute();
                  $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($movies as $film) {
              ?>
                    <div class="col-md-3">
                      <div class="card">
                        <a href="watch.php?id=<?php echo $film['id'] ?>"><img class="card-img-top" src="<?php echo $film['image'] ?>" alt="No img"></a>
                        <div class="card-block">
                          <h4 class="card-title text-center"><a href="#"><?php echo $film['title'] ?></a></h4>
                        </div>
                      </div>
                    </div>

              <?php
                  }
                } catch (\Exception $th) {
                  echo "Lỗi: " . $th->getMessage();
                }
              }
              ?>



              <!-- / item 1 -->
            </div>
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