<?php

include "views/header.php";

if(!$_SESSION['user_id']){
    header("location: login.php");
    exit;
}

?>