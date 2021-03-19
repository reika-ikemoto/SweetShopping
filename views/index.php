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

<div class="container w-75 mt-5">

        <!--Serach Products-->
        <div class="container w-50">
            <form action="" method="get">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <input type="text" name="keyword" class="form-control" placeholder="Search here">
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="form-control btn btn-warning text-white" name="search" value="Search"><i class="fas fa-search"></i></button>
                        <!--<input type="submit" name="search" value="Search" class="form-control btn btn-warning text-white">-->
                    </div>
                </div>
            </form>
        </div>
</div>


<?php

// 出力する画像サイズの指定
$width = 400;
$height =300;

// サイズを指定して、背景用画像を生成
$canvas = imagecreatetruecolor($width, $height);

// コピー元画像の指定
$targetImage = "../img/spinich cake.jpg";
// ファイル名から、画像インスタンスを生成
$image = imagecreatefromjpeg($targetImage);
// コピー元画像のファイルサイズを取得
list($image_w, $image_h) = getimagesize($targetImage);

// 背景画像に、画像をコピーする
imagecopyresampled($canvas,  // 背景画像
                   $image,   // コピー元画像
                   0,        // 背景画像の x 座標
                   0,        // 背景画像の y 座標
                   0,        // コピー元の x 座標
                   0,        // コピー元の y 座標
                   $width,   // 背景画像の幅
                   $height,  // 背景画像の高さ
                   $image_w, // コピー元画像ファイルの幅
                   $image_h  // コピー元画像ファイルの高さ
                  );

// 画像を出力する
imagejpeg($canvas,           // 背景画像
          "../img/output.jpg",    // 出力するファイル名（省略すると画面に表示する）
          100                // 画像精度（この例だと100%で作成）
         );

// メモリを開放する
imagedestroy($canvas);
?>

        <!--Display SerachedProducts / AllProducts-->
        <?php
        //SerachedProducts
        if(isset($_GET['search'])){
            $keyword = $_GET['keyword'];

            $result = $product->searchProduct($keyword);
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h1 class="display-4 bg-success text-white">Here are your results</h1>
                </div>
            </div>
        <?php
            while($search = $result->fetch_assoc()){
        ?>
            <form action="../actions/addCart.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input type="hidden" name="product_id" value="<?php echo $search['product_id'];?>">
                        <input type="hidden" name="unit_price" value="<?php echo $search['unit_price'];?>">
                        <img src="<?php echo $search['img_url']; ?>" alt="<?php echo $search['img_url']; ?>" class="img-fluid">  
                        <p class="product-name"><?php echo $search['product_name']; ?></p>
                        <P><?php echo "Stock:".$search['product_stock']; ?></P>
                        <strong>$<?php echo $search['unit_price']; ?></strong><br/>

                        <input type="number" name="quantity" placeholder="Put Quantity" max=<?php echo $search['product_stock'];?>>
                        <button type="submit" id="" class="btn btn-info" name="cart">cart</button><br>
                    </div>
                </div>
            </form>
        <?php
            }

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
                    <img src="<?php echo $products['img_url']; ?>" alt="<?php echo $products['img_url']; ?>" class="img-fluid mt-3" width="400px" height="200px">  
                    <P><?php echo $products['product_name']; ?></P>
                    <P><?php echo $products['description']; ?></P>
                    <P><?php echo "Stock:".$products['product_stock']; ?></P>
                    <strong>$<?php echo $products['unit_price']; ?></strong><br/>

                    <input type="number" style="width:130px;" name="quantity" class="form-control" placeholder="Put Quantity" max=<?php echo $products['product_stock'];?>>
                    <button type="submit" id="" class="btn btn-info mt-3 mb-3" name="cart">cart</button><br>
                </div>
                <!--<div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="hidden" name="product_id" value="<?php //echo $products['product_id'];?>">
                        <input type="hidden" name="unit_price" value="<?php //echo $products['unit_price'];?>">
                        <img src="<?php //echo $products['img_url']; ?>" alt="<?php //echo $products['img_url']; ?>" class="img-fluid" width="300px" height="300px">  
                        <P><?php //echo $products['product_name']; ?></P>
                        <P><?php //echo "Stock:".$products['product_stock']; ?></P>
                        <strong>$<?php //echo $products['unit_price']; ?></strong><br/>

                        <input type="number" name="quantity" placeholder="Put Quantity" max=<?php //echo $products['product_stock'];?>>
                        <button type="submit" id="" class="btn btn-info" name="cart">cart</button><br>
                    </div>
                </div>-->
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