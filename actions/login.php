<?php

require_once "../classes/user.php";

$username = $_POST['username'];
$password = $_POST['password'];
//print_r($username);
//print_r($password);

$user = new User;
$user->login($username, $password);