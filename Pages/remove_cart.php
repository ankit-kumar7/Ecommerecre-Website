<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    $pid = $_GET['id'];

    include_once('db_con.php');

    $qry = "DELETE FROM `cart` WHERE `Product_Id` = '$pid'";

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
                    title: "Remove",
                    text: "Remove From Cart Successfully!",
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
else
{
    header('location:login.php');
}

?>