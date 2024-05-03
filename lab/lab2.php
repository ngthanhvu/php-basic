<style>
    * {
        font-family: sans-serif;
    }
</style>

<?php
// 1. Kiểm tra số dương hoặc âm
// Viết chương trình PHP để kiểm tra một số nhập vào là số dương, số âm hay số 0.
$so = 1;

if ($so > 0) {
    echo "<h2>Là số dương</h2>";
} elseif ($so < 0) {
    echo "<h2>Là số âm</h2>";
} else {
    echo "<h2>Là số 0</h2>";
}

// 2. Phân loại điểm số
// Yêu cầu: Viết chương trình PHP để phân loại điểm số của học sinh: A (>=90), B (>=80), C (>=70), D (>=60), F (<60).

$diem = 110;

if ($diem >= 90) {
    echo "<h2>Điểm A</h2>";
} elseif ($diem >= 80) {
    echo "<h2>Điểm B</h2>";
} elseif ($diem >= 70) {
    echo "<h2>Điểm C</h2>";
} elseif ($diem >= 60) {
    echo "<h2>Điểm D</h2>";
} else {
    echo "<h2>Điểm F</h2>";
}

// 3. Tính ngày trong tháng
// Yêu cầu: Viết chương trình PHP để tìm số ngày trong một tháng. Đầu vào là tháng và năm.

$thang = 9;
$nam = 2028;

switch ($thang) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        echo "<h2>Tháng $thang có 30 ngày</h2>";
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        echo "<h2>Tháng $thang có 31 ngày</h2>";
        break;
    case 2:
        if (($nam % 4 == 0 && $nam % 100 != 0) || ($nam % 400 == 0)) {
            echo "<h2>Tháng $thang có 29 ngày</h2>"; // năm nhuận
        } else {
            echo "<h2>Tháng $thang có 28 ngày</h2>"; // năm không nhuận
        }
    default:

        break;
}


// 4. Xác định mùa
// Yêu cầu: Viết chương trình PHP để xác định mùa dựa trên tháng nhập vào (1-12).

$mua = 1; // nhập tháng 

switch ($mua) {
    case 3:
    case 4:
    case 5:
        echo "<h2>Mùa xuân</h2>";
        break;
    case 6:
    case 7:
    case 8:
        echo "<h2>Mùa hạ</h2>";
        break;
    case 9:
    case 10:
    case 11:
        echo "<h2>Mùa thu</h2>";
        break;
    case 12:
    case 1:
    case 2:
        echo "<h2>Mùa đông</h2>";
        break;
}



// 5. Tính chiết khấu
// Yêu cầu: Viết chương trình PHP để tính chiết khấu cho đơn hàng dựa trên giá trị đơn hàng: <1000 không chiết khấu,
// từ 1000 đến 5000 chiết khấu 5%, trên 5000 chiết khấu 10%.

$giaDonHang = 1000;

if ($giaDonHang < 1000) {
    $chietKhau = 0;
} elseif ($giaDonHang >= 1000 && $giaDonHang <= 5000) {
    $chietKhau = 0.05;
} else {
    $chietKhau = 0.1;
}

echo "<h2>Chiết khấu cho đơn hàng có giá trị $giaDonHang là: $chietKhau%</h2>";


// 6. Tính phí giao hàng
// Yêu cầu: Viết chương trình PHP để tính phí giao hàng dựa vào trọng lượng của gói hàng. 
// Dưới 1kg là 5$, từ 1 đến 5kg là 10$, và trên 5kg là 15$.

$trongLuong = 1;

if ($trongLuong <= 0) {
    echo "<h2>Trọng lượng không hợp lệ </h2>";
} elseif ($trongLuong < 1) {
    $phiGiaoHang = 5;
} elseif ($trongLuong <= 5) {
    $phiGiaoHang = 10;
} else {
    $phiGiaoHang = 15;
}

echo "<h2>Phí giao hàng cho gói hàng có trọng lượng $trongLuong kg là: $phiGiaoHang$";


// 7. Loại hình tam giác
// Yêu cầu: Viết chương trình PHP để xác định một tam giác là tam giác đều, tam giác cân, 
// hay tam giác thường dựa vào độ dài của ba cạnh.

$canhA = 1;
$canhB = 2;
$canhC = 3;

if ($canhA <= 0 || $canhB <= 0 || $canhC <= 0) {
    echo "<h2>Không phải là tam giác</h2>";
} elseif ($canhA == $canhB && $canhB == $canhC) {
    echo "<h2>Tam giác đều</h2>";
} elseif ($canhA == $canhB || $canhB == $canhC || $canhA == $canhC) {
    echo "<h2>Tam giác cân</h2>";
} else {
    echo "<h2>Tam giác thường</h2>";
}



// 8. Tính thuế thu nhập cá nhân
// Yêu cầu: Viết chương trình PHP để tính thuế thu nhập cá nhân. Thu nhập dưới 5,000$ không chịu thuế,
//  từ 5,000$ đến 10,000$ chịu thuế 10%, và trên 10,000$ chịu thuế 20%.

$thuNhap = 4000;

if ($thuNhap < 5000) {
    $thue = 0;
} elseif ($thuNhap >= 5000 && $thuNhap <= 10000) {
    $thue = 0.1;
} else {
    $thue = 0.2;
}

echo "<h2>Thu nhập cá nhân của bạn là $thuNhap và phải chịu thuế $thue%</h2>";


// 9. Xác định ngày tiếp theo
// Yêu cầu: Viết chương trình PHP để xác định ngày tiếp theo của ngày 
// được nhập vào. Đầu vào là ngày, tháng, năm.


$ngayy = 11;
$thangg = 3;
$namm = 2024;

// xác định số ngày trong tháng
switch ($ngayy) {
    case 4:
    case 6:
    case 9:
    case 11:
        $soNgayTrongThang = 30;
        break;
    case 2:
        // kiểm tra năm nhuận
        // cách tính năm nhuận :
            // Năm nhuận là năm chia hết cho 4.
            // Trừ các năm chia hết cho 100, nhưng không chia hết cho 400. 
            // Những năm như vậy không phải là năm nhuận.
        if (($namm % 4 == 0 && $namm % 100 != 0) || $namm % 400 == 0) {
            $soNgayTrongThang = 29;
        } else {
            $soNgayTrongThang = 28;
        }
        break;
    default:
        $soNgayTrongThang = 31;
        break;
}

// xác định số ngày tiếp theo
if ($ngayy < $soNgayTrongThang) {
    $ngayy++;
} else {
    $ngayy = 1;
    if ($thangg < 12) {
        $thangg++;
    } else {
        $thangg = 1;
        $namm++;
    }
}

echo "<h2>Ngày tiếp theo là: $ngayy/$thangg/$namm</h2>";


// 10.Chuyển đổi giữa các đơn vị đo lường
// Yêu cầu: Viết chương trình PHP để chuyển đổi giữa các đơn vị đo lường: inch sang cm, foot sang meter,
// và ngược lại.

$doLon = 10;
$donVi = "inch"; // đơn vị chuyển đổi gồm : inch,cm,foot,meter

switch ($donVi) {
    case "inch":
        $ketQua = $doLon * 2.54; // 1inch = 2.54cm
        $donViKq = "cm";
        break;
    case "cm":
        $ketQua = $doLon / 2.54;
        $donViKq = "inch";
        break;
    case "foot":
        $ketQua = $doLon * 0.3048 ; // 1 foot = 0.3048 meter
        $donViKq = "meter";
        break;
    case "meter":
        $ketQua = $doLon / 0.3048;
        $donViKq = "foot";
        break;
    default:
        echo "<h2>Đơn vị không hợp lệ</h2>";
        break;
}

echo "<h2>Kết quả: $doLon $donVi = $ketQua $donViKq</h2>";






?>