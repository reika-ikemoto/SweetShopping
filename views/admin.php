
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
<title>Admin</title>
</head>

<body>

<?php
include "header.php";
?>

<?php

//Sweets List
require_once "../classes/product.php";
$product = new Product;
$products = $product->getProducts();
//print_r($products);

//Users List
require_once "../classes/user.php";
$user = new User;
$users = $user->getUsers();
//print_r($users);

//Order History List
require_once "../classes/order.php";
$order = new Order;
$order_history = $order->getOrderHIstory(); 
//print_r($order_history);

?>

<br>
<br>
<div class="container w-75 mt-5">

    <h1 class="display-4 text-danger">Admin Page</h1>
    <!--Add Sweet-->
    <details>
        <summary>
            <h1 class="display-4">Sweets List▼</h1>
        </summary>
        <form action="../actions/addProduct.php" enctype="multipart/form-data" method="post">
            <div class="form-row mt-5">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-4">
                    <label for="upload_file" class="custom-file-label">Choose Photo</label>
                    <input type="file" name="upload_file" id="upload_file" value="upload" class="custom-file-input">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-4">
                    <input type="text" name="unit_price" class="form-control" placeholder="Unit Price">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="product_stock" class="form-control" placeholder="Product Stock">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">
                    <input type="submit" name="add" value="Add" class="form-control btn btn-warning text-white">
                </div>
            </div>
        </form>
        <table class="table">
            <thead class="bg-dark text-white">
                <th></th>
                <th></th>
                <th>Img</th>
                <th>Product Name</th>
                <th>($)Unit Price</th>
                <th>Product Stock</th>
                
            </thead>
            <tbody>
            <?php
                while($get_products = $products->fetch_assoc()){
                 //print_r($get_products);
            ?>
                <tr>
                    <td><a href="editProduct.php?product_id=<?php echo $get_products['product_id']; ?>" class="btn btn-outline-warning btn-sm" role="button"><i class="fas fa-edit"></i></a></td>
                    <td><a href="../actions/removeProduct.php?product_id=<?php echo $get_products['product_id']; ?>" class="btn btn-outline-danger btn-sm" role="button"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="<?php echo $get_products['img_url']; ?>" alt="<?php echo $get_products['img_url']; ?>" class="img-fluid" width="90"> </td>
                    <td><?php echo $get_products['product_name'];?></td>
                    <td><?php echo $get_products['unit_price'];?></td>
                    <td><?php echo $get_products['product_stock'];?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </details>

    <!--All Customers-->
    <details>
        <summary>
        <h1 class="display-4">All Customers▼</h1>
        </summary>
        <table class="table">
            <thead class="bg-dark text-white">
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
            </thead>
            <tbody>
            <?php
                while($get_users = $users->fetch_assoc()){
                   // print_r($get_users);
            ?>
                <tr>
                    <td><?php echo $get_users['first_name'];?></td>
                    <td><?php echo $get_users['last_name'];?></td>
                    <td><?php echo $get_users['user_name'];?></td>
                    <td><?php echo $get_users['address'];?></td>
                    <td><?php echo $get_users['email'];?></td>
                    <td><?php echo $get_users['phone'];?></td>
                    <td><?php echo $get_users['status'];?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
        </table>
    </details>

    <!--Add Sweet-->
    <details>
        <summary class="list-style:none;">
            <h1 class="display-4">All Order History▼</h1>
        </summary>
        <table class="table">
            <thead class="bg-dark text-white">
                <th>Order ID</th>
                <th>Date</th>
                <th>User Name</th>
                <th>($)Total</th>
                <th>Detail</th>
            </thead>
            <tbody>
            <?php
                while($get_order_history = $order_history->fetch_assoc()){
                   //print_r($get_order_history);
            ?>
                <tr>
                    <td><?php echo $get_order_history['order_id'];?></td>
                    <td><?php echo $get_order_history['date'];?></td>
                    <td><?php echo $get_order_history['user_name'];?></td>
                    <td><?php echo $get_order_history['total'];?></td>
                    <td><a href="orderHistoryDetails.php?order_id=<?php echo $get_order_history['order_id'];?>&date=<?php echo $get_order_history['date'];?>&user_id=<?php echo $get_order_history['user_id'];?>" class="btn btn-outline-warning btn-sm" role="button"><i class="fas fa-arrow-circle-right"></i></a></td>
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