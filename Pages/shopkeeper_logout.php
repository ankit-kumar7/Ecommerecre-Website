<?php

session_start();
error_reporting(0);
if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
    header('location:../index.php');
}
else
{
    header('location:shopkeeper_login.php');
}
?>