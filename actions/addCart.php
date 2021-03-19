<?php

session_start();

require_once "../classes/cart.php";

$customer_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];

//print_r($quantity);
//echo "cid: $customer_id", "pid: $product_id", "q: $quantity";
//echo $customer_id, $product_id, $quantity;

$cart = new Cart;
$cart->addCart($customer_id, $product_id, $quantity, $unit_price);