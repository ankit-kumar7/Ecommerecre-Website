<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/all.js"></script>
</head>
<body>
    <nav class="navbar navbar-fixid-top navbar-expand-sm font-weight-bold navbar-dark  bg-primery fixed-top">
    <?php
    session_start();
    error_reporting(0);
    if($_SESSION['uid'])
    {
        ?>
        <div class="container">
            <a href="#" class="navbar-brand logo"> <img src="Images/logo1.jpg"style="height:60px;" alt="Shopping"></a>
            <!-- <a href="#" lass="navbar-brand">Shopping</a> -->
            <button class="navbar-toggler"  data-toggle="collapse" data-target="#nv">
                <span class="navbar-toggler-icon icon"> </span>
            </button>
            <div class="collapse navbar-collapse"  id="nv">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link nab" style="color: deepskyblue; font-size:1.5rem; !imporatant"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a  href="cart.php" class="nav-link nab"style="color: deepskyblue; font-size:1.5rem; !important"><i class="fas fa-shopping-cart"></i>Cart/Order</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://mail.google.com/" class="nav-link nab" style="color: deepskyblue; font-size:1.5rem; !important"><i class="fas fa-phone-square-alt"></i>Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a  href="account.php" class="nav-link nab"style="color: deepskyblue; font-size:1.5rem; !important" id="login"> <i class="fas fa-user-circle"></i>Account</a>
                    </li>
                </ul>
            </div>
        </div>
            <?php
        }
        else
        {
            ?>
            <div class="container">
            <a href="#" class="navbar-brand logo"> <img src="Images/logo1.jpg"style="height:60px;" alt="Shopping"></a>
            <!-- <a href="#" lass="navbar-brand">Shopping</a> -->
            <button class="navbar-toggler"  data-toggle="collapse" data-target="#nv">
                <span class="navbar-toggler-icon icon"> </span>
            </button>
            <div class="collapse navbar-collapse"  id="nv">
            <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link nab" style="color: deepskyblue; font-size:1.5rem; !imporatant"><i class="fas fa-home "></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a  href="login.php" class="nav-link nab"style="color: deepskyblue; font-size:1.5rem; !important" id="login"> <i class="fas fa-user-circle"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://mail.google.com/" class="nav-link nab" style="color: deepskyblue; font-size:1.5rem; !important"><i class="fas fa-phone-square-alt"></i>Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        }
        ?>
    </nav>
</body>
</html>