<?php

session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{

     header('location:shop_cart.php');
}
else
{
    echo "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<?php
    if(isset($_SESSION['uid']))
    {
        include_once('home.php');
    }
    else
    {
        include_once('../index.php');
    }
?>
<body>
    <div class="container">
        <div class="modal md" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header model-heading ">
                            <h3 class="text-primary"> Sign In</h3>
                        <button type="button" class="close" data-dismiss="modal" id="clse"> &times; </button>
                    </div>

                    <div class="modal-body"></div>
                    <form id="form" action = "shopkeeper_insert.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="shop_id"><i class="fab fa-glide-g fa-2x"></i>Shop Id</label>
                            <input type="text" name="shop_id" id="shop_id" class="form-control" placeholder="shop id">
                        </div>

                        <div class="form-group">
                            <label for="shop_name"><i class="fas fa-warehouse fa-2x"></i>Shop Name</label>
                            <input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="shop name">
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user fa-2x"></i>Shopkeeper Name</label>
                            <input type="text" name="name"id="name" class="form-control" placeholder="shopkeeper name">
                        </div>

                        <div class="form-group">
                            <label for="contact"><i class="fas fa-phone-square-alt fa-2x"></i>Contact</label>
                            <input type="num" name="contact" id="contact" class="form-control"placeholder="phone number">
                            <p>Note:No need to mention country code(+91).
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="create password">
                        </div>

                        <div class="form-group">
                            <label for="address"><i class="fas fa-map-marker-alt fa-2x"></i>Address</label>
                            <input type="text" name="address" id="address" class="form-control"placeholder="address with pin code">
                        </div>
                
                        <div class="modal-footer justify-content-center">
                             <!-- <button class="btn btn-danger" data-dismiss="modal">Log in</button> -->
                            <input type="submit" value="Sign In"  name="submit" class="btn btn-success alert">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#modal").modal({
            backdrop: 'static',
            keyboard: false
        });

        $(function(){
                    $("#form").validate({
                rules: {
                    shop_id:{
                        required:true
                    },
                    shop_name:{
                        required:true
                    },
                    name:{
                        required:true
                    },
                    contact:{
                        required:true,
                        digits:true,
                        minlength:10,
                        maxlength:10
                    },
                    password:{
                        required:true
                    }
                },
                messages: {
                    name: {
                        required:"Please enter name"
                    },
                    password: {
                        required:"enter the password"
                    },
                    contact:{
                        required:"Phone number is required",
                        minlength:"Phone number is not correct",
                        maxlength:"Phone number is not correct"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                 }

            });
        });

        $('#clse').click(function(){
            window.location.replace("../index.php");
        });

        });

    </script>
    
</body>
</html>


