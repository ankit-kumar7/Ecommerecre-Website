<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{

     header('location:home.php');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN1GV9Jm2u7rmsCe65wKzPTw5jtS38n2tVEGiQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
</head>
<?php include_once("../index.php"); ?>

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
                    <form role="form" action = "insert.php" method="post" enctype="multipart/form-data" id="form">
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user fa-2x"></i>User name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="fa fa-envelope fa-2x"></i>Eamil</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="contact"><i class="fas fa-phone-square-alt fa-2x"></i>Contact</label>
                            <input type="num" name="contact" id="contact" class="form-control" placeholder="Phone number">
                            <p> Note:No need to mention country code(+91).</p>
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="address"><i class="fas fa-map-marker-alt fa-2x"></i>Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                        </div>

                        <div class="form-group">
                            <label for="img"><i class="fas fa-cloud-upload-alt fa-2x"></i>Upload Profile Photo</label>
                            <input type="file" name="img" id="img" class="form-control">
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
                    name:{
                        required:true
                    },
                    email:{
                        email:true
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
                    email: {
                        email:"Email is not valid"
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