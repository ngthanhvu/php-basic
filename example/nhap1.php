<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng và sản phẩm</title>
</head>
<body>

<ul>
    <li><a href="#user-management">Quản lý người dùng</a></li>
    <li><a href="#product-management">Quản lý sản phẩm</a></li>
</ul>

<h2 id="user-management">Quản lý người dùng</h2>

### 1.1 Lấy danh sách người dùng

<table>
    <tr>
        <th>Tên đăng nhập</th>
        <th>Vai trò</th>
        <th>Tên</th>
    </tr>
    <?php
    $users = [
        [
            'username' => 'admin@gmail.com',
            'role' => 'admin',
            'name' => 'admin',
        ],
        [
            'username' => 'user@gmail.com',
            'role' => 'user',
            'name' => 'John Doe',
        ],
    ];

    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['role'] . "</td>";
        echo "<td>" . $user['name'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

### 1.2 Thêm mới người dùng

<form action="add_user.php" method="post">
    <label for="username">Tên đăng nhập:</label>
    <input type="text" id="username" name="username" required>
    <br>

    <label for="role">Vai trò:</label>
    <select id="role" name="role" required>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <br>

    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <br>
    <button type="submit">Thêm mới</button>
</form>

### 1.3 Xóa người dùng

<form action="delete_user.php" method="post">
    <label for="username">Chọn username để xóa:</label>
    <select id="username" name="username" required>
        <?php
        $users = [
            [
                'username' => 'admin@gmail.com',
                'role' => 'admin',
                'name' => 'admin',
            ],
            [
                'username' => 'user@gmail.com',
                'role' => 'user',
                'name' => 'John Doe',
            ],
        ];

        foreach ($users as $user) {
            echo "<option value='" . $user['username'] . "'>" . $user['username'] . "</option>";
        }
        ?>
    </select>
    <br>

    <br>
    <button type="submit">Xóa</button>
</form>

### 1.4 Cập nhật thông tin người dùng

<form action="update_user.php" method="post">
    <label for="username">Chọn username để cập nhật:</label>
    <select id="username" name="username" required>
        <?php
        $users = [
            [
                'username' => 'admin@gmail.com',
                'role' => 'admin',
                'name' => 'admin',
            ],
            [
                'username' => 'user@gmail.com',
                'role' => 'user',
                'name' => 'John Doe',
            ],
        ];

        foreach ($users as $user) {
            echo "<option value='" . $user['username'] . "'>" . $user['username'] . "</option>";
        }
        ?>
    </select>
    <br>

    <label for="role">Vai trò mới:</label>
    <select id
