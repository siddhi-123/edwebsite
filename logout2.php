<?php
include 'edconfig.php';
session_start();
$tmp = $_SESSION['login'];
session_destroy();
session_start();
$_SESSION['success'] = 'Logged Out Succesfully';
$_SESSION['login'] = $tmp;
header('Location:adlogin.php');
return;
?>