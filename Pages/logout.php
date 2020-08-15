<?php

session_start();
error_reporting(0);
if(isset($_SESSION['uid']))
{
    unset($_SESSION['uid']);
    header('location:../index.php');
}
else
{
    header('location:login.php');
}
?>