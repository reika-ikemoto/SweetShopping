<?php
    session_start();

    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    //$status =$_SESSION['status']
    //print_r($user_name);

    require_once "../classes/user.php";
    require_once "../classes/cart.php";

    $user = new User;
    $user_detail = $user->getUser($user_id);
    //print_r($user_detail);

    $cart = new Cart;
    $cart_detail = $cart->getCartCount($user_id);

?>


<div class="fixed-top"><!--fixed-top-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="justify-content-stard">
            <a href="index.php" class="navbar-brand">
                HOME
            </a>
            <a href="orderHistory.php?user_id=<?php echo $user_id; ?>&page=1" class="navbar-brand">
                Order History
            </a>
            <a href="orderConfirm.php" class="navbar-brand">
                <small><i class="fas fa-shopping-cart fa-2x" style="color: white;"><?php echo $cart_detail['COUNT(*)']; ?></small></i>
            </a>
        </div>

        <div class="justify-content-center text-white" style="padding-left: 270px; font-size: 40px;">
            <i class="fas fa-cookie-bite"></i>&nbsp;Sweets Shopping
        </div>

        <div class="justify-content-center text-white" style="padding-left: 380px; font-size: 25px;">
            Welcome! <br><?php echo $user_detail['user_name'];?>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-danger text-white global-nav">
            <ul class="global-nav__list">
                <li class="global-nav__item"><a href="profile.php?user_id=<?php echo $user_id;?>" class="nav-link">
                    <i class="fas fa-user text-white"> &nbsp;Profile</i>
                    </a>
                </li>
                    <?php
                    if($user_detail['status'] == "A"){
                    ?>
                    <li class="global-nav__item">
                        <a href="admin.php?page=1" class="nav-link">
                            <i class="fas fa-user text-white"> &nbsp;Admin</i>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                <li class="global-nav__item"><a href="../actions/logout.php" class="nav-link" >
                    <i class="fas fa-user-times text-white"> &nbsp;Logout</i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="hamburger mr-5 mt-2" id="js-hamburger">
            <span class="hamburger__line hamburger__line--1"></span>
            <span class="hamburger__line hamburger__line--2"></span>
            <span class="hamburger__line hamburger__line--3"></span>
        </div>
        <div class="black-bg" id="js-black-bg"></div>
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

