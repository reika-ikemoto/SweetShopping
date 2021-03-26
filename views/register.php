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
<title>Register</title>
</head>

<body class="text-dark">
    <div class="container w-50 mt-5">
        <form action="../actions/register.php" method="post">
            <h1 class="display-4">Registration</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name &nbsp;<span style="color:red">*</span></label>
                    <input type="text" name="first_name" id="first_name" class="form-control required autofocus" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name &nbsp;<span style="color:red">*</span></label>
                    <input type="text" name="last_name" id="last_name" class="form-control required" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="last_name">User Name &nbsp;<span style="color:red">*</span></label>
                    <input type="text" name="user_name" id="user_name" class="form-control required" placeholder="User Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Password &nbsp;<span style="color:red">*</span></label>
                    <input type="password" name="password" id="password" class="form-control required" placeholder="Password" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="last_name">Address &nbsp;<span style="color:red">*</span></label>
                    <input type="text" name="address" id="address" class="form-control required" placeholder="Address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">Email &nbsp;<span style="color:red">*</span></label>
                    <input type="text" name="email" id="email" class="form-control required" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Phone</label>
                    <input type="int" name="phone" id="phone" class="form-control" placeholder="Phone">
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="form-group col-md-9">
                    <div>Do you have your account? <a href="login.php">Log in</a></div>
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" name="register" value="Register" class="form-control btn btn-secondary">
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