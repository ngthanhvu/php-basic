<?php
session_start();
require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    try {
        if (isset($connection)) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $image = $_POST['image'];
            $year = $_POST['year'];
            $description = $_POST['description'];
            $linkvideo = $_POST['linkvideo'];

            // Cập nhật thông tin blog
            $query = "UPDATE movies SET title = :title, image = :image, year = :year, description = :description, linkvideo = :linkvideo WHERE id = :id";
            $statement = $connection->prepare($query);
            $success = $statement->execute([
                ':title' => $title,
                ':image' => $image,
                ':year' => $year,
                ':description' => $description,
                ':linkvideo' => $linkvideo,
                ':id' => $id
            ]);

            if ($statement->execute()) {
                header("Location: quanly.php");
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật bài đăng.";
            }
        }
    } catch (\Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
