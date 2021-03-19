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
<title>EditCart</title>
</head>

<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
include "header.php";
?>

<?php

$cart_id = $_GET['cart_id'];
//print_r($cart_id);

require_once "../classes/cart.php";

$cart = new Cart;
$cart_detail = $cart->getCartProduct($cart_id);
//print_r($cart_detail);

?>
<br>
<br>
    <div class="container w-50 mt-5">
    <a href="orderConfirm.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Order Confirm</a>
    <h1 class="display-4">Edit Your Order</h1>
        <form action="../actions/editCart.php" method="post">
            <table class="table">
                <thead class="bg-dark text-white">
                    <th>Product_name</th>
                    <th>Quantity</th>
                    <th>($)Unit Price</th>
                    <th>($)Subtotal</th></th>
                </thead>
                <tbody>

                <!--Convert php to javascript-->
                <script>
                    let unit_price = JSON.parse('<?php echo json_encode($cart_detail['unit_price'])?>');
                    let product_stock = JSON.parse('<?php echo json_encode($cart_detail['product_stock'])?>');
                </script>

                <script>
                    $(function(){
                        var value = unit_price;; //Product unit price
                        var maxNum = product_stock; // Maximum product_stock
                        var tagInput = $('#jsNum'); // Input tag name 
                        var tagOutput = $('#jsPrice'); // Output tag name
                        tagInput.on('change', function() {
                            var str = $(this).val();
                            var num = Number(str.replace(/[^0-9]/g, '')); // Delete non-integer
                            if(num == 0) {
                                num = '';
                                alert('Please put quantity');
                            } else if (num > maxNum) { // The number of stocks is exceeded
                                num = maxNum;
                                alert('The product stock is '+ maxNum + ' pieces');
                            }
                            $(this).val(num);
                            if(num != 0) {
                                var price = num * value;
                                tagOutput.val(price);
                            }
                        });
                    });
                </script>
                    <tr>
                        <input type="hidden" name="cart_id" value="<?php echo $cart_detail['cart_id']; ?>">
                        <td><p><?php echo $cart_detail['product_name'];?></p></td>
                        <td><input type="number" name="quantity" value="<?php echo $cart_detail['quantity'];?>" id="jsNum" class="form-control" max="<?php echo $products['product_stock'];?>"></td>
                        <td><p><?php echo $cart_detail['unit_price'];?></p></td>
                        <td><input type="number" name="subtotal" value="" id="jsPrice" class="form-control" readonly></td>
                    </tr>
                </tbody>
                
            </table>

            <div class="form-row justify-content-center">
                <div class="form-group col-md-3">
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