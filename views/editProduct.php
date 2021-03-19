<?php

$product_id = $_GET['product_id'];
//print_r($cart_id);

require_once "../classes/product.php";

$product = new Product;
$product_detail = $product->getProduct($product_id);
//print_r($product_detail);

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
<?php
include "header.php";
?>
    <div class="container w-75 mt-3">
    <h1 class="display-4">Edit Sweet</h1>
        <form action="../actions/editProduct.php" enctype="multipart/form-data" method="post">
            <table class="table">
                <thead class="bg-dark text-white">
                    <th>Img</th>
                    <th></th>
                    <th>Product_name</th>
                    <th>Quantity</th>
                    <th>($)Unit Price</th>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" name="product_id" value="<?php echo $product_detail['product_id']; ?>">
                        <td>
                            <img src="<?php echo $product_detail['img_url']; ?>" alt="<?php echo $product_detail['img_url']; ?>" class="img-fluid" width="90">
                        </td>
                        <td>
                            <input type="file" name="upload_file" id="upload_file" value="upload" class="form-control">
                        </td>
                        <td><input type="text" name="product_name" value="<?php echo $product_detail['product_name'];?>" class="form-control"></td>
                        <td><input type="number" name="product_stock" value="<?php echo $product_detail['product_stock'];?>" class="form-control"></td>
                        <td><input type="number" name="unit_price" value="<?php echo $product_detail['unit_price'];?>" class="form-control"></td>
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