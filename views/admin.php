
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
<title>Admin</title>
</head>

<body>
<style>
/* Chrome、Safari以外 */
summary {
  outline: none;
  display: block;
  cursor: pointer;
}

/* ホバー時のスタイル */
summary:hover {
  cursor: pointer; /* カーソルを指マークに */
  background-color: #EFEFEF;
}


</style>

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

//Sweets List
require_once "../classes/product.php";
$product = new Product;
$products = $product->getProductsAdmin();
//print_r($products);

//Users List
require_once "../classes/user.php";
$user = new User;
$users = $user->getUsers();
//print_r($users);

//Order History List
require_once "../classes/order.php";
$order = new Order;
$order_history = $order->getOrderHistory($start);
$num_rows = $order->getNumOfRows();
//print_r($order_history);

?>

<br>
<br>
<br>
<div class="container w-75 mt-5">
    <div class="justify-content-center">
        <h1 class="display-4 text-danger text-center" style="font-size: 70px; font-weight:500;">Admin Page</h1>
    </div>
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
                    <input type="file" name="upload_file" id="upload_file" value="upload" class="custom-file-input" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" maxlength="50" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-4">
                    <input type="text" name="unit_price" class="form-control" placeholder="Unit Price" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="product_stock" class="form-control" placeholder="Product Stock" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-8">
                    <input type="text" name="description" class="form-control" placeholder="Description" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                
                <div class="form-group">
                    <button type="submit" id="" class="btn btn-warning mt-3 mb-3 text-white" name="add"><i class="fas fa-plus"></i> Add</button><br>
                    
                    <!--<input type="submit" name="add" value="" class="form-control btn btn-warning text-white">-->
                </div>
            </div>
        </form>
        <table class="table">
            <thead class="bg-dark text-white">
                <th></th>
                <th></th>
                <th>Image</th>
                <th>Product Name (ABC Order)</th>
                <th>($)Unit Price</th>
                <th>Product Stock</th>
                <th>Description</th>
            </thead>
            <tbody>
            <?php
                while($get_products = $products->fetch_assoc()){
                //print_r($get_products['product_stock']);
            ?>
                <tr>
                    <td><a href="editProduct.php?product_id=<?php echo $get_products['product_id']; ?>" class="btn btn-outline-warning btn-sm" role="button"><i class="fas fa-edit"></i></a></td>
                    <td><a href="../actions/removeProduct.php?product_id=<?php echo $get_products['product_id']; ?>" class="btn btn-outline-danger btn-sm" role="button"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="<?php echo "../img/".$get_products['img_url']; ?>" alt="<?php echo $get_products['img_url']; ?>" class="img-fluid" width="90"> </td>
                    <?php
                        if($get_products['product_stock'] < "20"){
                    ?>
                        <td>
                            <span style="color:red; font-weight:bold;">
                                <i class="fas fa-exclamation-triangle" data-toggle="tooltip" data-placement="top" title="Please add stock"></i>
                                <?php echo $get_products['product_name'];?>
                            </span>
                        </td>
                        <td>
                            <span style="color:red; font-weight:bold;">
                                <?php echo "$ ".$get_products['unit_price'];?>
                            </span>
                        </td>
                        <td>
                            <span style="color:red; font-weight:bold;">
                                <?php echo $get_products['product_stock'];?>
                            </span>
                        </td>
                        <td>
                            <span style="color:red; font-weight:bold;">
                                <?php echo $get_products['description'];?>
                            </span>
                        </td>

                    <?php
                        }else{
                    ?>
                        <td><?php echo $get_products['product_name'];?></td>
                        <td><?php echo "$ ".$get_products['unit_price'];?></td>
                        <td><?php echo $get_products['product_stock'];?></td>
                        <td><?php echo $get_products['description'];?></td>

                    <?php
                        }
                    ?>
                </tr>
                    
            <?php
            }
            ?>
            </tbody>
        </table>
    </details>

<br>
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

    <br>
    <!--Add Sweet-->
    <details>
        <summary style="display:block;">
            <h1 class="display-4">All Order Histories▼</h1>
        </summary>

        <div class="container w-75 mt-3">
            <!--Serach Products-->
            <div class="container w-50">
                <form action="" method="get">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-7" style="padding-right: 0px;">
                            <input type="text" name="order_id" class="form-control" placeholder="Order ID">
                        </div>
                        <div class="form-group col-md-2" style="padding-left: 0px;">
                            <button type="submit" class="form-control btn btn-warning text-white" name="search" value="Search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead class="bg-dark text-white">
                <th>Order ID</th>
                <th>Date</th>
                <th>User Name</th>
                <th>($)Total</th>
                <th>Details</th>
            </thead>
            <tbody>
        <?php
            if(isset($_GET['search'])){
                $order_id = $_GET['order_id'];
                $result = $order->searchOrderHistory($order_id);

                if($result->num_rows == 1){
                    $searched_order_history = $result->fetch_assoc();
                    //print_r($searched_order_history);
        ?>
                <tr>
                    <td><?php echo $searched_order_history['order_id'];?></td>
                    <td><?php echo $searched_order_history['date'];?></td>
                    <td><?php echo $searched_order_history['user_name'];?></td>
                    <td><?php echo $searched_order_history['total'];?></td>
                    <td>
                        <a href="orderHistoryDetails.php?order_id=<?php echo $searched_order_history['order_id'];?>
                        &date=<?php echo $searched_order_history['date'];?>&user_id=<?php echo $searched_order_history['user_id'];?>
                        &page=<?php echo $page;?>&pre_url=<?php echo "admin";?>"
                        class="btn btn-outline-warning btn-sm" role="button">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </td>
                </tr>
        <?php
                }elseif($result->num_rows == 0){
        ?>
                <h3 class="display-4" style="color:gray; font-weight:bold;">There is no data</h3>
        <?php
                }else{
                    echo "There are multiple data";
                }
            }else{
        ?>
                <?php
                    while($get_order_history = $order_history->fetch_assoc()){
                    //print_r($get_order_history);
                ?>
                    <tr>
                        <td><?php echo $get_order_history['order_id'];?></td>
                        <td><?php echo $get_order_history['date'];?></td>
                        <td><?php echo $get_order_history['user_name'];?></td>
                        <td><?php echo "$ ".$get_order_history['total'];?></td>
                        <td>
                            <a href="orderHistoryDetails.php?order_id=<?php echo $get_order_history['order_id'];?>&date=<?php echo $get_order_history['date'];?>
                            &user_id=<?php echo $get_order_history['user_id'];?>&page=<?php echo $page;?>&pre_url=<?php echo "admin";?>" 
                            class="btn btn-outline-warning btn-sm" role="button">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

            <!--Pagenation-->
    <nav aria-label="" class="mb-5">
    <ul class="pagination justify-content-center">
        <!--Previous Page-->
        <li class="page-item">
            <?php
            if($page > 1){
            ?>
                <a class="page-link" href="?page=<?php echo $page -1;?>">Previous</a>
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
                    <a href="?page=<?php echo $i;?>" class="page-link">
                    <?php echo $i;?>
                    </a>
                </span>
                </li>
        <?php
                }else{
        ?>
                <li class="page-item">
                    <a href="?page=<?php echo $i;?>" class="page-link">
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
                <a class="page-link" href="?page=<?php echo $page +1;?>">Next</a>
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
            } //close if(isset($_GET['search']))
        ?>
        
    </details>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>