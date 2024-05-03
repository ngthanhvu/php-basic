<?php
// Kết nối đến cơ sở dữ liệu
require('config.php');

// Kiểm tra xem yêu cầu được gửi bằng phương thức GET và có tồn tại ID không
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    if ($connection) {
     try {
          // Lấy ID từ yêu cầu
          $id = $_GET['id'];
          
          // Truy vấn SQL để tìm bài đăng với ID được cung cấp
          $query = "SELECT * FROM blog WHERE id = :id";
          $statement = $connection->prepare($query);
          $statement->bindParam(':id', $id, PDO::PARAM_INT);
          $statement->execute();
          
          // Lấy kết quả từ truy vấn
          $result = $statement->fetch(PDO::FETCH_ASSOC);
          
          // Kiểm tra xem có bài đăng nào phù hợp không
          if ($result) {
              // Trả về kết quả dưới dạng HTML để hiển thị trong bảng trên trang HTML
              echo "<tr>";
              echo "<td>" . $result['id'] . "</td>";
              echo "<td>" . $result['name'] . "</td>";
              echo "<td>" . $result['picture'] . "</td>";
              echo "<td>" . $result['message'] . "</td>";
              echo "<td>";
              echo '<a href="delete.php?id=' . $result['id'] . '" class="btn btn-danger">Delete</a>';
              echo '<a href="edit.php?id=' . $result['id'] . '" class="btn btn-primary">Edit</a>';
              echo "</td>";
              echo "</tr>";
          } else {
              // Trả về thông báo nếu không tìm thấy bài đăng
              echo "<tr><td colspan='5'>Không tìm thấy bài đăng nào phù hợp.</td></tr>";
          }
      } catch (Exception $e) {
          // Trả về thông báo lỗi nếu có lỗi xảy ra
          echo "<tr><td colspan='5'>Lỗi: " . $e->getMessage() . "</td></tr>";
      }
    }
} else {
    // Trả về thông báo nếu không có ID được cung cấp
    echo "<tr><td colspan='5'>Không có ID được cung cấp.</td></tr>";
}
?>
