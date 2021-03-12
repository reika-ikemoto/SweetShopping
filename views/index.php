<?php

require_once "../classes/product.php";

$product = new Product;
$product_lists = $product->getProducts();
//print_r($product_lists);

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
<title>Products Page</title>
</head>

<body>
<?php
include "header.php";
?>

<div class="container-fluid">
    <div class="jumbotron" style="background: no-repeat url(../img/ice-cream.jpg); background-size:cover; height: 90vh;">
    <h1 class="display-2">Enjoy your shopping !</h1>
    </div>
</div>

<div class="container w-50 mt-5">
    <a href="orderConfirm.php" class="href">confirm your cart</a>

        <!--Serach Products-->
        <form action="" method="get">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <h4>Serach here</h4>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="keyword" class="form-control" placeholder="Put Keyword">
                </div>
                <div class="form-group col-md-4">
                    <input type="submit" name="search" value="Serach" class="form-control btn btn-warning text-white">
                </div>
            </div>
        </form>

        <!--Display SerachedProducts / AllProducts-->
        <?php
        //SerachedProducts
        if(isset($_GET['search'])){
            $keyword = $_GET['keyword'];

            $result = $product->searchProduct($keyword);

            echo "<h1>There are your results</h1>";
            while($search = $result->fetch_assoc()){
        ?>
            <form action="../actions/addProduct.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $search['product_id'];?>">
                <input type="hidden" name="unit_price" value="<?php echo $search['unit_price'];?>">
                <img src="<?php echo $search['img_url']; ?>" alt="<?php echo $search['img_url']; ?>" class="img-fluid">  
                <P><?php echo $search['product_name']; ?></P>
                <P><?php echo "Stock:".$search['product_stock']; ?></P>
                <strong>$<?php echo $search['unit_price']; ?></strong><br/>

                <input type="number" name="quantity" placeholder="Put Quantity" max=<?php echo $search['product_stock'];?>>
                <button type="submit" id="" class="btn btn-info" name="cart">cart</button><br>
            </form>
        <?php
            }
        //AllProducts (Initial display) 
        }else{
            while($products = $product_lists->fetch_assoc()){
        ?>
            <form action="../actions/addProduct.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $products['product_id'];?>">
                <input type="hidden" name="unit_price" value="<?php echo $products['unit_price'];?>">
                <img src="<?php echo $products['img_url']; ?>" alt="<?php echo $products['img_url']; ?>" class="img-fluid">  
                <P><?php echo $products['product_name']; ?></P>
                <P><?php echo "Stock:".$products['product_stock']; ?></P>
                <strong>$<?php echo $products['unit_price']; ?></strong><br/>

                <input type="number" name="quantity" placeholder="Put Quantity" max=<?php echo $products['product_stock'];?>>
                <button type="submit" id="" class="btn btn-info" name="cart">cart</button><br>
            </form>
        <?php
            }
        }
        ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>