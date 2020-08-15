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
        include_once('Pages/db_con.php');

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $encode_pass = base64_encode($pass);
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $imagename = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];
        move_uploaded_file($tempname,"UserImage/$imagename");

        if(empty($email))
            $temp=1;
        else
        {

            $qry = "SELECT `Email` FROM `user` WHERE `Email`='$email'";

            $run = mysqli_query($con,$qry);

            $data = mysqli_fetch_assoc($run);

            print_r($data);

            $count =mysqli_num_rows($run);

            echo $count;

            if($count>0)
            {
                $temp=0;
            }
            else
                $temp=1;
        }
        if($temp==1)
        {
        $qry = "INSERT INTO `User`(`Name`, `Email`, `Password`, `Contact`, `Address`, `Image`) 
            VALUES ('$name','$email','$encode_pass','$contact','$address','$imagename')";

        $run = mysqli_query($con,$qry);

        if($run==true)
        {
            session_start();
   
            $_SESSION['uid']=$_POST['contact'];

            echo "insert";
        }
        else
        {
            // echo "Error:". $con->error;
            echo "conatct";

            }
        }
        else
        {
            echo "email";
        }

    }
}

?>
