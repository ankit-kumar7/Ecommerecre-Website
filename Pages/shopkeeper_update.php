<?php

session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $oldshop_id = $_GET['shopid'];
    $oldcontact = base64_decode($_GET['number']);
    $temp=1;

    $shop_id = $_POST['shop_id'];
    $shop_name = $_POST['shop_name'];
    $shopkeeper_name = $_POST['name'];
    $password = $_POST['password'];
    $encoded_pass = base64_encode($password);
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    include_once('db_con.php');

    if($shop_id!=$oldshop_id)
    {
        $qry = "UPDATE `shopkeepers` SET `Shop_Id`='' WHERE `Contact`= '$oldcontact'";

        $run = mysqli_query($con,$qry);

        $qry = "SELECT * FROM `shopkeepers` WHERE `Shop_Id`='$shop_id'";

        $run = mysqli_query($con,$qry);

        $data = mysqli_fetch_assoc($run);

        $count = mysqli_num_rows($run);

        if($count>0)
        {
            $temp=0;
            
            $qry = "UPDATE `shopkeepers` SET `Shop_Id`='$oldshop_id' WHERE `Contact`= '$oldcontact'";
            
            $run = mysqli_query($con,$qry);
            ?>
            <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="../style.css">
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                </head>
                <body>
                    <script>
                        swal({
                            title: "Update Account",
                            text: "This Shop Id has been already used!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("shop_cart.php");
                        });
                    </script>
                </body>
            </html>
            <?php
        }
        $qry = "UPDATE `shopkeepers` SET `Shop_Id`='$shop_id' WHERE `Contact`= '$oldcontact'"; 

        $run = mysqli_query($con,$qry);
    }

    else if($contact!=$oldcontact)
    {
        $qry = "UPDATE `shopkeepers` SET `Contact`='' WHERE `Shop_Id`= '$shop_id'";

        $run = mysqli_query($con,$qry);

        $qry = "SELECT * FROM `shopkeepers` WHERE `Contact`='$contact'";
        
        $run = mysqli_query($con,$qry);

        $data = mysqli_fetch_assoc($run);

        $count = mysqli_num_rows($run);

        if($count>0)
        {
            $temp=0;
            
            $qry = "UPDATE `shopkeepers` SET `Contact`='$oldcontact' WHERE `Shop_Id`= '$shop_id'";
            
            $run = mysqli_query($con,$qry);
            ?>
            <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="../style.css">
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                </head>
                <body>
                    <script>
                        swal({
                            title: "Update Account",
                            text: "This Phone number has been already used!",
                            icon: "error",
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

    if($temp==1)
    {
    $qry = "UPDATE `shopkeepers` SET `Shop_Id`='$shop_id',`Shop_Name`='$shop_name',`Shopkeeper_Name`='$shopkeeper_name',`Password`='$encoded_pass',`Contact`='$contact',`Address`='$address'
                WHERE `Contact`='$id' OR `Shop_Id`='$shop_id'";

    $run = mysqli_query($con,$qry);

    $qry2 = "UPDATE `items` SET `Shop_Id`='$shop_id' WHERE `Shop_Id`='$oldshop_id'";

    $run2 = mysqli_query($con,$qry2);

    if(($run==true)and($run2==true))
    {
        unset($_SESSION['id']);
        session_start();
        $_SESSION['id']=$_POST['contact'];
        ?>
            <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="../style.css">
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                </head>
                <body>
                <script>
                    swal({
                        title: "Update",
                        text: "Update Successfully!",
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
}
else
{
    header('location:../index.php');
}

?>