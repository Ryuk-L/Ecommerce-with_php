
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");
if(isset($_POST['ajouter'])){
    if(empty($_POST['lib']) || empty($_POST['desc'])){
        ?>
        <div class="container">
                <div class="alert alert-danger" role="alert">
                fill in all required entry fields
                </div>
        </div>
        <?php 
    }
    else{
        
        $lib = $_POST['lib'];
        $desc = $_POST['desc'];
        $icon=$_POST['icon'];
        $date=date('y-m-d');
        //insertion des données dans la base de donnée
        $req = $db->prepare("INSERT INTO categorie(libelle, description,date,icon) VALUES(?,?,?,?)");
        if($req->execute(array($lib,$desc,$date,$icon))){
            ?>
                    <div class="container">
                <div class="alert alert-success" role="alert">
                add category  <?php print($lib);?> success
                </div>
        </div>
            <?php
        }}
    }


    ?>
   
<div class="container">
    <h4>add category</h4>
    <form action="" method="post">
    <label  class="form-label">libelle</label>
    <input type="text"  class="form-control" name="lib">
    <label  class="form-label">icon</label>
    <input type="text"  class="form-control" name="icon">
    <label">description</label>
    <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="desc"></textarea>
    <input type="submit" value="add" class="btn btn-outline-primary my-2" name="ajouter">
    </form>
</div>
    
</body>
</html>