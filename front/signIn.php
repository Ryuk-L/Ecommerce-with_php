
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
include("navbar.php");
require_once("../include/database.php");
if(isset($_POST['ajouter'])){
    if(empty($_POST['login']) || empty($_POST['pass'])){
        ?>
        <div class="container">
                <div class="alert alert-danger" role="alert">
                fill in all required entry fields
                </div>
        </div>
        <?php 
    }
    else{
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $req=$db->prepare("select * from utilisateur where login=? and password=?");
        $req->execute(array($login,$pass));
        $test=$req;
        
        if($req->rowCount()!=0){
            
            $_SESSION['user']=$req->fetch();
            var_dump($_SESSION['user']);
            header("location:index.php");
        }
        else{
            ?>
            <div class="container">
                <div class="alert alert-danger" role="alert">
                password or login incorrectes
                </div>
            </div>
            <?php
            
        }


    }
}


?>
<div class="container">
    <h4>connexion</h4>
    <form action="" method="post">
    <label  class="form-label">login</label>
    <input type="text" class="form-control" aria-describedby="passwordHelpBlock" name="login">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" aria-describedby="passwordHelpBlock" name="pass">
    <input type="submit" value="submit" class="btn btn-outline-primary my-2" name="ajouter">
    </form>
</div>
    
</body>
</html>