<?php

$product_id = $_GET['product_id'];
//print_r($cart_id);

require_once "../classes/product.php";

$product = new Product;
$product_detail = $product->getProduct($product_id);
//print_r($product_detail);

?>

<?php
include "header.php";
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
<link rel="stylesheet" href="../assets/css/style.css">
<title>EditCart</title>
</head>



<body>
<br>
<br>
    <div class="container w-75 mt-5">
    <a href="admin.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> &nbsp;Back to Admin Page</a>
    <h1 class="display-4">Edit Sweet</h1>
        <form action="../actions/editProduct.php" enctype="multipart/form-data" method="post">
            <table class="table">
                <thead class="bg-dark text-white">
                    <th>Img</th>
                    <th></th>
                    <th>Product_name</th>
                    <th>Quantity</th>
                    <th>($)Unit Price</th>
                    <th>Description</th>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" name="product_id" value="<?php echo $product_detail['product_id']; ?>">
                        <input type="hidden" name="pre_img_url" value="<?php echo $product_detail['img_url']; ?>">
                        <td>
                            <img src="<?php echo "../img/".$product_detail['img_url']; ?>" alt="<?php echo $product_detail['img_url']; ?>" class="img-fluid" width="90">
                        </td>
                        <td style="width:15%"><input type="file" name="upload_file" id="upload_file" value="upload" class="form-control"></td>
                        <td style="width:20%"><input type="text" name="product_name" value="<?php echo $product_detail['product_name'];?>" class="form-control"></td>
                        <td style="width:10%"><input type="number" name="product_stock" value="<?php echo $product_detail['product_stock'];?>" class="form-control"></td>
                        <td style="width:10%"><input type="number" name="unit_price" value="<?php echo $product_detail['unit_price'];?>" class="form-control"></td>
                        <td><input type="text" name="description" value="<?php echo $product_detail['description'];?>" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-row justify-content-center">
                <div class="form-group">
                <button type="submit" class="btn btn-warning mb-3 text-white" name="edit"><i class="fas fa-edit"></i> Update</button><br>
                    <!--<input type="submit" name="edit" value="Edit" class="form-control btn btn-warning text-white">-->
                </div>
            </div>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>