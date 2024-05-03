<?php
session_start();
if (isset($_GET['username']) && !empty($_GET['username'])) {
    $usernameToDelete = $_GET['username'];
    if (isset($_SESSION['ds_users'])) {
        foreach ($_SESSION['ds_users'] as $key => $user) {
            if ($user['username'] == $usernameToDelete) {
                unset($_SESSION['ds_users'][$key]);
                $_SESSION['ds_users'] = array_values($_SESSION['ds_users']);
                break;
            }
        }
    }
    header("Location: user.php");
    exit();
}
?>

