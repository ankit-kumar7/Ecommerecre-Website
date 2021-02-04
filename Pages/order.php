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
        <title>T-Shirt</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN1GV9Jm2u7rmsCe65wKzPTw5jtS38n2tVEGiQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
        <style>
        body
        {
            background-image: url(../Images/bg2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin:0px;
            padding:0px;
        }
            .dl { 
                border-collapse:separate; 
                border-spacing:0 15px; 
                background-color:cornflowerblue;
                color:white;
                text-align:center;
                padding:1px;
                font-size:2vw;
            } 
        </style>
    </head>
    <body>
    <?php
    
    $pid = $_GET['product_id'];
    
    $uid = $_SESSION['uid'];

    include_once('db_con.php');

    $qry = "SELECT Shop_Id, Price FROM `items` WHERE `Product_Id` = '$pid'";

    $run = mysqli_query($con,$qry);

    if($run==true)
    {

       $item_data = mysqli_fetch_assoc($run);

       $shop_id = $item_data['Shop_Id'];

        $qry2 = "SELECT * FROM `users` WHERE `Contact` = '$uid'";

        $run2 = mysqli_query($con,$qry2);

        if($run2==true)
        {
            $user_data = mysqli_fetch_assoc($run2);
            ?>
            <div class="container table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="text-primary">
                            <td><h3> Login Account</h3> <br> 
                                    <?php echo $user_data['Name'];?> <br> 
                                    <?php echo "+91".$user_data['Contact'];?> 
                            </td>
                            <td style="padding-top:5vw;padding-left:1vw;"> 
                                <a href="logout.php" class="btn btn-primary">Change</a>
                            </td>
                            <td style="padding-left:25vw;"><h3> Price Details</h3> <br> 
                                    <?php echo "Price: ".$item_data['Price']." ₹";?> <br> 
                                    <?php echo "Dilevery Charge: 40 ₹";
                                        $total = $item_data['Price']+40;?><br>
                                    <?php echo "Total: ".$total." ₹";?>
                            </td>                         
                        </tr>
                        <tr>
                            <th colspan="3" class="dl">Dilevry Address</th>
                        </tr>
                        <tr class="text-primary">
                            <td><?php echo $user_data['Name'];?> <br>
                            <?php echo $user_data['Contact'];?> <br>
                            <?php echo $user_data['Address'];?>
                            </td>
                            <td style="padding:3vw;">
                                 <a href="user_update.php" style="padding-left:vw;"> Update Address</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="place_order" class="btn btn-primary">Dilever Here</a></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="dl">Payment Method</th>
                        </tr>
                    </tbody>                       
                </table>
            </div>
            <?php
        }

    }
    ?>
    </body>
    </html>
<?php
}
else
{
    header('location:login.php');
}

?>