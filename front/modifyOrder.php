<?php 
session_start();
require_once("../include/database.php");

$id=$_GET['id'];
if(isset($_POST["qtP"])){
    $qtP=$_POST["qtP"];
    if($qtP>0){
        $_SESSION["cart"]['user'][$id]=$qtP;
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>