<title>Array</title>
<style>
    * {
        font-family: sans-serif;
    }
</style>

<?php


$sinhVien = array('pk01', 'pk02', 'pk03', 'pk04', 'pk05', 'pk06');


echo "<pre>";

var_dump($sinhVien);

echo "</pre>";

echo $sinhVien[1];


$sinhVien[1] = 'Đuổi học';


echo "<pre>";

var_dump($sinhVien);

echo "</pre>";

// vòng lặp array

for ($i = 0; $i < count($sinhVien); $i++) {
    echo $sinhVien[$i] . "<br>";
}


// foreach

foreach ($sinhVien as $item) {
    echo '$item <br>';
}

$mang_soNguyen = array(0, 1, 5, 4, 3, 6, 7, 8, 9, 2);

# in ra giá trị chẵn của mảng

echo "<h3>in ra giá trị chẵn của mảng</h3>";

foreach ($mang_soNguyen as $chan) {
    if ($chan % 2 == 0) {
        echo $chan. " ";
    }
}

# tìm giá trị lớn nhất của mảng

echo "<h3>tìm giá trị lớn nhất của mảng</h3>";

$mangLonNhat = $mang_soNguyen[0];
foreach ($mang_soNguyen as $lonNhat) {
    if ($lonNhat > $mangLonNhat) {
        $mangLonNhat = $lonNhat;
    }
}

echo "$mangLonNhat <br>";

$viTriLonNhat = 0;

for ($i = 1; $i < count($mang_soNguyen); $i++) {
    if($mang_soNguyen[$i] > $mang_soNguyen[$viTriLonNhat]) {
        $viTriLonNhat = $i;
    }
}

echo "Vị trí nhỏ nhất là $viTriLonNhat ";

# tìm giá trị nhỏ nhất của mảng

echo "<h3>tìm giá trị nhỏ nhất của mảng</h3>";

$mangNhoNhat = $mang_soNguyen[0];
foreach ($mang_soNguyen as $nhoNhat) {
    if ($nhoNhat < $mangNhoNhat) {
        $mangNhoNhat = $nhoNhat;
    }
}

echo "$mangNhoNhat <br>";

$viTriNhoNhat = 0;

for ($i = 1; $i < count($mang_soNguyen); $i++) {
    if($mang_soNguyen[$i] < $mang_soNguyen[$viTriNhoNhat]) {
        $viTriNhoNhat = $i;
    }
}

echo "Vị trí nhỏ nhất là $viTriNhoNhat ";

# tìm những số nguyên tố

echo "<h3>tìm những số nguyên tố</h3>";

    function kiemtra($x) {
        if ($x < 2) {
            return false;
        }
        for ($i = 2; $i < $x; $i++) {
            if ($x % $i == 0) {
                return false;
            }
        }
        return true;
    }

    $soNT = array();

   foreach ($mang_soNguyen as $soNguyenTo) {
        if(kiemtra($soNguyenTo)) {
            $soNT[] = $soNguyenTo;
        }
   }

   echo implode(", ", $soNT);


# tìm những số chính phương

echo "<h3>tìm những số chính phương</h3>";

foreach ($mang_soNguyen as $soNguyen) {
    $canBacHai = sqrt($soNguyen);
    if ($canBacHai == (int)$canBacHai) {
        echo $canBacHai . " ";
    }
}

# tìm những số hoàn hảo
echo "<h3>tìm những số hoàn hảo</h3>";
    // kiểm tra số hoàn hảo
    function kiemTraSoHoanHao($so) {
        $sumUoc = 0;
        // vòng lặp kiểm tra
        for ($i = 1; $i < $so; $i++) {
            if ($so % $i == 0) {
                $sumUoc += $i; // thêm số vào tổng ước
            }
        }
        return $sumUoc == $so;
    }

    // duyệt mảng tìm ra số hoàn hảo
    $mangSoHoanHao = array();
    foreach ($mang_soNguyen as $so) {
        if (kiemTraSoHoanHao($so)) {
            $mangSoHoanHao[] = $so;
        }
    }
    // xuất kết quả
    foreach ($mangSoHoanHao as $so) {
        echo $so . " ";
    }


# tính tổng của mảng
echo "<h3>tính tổng của mảng</h3>";

$tong = 0;

    for ($i = 0; $i < count($mang_soNguyen); $i++) {
        $tong += $mang_soNguyen[$i];
    }

    echo $tong;

# sắp xếp tăng dần
echo "<h3>sắp xếp tăng dần</h3>";

    for ($i = 0; $i < count($mang_soNguyen); $i++) {
        for ($j = $i + 1; $j < count($mang_soNguyen); $j++) {
            if ($mang_soNguyen[$i] > $mang_soNguyen[$j]) {
                $xep = $mang_soNguyen[$i];
                $mang_soNguyen[$i] = $mang_soNguyen[$j];
                $mang_soNguyen[$j] = $xep;
            }
        }
    }

    echo "<pre>";

    print_r($mang_soNguyen);

    echo "</pre>";

    

?>