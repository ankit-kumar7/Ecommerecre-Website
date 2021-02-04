<?php

session_start();
error_reporting(0);
if(isset($_SESSION['id']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopKeeper Account</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <?php
     
     $id = $_SESSION['id'];
     include_once('db_con.php');

$qry = "SELECT * FROM `shopkeepers` WHERE Id = '$id' OR Contact = '$id'";


$run = mysqli_query($con,$qry);

if($run==true)
{
    while($data = mysqli_fetch_assoc($run))
    {
        ?>
        <div class="container">
        <div class="modal md" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header model-heading justify-content-center">
                            <h3 class="text-primary"> Your Account</h3>
                        <button type="button" class="close" data-dismiss="modal" id="clse"> &times; </button>
                    </div>

                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th> Your Shop Id:</th>
                                <td> <?php echo $data['Shop_Id']; ?> </td>
                            </tr>
                            <tr>
                                <th> Your Shop Name:</th>
                                <td> <?php echo $data['Shop_Name']; ?> </td>
                            </tr>                            
                            <tr>
                                <th> Your Name:</th>
                                <td> <?php echo $data['Shopkeeper_Name']; ?> </td>
                            </tr>
                            <tr>
                                <th> Contact:</th>
                                <td> <?php echo $data['Contact']; ?> </td>
                            </tr>
                            <tr>
                                <th> Address:</th>
                                <td> <?php echo $data['Address']; ?> </td>
                            </tr>                                                        
                          </tbody>
                        </table>
                            <div class="modal-footer justify-content-center">
                                 <button class="btn btn-danger" data-dismiss="modal" id="logout" style="position:relative">Log Out</button>
                            </div>
                            <div class="modal-footer justify-content-center">
                            <a href ="shopkeeper_account_update.php?id=<?php echo $data['Shop_Id'];?>" class="text-primary ">Update Account</a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
else
echo $con->error;

?>
<script src="../bootstrap-4.4.1-dist/js/jquery.min.js"></script>
<script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.4.1-dist/js/popper.min.js"></script>
<script src="../bootstrap-4.4.1-dist/js/all.js"></script>

<script>
        $(document).ready(function(){
            $("#modal").modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#clse').click(function(){
            window.location.replace("shop_cart.php");

        });
        $('#logout').click(function(){
                window.location.replace("shopkeeper_logout.php");
            });

        });

    </script>    
</body>
</html>

<?php
}
else
{
    header('location:shopkkeeper_login.php');
}
?>