<?php

include_once "../classes/order.php";

$customer_id = $_POST['customer_id'];
$delivery_fee = $_POST['delivery_fee'];
$gift_fee = $_POST['gift_fee'];
$discount = $_POST['discount'];
$total_price = $_POST['total_price'];
$date =  date("Y-m-d H:i:s");

//echo $products;

$order = new order;
//Final Result
$order->registOrders($customer_id, $delivery_fee, $gift_fee, $discount, $total_price, $date);

