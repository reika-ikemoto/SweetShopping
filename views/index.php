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
<link rel="stylesheet" href="../assets/css/style.css">
<title>TOP Page</title>
</head>

<body>

<?php
include "header.php";
?>

<div class="container-fluid" style="padding-left:0px; padding-right:0px;">
    <div class="jumbotron" style="background: no-repeat url(../img/ice-cream.jpg); background-size:cover; height: 70vh;">
    </div>
</div>

<div class="container w-75 mt-3">
    <h1 class="display-3 text-center">Product List</h1>
        <!--Serach Products-->
        <div class="container w-50">
            <form action="" method="get">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-7" style="padding-right: 0px;">
                        <input type="text" name="keyword" class="form-control" placeholder="Search here" >
                    </div>
                    <div class="form-group col-md-1" style="padding-left: 0px;">
                        <button type="submit" class="form-control btn btn-warning text-white" name="search" value="Search" maxlength="50">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>

    <!--Display SerachedProducts / AllProducts-->
        <?php
        //SerachedProducts
        if(isset($_GET['search'])){
            $keyword = $_GET['keyword'];

            $result = $product->searchProduct($keyword);
        ?>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-6">
                    <h1 class="display-3 text-dark text-center">Here are your results</h1>
                </div>
            </div>

        <div class="row justify-content-center">
            <?php
                while($search = $result->fetch_assoc()){
            ?>
                <form action="../actions/addCart.php" method="post">
                    <div class="container w-75 col-md-12 border mt-5">
                        <input type="hidden" name="product_id" value="<?php echo $search['product_id'];?>">
                        <input type="hidden" name="unit_price" value="<?php echo $search['unit_price'];?>">
                        <img src="<?php echo "../img/".$search['img_url']; ?>" alt="<?php echo $search['img_url']; ?>" class="img-fluid mt-3" width="400px" height="200px" style="height: 200px;">  
                        <strong style="padding-right: 5px;"><P class="product-name"><?php echo $search['product_name']; ?></strong>   $<?php echo $search['unit_price']; ?></P>
                        <P><?php echo $search['description']; ?></P>
                        <P><?php echo "Stock: "?><span style="font-weight: bold;"><?php echo $search['product_stock']; ?></span></P>
                        <strong>$<?php echo $search['unit_price']; ?></strong><br/>
                        <input type="number" style="width:130px;" name="quantity" class="form-control" placeholder="Put Quantity" max=<?php echo $search['product_stock'];?> required>
                        <button type="submit" id="" class="btn btn-info mt-3 mb-3" name="cart"><i class="fas fa-cart-plus"></i></button><br>
                    </div>
                </form>
            <?php
                }
            ?>
        </div>

        <?php
        //AllProducts (Initial display) 
        }else{
        ?>

        <div class="row justify-content-center">
            <?php
                while($products = $product_lists->fetch_assoc()){
                //print_r($products);
            ?>
                <form action="../actions/addCart.php" method="post">
                    <div class="container w-75 col-md-12 border mt-5">
                        <input type="hidden" name="product_id" value="<?php echo $products['product_id'];?>">
                        <input type="hidden" name="unit_price" value="<?php echo $products['unit_price'];?>">
                        <img src="<?php echo "../img/".$products['img_url']; ?>" alt="<?php echo $products['img_url']; ?>" 
                        class="img-fluid mt-3" width="400px" style="height: 200px;">  
                        <strong style="padding-right: 5px;"><P class="product-name"><?php echo $products['product_name']; ?></strong>   $<?php echo $products['unit_price']; ?></P>
                        <P><?php echo $products['description']; ?></P>
                        <P><?php echo "Stock: "?><span style="font-weight: bold;"><?php echo $products['product_stock']; ?></span></P>
                        

                        <input type="number" style="width:130px;" name="quantity" class="form-control" placeholder="Put Quantity" max=<?php echo $products['product_stock'];?> required>
                        <button type="submit" id="" class="btn btn-info mt-3 mb-3" name="cart"><i class="fas fa-cart-plus"></i></button><br>

                    </div>
                </form>
            <?php
                } //while close
            }//else close
            ?>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>