<?php

include_once "../classes/order.php";
include_once "../classes/product.php";

$customer_id = $_POST['customer_id'];
$delivery_fee = $_POST['delivery_fee'];
$gift_fee = $_POST['gift_fee'];
$discount = $_POST['discount'];
$total_price = $_POST['total_price'];
$date =  date("Y-m-d H:i:s");

$product = new Product;
$result = $product->calculateProductStock($customer_id);
print_r($result);

$order = new order;
//Final Result
$order->registOrders($customer_id, $delivery_fee, $gift_fee, $discount, $total_price, $date);