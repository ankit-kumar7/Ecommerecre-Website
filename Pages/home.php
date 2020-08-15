<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{

    echo "";
}
else{
    ?><script>
        window.location.replace("../index.php");
    </script><?php
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
</head>
<body>
    <nav class="navbar navbar-fixid-top navbar-expand-sm font-weight-bold navbar-dark  bg-primery fixed-top">
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
    </nav>
    

                                <!-- Dropdown -->
    
        <div class="container" style="padding-top:8vw;!important">
        <div class="row" >
            <div class="col">
                <div class="dropdown">
                 <a class="text-primary dropdown-toggle" data-toggle="dropdown" style="font-size:2em;!imoprtant">Men</a>
                    <div class="dropdown-menu">
                        <a href="tshirt.php" class="dropdown-item">T-shirts</a>
                        <a href="shirts.php" class="dropdown-item">Shirts</a>
                        <a href="suits&blazer.php" class="dropdown-item">Suits & Blazer</a>
                        <a href="trouser_jeans.php" class="dropdown-item">Jeans & Trousers</a>
                        <a href="" class="dropdown-item">Ties,Socks & Caps</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="dropdown">
                 <a class="text-primary dropdown-toggle" data-toggle="dropdown" style="font-size:2em;!imoprtant">Women</a>
                    <div class="dropdown-menu">
                        <a href="saries.php" class="dropdown-item">Sarees</a>
                        <a href="kurta_kurties.php" class="dropdown-item">Kurtas & Kurtis</a>
                        <a href="lhenga.php" class="dropdown-item">Lhenga</a>
                        <a href="duptas.php" class="dropdown-item">Dupats</a>
                        <a href="women_ethenic.php" class="dropdown-item">Ethnic Bottoms</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="dropdown">
                    <a class="text-primary dropdown-toggle" data-toggle="dropdown" style="font-size:2em;!imoprtant">Kids</a>
                    <div class="dropdown-menu">
                            <a href="child_boys.php"class="dropdown-item">Boy's</a>
                            <a href="child_girls.php"class="dropdown-item">Girl's</a>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="dropdown">
                    <a class="text-primary dropdown-toggle" data-toggle="dropdown" style="font-size:2em;!imoprtant">Electronics</a>
                    <div class="dropdown-menu">
                        <a href="electronics.php?id=fridge" class="dropdown-item">Fridge</a>
                        <a href="electronics.php?id=tv" class="dropdown-item">Television</a>
                        <a href="electronics.php?id=laapy" class="dropdown-item">Laptops</a>
                        <a href="electronics.php?id=others" class="dropdown-item">Others</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="dropdown">
                    <a class="text-primary dropdown-toggle" data-toggle="dropdown" style="font-size:2em;!imoprtant">Food & Beverage</a>
                    <div class="dropdown-menu">
                            <a href="food.php" class="dropdown-item">DryFoods</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="dropdown">
                    <a class="text-primary dropdown-toggle" data-toggle="dropdown" style="font-size:2em;!imoprtant">Sports</a>
                    <div class="dropdown-menu">
                         <a href="sports.php?id=outdoor" class="dropdown-item">Outdoor</a>
                        <a href="sports.php?id=indoor" class="dropdown-item">Indoor</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

                    <!-- Cart -->

    <div class="container" style="padding-top:4vw;!importnat">
        <div class="row" >

           <div class="col-md-6 col-sm-6 col-12">
               <div id="myslide" class="carousel slide" data-ride="carousel" data-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="Images/men.jpg"  class="img-fluid rounded" alt="Men"  width="500" height="400" class="d-block w-100">
                        </div>
                       <div class="carousel-item">
                          <img src="Images/women.jpg"  class="img-fluid rounded" alt="Women"  width="500" height="400" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                          <img src="Images/child.png"  class="img-fluid rounded" alt="child"  width="500" height="400" class="d-block w-100">
                        </div>
                    </div>                       
                </div>
                <h1 class="clts text-center"> Clothes </h1>   
            </div>

            <div class="col-md-6 col-sm-6 col-12">
                <div id="myslide" class="carousel slide" data-ride="carousel" data-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Images/lappy.jpg"  class="img-fluid rounded" alt="Men"  width="500" height="400" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="Images/fridge.jpg"  class="img-fluid rounded" alt="Women"  width="500" height="400" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            
                            <img src="Images/tv.jpg"  class="img-fluid rounded" alt="child"  width="500" height="400" class="d-block w-100">
                        </div>
                    </div>                         
                </div>
                <h1 class="clts text-center"> Electronics </h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-6 col-sm-6 col-12">

               <div id="myslide" class="carousel slide" data-ride="carousel" data-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Images/allfood.jpg"  class="img-fluid rounded" alt="all"  width="500" height="400" class="d-block w-100">
                        </div>
                       <div class="carousel-item">
                             <img src="Images/fruit.jpg"  class="img-fluid rounded" alt="fruit"  width="500" height="400" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="Images/dryfood.jpg"  class="img-fluid rounded" alt="dryfood"  width="500" height="400" class="d-block w-100">
                        </div>
                    </div>                       
                </div>
                <h1 class="clts text-center"> Food $ Beverage </h1>   
            </div>

            <div class="col-md-6 col-sm-6 col-12">
                <div id="myslide" class="carousel slide" data-ride="carousel" data-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Images/allsports.jpg"  class="img-fluid rounded" alt="all"  width="500" height="400" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="Images/batfootball.jpg"  class="img-fluid rounded" alt="batt&Football"  width="500" height="400" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            
                            <img src="Images/chess.jpg"  class="img-fluid rounded" alt="chess"  width="500" height="400" class="d-block w-100">
                        </div>
                    </div>                         
                </div>
                <h1 class="clts text-center"> Sports </h1>
            </div>
        </div>
    </div>
    </div>

    
                <!-- Footer -->
    
    
    <div class="container" style="padding-top:5vw;!important">
                <table class="table text-primary">
                    <tr>
                        <th>Company Links</th>
                        <th>Product Catalog links</th>
                        <th>Customer service links</th>
                        <th>Marketing Links </th>
                        <th> Legal  links </th>
                    </tr>
                    <tr>
                        <td>About</td>
                        <td>Main Department</td>
                        <td>Help / FAQ </td>
                        <td>Facebook </td>
                        <td>Privacy Policy</td>
                    </tr>
                    <tr>
                        <td>Careers </td>
                        <td>Collections </td>
                        <td>Find a Store</td>
                        <td>Instagram  </td>
                        <td>Terms and conditions</td>
                    </tr>
                    <tr>
                        <td>Press Releases </td>
                        <td>Brands  </td>
                        <td>Order Status </td>
                        <td>Youtube   </td>
                    </tr>
                    <tr>
                        <td>Affiliate Program </td>
                        <td><a href="Shopkeeper_login.php">Shopkeeper</a></td>
                        <td>Shipping, Delivery & Returns</td>
                        <td>Linkedin</td>
                    </tr>
                    <tr>
                        <td>Sitemap </td>
                        <td>Store Locations </td>
                        <td>Payments & Refunds </td>
                        <td>Youtube</td>
                    </tr>


                </table>
            </div>   
            
    <script>
        $(document).ready(function(){
            $('.dropdown-submenu a.test').on("click", function(e){
                 $(this).next('ul').toggle();
                e.stopPropagation();
              e.preventDefault();
             });
        });
    </script>

</body>
</html>
