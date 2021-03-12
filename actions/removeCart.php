<?php

require_once "../classes/cart.php";

$cart_id = $_GET['cart_id'];

$cart = new Cart;
$cart->deleteCart($cart_id);