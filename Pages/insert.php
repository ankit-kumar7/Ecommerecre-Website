<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    header('location:home.php');
}
else
{
 if(isset($_POST['submit']))
    {   
        include_once('db_con.php');

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);
        $encode_pass = base64_encode($pass);
        $contact = trim($_POST['contact']);
        $address = $_POST['address'];
        $imagename = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];
        move_uploaded_file($tempname,"UserImage/$imagename");

        if(empty($email))
            $temp=1;
        else
        {
            $qry = "SELECT `Email` FROM `users` WHERE `Email`='$email'";

            $run = mysqli_query($con,$qry);

            $data = mysqli_fetch_assoc($run);

            $count = mysqli_num_rows($run);

            if($count>0)
            {
                $temp=0;
                ?>
                <html>
                    <head>
                        <link rel="stylesheet" type="text/css" href="../style.css">
                         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    </head>
                    <body>
                    <script>
                        swal({
                            title: "Sign Up",
                            text: "This email has been already used!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("signup.php");
                        });
                     </script>
                    </body>
                </html>


            <?php
            }
            else
                $temp=1;
        }
        if($temp==1)
        {
        $qry = "INSERT INTO `Users`(`Name`, `Email`, `Password`, `Contact`, `Address`, `Image`) 
            VALUES ('$name','$email','$encode_pass','$contact','$address','$imagename')";

        $run = mysqli_query($con,$qry);

        if($run==true)
        {
            session_start();
   
            $_SESSION['uid']=$_POST['contact'];
           ?>
                <html>
                    <head>
                        <link rel="stylesheet" type="text/css" href="../style.css">
                         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    </head>
                    <body>
                    <script>
                        swal({
                            title: "Sign In",
                            text: "Successfully Register!",
                            icon: "success",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("home.php");
                        });
                     </script>
                    </body>
                </html>


            <?php
        }
        else
        {
            // echo "Error:". $con->error;
            ?>
                <html>
                    <head>
                        <link rel="stylesheet" type="text/css" href="../style.css">
                         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    </head>
                    <body>
                    <script>
                        swal({
                            title: "Sign Up",
                            text: "This phone numbers has been already used!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("signup.php");
                        });
                     </script>
                    </body>
                </html>


            <?php

            }
        }
    }
}

?>
