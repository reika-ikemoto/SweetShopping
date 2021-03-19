<?php

require_once "../classes/product.php";
$product = new Product;

require_once "../classes/cart.php";
$cart = new Cart;

$customer_id = $_SESSION['user_id'];
//print_r($customer_id);

//$cart->getCart($);
//$product = editProductStock();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Order Complete</title>
</head>

<body>

<?php
include "header.php";
?>

<style>
h3.display-4{ 
    font-size: 40px;
}
</style>

<br>
<br>

<div class="container w-75">
    <div class="form-row justify-content-center">
        <img src="../img/Thankyou.png" alt="Thankyou Image" class="img-fluid" width="400" height="400">
    </div>
    <div class="form-row justify-content-center">
        <h3 class="display-4">Please come again!</h3>
    </div>
    <div class="form-row justify-content-center">
        <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to TOP Page</a>
    </div>
    
</div>
</div>

<?php

$cart->truncateCart($customer_id);

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>