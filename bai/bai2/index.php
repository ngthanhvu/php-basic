<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<style>
    * {
        font-family: sans-serif;
    }
</style>

<body>
    <?php
    // ví dụ 1: Kiểm tra chẵn lẻ
    $x = 2.2;

    if ($x % 2 == 0) {
        echo "<h2>Là số chẵn</h2>";
    } else {
        echo "<h2>Là số lẻ</h2>";
    }
    // ví dụ 2: số x chia hết cho 2 và 5
    if ($x % 2 == 0 && $x % 5 == 0) {
        echo "<h2>Số $x chia hết cho 2 và 5</h2>";
    } else {
        echo "<h2>Số $x không chia hết cho 2 và 5</h2>";
    }
    // ví dụ 3: số x có chia hết cho 2 or 3 không
    if ($x % 2 == 0 || $x % 3 == 0) {
        echo "<h2>Số $x chia hết cho 2 or 3</h2>";
    } else {
        echo "<h2>Số $x không chia hết cho 2 or 3</h2>";
    }

    $diem = 10; // nhập vào dữ liệu điểm

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


    $luachon = 7;
    switch ($luachon) {
        case 0:
            echo "<h3>CN</h3>";
            break;
        case 1:
            echo "<h3>T2</h3>";
            break;
        case 2:
            echo "<h3>T3</h3>";
            break;
        case 3:
            echo "<h3>T4</h3>";
            break;
        case 4:
            echo "<h3>T5</h3>";
            break;
        case 5:
            echo "<h3>T6</h3>";
            break;
        case 6:
            echo "<h3>T7</h3>";
            break;
        default:
            echo "<h3>Kết quả không hợp lệ</h3>";
    }

    $mua = 1;
    switch ($mua) {
        case 3:
        case 4:
        case 5:
            echo "Mùa xuân";
            break;
        case 6:
        case 7:
        case 8:
            echo "Mùa hạ";
            break;
        case 9:
        case 10:
        case 11:
            echo "Mùa thu";
            break;
        case 12:
        case 1:
        case 2:
            echo "Mùa đông";
            break;
    }






    ?>
</body>

</html>