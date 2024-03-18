
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>command list </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php 
session_start();
include("../include/navbar.php");
require_once("../include/database.php");
$sql=$db->query("select * from commande");
$res=$sql->fetchAll();


?>   
<div class="container py-2">
    <h4>order list</h4>
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
            <td><a class="btn btn-primary" href="detailOrder.php?idOrder=<?php echo $row['id']; ?>">show details</a></td>       
        </tr>
            <?php } ?>
            
        </tbody>
    </table>


    

    
</body>
</html>