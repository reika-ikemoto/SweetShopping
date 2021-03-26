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
<title>Order History</title>
</head>

<body>

<?php
include "header.php";
?>

<?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        //print_r($page);

        //Page Start Position
        if($page > 1){
            $start = ($page * 5 ) - 5;
        }else{
            $start = 0;
        }
        //print_r($start);
?>

<?php
$user_id = $_GET['user_id'];

require_once "../classes/order.php";

$order = new Order;
$order_history = $order->displayOrderHistory($user_id, $start);
$num_rows = $order->getUsersNumOfRows($user_id);
//print_r($order_history);
//print_r($num_rows);

?>

<br>
<br>
<br>
<div class="container w-50 mt-5">
    <h1 class="display-4">Order History</h1>
        <?php
            if($order_history->num_rows == 0){
        ?>
            <h3 class="display-4" style="color:gray; font-weight:bold;">There is no data</h3>
        <?php
            }else{
        ?>

        <table class="table">
                <thead class="bg-dark text-white">
                    <th>OrderID</th>
                    <th>Date</th>
                    <th>($)Total</th>
                    <th>Details</th>
                </thead>
                <tbody>
                <?php
                    while($order_details = $order_history->fetch_assoc()){
                        //print_r($order_details);
                ?>
                    <tr>
                        <td><p><?php echo $order_details['order_id'];?></p></td>
                        <td><p><?php echo $order_details['date'];?></p></td>
                        <td><p><?php echo "$ ".$order_details['total'];?></p></td>
                        <td>
                            <a href="orderHistoryDetails.php?order_id=<?php echo $order_details['order_id'];?>&date=<?php echo $order_details['date'];?>
                            &user_id=<?php echo $user_id;?>&pre_url=<?php echo "order_history";?>&page=<?php echo $page;?>" 
                            class="btn btn-outline-warning btn-sm" role="button">
                            <i class="fas fa-arrow-circle-right"></i></a></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
        </table>

        <!--Pagenation-->
        <nav aria-label="">
        <ul class="pagination" style="position: fixed; top: 570px; left:580px;">
            <!--Previous Page-->
            <li class="page-item">
                <?php
                if($page > 1){
                ?>
                    <a class="page-link" href="?user_id=<?php echo $user_id;?>&page=<?php echo $page -1;?>">Previous</a>
                <?php
                }else{
                ?>
                    <a class="page-link">Previous</a>
                <?php
                }
                ?> 
            </li>

            <?php
                //print_r($page);
                for($i=1; $i <= $num_rows; $i++){

                    if($i == $_GET['page']){
            ?>
                    
                    <li class="page-item active">
                        <a href="?user_id=<?php echo $user_id;?>&page=<?php echo $i;?>" class="page-link">
                        <?php echo $i;?>
                        </a>
                    </span>
                    </li>
            <?php
                    }else{
            ?>
                    <li class="page-item">
                        <a href="?user_id=<?php echo $user_id;?>&page=<?php echo $i;?>" class="page-link">
                        <?php echo $i;?>
                        </a>
                    </li>
            <?php
                    }
                }
            ?>

            <!--Previous Page-->
            <li class="page-item">
                <?php
                if($page < $num_rows){
                ?>
                    <a class="page-link" href="?user_id=<?php echo $user_id;?>&page=<?php echo $page +1;?>">Next</a>
                <?php
                }else{
                ?>
                    <a class="page-link">Next</a>
                <?php
                }
                ?> 
            </li>
        </ul>
        </nav>
    <?php
        }
    ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>