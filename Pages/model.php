
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modal    </title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
    

        
        <!-- <button class="btn btn-success" data-target="#modal" data-toggle="modal" > Sign Up  </button> -->
        <a data-target="#model"data-toggle="model" href="#" id="link">Login</a>


    <div class="container">
        <div class="modal md" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header model-heading ">
                        <h3 class="text-primary"> Sign Up</h3>
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>

                    <div class="modal-body"></div>
                    <form action="">
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user fa-2x"></i>User name</label>
                            <input type="text" name="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock fa-2x"></i>Password</label>
                            <input type="password" name="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name"><i class="fa fa-envelope fa-2x"></i>Eamil</label>
                            <input type="email" name="" class="form-control">
                        </div>
                
                        <div class="modal-footer justify-content-center">
                        <button class="btn btn-danger" data-dismiss="modal" > Sign Up</button>
                        <a href="../index.php" id="back" >Sign Up </a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
  <script src="../bootstrap-4.4.1-dist/js/jquery.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/popper.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>

    <script>
        $(document).ready(function(){
            $('#link').click(function(){
        $("#modal").modal("show");
        

    });
});
</script>


</body>
</html>