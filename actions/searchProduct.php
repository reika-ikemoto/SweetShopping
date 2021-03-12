<?php

include_once "../classes/product.php";

$keyword = $_POST['keyword'];

$product = new Product;
$product->searchProduct($keyword);