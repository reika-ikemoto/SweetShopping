<?php

include_once "../classes/user.php";


$user_id = $_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_name = $_POST['user_name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$user = new User;
$user->updateUser($user_id, $first_name, $last_name, $user_name, $address, $email, $phone, $password);