<?php
// bài 1:  tính diện tích hình tròn 
$r = 10;
$pi = 3.14;
$dienTich = $pi * ($r**2);
echo "Diện tích hình tròn là: $dienTich<br>";

// bài 2: tính diện tích hình tam giác S = √p x (p – a) x (p – b) x ( p – c)
$a = 3;
$b = 4;
$c = 5;

$p = ($a + $b + $c) / 2; // tính nửa chu vi

$s = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)); // tính diện tích tam giác S theo công thức Heron
echo "Diện tích tam giác S là : $s<br>";

 /*bài 3:  nhập vào điểm trung bình đưa ra xếp loại 
 Yếu, tb, khá, giỏi, xuất sắc
 yếu <5
 tb <=6.5
 khá <8.0
 giỏi < 9.0
 xuất sắc: <=10
*/

$diem = 8.9; // nhập vào dữ liệu điểm

if (is_numeric($diem) && $diem >= 0 && $diem <= 10) {
    if ($diem < 5) {
        echo "<h2>Học sinh yếu </h2>";
    } elseif ($diem <= 6.5) {
        echo "<h2>Học sinh trung bình </h2>";
    } elseif ($diem < 8.0) {
        echo "<h2>Học sinh khá </h2>";
    } elseif ($diem < 9.0) {
        echo "<h2>Học sinh giỏi </h2>";
    } elseif ($diem <= 10) {
        echo "<h2>Học sinh xuất sắc </h2>";
    }
} else {
    echo "<h2>Dữ liệu sai</h2>";
}
// bài 4: kiểm tra một số có phải là số chẵn hay không

$so = 3; // nhập vào dữ liệu

if ($so % 2 === 0) {
    echo "Là số chẵn <br>";
} else {
    echo "Là số lẻ <br>";
}


/*
Bài 5: nhập vào 3 cạnh a,b,c kiểm tra tam giác là gì:
không tam giác
tam giác  vuông
tam giác cân
tam giác đều
tam giác thường
*/

$canha = 5;
$canhb = 5; // nhập dữ liệu để kiểm tra
$canhc = 5;

/*
Điều kiện kiểm tra tam giác :
+ Để kiểm tra xem ba cạnh có phải là tam giác không, chúng ta kiểm tra xem mỗi cạnh có lớn hơn 0 và tổng của hai cạnh bất kỳ có lớn hơn cạnh còn lại không.
+ Để kiểm tra tam giác vuông, chúng ta kiểm tra điều kiện Pythagoras: tổng bình phương của hai cạnh góc vuông bằng bình phương của cạnh còn lại.
+ Để kiểm tra tam giác đều, chúng ta kiểm tra xem ba cạnh có bằng nhau không.
+ Để kiểm tra tam giác cân, chúng ta kiểm tra xem ít nhất hai cạnh có bằng nhau không.
*/


// kiểm tra không tam giacs
if ($canha < 0 || $canhb < 0 || $canhc < 0 || ($canha + $canhb <= $canhc) || ($canha + $canhc <= $canhb) || ($canhb + $canhc <= $canha)) {
    echo "Là không tam giác <br>";
}
// kiểm tra tam giác vuông
elseif (($canha * $canha) + ($canhb * $canhb) == ($canhc * $canhc) || ($canhb * $canhb) + ($canhc * $canhc) == ($canha * $canha) || ($canha * $canha) + ($canhc * $canhc) == ($canhb * $canhb)) {
    echo "Là tam giác vuông <br>";
}
// kiểm tra tam giác đều
elseif ($canha == $canhb && $canhb == $canhc) {
    echo "Là tam giác đều <br>";
}
// kiểm tra tam giác cân
elseif ($canha == $canhb or $canhb == $canhc) {
    echo "Là tam giác cân <br>";
}


?>