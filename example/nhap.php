<?php
// Khởi tạo mảng người dùng
$users = [
    ['username' => 'admin@gmail.com', 'role' => 'admin', 'name' => 'Admin'],
    // Thêm người dùng mới ở đây
];

// Lấy danh sách người dùng
function getUsers($users) {
    foreach ($users as $user) {
        echo "Tên: " . $user['name'] . ", Username: " . $user['username'] . ", Vai trò: " . $user['role'] . "<br>";
    }
}

// Thêm người dùng mới
function addUser(&$users, $username, $role, $name) {
    array_push($users, ['username' => $username, 'role' => $role, 'name' => $name]);
}

// Xóa người dùng
function deleteUser(&$users, $username) {
    foreach ($users as $key => $user) {
        if ($user['username'] === $username) {
            unset($users[$key]);
        }
    }
}

// Cập nhật thông tin người dùng
function updateUser(&$users, $username, $newData) {
    foreach ($users as $key => &$user) {
        if ($user['username'] === $username) {
            $user = array_merge($user, $newData);
        }
    }
}

// Sắp xếp người dùng theo tên
function sortUsersByName(&$users) {
    usort($users, function ($a, $b) {
        return strcmp($a['name'], $b['name']);
    });
}

// Tìm kiếm người dùng theo username
function searchUserByUsername($users, $username) {
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null;
}

// Sử dụng form để thêm và cập nhật người dùng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý thêm mới người dùng
    if (isset($_POST['add'])) {
        addUser($users, $_POST['username'], $_POST['role'], $_POST['name']);
    }

    // Xử lý cập nhật thông tin người dùng
    if (isset($_POST['update'])) {
        updateUser($users, $_POST['username'], ['role' => $_POST['role'], 'name' => $_POST['name']]);
    }
}
?>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Role: <input type="text" name="role" required><br>
    Name: <input type="text" name="name" required><br>
    <input type="submit" name="add" value="Thêm Người Dùng">
    <input type="submit" name="update" value="Cập Nhật Người Dùng">
</form>
