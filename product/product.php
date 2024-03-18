
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category list </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");

?>   
<div class="container py-2">
    <h4>product list</h4>
    
<table class="table table-hover">
    <thead>
        <tr>
            <th>#id</th>
            <th>libelle</th>
            <th>prix</th>
            <th>discount</th>
            <th>#id_category</th>
            <th>date </th>
            <th>operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM produit";
        $resultat=$db->query($sql);
        while($ligne=$resultat->fetch()){
            ?>
            <tr>
                <td><?php echo $ligne['id']; ?></td>
                <td><?php echo $ligne['libelle']; ?></td>
                <td><?php echo $ligne['prix']; ?></td>
                <td><?php echo $ligne['discount']; ?></td>
                <td><?php echo $ligne['id_c']; ?></td>
                <td><?php echo $ligne['date']; ?></td>
                <td>
                    <a href="modifyProduct.php?id=<?php echo $ligne['id']; ?>" class="btn btn-outline-primary">modify</a>
                    <a href="deleteProduct.php?id=<?php echo $ligne['id']; ?>" class="btn btn-outline-danger" 
                    onclick="return confirm('delete this product ?')">delete</a>
                </td>
            </tr>
            <?php
        }
        ?>  
    </tbody>

</table>
<a href="addProduct.php" class="btn btn-primary">add product</a>
</div>
    
</body>
</html>