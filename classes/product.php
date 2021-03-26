<?php

require_once "database.php";

class Product extends Database{

    //Get All Products (index.php)
    public function getProducts(){
        $sql = "SELECT * FROM products WHERE product_stock != 0 ORDER BY products.product_name ASC";
        //$result = $this->conn->query($sql);
        //print_r($result);

        if($result = $this->conn->query($sql)){
            return $result;
            //return $result->fetch_assoc();
            exit;
        }else{
            die("Error retrieving products: " . $this->conn->error);
        }
    }

    public function getProductsAdmin(){
        $sql = "SELECT * FROM products ORDER BY products.product_name ASC";

        if($result = $this->conn->query($sql)){
            return $result;
            //return $result->fetch_assoc();
            exit;
        }else{
            die("Error retrieving products: " . $this->conn->error);
        }

    }

    public function searchProduct($keyword){
        
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$keyword%' AND product_stock != 0";

        if($result = $this->conn->query($sql)){
            //print_r($result);
            //$result1 = $result->fetch_assoc();
            return $result;
            exit;
        }else{
            die("Error retrieving products: " . $this->conn->error);
        }
    }

    public function calculateProductStock($customer_id){
        $sql1 = "SELECT carts.product_id, carts.quantity, products.product_stock FROM carts 
        INNER JOIN products ON carts.product_id = products.product_id
        WHERE customer_id = '$customer_id'";
        
        if($result = $this->conn->query($sql1)){

            while ($row = $result->fetch_assoc()){
                print_r($row);

                $product_id = $row['product_id'];

                $new_product_stock = $row['product_stock'] - $row['quantity'];
                //print_r($new_product_stock);

                $sql2 = "UPDATE products SET product_stock = '$new_product_stock' WHERE product_id = '$product_id'";
                print_r($sql2);
                //UPDATE products SET product_stock = 80 WHERE product_id = 1

                $this->conn->query($sql2);

            }
        }
    }

    //Admin Page
    public function addProduct($img_url, $product_name, $unit_price, $product_stock,$tmp_name, $description){
        $sql = "INSERT INTO products(product_name, unit_price, product_stock, img_url, `description`) 
        VALUES('$product_name','$unit_price','$product_stock','$img_url', '$description')";

        if ($this->conn->query($sql)) {
            $destination = "../img/" . basename($img_url);
            if (move_uploaded_file($tmp_name, $destination)) {
                //move_uploaded_file(from, to)

               header("location: ../views/admin.php?page=1");
               exit;
            } else {
               die("Error moving the photo.");
            }
         } else {
            die("Error uploading photo: " . $this->conn->error);
         }
    }

    //Admin Page editProduct Page
    public function getProduct($product_id){
        $sql = "SELECT * FROM products WHERE product_id = '$product_id'";

        if($result = $this->conn->query($sql)){
            //print_r($result);
            return $result->fetch_assoc();
            exit;
        }else{
            die("Error retrieving product: " . $this->conn->error);
        }
    }

    public function updateProduct($product_id, $product_name, $unit_price, $product_stock, $img_url, $tmp_name, $description){
        $sql = "UPDATE products 
        SET product_name = '$product_name', unit_price = '$unit_price',
        product_stock = '$product_stock', img_url = '$img_url', `description` = '$description'
        WHERE product_id = '$product_id'";

        if ($this->conn->query($sql)) {
            $destination = "../img/" . basename($img_url);

            if((file_exists($destination))){
                header("location: ../views/admin.php?page=1");
                exit;
            }else{
                
                if (move_uploaded_file($tmp_name, $destination)) {
                    //move_uploaded_file(from, to)
                header("location: ../views/admin.php?page=1");
                exit;
                } else {
                    die("Error moving the photo.". $this->conn->error);
                }
            }
        } else {
            die("Error uploading photo: " . $this->conn->error);
        }
    }

    public function deleteProduct($product_id){
        $sql="DELETE FROM products WHERE product_id = '$product_id'";

        if($this->conn->query($sql)){
            header("location: ../views/admin.php");
            exit;
        }else{
            die("Error deleteing Product " . $this->conn->error);
        }
    }

}