<?php

session_start();
error_reporting(0);
$order = $_Get['id'];

if(isset($_SESSION['uid']))
{
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN1GV9Jm2u7rmsCe65wKzPTw5jtS38n2tVEGiQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
</head>

<?php include_once('../index.php');?>
<body>
    
    <div class="container">
        <div class="modal md" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header model-heading ">
                        <h3 class="text-primary"> Log In</h3>
                        <button type="button" class="close" data-dismiss="modal" > &times; </button>
                    </div>

                    <div class="modal-body"></div>
                    <form role="form" action="validuser.php" method="post" id="form" onsubmit="return validation()">
                        
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user fa-2x"></i>User Id</label>
                            <input type="num" name="user" id="user" class="form-control" placeholder="Phone number"
                                onblur="nameValidation()">
                            <span id="namet" style="color:green;"></span>
                            <span id="namef" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="password" name="password" id="password" class="form-control" 
                                placeholder="Password" onblur="passValidation()">
                            <span id="passt" style="color:green;"></span>
                            <span id="passf" style="color:red;"></span>
                        </div>
                
                        <div class="modal-footer justify-content-center">
                             <!-- <button class="btn btn-danger" data-dismiss="modal">Log in</button> -->
                            <input type="submit" value="Log in" name="submit" class="btn btn-success">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a href="signup.php" >Sign Up</a>
                            <a href="resetpassword.php" >Forget Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   

    <script>
        function nameValidation()
        {
            var name = document.getElementById('user').value;
            if(name=="")
            {
                document.getElementById('namet').innerHTML="";
                document.getElementById('namef').innerHTML="User name is neccessary to fill out.";
                return false;
            }
            if (typeof name == 'string')
            {
                var temp = Number(name);
                var format = /^[0-9]+$/; 
                if(!(Number.isInteger(temp)))
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById("namef").innerHTML="User name should be in valid format";
                    return false;
                }
                if(((name.trim()).length < 10) || ((name.trim()).length > 10))
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById("namef").innerHTML="User name must be 10 digit";
                    return false;
                }
                if(temp == 0)
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById("namef").innerHTML="User name should be in valid format";
                    return false;
                }
                if(!format.test(name))
                {
                    document.getElementById('namet').innerHTML="";
                    document.getElementById("namef").innerHTML="User name should be in valid format";
                    return false;   
                }
                {
                document.getElementById('namet').innerHTML="✔";
                document.getElementById('namef').innerHTML="";
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

        function validation()
        {
            if(!nameValidation())
                return false;
            if(!passValidation())
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
        $(".close").click(function(){
            window.location.replace("../index.php");
        });
    });

</script>
</body>
</html>
   