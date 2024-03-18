<?php
$valide=$_GET["valide"];
$idOrder=$_GET["idOrder"];
echo $valide;
require_once("../include/database.php");

$req=$db->prepare("update commande set valide=?  where id=?");
$req->execute(array($valide,$idOrder));
header('Location: ' . $_SERVER['HTTP_REFERER']);



?>