<?php

session_start();
error_reporting(0);
if(isset($_SESSION['id']))
{
    header('location:shop_cart.php');
}

include_once('db_con.php');

$user = $_POST['user'];
$password = $_POST['password'];
$encoded_pass = base64_encode($password);

$qry = "SELECT * FROM `shopkeepers` WHERE `Contact` = '$user' AND `Password` = '$encoded_pass'";

$run = mysqli_query($con,$qry);

if($run==true)
{
    $data = mysqli_fetch_assoc($run);
    $temp = mysqli_num_rows($run);
        if($temp>0)
            {
                session_start();
                $_SESSION['id'] = $data['Contact'];
                ?>
                <html>
                    <head>
                        <link rel="stylesheet" type="text/css" href="../style.css">
                         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    </head>
                    <body>
                    <script>
                        swal({
                            title: "Login",
                            text: "Login Successfully!",
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
            
        else
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
                            title: "Login",
                            text: "Incorrect Username & Password!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("shopkeeper_login.php");
                        });
                     </script>
                    </body>
                </html>
            <?php
        }
}
else
    echo $con->error;
?>