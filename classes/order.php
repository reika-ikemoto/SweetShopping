<?php

require_once "database.php";
require_once "cart.php";

class Order extends Database{

    public function registOrders($customer_id, $delivery_fee, $gift_fee, $discount, $total_price, $date){
        $sql = "INSERT INTO orders (`customer_id`, `delivery_fee`, `gift_fee`, `discount`, `total`, `date`) 
                VALUES ('$customer_id', '$delivery_fee', '$gift_fee', '$discount', '$total_price', '$date')";
        
        if($this->conn->query($sql)){
            //header("location: ../views/orderComplete.php");
            //exit;
            $this->registOrderItems($customer_id);
        }else{
            die("Error to regist order: " . $this->conn->error);
        }
    }

    public function registOrderItems($customer_id){
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, unit_price)
                SELECT (SELECT max(order_id) FROM orders), product_id, quantity, unit_price FROM carts WHERE customer_id = '$customer_id'";
                print_r($sql);

        if($this->conn->query($sql)){ 
            //echo "success";
            header("location: ../views/orderComplete.php");
        }else{
            die("Error to complete order: " . $this->conn->error);
        }
    }

    //Order History
    public function displayOrderHistory($user_id, $start){
        $sql = "SELECT * FROM orders WHERE customer_id = '$user_id' ORDER BY date DESC LIMIT $start, 5";

        if($result = $this->conn->query($sql)){
            //print_r($result);
            return $result;
        }else{
            die("Error to display OrderHistory: " . $this->conn->error);
        }

    }

    public function getUsersNumOfRows($user_id){
        $sql = "SELECT * FROM orders WHERE customer_id = '$user_id'";

        if($result = $this->conn->query($sql)){
            $num_rows = $result->num_rows / 5;
            return ceil($num_rows);
        }else{
            die("Error to get NumOfRows: ". $this->conn->error);
        }
    }


    //Order History details
    public function displayOrderHistoryDetails($order_id){
        $sql = "SELECT * FROM orders 
        INNER JOIN order_items ON orders.order_id = order_items.order_id 
        INNER JOIN products ON order_items.product_id = products.product_id 
        WHERE orders.order_id = '$order_id'";

        //print_r($sql);

        if($result = $this->conn->query($sql)){
            return $result;
            exit;
        }else{
            die("Error to display OrderHistory: " . $this->conn->error);
        }

    }

    public function getOrderHistory($start){
        $sql = "SELECT * FROM orders INNER JOIN users ON orders.customer_id = users.user_id ORDER BY date DESC LIMIT $start, 5";

        if($result = $this->conn->query($sql)){
            return $result;
            exit;
        }else{
            die("Error to display OrderHistory: " . $this->conn->error);
        }
    }

    //Admin Page
    public function searchOrderHistory($order_id){
        $sql = "SELECT * FROM orders INNER JOIN users ON orders.customer_id = users.user_id WHERE order_id = '$order_id'";
        //print_r($sql);
        if($result = $this->conn->query($sql)){
            return $result;
            exit;
        }else{
            die("Error to serach OrderHistory: " . $this->conn->error);
        }
    }

    //Admin Page
    public function getNumOfRows(){
        $sql = "SELECT * FROM orders";

        if($result = $this->conn->query($sql)){
            $num_rows = $result->num_rows / 5;
            return ceil($num_rows); 
            exit;  
        }else{
            die("Error to get NumOfRows: " . $this->conn->error);
        }
    }

    
}