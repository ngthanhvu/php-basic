<?php
// try catch: Xử lý ngoại lệ khi chương trình gặp lỗi vẫn chạy bth

try {
     // thêm code
     echo 'ThanhVu - test<br>';
     test();
} catch (Error $exception) {
     echo $exception -> getMessage()."<br>";
     echo 'File: " '. $exception -> getFile().'<br>';
     echo 'Line: ' .$exception -> getLine()."<br>"; 
}


echo "Chương trình chạy bth";








?>
