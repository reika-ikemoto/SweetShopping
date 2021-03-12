<?php

require_once "database.php";

class User extends Database{

    public function createUser($first_name, $last_name, $user_name, $address, $email, $phone, $password){
        $sql = "INSERT INTO users(first_name, last_name, `username`, `address`, email, phone, `password`) 
                VALUES('$first_name', '$last_name', '$user_name', '$address', '$email', '$phone', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views/login.php");
            exit;
        }else{
            die("Error to create user: " . $this->conn->error);
        }
    }

    public function login($user_name, $password){
        $sql = "SELECT * FROM users WHERE `username` = '$user_name'";

        $result = $this->conn->query($sql);
        //print_r($result);

        if($result->num_rows == 1){
            $user_detail = $result->fetch_assoc();
            //print_r($user_detail);

            if(password_verify($password, $user_detail['password'])){
                session_start();

                $_SESSION['user_id'] = $user_detail['user_id'];
                $_SESSION['user_name'] = $user_detail['username'];
                $_SESSION['status'] = $user_detail['status'];
                //print_r($_SESSION['user_name']);

                header("location: ../views/index.php");
                exit;
            }else{
                echo "Your password is Wrong";

            }
        }else{
            echo "Your username is Wrong";
        }
    }
}
