<?php

$user_id =$_GET['user_id'];
//print_r($user_id);

require_once "../classes/user.php";

$user = new User;
$user_detail = $user->getUser($user_id);
//print_r($user_detail);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Profile</title>
</head>
<?php
include "header.php";
?>

<body class="bg-dark text-white">
    <div class="container w-50 mt-5">
        <form action="../actions/profile.php" method="post">
            <h1 class="display-4"><i class="fas fa-user-edit"></i>Profile</h1>
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name <span style="color:red">*</span></label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $user_detail['first_name']?>" class="form-control required autofocus" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name <span style="color:red">*</span></label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $user_detail['last_name']?>" class="form-control required" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="last_name">User Name<span style="color:red">*</span></label>
                    <input type="text" name="user_name" id="user_name" value="<?php echo $user_detail['user_name']?>" class="form-control required" placeholder="User Name">
                </div>
                <div class="form-group col-md-6">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="last_name">Address<span style="color:red">*</span></label>
                    <input type="text" name="address" id="address" value="<?php echo $user_detail['address']?>" class="form-control required" placeholder="Address">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">Email <span style="color:red">*</span></label>
                    <input type="text" name="email" id="email" value="<?php echo $user_detail['email']?>" class="form-control required" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Phone</label>
                    <input type="int" name="phone" id="phone" class="form-control" value="<?php echo $user_detail['phone']?>" placeholder="Phone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control required" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="confirm Password">
                </div>
            </div>
            <div class="form-row mt-5">
                
                <div class="form-group col-md-6">
                    <input type="submit" name="update" value="Update" class="form-control btn btn-secondary">
                </div>
            </div>
            <h1></h1>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>