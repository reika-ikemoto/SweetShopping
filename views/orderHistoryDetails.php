<?php

$user_id = $_GET['user_id'];
$date = $_GET['date'];
$order_id = $_GET['order_id'];
$pre_url = $_GET['pre_url'];
$page = $_GET['page'];
//print_r($pre_url);

require_once "../classes/order.php";
require_once "../classes/user.php";

$order = new Order;
$order_history_details = $order->displayOrderHistoryDetails($order_id);
//print_r($order_history_details);

$user = new User;
$user_detail = $user->getUser($user_id);
//print_r($user_detail);

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
<link rel="stylesheet" href="../assets/css/style.css">
<title>Title</title>
</head>

<body>

<?php
include "header.php";
?>

<br>
<br>
<br>
<div class="container w-50 mt-5">
    <?php
        if($pre_url == "admin"){
    ?>
        <a href="admin.php?page=<?php echo $page;?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> &nbsp;Back to Admin Page
    <?php
        }else{
    ?>
        <a href="orderHistory.php?user_id=<?php echo $user_id;?>&page=<?php echo $page;?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> &nbsp;Back to Order History
    <?php
        }
    ?>
        </a>
    <h1 class="display-4 mb-3">Order History Details</h1>
        <table class="table">
                <h3><?php echo $user_detail['user_name'];?> &nbsp;<?php echo $date;?></h3>
                <thead class="bg-dark text-white">
                    <th></th>
                    <th>product_name</th>
                    <th>Quantity</th>
                    <th>($)Unit Price</th>
                </thead>
                <tbody>
                <?php
                    while($order_details = $order_history_details->fetch_assoc()){
                    //print_r($order_details);
                ?>
                    <tr>
                        <td><img src="<?php echo "../img/".$order_details['img_url']; ?>" alt="<?php echo $order_details['img_url']; ?>" class="img-fluid"
                        width="90"></td>
                        <td><?php echo $order_details['product_name'];?></td>
                        <td><?php echo $order_details['quantity'];?></td>
                        <td><?php echo $order_details['unit_price'];?></td>
                    </tr>

                <?php
                    }
                ?>
                </tbody>
        </table>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>