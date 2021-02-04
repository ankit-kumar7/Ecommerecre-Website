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
</head>
<body>

<div class="container">

<h1 align="center" style="color:indigo;padding-top:5vw;"> Clothes</h1>
<?php 

include_once('db_con.php');

include_once('navbar.php');

$qry = "SELECT * FROM `items` WHERE `Product_Type` = 'Men(Shirts)'";

$run=mysqli_query($con,$qry);
if($run==true)
{
    while($data=mysqli_fetch_assoc($run))
    {
        ?>
        <div style="position:relative;display:inline-block;padding-top:5%;">
            <div class="card" style="width: 300px;">
                <img src="Item/<?php echo $data['Image'];?>" alt="Error" class="card-img-top" height="150px;">
                <div class="card-body popup">
                    <h4 class="card-title text-center"><?php echo $data['Product_Name'].'&nbsp'; echo$data['Price']."₹";?></h4>
                    <p class="card-text text-center"><?php echo $data['Description'];?></p>
                    <a href="add_cart.php?product_id=<?php echo $data['Product_Id'];?>" class="btn btn-primary popup">Add To Cart</a>
                    <a href="order.php" class="btn btn-primary popup" style="margin-left:20%;">Buy Now</a>
                </div>
            </div>
        </div>
        <span style="margin-left:1%;"></span>
        <?php
    }
}
?>  
</div>
    <script>
    $(document).ready(function(){

        $('.popup').hover(function(){
            $(this).animate({
                marginTop: "-=5%",
            },200);
        },
            function(){
                $(this).animate({
                    marginTop:"0%"
                },200);
            });
    });
</script>
</body>
</html>