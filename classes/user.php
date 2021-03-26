<?php

require_once "database.php";

class User extends Database{

    public function createUser($first_name, $last_name, $user_name, $address, $email, $phone, $password){
        $sql = "INSERT INTO users(first_name, last_name, `user_name`, `address`, email, phone, `password`) 
                VALUES('$first_name', '$last_name', '$user_name', '$address', '$email', '$phone', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views/login.php");
            exit;
        }else{
            die("Error to create user: " . $this->conn->error);
        }
    }

    public function login($user_name, $password){
        $sql = "SELECT * FROM users WHERE `user_name` = '$user_name'";
        //print_r($sql);

        $result = $this->conn->query($sql);
        //print_r($result);

        if($result->num_rows == 1){
            $user_detail = $result->fetch_assoc();
            //print_r($user_detail);

            if(password_verify($password, $user_detail['password'])){
                session_start();

                $_SESSION['user_id'] = $user_detail['user_id'];
                $_SESSION['user_name'] = $user_detail['user_name'];
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

    public function getUsers(){
        $sql = "SELECT * FROM users ORDER BY user_name ASC";

        if($result = $this->conn->query($sql)){
            return $result;
            exit;
        }else{
            die("Error Retriving users: ". $this->conn->error);
        }
    }

    //Profile Page
    public function getUser($user_id){
        $sql = "SELECT * FROM users WHERE `user_id` = '$user_id'";

        if($result = $this->conn->query($sql)){
            //return $result;
            return $result->fetch_assoc();
            exit;
        }else{
            die("Error Retriving user: ". $this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name, $last_name, $user_name, $address, $email, $phone, $password){
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name',
        address = '$address', email = '$email', phone = '$phone', password = '$password'
        WHERE user_id = '$user_id'";

        if($this->conn->query($sql)){
            header("location: ../views/profile.php?update_result=1");
            exit;
        }else{
            die("Error to update user: " . $this->conn->error);
        }
    }
}
