<?php
session_start();
require_once("../include/database.php");
$res=$db->query("select * from categorie");
$nborder=1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php include("navbar.php");?>
</head>
<body>
    <div class="container py-4">
    <h4><i class="fa-solid fa-list"></i> category list </h4>

<ul class="list-group w-25" >
    <?php 
    while($ctg=$res->fetch()){
    ?>
        <li class="list-group-item">
            <a href="category.php?id=<?php print($ctg["id"]); ?>&nbo=1" class="btn btn-light"><i class="<?php echo $ctg['icon']; ?>"></i> <?php print($ctg["libelle"])?></a>
        </li>
    <?php
    }
    ?>
</ul>
</div>


</body>
</html>