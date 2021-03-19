<?php

require_once "../classes/product.php";

$product_id = $_POST['product_id'];

//$_FILES
$img_url = "../img/".$_FILES['upload_file']['name'];
$tmp_name = $_FILES['upload_file']['tmp_name'];

$product_name = $_POST['product_name'];
$product_stock = $_POST['product_stock'];
$unit_price = $_POST['unit_price'];

//print_r($img_url);

$product = new Product;
$product->updateProduct($product_id, $product_name, $unit_price, $product_stock, $img_url, $tmp_name);
