<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    header('location:home.php');
}
else
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
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
            <div class="modal md" id="modal" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header model-heading ">
                                <h3 class="text-primary">Create Password</h3>
                            <button type="button" class="close" data-dismiss="modal" id="clse"> &times; </button>
                        </div>
                        <div class="modal-body"></div>
                        <form role="form" action = "resetPasswordDb.php" method="post" enctype="multipart/form-data" 
                            id="form" onsubmit="return validation()">
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-lock fa-2x"></i> New Password</label>
                                <input type="password" name="password" id="password" class="form-control" 
                                    placeholder="Password" onblur="passValidation()">
                                <input type="hidden" value="<?php session_start();echo $_SESSION['con'];?>" name="id">
                                <span id="passt" style="color:green;"></span>
                                <span id="passf" style="color:red;"></span>
                            </div>
    
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-lock fa-2x"></i>Confirm Password</label>
                                <input type="password" name="password" id="cpassword" class="form-control" 
                                    placeholder="Password" onblur="cpassValidation()">
                                <span id="cpasst" style="color:green;"></span>
                                <span id="cpassf" style="color:red;"></span>
                            </div>
    
                            <div class="modal-footer justify-content-center">
                                 <!-- <button class="btn btn-danger" data-dismiss="modal">Log in</button> -->
                                <input type="submit" value="OK"  name="ok" class="btn btn-success alert">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <script>
            function passValidation()
            {
                var password = document.getElementById('password').value;
                if(password=="")
                {
                    document.getElementById('passt').innerHTML="";
                    document.getElementById("passf").innerHTML="Password must be created.";
                    return false;   
                }
                else
                {
                    document.getElementById('passt').innerHTML="";
                    document.getElementById("passf").innerHTML="";
                    return true;   
                }
    
            }
    
            function cpassValidation()
            {
                var cpassword = document.getElementById('cpassword').value;
                var password = document.getElementById('password').value;
    
                if(cpassword=="")
                {
                    document.getElementById('cpasst').innerHTML="";
                    document.getElementById("cpassf").innerHTML="Confirm Password doesn't match.";
                    return false;   
                }
                if(cpassword==password)
                {
                    document.getElementById('cpasst').innerHTML="✔";
                    document.getElementById('cpassf').innerHTML="";
                    return true;   
                }
                else
                {
                    document.getElementById('cpasst').innerHTML="";
                    document.getElementById("cpassf").innerHTML="Confirm Password doesn't match.";
                    return false;
                }
            }
    
            function validation()
            {
                if(!passValidation())
                    return false;
                
                if(!cpassValidation())
                    return false;
    
                return true;
            }
        </script>
    
    </body>
    </html>
    <?php
    include('db_con.php');
    if(isset($_POST['submit']))
    {
        $user = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        session_start();
         $_SESSION['con'] = $contact;
        $query = "SELECT * FROM `users` WHERE `Name`='$user' AND `Email`='$email' AND `Contact`='$contact'";

        $run = mysqli_query($con,$query);

        if($run==true)
        {
            $data = mysqli_num_rows($run);
            echo $data;
            if($data>0)
            {
                echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#modal").modal("show"); 
                $("#clse").click(function(){
                    window.location.replace("../index.php");
                });                       
                });
            </script>';
            echo "234";
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
                            title: "Reset Password",
                            text: "The information doesn't match!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("resetpassword.php");
                        });
                     </script>
                    </body>
                </html>
                <?php
            }
        }
    }
    if((!isset($_POST['submit'])) and (!isset($_POST['ok'])) )
    {
        ?>
            <script>
                window.location.replace("resetpassword.php");
            </script>
        <?php
    }

    if(isset($_POST['ok']))
    {
        include('db_con.php');
        $pass = $_POST['password'];
        $password = base64_encode($pass);
        $id = $_POST['id'];
        echo $id;
        $qry = "UPDATE `users` SET `Password`='$password' WHERE `Contact`='$id'";
        $run1 = mysqli_query($con,$qry);
        if($run1==true)
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
                            title: "Password Reset",
                            text: "Password reset Successfully!",
                            icon: "success",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("login.php");
                        });
                     </script>
                    </body>
                </html>
           <?php 
        }
    }
    
}
?>