<?php

require_once "database.php";

class Product extends Database{

    //Get All Products
    public function getProducts(){
        $sql = "SELECT * FROM products";
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
    
}