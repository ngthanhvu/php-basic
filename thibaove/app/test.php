<?php
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang chủ</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .hidden {
      display: none;
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
            Trang chủ <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="themfilm.php">
            <div class="sidebar__icon">
              <i class="fa fa-plus"></i>
            </div>
            THÊM FILM
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="quanly.php">
            <div class="sidebar__icon">
              <i class="fa fa-edit"></i>
            </div>
            QUẢN LÝ FILM
          </a>
        </li>
      </ul>
    </nav>

    <main role="main" class="main">

      <div class="container-fluid pading-md">
        <section class="wrap">

          <div class="wrap-heading">
            <h2 class="wrap-heading__title"><a href="#">QUẢN LÝ</a></h2>
          </div>
          <div class="search">
            <input type="text">
            <button>Search</button>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID film</th>
                <th>Title</th>
                <th>Image</th>
                <th>Year</th>
                <th>Description</th>
                <th>Link video</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($connection)) {
                try {
                  $query = "SELECT * FROM movies";
                  $statement = $connection->prepare($query);
                  $statement->execute();
                  $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($movies as $film) {
              ?>
                    <tr>
                      <td><?php echo $film['id'] ?></td>
                      <td><?php echo $film['title'] ?></td>
                      <td><img style="width:100px" src="<?php echo $film['image'] ?>" alt="Lỗi ảnh"></td>
                      <td><?php echo $film['year'] ?></td>
                      <td><?php echo $film['description'] ?></td>
                      <td><?php echo $film['linkvideo'] ?></td>
                      <td><a href="delete.php?id=<?php echo $film['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      <a href="edit.php?id=<?php echo $film['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    </td>
                    </tr>
              <?php
                  }
                } catch (\Exception $th) {
                  echo "Lỗi: " . $th->getMessage();
                }
              }
              ?>
            </tbody>
          </table>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("searchButton").addEventListener("click", function() {
        var keyword = document.getElementById("searchInput").value.toLowerCase();
        var rows = document.querySelectorAll("#blogTableBody tr");
        rows.forEach(function(row) {
            var id = row.querySelector("td:first-child").textContent.toLowerCase();
            if (id.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
</script>

</body>
</html>
