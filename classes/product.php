<?php

require_once "database.php";

class Product extends Database{

    //Get All Products
    public function getProducts(){
        $sql = "SELECT * FROM products ORDER BY products.product_name ASC";
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

    public function searchProduct($keyword){
        $sql = "SELECT * FROM products WHERE product_name like '%$keyword%'";
        //print_r($sql);

        if($result = $this->conn->query($sql)){
            //print_r($result);
            //$result1 = $result->fetch_assoc();
            return $result;
            exit;
        }else{
            die("Error retrieving products: " . $this->conn->error);
        }
    }

    public function addProduct($img_url, $product_name, $unit_price, $product_stock,$tmp_name){
        $sql = "INSERT INTO products(product_name, unit_price, product_stock, img_url) 
        VALUES('$product_name','$unit_price','$product_stock','$img_url')";

        if ($this->conn->query($sql)) {
            $destination = "../img/" . basename($img_url);
            if (move_uploaded_file($tmp_name, $destination)) {
                //move_uploaded_file(from, to)

               header("location: ../views/admin.php");
               exit;
            } else {
               die("Error moving the photo.");
            }
         } else {
            die("Error uploading photo: " . $this->conn->error);
         }
    }

    public function updateProduct($product_id, $product_name, $unit_price, $product_stock, $img_url, $tmp_name){
        $sql = "UPDATE products 
        SET product_name = '$product_name', unit_price = '$unit_price',
        product_stock = '$product_stock', img_url = '$img_url'
        WHERE product_id = '$product_id'";

        if ($this->conn->query($sql)) {
            $destination = "../img/" . basename($img_url);
            if (move_uploaded_file($tmp_name, $destination)) {
                //move_uploaded_file(from, to)

            header("location: ../views/admin.php");
            exit;
            } else {
            die("Error moving the photo.");
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