<?php 
session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{
include_once('db_con.php');

$id = $_SESSION['id'];

$qry = "SELECT `Shop_Id` FROM `shopkeeper` WHERE `Contact`='$id'";

$run = mysqli_query($con,$qry);

$data = mysqli_fetch_array($run);

$shop_id = $_POST['shop_id'];
$product_id = $_POST['product_id'];
$proodcut_name = $_POST['product_name'];
$category = $_POST['category'];
$types = $_POST['types'];
$description = $_POST['description'];
$price = $_POST['price'];
$imagename = $_FILES['img']['name'];
$tempname = $_FILES['img']['tmp_name'];
move_uploaded_file($tempname,"Item/$imagename");

if($shop_id == $data['Shop_Id'])
{
    $qry = "INSERT INTO `item`(`Shop_Id`, `Product_Id`, `Product_Name`, `Product_Type`, `Description`,`Price`, `Image`)
             VALUES ('$shop_id','$product_id','$proodcut_name','$types','$description','$price','$imagename')";
        
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
                        title: "Add Product",
                        text: "Product Added Successfully!",
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
                        title: "Add Product",
                        text: "<?php echo $con->error;?> ",
                        icon: "error",
                        button: "Ok!"
                        }).then(function() {
                        window.location.replace("additem.php");
                    });
                    </script>
                </body>
            </html>
        <?php
    }
    
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
                        title: "Add Item",
                        text: "You entered wrong Shop id!",
                        icon: "error",
                        button: "Ok!"
                        }).then(function() {
                        window.location.replace("additem.php");
                    });
                    </script>
                </body>
            </html>
        <?php
}
}
?>
