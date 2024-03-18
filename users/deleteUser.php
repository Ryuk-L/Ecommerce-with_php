<?php
require_once("../include/database.php");
$id=$_GET['id'];
$res=$db->prepare("delete from utilisateur where id=?");
$res->execute(array($id));
header('location:user.php');
?>
