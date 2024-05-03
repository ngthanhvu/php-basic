<?php
require("config.php");
session_start();
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
  /* .search {
    display: flex;
    margin-bottom: 10px;
  }

  .search button {
    margin-left: 10px;
  } */
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
            <a class="nav-link" href="themfilm.php">
              <div class="sidebar__icon">
                <i class="fa fa-plus"></i>
              </div>
              THÊM POSTCAST
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="quanly.php?keyword=">
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
              <h2 class="wrap-heading__title"><a href="#">QUẢN LÝ</a></h2>
            </div>
            <div class="search">
              <form method="get">
                <input class="form-control-2 form-control-sm" name="keyword" type="text" id="searchInput" placeholder="Nhập Title để tìm kiếm">
                <button type="submit" id="searchButton" class="btn btn-success">Tìm kiếm</button>
              </form>
              <!-- <button id="sortAZButton" class="btn btn-primary">Sắp xếp A-Z</button>
              <button id="sortZAButton" class="btn btn-primary">Sắp xếp Z-A</button> -->
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID postcast</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Thoi Luong</th>
                  <th>Description</th>
                  <th>Link postcast</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="movieTableBody">
                <?php
                if (isset($connection) && isset($_GET['keyword'])) {
                  try {
                    $keyword = '%' . $_GET['keyword'] . '%';
                    $query = "SELECT * FROM movies WHERE title LIKE :keyword";
                    $statement = $connection->prepare($query);
                    $statement->execute([
                      ":keyword" => $keyword
                    ]);
                    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($movies as $film) {
                      echo "<tr>";
                      echo "<td>" . $film['id'] . "</td>";
                      echo "<td>" . $film['title'] . "</td>";
                      echo "<td><img style=\"width:100px\" src=\"" . $film['image'] . "\" alt=\"Lỗi ảnh\"></td>";
                      echo "<td>" . $film['year'] . "</td>";
                      echo "<td>" . $film['description'] . "</td>";
                      echo "<td>" . $film['linkvideo'] . "</td>";
                      echo "<td>";
                      echo '<a href="delete.php?id=' . $film['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                      echo '<a href="edit.php?id=' . $film['id'] . '" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                      echo "</td>";
                      echo "</tr>";
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
  <!-- đoạn js tìm kiếm theo tên -->
  <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("searchButton").addEventListener("click", function() {
        let keyword = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#movieTableBody tr");
        rows.forEach(function(row) {
          let title = row.querySelector("td:nth-child(2)").textContent.toLowerCase(); // Lấy giá trị từ cột title
          if (title.includes(keyword)) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      });
      });
  </script> -->

  <!-- đoạn js tìm kiếm theo id -->
  <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("searchButton").addEventListener("click", function() {
        let keyword = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#movieTableBody tr"); // Thay đổi tại đây
        rows.forEach(function(row) {
          let id = row.querySelector("td:first-child").textContent.toLowerCase();
          if (id.includes(keyword)) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      });
    });
  </script> -->
  <script src="js/jquery-3.2.1.slim.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
  </script>
  <script src="js/vendor/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>