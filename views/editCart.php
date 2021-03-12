<?php

$cart_id = $_GET['cart_id'];
//print_r($cart_id);

require_once "../classes/cart.php";

$cart = new Cart;
$cart_detail = $cart->getCartProduct($cart_id);
//print_r($cart_detail);

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
<title>EditCart</title>
</head>

<body>
    <div class="container w-50 mt-3">
        <form action="../actions/editCart.php" method="post">
            <table class="table">
                <thead class="bg-dark text-white">
                    <th>Product_name</th>
                    <th>Quantity</th>
                    <th>($)Unit Price</th>
                    <th>($)Subtotal</th></th>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" name="cart_id" value="<?php echo $cart_detail['cart_id']; ?>">
                        <td><p><?php echo $cart_detail['product_name'];?></p></td>
                        <td><input type="number" name="quantity" value="<?php echo $cart_detail['quantity'];?>" class="form-control" max="<?php echo $products['product_stock'];?>"></td>
                        <td><p><?php echo $cart_detail['unit_price'];?></p></td>
                        <td>Subtotal(Javascript?)</td>
                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="submit" name="edit" value="Edit" class="form-control btn btn-warning text-white">
                </div>
            </div>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>