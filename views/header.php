<?php
    session_start();

    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    //$status =$_SESSION['status']
    //print_r($user_name);

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
<link rel="stylesheet" href="../assets/css/style.css">
<title>Header</title>
</head>

<body>

<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="justify-content-stard">
            <a href="index.php" class="navbar-brand">
                TOP
            </a>
            <a href="orderHistory.php?user_id=<?php echo $user_id; ?>" class="navbar-brand">
                Order History
            </a>
        </div>

        <!-- TOGGLER/COLLAPSE BUTTON -->
        <!--humbarger menu-->
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_content">-->
            <!--data-toggle class-->
            <!--data-target id   #:selecter-->
            <!--<span class="navbar-toggler-icon"></span>
        </button>-->

        <div class="justify-content-end" id="menu_content">
            <ul class="nav navbar-nav text-right">
                <?php
                    //if($user_detail['status'] == "A"){
                ?>
                
                <li class="nav-item">
                    
                </li>
                <?php
                    //}
                ?>
                <li class="nav-item">
                    <a href="orderConfirm.php" class="nav-link">
                        <i class="fas fa-shopping-cart fa-2x" style="color: white;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    
                </li>
                <li class="nav-item">
                    
                </li>
            </ul>

            <nav class="navbar navbar-expand-lg navbar-dark bg-danger global-nav">
        <ul class="global-nav__list">

            <li class="global-nav__item"><a href="profile.php?user_id=<?php echo $user_id;?>" class="nav-link">
                        <i class="fas fa-user text-dark"><?= $user_name; ?>Profile</i>
                    </a></li>
            
                    <?php
                    if($user_detail['status'] == "A"){
                ?>
            <li class="global-nav__item"><a href="admin.php" class="nav-link">
                        <i class="fas fa-user text-dark">Admin</i>
                    </a></li>
                    <?php
                    }
                    ?>
            <li class="global-nav__item"><a href="../actions/logout.php" class="nav-link" >
                        <i class="fas fa-user-times text-dark">Logout</i>
                    </a></li>
        </ul>
    </nav>
    <div class="hamburger mr-5 mt-2" id="js-hamburger">
        <span class="hamburger__line hamburger__line--1"></span>
        <span class="hamburger__line hamburger__line--2"></span>
        <span class="hamburger__line hamburger__line--3"></span>
    </div>
    <div class="black-bg" id="js-black-bg"></div>

        </div>

        
        


    </nav>

    


    <script>
        function toggleNav() {
            var body = document.body;
            var hamburger = document.getElementById('js-hamburger');
            var blackBg = document.getElementById('js-black-bg');

            hamburger.addEventListener('click', function() {
                body.classList.toggle('nav-open');
            });
            blackBg.addEventListener('click', function() {
                body.classList.remove('nav-open');
            });
        }
            toggleNav();
    </script>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>