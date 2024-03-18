
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");
$id=$_GET["id"];
$req=$db->prepare("select * from categorie where id=?");
$req->execute([$id]);
$p=$req->fetch();

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
        $req = $db->prepare("UPDATE  categorie SET libelle=?, description=? where id=? ");
        if($req->execute(array($lib,$desc,$id))){
            ?>
                    <div class="container">
                <div class="alert alert-success" role="alert">
                update category  <?php print($lib);?> success
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
    <input type="text"  class="form-control" aria-describedby="passwordHelpBlock" name="lib" value="<?php echo($p["libelle"]) ?>">
    <label  class="form-label">icon</label>
    <input type="text"  class="form-control" name="icon"  value="<?php echo($p["icon"]) ?>">
    <label">description</label>
    <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="desc" ><?php echo($p["description"]) ?></textarea>
    <input type="submit" value="update" class="btn btn-outline-primary my-2" name="ajouter">
    </form>
</div>
    
</body>
</html>