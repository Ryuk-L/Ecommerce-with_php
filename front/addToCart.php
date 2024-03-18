<?php
require_once("../include/database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front</title>

</head>
<body>
<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: signIn.php');
}
else{

    $idP=$_GET['idP'];
    $_SESSION['cart']['user'][$idP]=1;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>

    
</body>
</html>