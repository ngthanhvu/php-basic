<?php
session_start();

// khởi tạo session

$_SESSION['username'] = 'thanhvu';
$_SESSION['role'] = 'admin';
$_SESSION['email'] = 'admin@mail.com';


session_destroy();

echo "<pr>";
print_r($_SESSION['username']);
echo "</pre>";

$_SESSION['role'] = 'user';

echo "<pr>";
print_r($_SESSION['role']);
echo "</pre>";

echo "<pr>";
print_r($_SESSION['email']);
echo "</pre>";

// xóa session

unset($_SESSION['username']);



?>