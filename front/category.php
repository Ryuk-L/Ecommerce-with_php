<?php
require_once("../include/database.php");

$id=$_GET['id'];
$nbOrd=$_GET['nbo'];

$res=$db->prepare("select * from categorie where id =?");
$res->execute(array($id));
$row=$res->fetch();

if($nbOrd==1){
    $res2=$db->prepare("select * from produit where id_c =? order by libelle ");
    $res2->execute(array($row["id"]));
    $row2=$res2->fetchAll();
}
elseif($nbOrd==2){
    $res2=$db->prepare("select * from produit where id_c =? order by libelle desc ");
    $res2->execute(array($row["id"]));
    $row2=$res2->fetchAll();
}
elseif($nbOrd==3){
    $res2=$db->prepare("SELECT * FROM produit WHERE id_c = ? ORDER BY (prix - prix * (discount / 100)) ASC;");
    $res2->execute(array($row["id"]));
    $row2=$res2->fetchAll();
}
elseif($nbOrd==4){
    $res2=$db->prepare("SELECT * FROM produit WHERE id_c = ? ORDER BY (prix - prix * (discount / 100)) DESc");
    $res2->execute(array($row["id"]));
    $row2=$res2->fetchAll();
}
else{
    $res2=$db->prepare("select * from produit where id_c =? order by date ");
    $res2->execute(array($row["id"]));
    $row2=$res2->fetchAll();   
}

$nbProduct=sizeof($row2);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<?php
session_start(); 





include("navbar.php");?>
<div class="container">
<table class="table table-hover">
    <thead>
        <tr>    
            <td><h4>there are  <?php print($nbProduct)?>  product  <?php print($row["libelle"])?></h4>  </td>
            <td>
            <div class="btn-group">
            <button type="button" class="btn btn-warning">order by</button>
            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="category.php?id=<?php print($id); ?>&nbo=1">name (A -> z)</a></li>
    <li><a class="dropdown-item" href="category.php?id=<?php print($id); ?>&nbo=2">name (z -> A)</a></li>
    <li><a class="dropdown-item" href="category.php?id=<?php print($id); ?>&nbo=3">prix (ascending )</a></li>
    <li><a class="dropdown-item" href="category.php?id=<?php print($id); ?>&nbo=4">prix (decreasing)</a></li>
    <li><a class="dropdown-item" href="category.php?id=<?php print($id); ?>&nbo=5">date product</a></li>

  </ul>
</div>
            </td>
        </tr>
    </thead>
</table>
</div>
    <div class="container py-4" >
    <h4><i class="<?php echo $row['icon']; ?>"></i> <?php print($row["libelle"])?> list </h4>
    <?php 
    foreach($row2 as $p){
        ?>   
        <div class="row" >
            <div class="card mb-3 col-md-4  ">
                <img src="../upload/product/<?php print($p["image"])?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><h2><?php print($p["libelle"])?></h2></h5>
                <?php
                if($p["discount"]!=null)
                {
                   ?> <h5 class="card-text"><del style="color: red;"><?php print($p["prix"])?> dt</del> 
                <?php print( $p["prix"] -($p["prix"]*( $p["discount"])/100) )?> dt
                </h5> <?php
                }
                else{
                    ?> <h5 class="card-text"><h5><?php print($p["prix"])?> dt</h5> <?php
                }
                ?>
                
                <p class="card-text"><?php print($p["description"])?> </p>
                <p class="card-text"><small class="text-body-secondary"> add :<?php print($p["date"])?></small></p>
                <div class="d-grid gap-2">
                <a class="btn btn-outline-success" href="addToCart.php?idP=<?php print($p["id"])?>">add to cart</a>
                </div>
            </div>
        </div>
    </div>
        
        <?php 
    }
    ?>
    
</body>
</html>