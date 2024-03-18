<?php 
$connect=false;
if(isset($_SESSION['admin'])){
  $connect=true;
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="" style="color: blue;">| 4matic |</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ecommerce/index.php">add admin</a>
        </li>

        <?php 
        if($connect){
          ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/ecommerce/users/user.php">user list</a>
          </li> 
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ecommerce/product/addProduct.php">add product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/ecommerce/category/addCatg.php">add category</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/ecommerce/category/category.php">category list</a>
          </li> 
      
         <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/ecommerce/product/product.php">product list</a>
          </li>
      
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ecommerce/order/order.php">order list</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ecommerce/include/disconnection.php">disconnection</a>
        </li> 
      <?php
        }
        else{
          ?>
<li class="nav-item">
  <a class="nav-link" href="/ecommerce/include/connection.php">connection</a>
</li>
<?php
        }
        
        ?>
      </ul>
    </div>
  </div>
</nav>