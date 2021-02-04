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
                    <form id="form" action = "shopkeeper_insert.php" method="post" 
                        enctype="multipart/form-data" onsubmit="return validation()">
                        <div class="form-group">
                            <label for="shop_id"><i class="fab fa-glide-g fa-2x"></i>Shop Id</label>
                            <input type="text" name="shop_id" id="shop_id" class="form-control"
                                 placeholder="shop id" onblur="idValidation()">
                            <span id="idt" style="color:green;"></span>
                            <span id="idf" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="shop_name"><i class="fas fa-warehouse fa-2x"></i>Shop Name</label>
                            <input type="text" name="shop_name" id="shop_name" class="form-control"
                                 placeholder="shop name" onblur="nameValidation()">
                            <span id="namet" style="color:green;"></span>
                            <span id="namef" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user fa-2x"></i>Shopkeeper Name</label>
                            <input type="text" name="name"id="name" class="form-control" 
                                placeholder="shopkeeper name" onblur="snameValidation()">
                            <span id="snamet" style="color:green;"></span>
                            <span id="snamef" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="contact"><i class="fas fa-phone-square-alt fa-2x"></i>Contact</label>
                            <input type="num" name="contact" id="contact" class="form-control"
                                placeholder="phone number" onblur="numberValidation()">
                            <span style="color:blue;">Note:No need to mention country code(+91).</span><br>
                            <span id="numbert" style="color:green;"></span>
                            <span id="numberf" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                 placeholder="create password" onblur="passValidation()">
                            <span id="passt" style="color:green;"></span>
                            <span id="passf" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="address"><i class="fas fa-map-marker-alt fa-2x"></i>Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="address with pin code" onblur="addressValidation()">
                            <span id="addresst" style="color:green;"></span>
                            <span id="addressf" style="color:red;"></span>
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
        function idValidation()
        {
            var id = document.getElementById('shop_id').value;
            if (id == "") 
            {
                document.getElementById('idt').innerHTML="";
                document.getElementById('idf').innerHTML="Shop Id can't be empty.";
                return false;
            }
            if (typeof id == 'string')
            {
                var temp = Number(id);
                var format = /^[0-9]+$/; 
                if(!(Number.isInteger(temp)))
                {
                    document.getElementById('idt').innerHTML="";
                    document.getElementById("idf").innerHTML="Shop Id should be in valid format";
                    return false;
                }
                if(temp == 0)
                {
                    document.getElementById('idt').innerHTML="";
                    document.getElementById("idf").innerHTML="Shop Id should be in valid format";
                    return false;
                }
                if(!format.test(id))
                {
                    document.getElementById('idt').innerHTML="";
                    document.getElementById("idf").innerHTML="Shop Id should be in valid format";
                    return false;   
                }
                {
                document.getElementById('idt').innerHTML="✔";
                document.getElementById('idf').innerHTML="";
                return true;
                }
            }
        }

        function nameValidation()
        {
            var name = document.getElementById('shop_name').value;
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

        function snameValidation()
        {
            var name = document.getElementById('shop_name').value;
            if(name=="")
            {
                document.getElementById('snamet').innerHTML="";
                document.getElementById('snamef').innerHTML="Name is neccessary to fill out.";
                return false;
            }
            if (typeof name == 'string')
            {
                if(Number(name) || Number(name)==0)
                {
                    document.getElementById('snamet').innerHTML="";
                    document.getElementById('snamef').innerHTML="Name should be in valid format.";
                    return false;
                }

                var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                var re = /^[A-Za-z ]+$/;

                if(format.test(name))
                {
                    document.getElementById('snamet').innerHTML="";
                    document.getElementById('snamef').innerHTML="Special Character are not allowed.";
                    return false;
                }
                if(!re.test(name))
                {
                    document.getElementById('snamet').innerHTML="";
                    document.getElementById('snamef').innerHTML="Name should be in valid format.";
                    return false;
                }
            }            
            {
                document.getElementById('snamef').innerHTML="";
                document.getElementById('snamet').innerHTML="✔";
                return true;
            }            
        }

        function numberValidation()
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

        function validation()
        {
            if(!idValidation())
                return false;
            
            if(!nameValidation())
                return false;
            
            if(!snameValidation())
                return false;

            if(!numberValidation())
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
            window.location.replace("../index.php");
        });

        });

    </script>
    
</body>
</html>


