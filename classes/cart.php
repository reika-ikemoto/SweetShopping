<?php

require_once "database.php";

//cart table is a temporary table
class Cart extends Database{

    public function addCart($customer_id, $product_id, $quantity, $unit_price){
        $sql = "INSERT INTO carts (customer_id, product_id, quantity, unit_price) VALUES('$customer_id', '$product_id', '$quantity', '$unit_price')";

        if($this->conn->query($sql)){
            header("location: ../views/index.php");
            exit;
        }else{
            die("Error to insert cart: " . $this->conn->error);
        };
    }

    public function getCart($customer_id){
        $sql = "SELECT * FROM carts 
                INNER JOIN products ON products.product_id = carts.product_id
                WHERE customer_id = '$customer_id'";

        if($result = $this->conn->query($sql)){
            //print_r($result);
            return $result;
            exit;
        }else{
            die("Error retriving cart: " . $this->conn->error);
        }
    }

    public function getCartCount($customer_id){
        $sql = "SELECT COUNT(*) FROM carts WHERE customer_id = '$customer_id'";

        if($result = $this->conn->query($sql)){
            //print_r($result);
            return $result->fetch_assoc();
            exit;
        }else{
            die("Error retriving cart: " . $this->conn->error);
        }
    }

    public function getCartProduct($cart_id){
        $sql = "SELECT * FROM carts 
                INNER JOIN products ON products.product_id = carts.product_id
                WHERE cart_id = '$cart_id'";
        //print_r($sql);

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
            exit;
        }else{
            die("Error retriving cartProduct: " . $this->conn->error);
        }
    }

    public function updateCart($cart_id, $quantity){
        $sql = "UPDATE carts SET quantity = '$quantity' WHERE cart_id = '$cart_id'";

        if($this->conn->query($sql)){
            header("location: ../views/orderConfirm.php");
            exit;
        }else{
            die("Error updating cartProduct: " . $this->conn->error);
        }
    }

    //Remove selected product from your cart
    public function deleteCart($cart_id){
        $sql="DELETE FROM carts WHERE cart_id = '$cart_id'";
        //print_r($sql);

        if($this->conn->query($sql)){
            header("location: ../views/orderConfirm.php");
            exit;
        }else{
            die("Error deleteing cartProduct " . $this->conn->error);
        }
    }

    //After clicking BUY button at views/orderConfirm.php
    public function truncateCart($customer_id){
        $sql="DELETE FROM carts WHERE customer_id = '$customer_id'";
        //print_r($sql);

        if($this->conn->query($sql)){
            exit;
        }else{
            die("Error deleteing cart " . $this->conn->error);
        }
    }

    

}