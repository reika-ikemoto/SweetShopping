<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<!--<link rel="stylesheet" href="assets/css/style.css">-->
<title>Order Comfirm</title>
</head>

<body>
    
<?php
include "header.php";
?>

<?Php

require_once "../classes/cart.php";

$customer_id = $_SESSION['user_id'];

$cart = new Cart;
$cart_list = $cart->getCart($customer_id);
//print_r($cart_list);

?>

<div class="container w-50 mt-3">
<a href="index.php" class="btn btn-secondary"><-Back to ProductsPage</a><h1 class="display-4">Confirm Your Order</h1>
        <form action="" method="post">
            <div class="form-row">
                <h1 class="display-6">■Pick up or Delivery ?</h1>
                <span style="color:red">If you select "Delivery", you need to pay $2 as a delivery fee.</span><br>
                    <div class="form-group col-md-6">
                        <input type="radio" name="how_to_get" id="pick_up" value="pick_up" class="form-check-inline" required>
                        <label for="pick_up">Pick Up</label>
                        <input type="radio" name="how_to_get" id="delivery" value="delivery" class="form-check-inline" required>
                        <label for="delivery">Delivery</label>
                    </div>
            </div>

            <h1 class="display-6">■Discount</h1>
                    <span style="color:red">If your total price is greater than $20 (including delivery fee), you can buy them 20%off.</span><br>
                    <div class="form-group col-md-4 justify-content-end">
                    <input type="submit" name="calculate" value="Calculate Total" class="form-control btn btn-primary">
                    </div>
        </form>

        <table class="table mt-5">
            <thead class="bg-dark text-white">
                <tr>
                    <th></th>
                    <th></th>
                    <th>Product_name</th>
                    <th>Quantity</th>
                    <th>($)Unit Price</th>
                    <th>($)Subtotal</th>
                </tr>
            </thead>

            <tbody>
            <!--Cart Details-->
            <?php
            $products_total = 0;
                while($cart_products = $cart_list->fetch_assoc()){
                //print_r($cart_products);
            ?>
                <tr>
                    <td><a href="editCart.php?cart_id=<?php echo $cart_products['cart_id']; ?>" class="btn btn-outline-warning btn-sm" role="button"><i class="fas fa-edit"></i></a></td>
                    <td><a href="../actions/removeCart.php?cart_id=<?php echo $cart_products['cart_id']; ?>" class="btn btn-outline-danger btn-sm" role="button"><i class="fas fa-trash-alt"></i></a></td>
                    <td><?php echo $cart_products['product_name']; ?></td>
                    <td><?php echo $cart_products['quantity']; ?></td>
                    <td><?php echo $cart_products['unit_price']; ?></td>
                    <?php $subtotal = $cart_products['quantity'] * $cart_products['unit_price'];?>
                    <td><?php echo $subtotal; ?></td>
                    <?php $products_total += $subtotal; ?>
                </tr>
            <?php
                }
            ?>

            <!--Delivery or Pick up-->
            <?php
                if(isset($_POST['calculate'])){
            ?>
                <form action="../actions/orderConfirm.php" method="post">
                    <!--Delivery or Pick up-->
                    <?php 
                        if($_POST['how_to_get'] == "delivery"){
                    ?>
                            <tr>
                                <td class="bg-success" colspan="4"></td>
                                <td class="bg-success text-white">Delivery Free</td>
                                <?php $delivery_fee = 2;?>
                                <td> <?php echo $delivery_fee; ?></td>
                            </tr>
                    <?php
                        }elseif($_POST['how_to_get'] == "pick_up"){
                    ?>
                            <tr>
                                <td class="bg-success" colspan="4"></td>
                                <td class="bg-success text-white">Delivery Free</td>
                                <?php $delivery_fee = 0;?>
                                <td><?php echo $delivery_fee; ?></td>
                            </tr>
                    <?php
                        }  //Discount
                            $total1 = $delivery_fee + $products_total;
                            if($total1 >= 20){
                        ?>
                            <tr>
                                <td class="bg-danger" colspan="4"></td>
                                <td class="bg-danger text-white">Dicount Free</td>
                                <?php $discount = $total1 * 0.2;?>
                                <td> <?php echo $discount; ?></td>
                            </tr>
                        <?php
                            }else{
                                $discount = 0;
                            }
                        ?>
                            <!--Total Price-->
                            <tr>
                                <td class="bg-dark" colspan="4"></td>
                                <td class="bg-dark text-white">Total Price</td>
                                <?php $total_price = $total1 - $discount;?>
                                <td><?php echo $total_price;?></td>
                            </tr>

                        <div class="fomr-group col-md-4">
                            <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
                            <input type="hidden" name="delivery_fee" value="<?php echo $delivery_fee;?>">
                            <input type="hidden" name="discount" value="<?php echo $discount;?>">
                            <input type="hidden" name="total_price" value="<?php echo $total_price;?>">
                            <input type="submit" value="Buy" name="buy" class="form-control btn btn-primary">
                        </div>
                </form> 
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