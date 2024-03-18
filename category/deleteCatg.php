<?php
require_once("../include/database.php");
$id=$_GET['id'];
$res=$db->prepare("delete from categorie where id=?");
$res->execute(array($id));
header('location:category.php');


?>
