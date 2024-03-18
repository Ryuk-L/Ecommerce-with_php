<?php 
$connect = false;
if (isset($_SESSION['user'])) {
    $connect = true;
}

if (!isset($_SESSION['cart']['user'])) {
    $_SESSION['cart']['user']= [];
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="" style="color: blue;">| 4matic |</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-list-ul"></i> Category List</a>
                </li>
                <?php if (!$connect) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="signUp.php"><i class="fa-solid fa-plus"></i> Create Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="signIn.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> login</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="disconnection.php"><i class="fa-solid fa-right-from-bracket"></i> Disconnection</a>
                    </li>
                <?php } ?>
            </ul>

          </div>
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="shopping_cart.php">
                  (<?php print(count($_SESSION['cart']['user']));?> ) <i class="fas fa-shopping-cart"></i> Shopping Cart
                  </a>
              </li>
          </ul>
    </div>
</nav>
