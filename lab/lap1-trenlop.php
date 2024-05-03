<style>
    * {
        font-family: sans-serif;
    }
</style>
<title>Lab1 Trên Lớp</title>
<?php
//  xây dựng vòng lặp chạy từ 0->100 và xuất ra giá trị
//  in ra các giá trị lẻ

echo "<h2>Các giá trị lẻ: </h2>";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i. " ";
    }
}

// in ra các giá trị lẻ và chia hết cho 5

echo "<h2>Các giá trị kẻ và chia hết cho 5:</h2>";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 != 0 && $i % 5 == 0) {
        echo $i. " ";
    }
}

// in ra các giá trị là số chính phương

echo "<h2>Số chính phương: </h2>";
for ($i = 0; $i <= 100; $i++) {
    $canBacHai = sqrt($i);
    if ($canBacHai == (int)$canBacHai) {
        echo $i. " ";
    }
}

// in ra tổng các số chia hết cho 2 và 4

echo "<h2>Tổng các số chia hết cho 2 và 4: </h2>";
$tong = 0;
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0 && $i % 4 == 0) {
        $tong += $i;
    }
}
echo $tong;

// in ra trung bình cộng các số chia hết cho 2 và 4

echo "<h2>Trung bình cộng của các số chia hết cho 2 và 4: </h2>";

$tong = 0;
$dem = 0;
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0 && $i % 4 == 0) {
        $tong += $i;
        $dem++;
    }
}
$tbc = $tong / $dem;
echo $tbc;

?>