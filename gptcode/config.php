<?php
define('HOST', 'localhost');
define('DB_NAME', 'gptcode'); // tên database
define('USERNAME', 'root');
define('PASSWORD', '');
$connection = NULL;
try {
     $url = "mysql:host=" .HOST . ";dbname=" .DB_NAME . "";
     $connection = new PDO($url, USERNAME, PASSWORD);
     echo "Connected successfully";
   } catch(\Exception $e) {
     echo "Connection failed: " . $e->getMessage();
   }
?>

