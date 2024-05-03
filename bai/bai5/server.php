<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $error = [];
     if (isset($_POST['user'])) {
          if (empty($_POST['user'])) {
               array_push($error, "user not required");
          }
     }
     if (isset($_POST['password'])) {
          if (empty($_POST['password'])) {
               array_push($error, "password not required");
          }
     }
     var_dump($error);
}

echo "<pre>";
var_dump($_POST);
echo "</pre>";
