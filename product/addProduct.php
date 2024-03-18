
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");
if(isset($_POST["ajouter"])){
    if(empty($_POST["lib"]) ||empty( $_POST["prix"]) ||empty($_POST["catg"])||empty($_POST["disc"]) ){
        ?>
        <div class="container">
                <div class="alert alert-danger" role="alert">
                fill in all required entry fields
                </div>
        </div>
        <?php 
    }
    else{
        $nom=$_POST['lib'];
        $prix=$_POST['prix'];
        $disc=$_POST['disc'];
        $desc=$_POST['desc'];
        $catg=$_POST['catg'];
        $img="";
        if(isset($_FILES['img'])){
            $img=$_FILES['img']['name'];
            $fileName=uniqid().$img;
            move_uploaded_file($_FILES['img']['tmp_name'],'../upload/product/'.$fileName);

        }
        $date=date("y-m-d");
        $req = $db->prepare("INSERT INTO produit(libelle, prix,discount , date,id_c,description,image) VALUES(?,?,?,?,?,?,?)");
        if($req->execute(array($nom,$prix,$disc,$date,$catg,$desc,$fileName))){
            ?>
                    <div class="container">
                <div class="alert alert-success" role="alert">
                add product  <?php print($nom);?> success
                </div>
        </div>
            <?php
        }



    }
    
}

    ?>
   
<div class="container">
    <h4>add product </h4>
    <form action="" method="post" enctype="multipart/form-data">
    <label  class="form-label">libelle</label>
    <input type="text"  class="form-control"  name="lib">
    <label  class="form-label">prix</label>
    <input type="number"  class="form-control"  name="prix" min="0">
    <label class="form-label">description</label>
    <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="desc"></textarea>
    <label  class="form-label">discount</label>
    <input type="number"  class="form-control"  name="disc" min="0" max="100">
    <label  class="form-label">image</label>
    <input type="file"  class="form-control"  name="img">
    <label  class="form-label">category</label> 
    <select  class="form-select form-select-sm" aria-label="Small select example" name="catg">
        <?php
        $req = "SELECT * FROM categorie";
        $res = $db->query($req);
        while($row = $res->fetch()){
            echo "<option value='".$row['id']."'>".$row['libelle']."</option>";
        }
        ?>
        <option selected>Open this select menu</option>
    </select>
    <input type="submit" value="add" class="btn btn-outline-primary my-2" name="ajouter">
    </form>
</div>
    
</body>
</html>