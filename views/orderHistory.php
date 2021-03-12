<?php
$user_id = $_GET['user_id'];
//print_r($cart_id);

require_once "../classes/order.php";

$order = new Order;
$order_history = $order->displayOrderHistory($user_id);
//print_r($order_history);

$order_history1 = $order->displayOrderHistory1($user_id)

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
<link rel="stylesheet" href="assets/css/style.css">
<title>Order History</title>
</head>
<body>
<div class="container w-50 mt-3">
    <h1 class="display-4">Order History</h1>
        <table class="table">
                <thead class="bg-dark text-white">
                    <th>OrderID</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Detail</th>
                </thead>
                <tbody>
                <?php
                    //while($order_details1 = $order_history1->fetch_assoc()){
                ?>
                        <!--<img src="<?php //echo $order_details1['img_url']; ?>" alt="<?php //echo $order_details1['img_url']; ?>" class="img-fluid">-->
                <?php
                        //print_r($order_details1);
                    //}

                    while($order_details = $order_history->fetch_assoc()){


                        print_r($order_details);
                ?>
                    <tr>
                        <td><p><?php echo $order_details['order_id'];?></p></td>
                        <td><p><?php echo $order_details['date'];?></p></td>
                        <td><p><?php echo $order_details['total'];?></p></td>
                        <th><button class="form-control bnt btn-warning text-white">Details</button></th>
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