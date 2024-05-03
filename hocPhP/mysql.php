<?php

// tạo class
class test {
     public function tinhtong($a,$b) {
          $tong = $a + $b;
          echo $tong;
     }

     public function chao() {
          echo "Xin chào thế giới";
     }
}

// tạo đối tượng từ class có sẵn
$goi = new test;

$goi -> chao();

$a = 5;
$b = 3;

$goi -> tinhtong($a,$b);



?>