<title>LAB 3</title>
<style>
     * {
          font-family: monospace;
     }
</style>
<?php

$nguoidung = array(
     array(
          'username' => 'admin@gmail.com',
          'role' => 'admin',
          'name' => 'Admin',
     ),
     array(
          'username' => 'user@gmail.com',
          'role' => 'user',
          'name' => 'John',
     ),
     array(
          'username' => 'user@gmail.com',
          'role' => 'user',
          'name' => 'Alice',
     ),
);
# xuất thông tin
echo "<h3>Câu 1: Lấy danh sách người dùng:</h3>";
echo "<pre>";
var_dump($nguoidung);
echo "</pre>";

# thêm người dùng
$nguoidungmoi = array(
     'username' => 'user1@gmail.com',
     'role' => 'user',
     'name' => 'Bob',
);
array_push($nguoidung, $nguoidungmoi);
# xuất thông tin
echo "<h3>Câu 2: Thêm mới người dùng:</h3>";
echo "<pre>";
var_dump($nguoidung);
echo "</pre>";

# xóa người dùng
array_pop($nguoidung);
# xuất thông tin
echo "<h3>Câu 3: Xóa người dùng:</h3>";
echo "<pre>";
var_dump($nguoidung);
echo "</pre>";


# Cập nhật thông tin:
$nguoidung['username'] = 'newuser@gmail.com';
$nguoidung['role'] = 'user';
$nguoidung['name'] = 'Oggy';
# xuất thông tin
echo "<h3>Câu 4: Cập nhật thông tin:</h3>";
echo "<pre>";
var_dump($nguoidung);
echo "</pre>";

echo "<h3>Câu 5: Sắp xếp người dùng theo tên:</h3>";
$user = array(
     array(
          'username' => 'admin@gmail.com',
          'role' => 'admin',
          'name' => 'Admin',
     ),
     array(
          'username' => 'user@gmail.com',
          'role' => 'user',
          'name' => 'John',
     ),
     array(
          'username' => 'user@gmail.com',
          'role' => 'user',
          'name' => 'Alice',
     ),
);
// Hàm so sánh tên
function sapxepnguoidung($a, $b) {
     return strcmp($a['name'], $b['name']); // hàm strcpm() dùng để so sánh hai chuỗi
}
// Sắp xếp mảng $users dựa trên tên
usort($user, 'sapxepnguoidung'); // hàm usort() dùng để dùng để sắp xếp các phần tử trong một mảng theo thứ tự do người dùng định nghĩa.
// in ra 
foreach ($user as $users) {
     echo "Username: " . $users["name"] . "<br>";
     echo "Role: " . $users["username"] . "<br>";
     echo "Name: " . $users["role"] . "<br>";
     echo "<br>";
}

echo "<h3>Câu 6: Tìm kiếm người dùng theo username:</h3>";

// tìm kiếm người dùng
$timkiemuser = 'user@gmail.com';
$nguoidungtimkiem = "";

foreach ($nguoidung as $userss) {
     if ($userss['username'] === $timkiemuser) {
          $nguoidungtimkiem = $userss;
          break;
     }
}

if ($nguoidungtimkiem) {
     echo "Name: " . $nguoidungtimkiem["name"] . "<br>";
     echo "Role: " . $nguoidungtimkiem["role"] . "<br>";
     echo "Email: " . $nguoidungtimkiem["username"] . "<br>";
 } else {
     echo "Không tìm thấy người dùng với username " . $timkiemuser;
 }





?>