<?php

    session_start();
    error_reporting(0);
    if(isset($_SESSION['id']))
    {
        include_once('db_con.php');

        $id = $_SESSION['id'];

        $qry = "SELECT `Shop_Id`, Shop_Name FROM `shopkeepers` WHERE `Contact`='$id'";

        $run = mysqli_query($con,$qry);

        $data = mysqli_fetch_array($run);

        $shop_id = $data['Shop_Id'];

        $shop_name = $data['Shop_Name'];

        $count = 1;
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
    <body style="background-image: url(../Images/bg2.jpg);background-size: cover;background-repeat: no-repeat;margin:0px;padding:0px;!important">
        <div class="container">
        <a href="home.php" align="left" class="text-primary" style="padding-top:3%;display:inline-block;!important"><h2> HOME</h2></a>
            <a href="shopkeeper_account.php" class="text-primary"style="display:inline-block; padding-left:73%;!important"><h2> Your Account</h2></a>
            <a href="additem.php" align="right" class="text-primary"><h5> Add New Product</h5></a>     
            <div style="padding-top:1%; important"></div>
            <table class="table text-primary" border="1" style="width:100%;!important">
            <thead>
                <tr>
                    <th colspan="9" class="text-center"><h3><?php echo $shop_name;?></h3> </th>
                </tr>
                <tr class="text-center">
                    <th>Id</th>
                    <th> Product Id </th>
                    <th>Product Name</th>
                    <th>Type of Product</th>
                    <th>Description</th>
                    <th>Price(₹)</th>    
                    <th>Product</th>
                    <th>Status</th>
                    <th>Delete/Update</th>
                </tr>
            </thead>
                <tbody style="font-weight:650;!important">
                <?php 
                    
                    $qry = "SELECT * FROM `items` WHERE `Shop_Id` = '$shop_id'";

                    $run = mysqli_query($con,$qry);

                    if($run==true)
                    {
                        while($data = mysqli_fetch_array($run))
                        {
                            ?>
                            <tr>
                                <td> <?php echo $count; ?> </td>
                                <td> <?php echo $data['Product_Id']; ?> </td>
                                <td> <?php echo $data['Product_Name']; ?> </td>
                                <td> <?php echo $data['Product_Type']; ?> </td>
                                <td> <?php echo $data['Description']; ?> </td>
                                <td> <?php echo $data['Price']." ₹"; ?> </td>
                                <td> <img src="Item/<?php echo $data['Image']; ?>" style="width:100px;height:100px;" alt="Product"></td>
                                <td></td>
                                <td><a href="update_item.php ?id=<?php echo $data['Product_Id'];?>&img=<?php echo $data['Image'];?>">Update</a> / 
                                <a href="delete_item.php ?id=<?php echo $data['Product_Id'];?>&img=<?php echo $data['Image'];?>">Delete</td>
                            </tr>
                            <?php
                            $count = $count+1;
                        }
                    }
                    if($count==1)
                    {
                        ?>
                        <tr>
                            <td colspan="9" class="text-center"> You didn't add any item </td>
                        </tr>
                        <?php
                    }
                
                    

                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
    <?php
    }
    else
    {
        header('location:Shopkeeper_login.php');
    }
    ?>