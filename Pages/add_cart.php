<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    $uid = $_SESSION['uid'];
    $pid = $_GET['product_id'];
    $temp=0;
    include_once('db_con.php');

    $qry = "SELECT * FROM `cart` WHERE `Product_Id` = '$pid'";

    $run = mysqli_query($con,$qry);

    while($data = mysqli_fetch_assoc($run))
    {
         if($data['Product_Id'] == $pid)
         {
           $temp=1;
            ?>
            <html>
            <head>
                <link rel="stylesheet" type="text/css" href="../style.css">
                 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
            <script>
                 swal({
                    title: "Add to Cart",
                    text: "Already Added In Your Cart!",
                    icon: "success",
                    button: "Ok!"
                    }).then(function() {
                    window.location.replace("cart.php");
                });
             </script>
            </body>
        </html>
         <?php

        }

    }

    if($temp==0)
    {
        $qry = "INSERT INTO `cart`(`User_Id`, `Product_Id`) VALUES ('$uid','$pid')";

        $run = mysqli_query($con,$qry);
        if($run==true)
        { 
            ?>
                <html>
                        <head>
                            <link rel="stylesheet" type="text/css" href="../style.css">
                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        </head>
                        <body>
                        <script>
                            swal({
                                title: "Add to Cart",
                                text: "Add In Cart Successfully!",
                                icon: "success",
                                button: "Ok!"
                                }).then(function() {
                                window.location.replace("cart.php");
                            });
                        </script>
                        </body>
                    </html>
                <?php
        }
        else
        echo "Error".$mysqli_error();
    }
}
else
{
    header('location:login.php');
}

?>
