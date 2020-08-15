<?php

session_start();
error_reporting(0);
if(isset($_SESSION['id']))
{
    header('location:shop_cart.php');
}

include_once('db_con.php');

$shop_id = $_POST['shop_id'];
$shop_name = $_POST['shop_name'];
$shopkeeper_name = $_POST['name'];
$password = $_POST['password'];
$encoded_pass = base64_encode($password);
$contact = $_POST['contact'];
$address = $_POST['address'];

$qry = "SELECT `Contact` FROM `shopkeeper` WHERE `Contact`='$contact'";

$run = mysqli_query($con,$qry);

$data = mysqli_fetch_assoc($run);

$count = mysqli_num_rows($run);

if($count>0)
{
    $temp=0;
    ?>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="../style.css">
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </head>
        <body>
        <script>
            swal({
                title: "Sign Up",
                text: "This phone number has been already used!",
                icon: "error",
                button: "Ok!"
                }).then(function() {
                window.location.replace("Shopkeeper_Signup.php");
            });
         </script>
        </body>
    </html>


<?php
}
else
{
    $temp=1;
}
if($temp==1)
{

$qry = "INSERT INTO `shopkeeper`(`Shop_Id`, `Shop_Name`, `Shopkeeper_Name`, `Password`, `Contact`, `Address`) 
            VALUES ('$shop_id','$shop_name','$shopkeeper_name','$encoded_pass','$contact','$address')";

$run = mysqli_query($con,$qry);

if($run==true)
{
    session_start();
    $_SESSION['id'] = $_POST['contact'];
    ?>
    <html>
                    <head>
                        <link rel="stylesheet" type="text/css" href="../style.css">
                         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    </head>
                    <body>
                    <script>
                        swal({
                            title: "Sign In",
                            text: "Successfully Register!",
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
else{
    ?>
    <html>
                    <head>
                        <link rel="stylesheet" type="text/css" href="../style.css">
                         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    </head>
                    <body>
                    <script>
                        swal({
                            title: "Sign In",
                            text:"This Shop Id has been already used!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("shopkeeper_Signup.php");
                        });
                     </script>
                    </body>
                </html>
        <?php
}
    // echo "error: ".$con->error;
}

?>