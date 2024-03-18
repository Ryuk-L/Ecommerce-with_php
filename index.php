

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();    
include("include/navbar.php");
require_once("include/database.php");
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
        $req=$db->prepare("select * from admin where login=?");
        $req->execute(array($login));
        $tab=$req->fetchAll();
        if(count($tab)!=0){
            ?>
            <div class="container">
                <div class="alert alert-danger" role="alert">
                login exists
                </div>
            </div>
            <?php
        }
        else{
            $date=date('y-m-d');
            $req=$db->prepare("insert into admin(login,password,date) values(?,?,?)");
            
            if($req->execute(array($login,$pass,$date))){
                header("location:/ecommerce/include/connection.php");
            }
        }


    }
}


?>
<div class="container">
    <h4>add admin </h4>
    <form action="" method="post">
    <label  class="form-label">login</label>
    <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="login">
    <label  class="form-label">Password</label>
    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="pass">
    <!-- <button type="submit" class="btn btn-outline-primary my-2" name="ajouter">Primary</button> -->
    <input type="submit" value="add" class="btn btn-outline-primary my-2" name="ajouter">
    </form>
</div>
    
</body>
</html>