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

<title>Order Comfirm</title>
</head>

<body>
<style>
h3.display-4{ 
    font-size: 40px;
}

.table-plus{
  background-color: #00A95F;
}

.table-minus{
  background-color: #E9546B;
}
</style>

<?php
include "header.php";
?>

<?Php

require_once "../classes/cart.php";

$customer_id = $_SESSION['user_id'];

$cart = new Cart;
$cart_list = $cart->getCart($customer_id);


?>
<br>
<br>
<br>
<div class="container w-75 mt-5">
    <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> &nbsp;Back to Home</a>
    <h2 class="display-4">Confirm Your Order</h2>
    
        <?php //print_r($cart_list); 
            if($cart_list->num_rows == 0 ){
        ?>
            <h3 class="display-4" style="color:gray; font-weight:bold;">Your cart is empty.</h3>
        <?php
            }else{
        ?>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                                <h3 class="display-4"><i class="fas fa-biking"></i> Delivery or Pick up?</h3>
                                <p class="order-confirm mb-0">$2 For Delivery</p>
                                    <div class="form-group col-md-6 pl-0">
                                        <input type="radio" name="how_to_get" id="delivery" value="delivery" class="form-check-inline" style="margin-right: 1px;" required>
                                        <label for="delivery" style="padding-right: 50px;">Delivery</label>
                                        <input type="radio" name="how_to_get" id="pick_up" value="pick_up" class="form-check-inline" style="margin-right: 1px;" required>
                                        <label for="pick_up">Pick Up</label>
                                    </div>
                                <!--If they buy sweets as s gift, they have to pay additional fee.-->
                                <h3 class="display-4"><i class="fas fa-gift"></i> Gift or For you?</h3>
                                <p class="order-confirm mb-0">$3 For Gift</p>
                                    <div class="form-group col-md-6 pl-0">
                                        <input type="radio" name="who_is_it_for" id="gift" value="gift" class="form-check-inline" style="margin-right: 1px;" required>
                                        <label for="gift" style="padding-right: 82px;">Gift</label>
                                        <input type="radio" name="who_is_it_for" id="for_you" value="for_you" class="form-check-inline" style="margin-right: 1px;" required>
                                        <label for="for_you">For you</label>
                                    </div>
                                <h1 class="display-6"><i class="fas fa-dollar-sign"></i> Discount</h1>
                                    <span style="color:red">If your spend more than <span style="font-weight: bold; color: red;">$20</span>, you can buy them <span style="font-weight: bold; color: red;">20%off</span><br>(including Delivery fee and Gift fee)</span><br>
                                    <div class="form-group col-md-4 justify-content-end">
                                    <input type="submit" name="calculate" value="Calculate Total" class="form-control btn btn-primary mt-5">
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>ProductName</th>
                            <th>Quantity</th>
                            <th>($)UnitPrice</th>
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

                    <?php
                        if(isset($_POST['calculate'])){
                    ?>
                        <form action="../actions/orderConfirm.php" method="post">
                            <!--Delivery or Pick up-->
                                <tr>
                                        <td class="table-plus text-white" colspan="3"></td>
                                        <td class="table-plus text-white"><i class="fas fa-plus"></i></td>
                                        <td class="table-plus text-white">Delivery Fee</td>
                                    <?php 
                                        if($_POST['how_to_get'] == "delivery"){
                                            $delivery_fee = 2;
                                        }elseif($_POST['how_to_get'] == "pick_up"){
                                            $delivery_fee = 0;
                                        }
                                    ?>
                                        <td> <?php echo $delivery_fee; ?></td>
                                </tr>
                            <!--Gift or For you-->
                                <tr>
                                        <td class="table-plus text-white" colspan="3"></td>
                                        <td class="table-plus text-white"><i class="fas fa-plus"></i></td>
                                        <td class="table-plus text-white">Gift Fee</td>
                                    <?php
                                        if($_POST['who_is_it_for'] == "gift"){
                                            $gift_fee = 3;
                                        }elseif($_POST['who_is_it_for'] == "for_you"){
                                            $gift_fee = 0;
                                        }
                                    ?>
                                        <td><?php echo $gift_fee; ?></td>
                                </tr>

                                <?php
                                //Discount
                                    $total1 = $delivery_fee + $gift_fee + $products_total;
                                    if($total1 >= 20){
                                ?>
                                    <tr>
                                        <td class="table-minus text-white" colspan="3"></td>
                                        <td class="table-minus text-white"><i class="fas fa-minus"></i></td>
                                        <td class="table-minus text-white">Discount Free</td>
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
                                        <td><span style="font-weight: bold; color: black; font-size:x-large"><?php echo $total_price;?></span></td>
                                    </tr>
                                
                                    <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
                                    <input type="hidden" name="delivery_fee" value="<?php echo $delivery_fee;?>">
                                    <input type="hidden" name="gift_fee" value="<?php echo $gift_fee;?>">
                                    <input type="hidden" name="discount" value="<?php echo $discount;?>">
                                    <input type="hidden" name="total_price" value="<?php echo $total_price;?>">
                    </tbody>
                </table>
                            <div class="form-row justify-content-end">
                                <div class="form-group col-md-3">
                                    <input type="submit" value="Place Order" name="buy" class="form-control btn btn-primary">
                                </div>
                            </div>

                        </form> 

                    <?php
                        }
                    ?>
            </div>
        <?php
            }
        ?>

    </div>
        

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>