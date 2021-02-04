<?php

session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{

include_once('db_con.php');

$product_id = $_GET['id'];

$image = $_GET['img'];

$qry = "DELETE FROM `items` WHERE `Product_Id` = '$product_id'";

$run = mysqli_query($con,$qry);

if($run==true)
{
    unlink('Item/'.$image);
        
    ?>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="../style.css">
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </head>
        <body>
        <script>
            swal({
                title: "Delete Product",
                text: "Product Deleted Successfully!",
                icon: "success",
                button: "Ok!"
                }).then(function() {
                window.location.replace("shop_cart.php");
            });
            </script>
        </body>
    </html>
    <?php
}
}
else
{
    header('location:shopkeeper_login.php');
}
?>

