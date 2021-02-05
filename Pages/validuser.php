<?php

session_start();
error_reporting(0);

if(isset($_SESSION['uid']))
{
    header('location:home.php');
}
else
{

include_once('db_con.php');
$user=$_POST['user'];
$pass=$_POST['password'];
$query = "SELECT * FROM `Users`";
  $run = mysqli_query($con,$query);
    if($run==true)
    {
        // echo "done";
        while($data = mysqli_fetch_assoc($run))
        {
            // echo $data['Contact']."\n";
            // $p =base64_decode($data['Password'])."\n";
            // echo $p;
            if($user == $data['Contact'] && $pass == base64_decode($data['Password']))
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
                            title: "Login",
                            text: "Login Successfully!",
                            icon: "success",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("home.php");
                        });
                     </script>
                    </body>
                </html>
                <?php
                $temp=1;
                session_start();
                $_SESSION['uid'] = $data['Contact'];
            }
            
        }
        if($temp!=1)
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
                            title: "Login",
                            text: "Incorrect Username & Password!",
                            icon: "error",
                            button: "Ok!"
                            }).then(function() {
                            window.location.replace("login.php");
                        });
                     </script>
                    </body>
                </html>
            <?php
            // header('location:../index.php');
        }
    }
    else
    echo "Error:".$mysqli->error;

}

?>