<?php

require_once "../classes/product.php";

$img_url = "../img/".$_FILES['upload_file']['name'];
$tmp_name = $_FILES['upload_file']['tmp_name'];
//print_r($tmp_name);

$product_name = $_POST['product_name'];
$unit_price = $_POST['unit_price'];
$product_stock = $_POST['product_stock'];

$product = new Product;
$product->addProduct($img_url, $product_name, $unit_price, $product_stock,$tmp_name);