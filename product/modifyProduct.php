
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");
$id=$_GET["id"];
$req=$db->prepare("select * from produit where id=?");
$req->execute([$id]);
$p=$req->fetch();


$disc=0;
if(isset($_POST["ajouter"])){
    if(empty($_POST["lib"]) ||empty( $_POST["prix"]) ||empty($_POST["catg"]) ||  empty($_POST["desc"]) ){
        ?>
        <div class="container">
                <div class="alert alert-danger" role="alert">
                fill in all required entry fields
                </div>
        </div>
        <?php 
    }
    else{

        //partie update description w image mazelt 

        $nom=$_POST['lib'];
        $prix=$_POST['prix'];
        if(empty($_POST["disc"])) $disc=0;
        else $disc=$_POST['disc'];
        
        $catg=$_POST['catg'];
        $desc=$_POST['desc'];
    
        $date=date("y-m-d");
        $req = $db->prepare("UPDATE  produit SET libelle=?, prix=?,discount=? ,id_c=? where id=? ");
        if($req->execute(array($nom,$prix,$disc,$catg,$id))){
            ?>
                    <div class="container">
                <div class="alert alert-success" role="alert">
                update product  <?php print($nom);?> success
                </div>
        </div>

    
            <?php

        }
    }
}

    ?>
   
<div class="container">
    <h4>modify product </h4>
    <form action="" method="post" enctype="multipart/form-data">
    <label  class="form-label">libelle</label>
    <input type="text"  class="form-control"  name="lib" value="<?php echo($p["libelle"]) ?>">
    <label  class="form-label">prix</label>
    <input type="number"  class="form-control"  name="prix" min="0" value="<?php echo($p["prix"])?>">
    <label  class="form-label">discount</label>
    <input type="number"  class="form-control"  name="disc" min="0" max="100" value="<?php echo($p["discount"])?>">
    <label">description</label>
    <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="desc"><?php echo($p["description"])?></textarea>
    <label  class="form-label">category</label> 
    <select  class="form-select form-select-sm" aria-label="Small select example" name="catg">
        <?php
        $req = "SELECT * FROM categorie";
        $res = $db->query($req);
        while($row = $res->fetch()){
            echo "<option value='".$row['id']."'>".$row['libelle']."</option>";
        }
        ?>
        <option selected value="0">Open this select menu</option>
    </select>
    <input type="submit" value="update" class="btn btn-outline-primary my-2" name="ajouter">
    </form>
</div>
    
</body>
</html>