<?php
require_once("../include/database.php");
session_start();

$sum=$_GET['sum'];
$user=$_SESSION['user']['id'];
$sqlCommande = $db->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
$sqlCommande->execute([$user, $sum]);
$idCommande = $db->lastInsertId();
foreach($_SESSION['cart']['user'] as $idP =>$qtP ){
    $sqlLCommande = $db->prepare('INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total) VALUES(?,?,?,?,?)');
    $req=$db->prepare("select * from produit where id=?");
    $req->execute([$idP]);
    $product=$req->fetch();
    $sqlLCommande->execute(array($product['id'],$idCommande,$product["prix"] -($product["prix"]*( $product["discount"])/100),$qtP,$sum));
}

$_SESSION['cart']['user']=[];
unset($_SESSION['cart']['user']);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>