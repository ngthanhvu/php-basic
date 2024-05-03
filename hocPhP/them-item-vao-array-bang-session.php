<?php

// cho một mảng
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

     if (isset($_POST['new_product']) && !empty($_POST['new_product'])) {
          $new_product = $_POST['new_product'];
     }
     #session
     // kiểm tra mảng product có trong session chưa
     if(isset($_SESSION['product'])) {
          $product =$_SESSION['product'];
     } else {
          // nếu không có create new array
          $product = array();
     }

     // post mảng mới vào
     $product[] = $new_product;

     // thêm mảng vào sesssion

     $_SESSION['product'] = $product;

     echo "<pre>";
     print_r($product);
     echo "<pre>";

} else {
     echo "Không có dữ liệu";
}

?>

<form action="post.php" method="post">
        <label>Giá trị mới:</label>
        <input type="text"name="new_product">
        <button type="submit">Thêm vào mảng</button>
    </form>