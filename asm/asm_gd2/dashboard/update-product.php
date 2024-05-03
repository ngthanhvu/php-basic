<?php
session_start();
require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    try {
        if (isset($connection)) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $picture = $_POST['picture'];
            $price = $_POST['price'];

            $query = "UPDATE product SET name = :name, picture = :picture, price = :price WHERE id = :id";
            $statement = $connection->prepare($query);
            $success = $statement->execute([
                ':name' => $name,
                ':picture' => $picture,
                ':price' => $price,
                ':id' => $id
            ]);

            if ($statement->execute()) {
                header("Location: product.php");
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
