<?php

require_once "../classes/product.php";

$product_id = $_GET['product_id'];

$product = new Product;
$product->deleteProduct($product_id);