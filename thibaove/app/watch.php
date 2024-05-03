<?php
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liên minh công lý - Justice League - 2017</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/video-js.min.css">
  <style>
    .modal-backdrop.show {
      z-index: 0
    }

    @media (min-width: 576px) {
      .modal-dialog {
        max-width: 892px;
        margin: 30px auto;
      }

      .modal-sm {
        max-width: 300px;
      }
    }
  </style>
</head>

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
              Trang chủ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="themfilm.php">
              <div class="sidebar__icon">
                <i class="fa fa-plus"></i>
              </div>
              THÊM POSTCAST
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quanly.php">
              <div class="sidebar__icon">
                <i class="fa fa-edit"></i>
              </div>
              QUẢN LÝ POSTCAST
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
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (isset($connection) && $id !== null) {
          try {
            $query = "SELECT * FROM movies WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->execute([
              "id" => $id
            ]);
            $movies = $statement->fetch(PDO::FETCH_ASSOC);

            if ($movies) {
        ?>
              <div class="cast-container" style="background-image: url(<?php echo $movies['image'] ?>)">
                <div class="cast-wrap d-flex movie-wrap">

                  <div class="movie-watching">
                    <audio controls>
                      <!-- <source src="horse.ogg" type="audio/ogg"> -->
                      <source src="<?php echo $movies['linkvideo'] ?>" type="audio/mpeg">
                      Your browser does not support the audio element.
                    </audio>
                    <!-- <iframe width="896" height="504" src="" frameborder="0" allowfullscreen></iframe> -->
                    <h2 class="movie-watching__title"><a href="#"><?php echo $movies['title'] ?></a></h2>
                    <div class="movie-watching__view-count">
                      <span><?php echo $movies['description'] ?></span>
                    </div>
                  </div>
                  <!-- /.movie-watching -->

                </div>
              </div>

        <?php
            } else {
              echo "Không tìm thấy film";
            }
          } catch (\Exception $th) {
            echo "Lỗi: " . $th->getMessage();
          }
        }
        ?>



        <div class="container-fluid pading-md">

          <section class="wrap">

            <div class="container">
              <div class="row">
                <div class="comments-container">
                  <h3>Bình luận về phim</h3>

                  <ul id="comments-list" class="comments-list">
                    <li>
                      <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="images/common/default-avatar.png" alt=""></div>
                        <!-- Comment Container -->
                        <div class="comment-box">
                          <div class="comment-head">
                            <h6 class="comment-name"><a href="#">Văn Tám</a></h6>
                            <span>20 phút trước</span>
                          </div>
                          <div class="comment-content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                          </div>
                        </div>
                      </div>
                      <!-- Comments responses -->
                      <ul class="comments-list reply-list">
                        <li>
                          <!-- Avatar -->
                          <div class="comment-avatar"><img src="images/common/default-avatar-asian-girl.png" alt=""></div>
                          <!-- Comment Container -->
                          <div class="comment-box">
                            <div class="comment-head">
                              <h6 class="comment-name"><a href="#">Khánh Linh</a></h6>
                              <span>10 phút trước</span>
                            </div>
                            <div class="comment-content">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                            </div>
                          </div>
                        </li>
                  </ul>
                </div>
              </div>
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
  <script src="js/vendor/video.min.js"></script>
</body>

</html>