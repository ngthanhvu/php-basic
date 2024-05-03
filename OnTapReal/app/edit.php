<?php
session_start();
require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    try {
        if (isset($connection)) {
            $id = $_GET['id'];
            // Lấy thông tin của bài đăng từ cơ sở dữ liệu
            $query = "SELECT * FROM movies WHERE id = :id";
            $statement = $connection->prepare($query);
            $success = $statement->execute([
                ':id' => $id
            ]);
            $movies = $statement->fetch(PDO::FETCH_ASSOC);

            // Kiểm tra xem có bài đăng tương ứng với ID không
            if (!$movies) {
                throw new Exception("Không tìm thấy video tương ứng với ID.");
            }

?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Blog</title>
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>

            <body>
                <div class="container">
                    <h2>Edit Blog</h2>
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $movies['id']; ?>">
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Điền tiêu đề mới" value="<?php echo $movies['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="picture">Image:</label>
                            <input type="text" class="form-control" id="picture" name="image" placeholder="Điền hình ảnh mới" value="<?php echo $movies['image'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="picture">year:</label>
                            <input type="date" class="form-control" id="picture" name="year" placeholder="Điền năm mới" value="<?php echo $movies['year'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="picture">Description:</label>
                            <input type="text" class="form-control" id="picture" name="description" placeholder="Điền mô tả mới" value="<?php echo $movies['description'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="picture">Link video:</label>
                            <input type="text" class="form-control" id="picture" name="linkvideo" placeholder="Điền link video mới" value="<?php echo $movies['linkvideo'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

                <!-- Bootstrap JS and jQuery (Optional, for certain Bootstrap features) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>

            </html>

<?php
        }
    } catch (\Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>