
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order detail </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");
$idOrder=$_GET["idOrder"];
$sql=$db->prepare("select * from commande where id=?");
$sql->execute([$idOrder]);
$res=$sql->fetchAll();


?>   
<div class="container py-2">
    <h4>order detail </h4>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">order id </th>
      <th scope="col">user id </th> 
      <th scope="col">user name</th>
      <th scope="col">prix</th>
      <th>date</th>
      <th>satus</th>
      <th>operation</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php foreach($res as $row){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['id_client']; ?></td>

            <?php 
            $sql=$db->prepare("select * from utilisateur where id=? ");
            $sql->execute(array($row["id_client"]));
            $user = $sql->fetch() ;
            ?>

            <td><?php echo $user["login"]?></td>
            <td><?php echo $row['total']; ?> dt</td>
            <td><?php echo $row['date_creation']; ?></td>
            <td>
                <?php if ($row['valide']==1){ ?>
                    <span style="color: green; font-weight: bold;" >Valid <i class="fa-solid fa-check"></i></span> 
                    <?php }elseif($row['valide']==0) { ?>
                        <span style="color: red; font-weight: bold;">invalid <i class="fa-sharp fa-solid fa-xmark"></i></span>
                    <?php } ?>
            </td> 
            <td>
            <?php if ($row['valide']==1){ ?>
                    <a href="updateOrder.php?valide=0&idOrder=<?php echo $row['id']; ?>" class="btn btn-danger">cancel order</a>
                    <?php }elseif($row['valide']==0) { ?>
                        <a href="updateOrder.php?valide=1&idOrder=<?php echo $row['id']; ?>" class="btn btn-success">valid order</a>
                        <?php } ?>
            </td>           
        </tr>
            <?php } ?>
            
        </tbody>
    </table>
    </div> 


    <div class="container py-2">
    <h4>product list</h4>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th># order </th>
                <th># product </th>
                <th>prix</th>
                <th>quantite</th>
                <th>total </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql =$db->prepare ("SELECT * FROM ligne_commande where 	id_commande=? ");
            $sql->execute([$idOrder]);
        
            while($ligne=$sql->fetch()){
                ?>
                <tr>
                    <td><?php echo $ligne['id_commande']; ?></td>
                    <td><?php echo $ligne['id_produit']; ?></td>
                    <td><?php echo $ligne['prix']; ?> dt</td>
                    <td><?php echo $ligne['quantite']; ?></td>
                    <td><?php echo $ligne['total']; ?></td>
    
                </tr>
                <?php
            }
            ?>  
        </tbody>

    </table>
    <h4><a style="text-decoration: none; " href="order.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> return</a> </h4>
</div>
    

    
</body>
</html>