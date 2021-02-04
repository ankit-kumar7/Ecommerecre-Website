<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
   ?>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Cart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="../style/style.css"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="bootstrap-4.4.1-dist/js/all.js"></script>
    </head>
    <body style="background-image: url(../Images/bg2.jpg);background-size:cover;background-repeat: no-repeat;margin:0px;padding:0px;!important">
        <div class="container">
            <h1 align="center">My Cart</h1>
            <a href="home.php" align="left" class="text-primary" style="padding-top:3%;display:inline-block;!important"><h2> HOME</h2></a>
            <?php    
                include_once('db_con.php');

                $id = $_SESSION['uid'];

                $qry = "SELECT `Product_Id` FROM `cart` WHERE `User_Id` = '$id'";

                $run = mysqli_query($con,$qry);
                
                if($run==true)
                {

                    $count = mysqli_num_rows($run);

                    if($count==0)
                    {
                        ?>
                        <div align="center" style="background-color:Coronsilk;">
                            <img src="../Images/cart.jpg" alt="Cart" width="350px" height="350px" style="padding-top:5%;">
                            <h5 style="padding-top:5%; padding-left:5px;"> Your cart is empty!</h5>
                            <p > Add item to it now.</p>
                            <a href="home.php" class="btn btn-primary">Shop Now </a>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="table-responsive ">
                        <table class="table-sm table-bordered" style="margin-top:3vw;">
                            <tbody>
                                <?php
                                while($data = mysqli_fetch_assoc($run))
                                {
                                    $product_id = $data['Product_Id'];
                                    $qry2 = "SELECT `Shop_Id`,`Product_Id`,`Product_Name`, `Description`, `Price`, `Image` FROM `items` 
                                                WHERE`Product_Id` ='$product_id'";
                                            
                                    $run2 = mysqli_query($con,$qry2);
                                    
                                    $dataitem = mysqli_fetch_assoc($run2);

                                    $shop_id = $dataitem['Shop_Id'];

                                    $qry3 = "SELECT `Shop_Name` FROM `shopkeepers` WHERE `Shop_Id` = '$shop_id'";

                                    $run3 = mysqli_query($con,$qry3);

                                    $datashop = mysqli_fetch_assoc($run3);
                                    ?>
                                            <tr>
                                                <td rowspan="3" height="100vw;" width=100vw;><img src="Item/<?php echo $dataitem['Image'];?>" class="img-responsive" style="height:200;width:200px;!important"></td>
                                                <th><?php echo $dataitem['Description'];?></th>
                                                <th rowspan="3">
                                                    <a href="remove_cart.php?id=<?php echo $dataitem['Product_Id'];?>" align="center">Remove</a>
                                                    <a href="order.php?product_id=<?php echo $data['Product_Id'];?>" class="btn btn-primary" style="margin-left:8vw;">Palce Order</a>
                                                    </th>
                                            </tr>
                                            <tr>
                                                <td> Saller:<?php echo $datashop['Shop_Name'];?></td>
                                            </tr>
                                            <tr>                                            
                                                <th><?php echo $dataitem['Price']."₹";?></th>
                                            </tr>                                     
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </body>
    </html>
    <?php
    }
    else
    {
        header('location:login.php');
    }
    ?>