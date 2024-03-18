<?php
try {
    $db= new PDO("mysql:host=localhost;dbname=ecommerce","root","");
} catch (PDOException $e) {
    print($e->getMessage());
}
?>

