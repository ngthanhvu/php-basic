<?php
require("config.php")


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
    .modal-backdrop.show {z-index: 0}
    @media (min-width: 576px) {
      .modal-dialog {
        max-width: 892px;
        margin: 30px auto;
        }
      .modal-sm {
        max-width: 300px; } }
    </style>
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
                Trang chủ <span class="sr-only">(current)</span></a>
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
              <a class="nav-link" href="cast.html">
                <div class="sidebar__icon">
                  <i class="fa fa-street-view"></i>
                </div>
                Diễn viên
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
            if (isset($connection)) {
              try {
                $query = "SELECT * FROM film";
                $statement = $connection->prepare($query);
                $statement->execute();
                $films = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach($films as $phim) {
                  ?>
            <div class="cast-container" style="background-image: url(<?php echo $phim['image'] ?>)">
            <div class="cast-wrap d-flex movie-wrap">

              <div class="movie-watching">

                <video autoplay id="movie_watch" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="896" height="504" poster="<?php echo $phim['image'] ?>" data-setup="{}">
                  <source src="<?php echo $phim['linkvideo'] ?>" type="video/mp4" >
                  <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                </video>

                <h2 class="movie-watching__title"><a href="movie-detail.html"><?php echo $phim['title'] ?></a></h2>
                <div class="movie-watching__view-count">
                  <span>104.574</span> lượt xem
                </div>
              </div>
              <!-- /.movie-watching -->

            </div>
          </div>
                  <?php
                }



              } catch (\Throwable $th) {
                //throw $th;
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
              
                        <li>
                          <!-- Avatar -->
                          <div class="comment-avatar"><img src="images/common/default-avatar.png" alt=""></div>
                          <!-- Comment Container -->
                          <div class="comment-box">
                            <div class="comment-head">
                              <h6 class="comment-name"><a href="#">Văn Tám</a></h6>
                              <span>10 phút trước</span>
                            </div>
                            <div class="comment-content">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>
              
                    <li>
                      <div class="comment-main-level">
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
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </section>

            <section class="wrap">

              <div class="wrap-heading">
                  <h2 class="wrap-heading__title"><a href="list-movies.html">Phim liên quan</a></h2>
              </div>
              <!-- /.wrap-heading -->

              <div class="row knowfor">
                <div class="col-md-3">
                  <div class="card bg-dark text-white">
                    <a href="movie-detail.html">
                      <img class="card-img" src="images/poster/movie13.jpg" alt="Wonder Woman">
                    </a>
                    <div class="card-img-overlay">
                      <h4 class="card-title"><a href="#">Wonder Woman</a></h4>
                      <p class="card-text card-year">2017</p>
                    </div>
                  </div>
                </div>
                <!-- / item 1 -->
                <div class="col-md-3">
                  <div class="card bg-dark text-white">
                    <a href="movie-detail.html">
                      <img class="card-img" src="images/poster/movie14.jpg" alt="Batman v Superman">
                    </a>
                    <div class="card-img-overlay">
                      <h4 class="card-title"><a href="#">Batman v Superman</a></h4>
                      <p class="card-text card-year">2016</p>
                    </div>
                  </div>
                </div>
                <!-- / item 2 -->
                <div class="col-md-3">
                  <div class="card bg-dark text-white">
                    <a href="movie-detail.html">
                      <img class="card-img" src="images/poster/movie19.jpg" alt="Suicide Squad">
                    </a>
                    <div class="card-img-overlay">
                      <h4 class="card-title"><a href="#">Suicide Squad</a></h4>
                      <p class="card-text card-year">2016</p>
                    </div>
                  </div>
                </div>
                <!-- / item 3 -->
                <div class="col-md-3">
                  <div class="card bg-dark text-white">
                    <a href="movie-detail.html">
                      <img class="card-img" src="images/poster/movie18.jpg" alt="Man of steel">
                    </a>
                    <div class="card-img-overlay">
                      <h4 class="card-title"><a href="#">Man of steel</a></h4>
                      <p class="card-text card-year">2014</p>
                    </div>
                  </div>
                </div>
                <!-- / item 3 -->
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
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vendor/video.min.js"></script>
  </body>
</html>