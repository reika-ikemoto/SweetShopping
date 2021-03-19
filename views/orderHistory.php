
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Order History</title>
</head>

<body>

<?php
include "header.php";
?>

<?php
$user_id = $_GET['user_id'];

require_once "../classes/order.php";

$order = new Order;
$order_history = $order->displayOrderHistory($user_id);
//print_r($order_history);

?>
<br>
<br>
<div class="container w-50 mt-5">
    <h1 class="display-4">Order History</h1>
        <table class="table">
                <thead class="bg-dark text-white">
                    <th>OrderID</th>
                    <th>Date</th>
                    <th>($)Total</th>
                    <th>Detail</th>
                </thead>
                <tbody>
                <?php
                    while($order_details = $order_history->fetch_assoc()){
                        //print_r($order_details);
                ?>
                    <tr>
                        <td><p><?php echo $order_details['order_id'];?></p></td>
                        <td><p><?php echo $order_details['date'];?></p></td>
                        <td><p><?php echo $order_details['total'];?></p></td>
                        <td><a href="orderHistoryDetails.php?order_id=<?php echo $order_details['order_id'];?>&date=<?php echo $order_details['date'];?>&user_id=<?php echo $user_id;?>" class="btn btn-outline-warning btn-sm" role="button"><i class="fas fa-arrow-circle-right"></i></a></td>
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