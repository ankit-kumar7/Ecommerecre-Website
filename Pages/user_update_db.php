<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    $id = $_GET['id'];

    $img = $_GET['img'];

    include_once('db_con.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $encoded_pass = base64_encode($pass);
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $imagename = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname,"UserImage/$imagename");

    $qry = "UPDATE `users` SET `Email`='' WHERE `Contact`= '$contact'";

    $run = mysqli_query($con,$qry);

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
                            title: "Update Account",
                            text: "This email has been already used!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("user_update.php");
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
            if(empty($imagename))
            {
                $imagename = $img;
            }
            else
            {
                unlink('UserImage/'.$img);
            }
            $qry = "UPDATE `users` SET `Name`='$name',`Email`='$email',`Password`='$encoded_pass',`Contact`= '$contact',`Address`='$address',`Image`='$imagename' 
                        WHERE `Id` = '$id'";

            $run = mysqli_query($con,$qry);

            if($run==true)
            {
                unset($_SESSION['uid']);
                session_start();
                $_SESSION['uid'] = $_POST['contact'];
                ?>
                    <html>
                        <head>
                            <link rel="stylesheet" type="text/css" href="../style.css">
                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        </head>
                        <body>
                        <script>
                            swal({
                                title: "Update Data",
                                text: "Updated Successfully!",
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
        }
}
else
{
    header('location:../index.php');
}
?>