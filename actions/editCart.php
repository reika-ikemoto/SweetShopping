<?php

require_once "../classes/cart.php";

$cart_id = $_POST['cart_id'];
$quantity = $_POST['quantity'];
//print_r($quantity);

$cart = new Cart;
$cart->updateCart($cart_id, $quantity);
