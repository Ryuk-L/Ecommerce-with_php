<?php 
session_start();
require_once("../include/database.php");
$id=$_GET["id"];
unset($_SESSION['cart']['user'][$id]);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>