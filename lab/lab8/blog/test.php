<?php
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<div class="container">
  <h2>Quản lý blog</h2>
  <p>Bảng thống kê bài đăng</p>     
  <div class="search">
    <input type="text" id="searchInput" placeholder="Nhập ID để tìm kiếm">
    <button id="searchButton">Tìm kiếm</button>   
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Picture</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="blogTableBody">
      <?php
      try {
          if (isset($connection)) {
              $query = "SELECT * FROM blog";
              $statement = $connection->prepare($query);
              $statement->execute();
              $blogs = $statement->fetchAll(PDO::FETCH_ASSOC);
              foreach ($blogs as $blog) {
                  echo "<tr>";
                  echo "<td>" . $blog['id'] . "</td>";
                  echo "<td>" . $blog['name'] . "</td>";
                  echo "<td>" . $blog['picture'] . "</td>";
                  echo "<td>" . $blog['message'] . "</td>";
                  echo "<td>";
                  echo '<a href="delete.php?id=' . $blog['id'] . '" class="btn btn-danger">Delete</a>';
                  echo '<a href="edit.php?id=' . $blog['id'] . '" class="btn btn-primary">Edit</a>';
                  echo "</td>";
                  echo "</tr>";
              }
          }
      } catch (\Exception $e) {
          echo "Lỗi: ". $e->getMessage();
      }
      ?>
    </tbody>
  </table>
</div>

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
