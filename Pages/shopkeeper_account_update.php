<?php

session_start();
error_reporting(0);

if(isset($_SESSION['id']))
{
    include_once('db_con.php');

    $shop_id = $_GET['id'];

    $qry = "SELECT * FROM `shopkeepers` WHERE `Shop_Id` = '$shop_id'";

    $run = mysqli_query($con,$qry);

    if($run == true)
    {
        $data = mysqli_fetch_assoc($run);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
                            <h3 class="text-primary"> Update</h3>
                        <button type="button" class="close" data-dismiss="modal" id="clse"> &times; </button>
                    </div>

                    <div class="modal-body"></div>
                    <form id="form" action = "shopkeeper_update.php?shopid=<?php echo $data['Shop_Id'];?>&number=<?php echo base64_encode($data['Contact']);?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="shop_id"><i class="fab fa-glide-g fa-2x"></i>Shop Id</label>
                            <input type="text" name="shop_id"id="shop_id" class="form-control" value="<?php echo $data['Shop_Id'];?>" >
                        </div>

                        <div class="form-group">
                            <label for=""><i class="fas fa-warehouse fa-2x"></i>Shop Name</label>
                            <input type="text" name="shop_name" id="shop_name" class="form-control" required value="<?php echo $data['Shop_Name'];?>">
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-user fa-2x"></i>Shopkeeper Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $data['Shopkeeper_Name'];?>">
                        </div>

                        <div class="form-group">
                            <label for="contact"><i class="fas fa-phone-square-alt fa-2x"></i>Contact</label>
                            <input type="num" name="contact" id="contact" class="form-control"value="<?php echo $data['Contact'];?>">
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo base64_decode($data['Password']);?>">
                        </div>

                        <div class="form-group">
                            <label for="address"><i class="fas fa-map-marker-alt fa-2x"></i>Address</label>
                            <input type="text" name="address" class="form-control"value="<?php echo $data['Address'];?>">
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
        $(document).ready(function(){
            $("#modal").modal({
            backdrop: 'static',
            keyboard: false
        });

        $(function(){
                    $("#form").validate({
                rules: {
                    shop_id:{
                        required:true
                    },
                    shop_name:{
                        required:true
                    },
                    name:{
                        required:true
                    },
                    contact:{
                        required:true,
                        digits:true,
                        minlength:10,
                        maxlength:10
                    },
                    password:{
                        required:true
                    }
                },
                messages: {
                    name: {
                        required:"Please enter name"
                    },
                    password: {
                        required:"enter the password"
                    },
                    contact:{
                        required:"Phone number is required",
                        minlength:"Phone number is not correct",
                        maxlength:"Phone number is not correct"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                 }

            });
        });


        $('#clse').click(function(){
            window.location.replace("shop_cart.php");
        });

        });

    </script>
    
</body>
</html>
<?php



    }

}
else
    header('location:../index.php');

?>
