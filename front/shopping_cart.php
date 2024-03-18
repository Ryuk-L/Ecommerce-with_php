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
require_once("../include/database.php");
if(isset($_POST['modify'])){
    header("locaton:index.php");
}







include("navbar.php");?>
<?php if(count($_SESSION['cart']['user']) >0){?>
    <div class="container">
    <h3>shopping cart</h3>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>#id</th>
            <th>libelle</th>
            <th>image</th>
            <th>quantity</th>
            <th>prix</th>
            <th>total</th>
            <th>operation</th>
        </tr>
    </thead>  
    <tbody>
        <tr>
            <?php 
    $sumPrix=0;
    
    foreach($_SESSION['cart']['user'] as $idP =>$qtP ){
        $req=$db->prepare("select * from produit where id=?");
        $req->execute([$idP]);
        $product=$req->fetch();
        ?>

<td><?php echo $product['id']; ?></td>
<td><?php echo $product['libelle']; ?></td>
<td><img width="100px" src="../upload/product/<?php print($product["image"])?>" alt="..."></td>
<td>
    <form method="post" action="modifyOrder.php?id=<?php echo $product['id']; ?>"> 
        <input type="text" maxlength="2" size="1" min="1" max="10" value="<?php print($qtP) ?>" name="qtP">
        <input type="submit" class="btn btn-primary" value="modify">
    </form>
</td>

<td><?php echo $product["prix"] -($product["prix"]*( $product["discount"])/100); ?> dt</td>
<?php  $sumPrix+=($product["prix"] -($product["prix"]*( $product["discount"])/100) )*$qtP; ?>
<td><?php echo  ($product["prix"] -($product["prix"]*( $product["discount"])/100) )*$qtP; ?> dt</td>
<td>
    <a href="deleteOrder.php?id=<?php echo $product['id']; ?>" class="btn btn-danger"  onclick="return confirm('delete this product ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>  
</td>
</tr>   
<?php
}
?>


</tbody>
</table>
<div class="alert alert-success" role="alert">
 <h5> total prix : <?php echo  $sumPrix ?> dt </h5>
 <div>
 <h5>validate your order here </h5>
 <form action="addComande.php?sum=<?php echo  $sumPrix ?>" method="post">
    <input type="submit" value="valide " name="valide" class="btn btn-success">
 </form>
 </div>
</div>
</div>  
    
<?php }
else{
    ?>
    <div class="container">
    <div class="alert alert-warning" role="alert">
    Your shopping cart is empty <a href="index.php" class="alert-link">category list</a>. Give it a click if you like.
    </div>
    </div>
<?php 
}
?>

</body>
</html>