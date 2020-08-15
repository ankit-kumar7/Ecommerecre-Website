<?php

session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{
    header('location:shop_cart.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
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
                        <h3 class="text-primary">ShopKeeper Log In</h3>
                        <button type="button" class="close" data-dismiss="modal" > &times; </button>
                    </div>

                    <div class="modal-body"></div>
                    <form action="validshopkeeper.php" method="post" id="form">
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user fa-2x"></i>User Id</label>
                            <input type="num" name="user" id="user" class="form-control"  placeholder="Phone number">
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                        </div>
<!-- 
                        <div class="form-group">
                            <label for="name"><i class="fa fa-envelope fa-2x"></i>Eamil</label>
                            <input type="email" name="email" class="form-control">
                        </div> -->
                
                        <div class="modal-footer justify-content-center">
                             <!-- <button class="btn btn-danger" data-dismiss="modal">Log in</button> -->
                            <input type="submit" value="Log in" name="submit" class="btn btn-success">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a href="Shopkeeper_Signup.php" >Sign Up</a>
                            <a href="resetpassword.php" >Forget Password</a>
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

        $(function() {

            $("#form").validate({
            rules: {
                user: {
                    required: true,
                    number:true
                    },
                password: {
                    required:true,
                }
            },
            messages: {
                user: {
                    required: "Please enter the phone number",
                    number: "Phone Number is not correct"
                    },
                password: {
                    required:"Please enter the password"
                }
            }
            });
            });

        $(".close").click(function(){
            window.location.replace("../index.php");
        });
        });
    </script>
</body>
</html>

   