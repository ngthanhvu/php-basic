<style>
    * {
        font-family: sans-serif;
    }
</style>
<title>Vòng lặp</title>

<?php

// // loop for

// for ($i = 0; $i < 10; $i++) {
//     if ($i % 2 == 0) {
//         echo "<h2>$i</h2>";
//     }
// }

// // loop while
// $a = 0;

// while ($a <= 5) {
//     if ($a % 2 == 0) {
//         echo "<h2>$a</h2>";
//     }
//     $a++;
// }

// // loop do-while

// $b = 0;
// do {
//     if ($b % 2 == 0) {
//         echo "<h2>$b</h2>";
//     }
//     $b++;
// } while ($b <= 5);


// xậy dựng vòng lặp php chạy từ 0 => 100 và xuất ra giá trị
// in ra các giá trị chẵn, lẻ, các giá trị lẻ và chia hết cho 5, số chính phương, số nguyên tố, tổng các số chia hết cho 2 và 4
// trung bình cộng các số chia hết cho 2 và 4

echo "<h2>Các giá trị chẵn: </h2>";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo $i;
    }
}

echo "<h2>Các giá trị lẻ: </h2>";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i;
    }
}

echo "<h2>Các giá trị kẻ và chia hết cho 5:</h2>";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 != 0 && $i % 5 == 0) {
        echo $i;
    }
}

echo "<h2>Số chính phương: </h2>";
for ($i = 0; $i <= 100; $i++) {
    $canBacHai = sqrt($i);
    if ($canBacHai == (int)$canBacHai) {
        echo $i;
    }
}

echo "<h2>Các số nguyên tố: </h2>";


echo "<h2>Tổng các số chia hết cho 2 và 4: </h2>";
$tong = 0;
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0 && $i % 4 == 0) {
        $tong += $i;
    }
}
echo $tong;

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