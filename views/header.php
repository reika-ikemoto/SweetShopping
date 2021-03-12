<?php
    session_start();

    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    //$status =$_SESSION['status']
    //print_r($user_name);
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
<title>Header</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="justify-content-stard">
            <a href="index.php" class="navbar-brand">
                Products
            </a>
            <a href="orderHistory.php?user_id=<?php echo $user_id; ?>" class="navbar-brand">
                Order history
            </a>
        </div>

        <!-- TOGGLER/CPLLAPSE BUTTON -->
        <!--humbarger menu-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_content">
            <!--data-toggle class-->
            <!--data-target id   #:selecter-->
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="menu_content">
            <ul class="nav navbar-nav text-right">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">
                        <i class="fas fa-user text-dark">Admin</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">
                        <i class="fas fa-user text-primary"><?= $user_name; ?></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link" >
                        <i class="fas fa-user-times text-danger"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>