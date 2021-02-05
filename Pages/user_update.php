<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    include_once('db_con.php');

    $id = $_SESSION['uid'];

    echo $id;

    $qry = "SELECT * FROM `users` WHERE `Contact` = '$id'";

    $run = mysqli_query($con,$qry);
    
    if($run==true)
    {
        $data = mysqli_fetch_assoc($run);

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up</title>
            <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
            <link rel="stylesheet" type= "text/css" href="style/style.css">
            <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <script src="../bootstrap-4.4.1-dist/js/jquery.min.js"></script>
            <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
            <script src="../bootstrap-4.4.1-dist/js/popper.min.js"></script>
            <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
            <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
        </head>

        <body>
            <div class="container">
                <div class="modal md" id="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header model-heading ">
                                    <h3 class="text-primary"> Update Account</h3>
                                <button type="button" class="close" data-dismiss="modal" id="clse"> &times; </button>
                            </div>

                            <div class="modal-body"></div>
                            <form id="form" action = "user_update_db.php?id=<?php echo $data['Id'];?>&img=<?php echo $data['Image'];?>" method="post"
                                 enctype="multipart/form-data" onsubmit="return validation()">
                                <div class="form-group">
                                    <label for="name"><i class="fa fa-user fa-2x"></i>User name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $data['Name'];?>"
                                        onblur="nameValidation()">
                                    <span id="namet" style="color:green;"></span>
                                    <span id="namef" style="color:red;"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email"><i class="fa fa-envelope fa-2x"></i>Eamil</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $data['Email'];?>"
                                         onblur="emailValidation()">
                                    <span id="emailt" style="color:green;"></span>
                                    <span id="emailf" style="color:red;"></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="contact"><i class="fas fa-phone-square-alt fa-2x"></i>Contact</label>
                                    <input type="num" name="contact" id="contact" class="form-control" value="<?php echo $data['Contact'];?>"
                                        onblur="contactValidation()">
                                    <span style="color:blue;"> Note:No need to mention country code(+91).</span><br>
                                    <span id="numbert" style="color:green;"></span>
                                    <span id="numberf" style="color:red;"></span>
                                </div>

                                <div class="form-group">
                                    <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                                    <input type="text" name="password" id="password" class="form-control"value="<?php echo base64_decode($data['Password']);?>"
                                        onblur="passValidation">
                                    <span id="passt" style="color:green;"></span>
                                    <span id="passf" style="color:red;"></span>
                                </div>

                                <div class="form-group">
                                    <label for="address"><i class="fas fa-map-marker-alt fa-2x"></i>Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $data['Address'];?>"
                                        onblur="addressValidation()">
                                    <span id="addresst" style="color:green;"></span>
                                    <span id="addressf" style="color:red;"></span>
                                </div>

                                <div class="form-group">
                                    <label for="img"><i class="fas fa-cloud-upload-alt fa-2x"></i>Profile Photo</label>
                                    <img src="UserImage/<?php echo $data['Image'];?>" weidth="100px" height="100px">
                                </div>                                

                                <div class="form-group">
                                    <label for="img"><i class="fas fa-cloud-upload-alt fa-2x"></i>Upload Profile Photo</label>
                                    <input type="file" name="img" class="form-control" onblur="imgValidation()">
                                    <span id="imgt" style="color:green;"></span>
                                    <span id="imgf" style="color:red;"></span>
                                </div>
                        
                                <div class="modal-footer justify-content-center">
                                    <!-- <button class="btn btn-danger" data-dismiss="modal">Log in</button> -->
                                    <input type="submit" value="Update"  name="submit" class="btn btn-success alert">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
        function nameValidation()
        {
            var name = document.getElementById('name').value;
            if(name=="")
            {
                document.getElementById('namet').innerHTML="";
                document.getElementById('namef').innerHTML="Name is neccessary to fill out.";
                return false;
            }
            if (typeof name == 'string')
            {
                if(Number(name) || Number(name)==0)
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById('namef').innerHTML="Name should be in valid format.";
                    return false;
                }

                var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                var re = /^[A-Za-z ]+$/;

                if(format.test(name))
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById('namef').innerHTML="Special Character are not allowed.";
                    return false;
                }
                if(!re.test(name))
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById('namef').innerHTML="Name should be in valid format.";
                    return false;
                }
            }            
            {
                document.getElementById('namef').innerHTML="";
                document.getElementById('namet').innerHTML="✔";
                return true;
            }            
        }

        function emailValidation()
        {
            var email = document.getElementById('email').value;
            
            if(email=="")
            {
                document.getElementById('emailt').innerHTML="";
                document.getElementById('emailf').innerHTML="Eamil can't be empty.";
                return false; 
            }
            if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)))
            {
                document.getElementById('emailt').innerHTML="";
                document.getElementById('emailf').innerHTML="Email Adress should be in valid format.";
                return false;
            }
            {
                document.getElementById('emailt').innerHTML="✔";
                document.getElementById('emailf').innerHTML="";
                return true;
            }

        }

        function contactValidation()
        {
            var contact = document.getElementById('contact').value;
            if (contact == "") 
            {
                document.getElementById('numbert').innerHTML="";
                document.getElementById('numberf').innerHTML="Contact can't be empty.";
                return false;
            }
            if (typeof contact == 'string')
            {
                var temp = Number(contact);
                var format = /^[0-9]+$/; 
                if(!(Number.isInteger(temp)))
                {
                    document.getElementById('numbert').innerHTML="";
                    document.getElementById("numberf").innerHTML="Contact should be in valid format";
                    return false;
                }
                if(((contact.trim()).length < 10) || ((contact.trim()).length > 10))
                {
                    document.getElementById('numbert').innerHTML="";
                    document.getElementById("numberf").innerHTML="Contact must be 10 digit";
                    return false;
                }
                if(temp == 0)
                {
                    document.getElementById('numbert').innerHTML="";
                    document.getElementById("numberf").innerHTML="Contact should be in valid format";
                    return false;
                }
                if(!format.test(contact))
                {
                    document.getElementById('numbert').innerHTML="";
                    document.getElementById("numberf").innerHTML="Contact should be in valid format";
                    return false;   
                }
                {
                document.getElementById('numbert').innerHTML="✔";
                document.getElementById('numberf').innerHTML="";
                return true;
                }
            }
        }

        function passValidation()
        {
            var password = document.getElementById('password').value;
            if(password=="")
            {
                document.getElementById('passt').innerHTML="";
                document.getElementById("passf").innerHTML="Password must be created.";
                return false;   
            }
            {
                document.getElementById('passt').innerHTML="✔";
                document.getElementById('passf').innerHTML="";
                return true;   
            }
        }

        function addressValidation()
        {
            var address = document.getElementById('address').value;
            if(address=="")
            {
                document.getElementById('addresst').innerHTML="";
                document.getElementById("addressf").innerHTML="Address must be fill.";
                return false;   
            }
            {
                document.getElementById('addresst').innerHTML="✔";
                document.getElementById('addressf').innerHTML="";
                return true;   
            }
        }

        function imageValidation()
        {
            var img = document.getElementById('img').value;
            if(img=="")
            {
                document.getElementById('imgt').innerHTML="";
                document.getElementById("imgf").innerHTML="Please choose a image from file.";
                return false;   
            }
            {
                document.getElementById('imgt').innerHTML="✔";
                document.getElementById('imgf').innerHTML="";
                return true;   
            }
        }

        function validation()
        {
            if(!nameValidation())
                return false;
            
            if(!emailValidation())
                return false;

            if(!contactValidation())
                return false;
            
            if(!passValidation())
                return false;
            
            if(!addressValidation())
                return false;
            
            if(!imageValidation())
                return false;
        
            return true;
        }
    </script>
            <script>
                $(document).ready(function(){
                    $("#modal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            $('#clse').click(function(){
                window.location.replace("home.php");
            });
         });
    </script>
            
        </body>
        </html>

    <?php
    }

}
else
{
    header('location:../index.php');
}

?>