<?php
session_start();
require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    try {
        if (isset($connection)) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $image = $_POST['image'];
            $description = $_POST['description'];

            $query = "UPDATE film SET title = :title, image = :image, description = :description WHERE id = :id";
            $statement = $connection->prepare($query);
            $success = $statement->execute([
                ':title' => $title,
                ':image' => $image,
                ':description' => $description,
                ':id' => $id
            ]);

            if ($statement->execute()) {
                header("Location: admin.php");
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật.";
            }
        }
    } catch (\Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
