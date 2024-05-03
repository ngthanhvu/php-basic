<?php

// tính chiết khấu
$donHang = 5100;

if ($donHang < 1000) {
    $chietKhau = 0;
} elseif ($donHang >= 1000 && $donHang <= 5000) {
    $chietKhau = 0.05;
} else {
    $chietKhau = 0.1;
}

echo "<h2>Đơn hàng có giá trị $donHang phải chịu chiết khấu là: $chietKhau </h2>";


// Tính phí giao hàng

$trongLuong = 0;

if ($trongLuong < 1) {
    $donGia = 5;
} elseif ($trongLuong >= 1 && $trongLuong <= 5) {
    $donGia = 10;
} else {
    $donGia = 15;
}

echo "<h2>Đơn hàng có trọng lượng $trongLuong Kg phải chịu phí là $donGia$</h2>";


?>