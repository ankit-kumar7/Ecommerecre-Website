<?php

session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{
    include_once('db_con.php');
    $id = $_GET['id'];

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $types = $_POST['types'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $imagename = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname,"Item/$imagename");

    if(empty($imagename))
    {
        $imagename = $id;
    }
    else
    {
        unlink('Item/'.$id);
    }

    $qry = "UPDATE `item` SET `Product_Id`='$product_id',`Product_Name`='$product_name',`Product_Type`= '$types',`Description`= '$description',`Price`='$price',`Image`= '$imagename' 
                WHERE `Product_Id` = '$product_id'";

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
                        title: "Update Product",
                        text: "Product Update Successfully!",
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

?>