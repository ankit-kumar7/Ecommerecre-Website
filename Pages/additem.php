<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"></head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
</head>
<body>
<div class="container">
        <div class="modal md" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header model-heading ">
                            <h3 class="text-primary"> Add Product</h3>
                        <button type="button" class="close" data-dismiss="modal" id="clse"> &times; </button>
                    </div>

                    <div class="modal-body"></div>
                    <form action = "add_item_db.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name"><i class="fab fa-glide-g fa-2x"></i>Shop Id</label>
                            <input type="text" name="shop_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="product_id"><i class="fab fa-glide-g fa-2x"></i>Product Id</label>
                            <input type="text" name="product_id" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="product_name"><i class="fab fa-product-hunt fa-2x"></i>Product Name</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="category"><i class="fab fa-product-hunt fa-2x"></i>Category Of Product</label>
                                <select id="options" name="category">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="Clothes">Clothes</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Food & Beverages">Food & Beverages</option>
                                    <option value="Sports">Sports</option>
                                </select>
                        </div>
                       
                        <div class="form-group">
                            <label for="type"><i class="fab fa-product-hunt fa-2x"></i>Type Of Product</label>
                                <select id="choices" name="types">
                                    <option value="" disabled selected>Please select an option</option>
                                </select>    
                        </div> 
                        
                        <div class="form-group">
                            <label for="price"><i class="fab fa-dochub fa-2x"></i>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="price"><i class="fas fa-rupee-sign fa-2x"></i>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="img"><i class="fas fa-cloud-upload-alt fa-2x"></i>Upload Product Photo</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                
                        <div class="modal-footer justify-content-center">
                             <!-- <button class="btn btn-danger" data-dismiss="modal">Log in</button> -->
                            <input type="submit" value="Add Item"  name="submit" class="btn btn-success alert">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<script src="../bootstrap-4.4.1-dist/js/jquery.min.js"></script>
<script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.4.1-dist/js/popper.min.js"></script>
<script src="../bootstrap-4.4.1-dist/js/all.js"></script>

<script>
        var lookup = {
   'Clothes': ['Men(T-Shirts)', 'Men(Shirts)', 'Men(Suits & Blazer)','Men(Trouser & Jeans)','Women(Saries)',
                'Women(Kurtas & Kurties)','Women(Lhenga)','Women(Dupats)','Women(Ethenic Bottoms)',
                'Child(Boys)','Child(Girls)'],
   'Electronics': ['Fridge', 'Television','Laptop','Others'],
   'Food & Beverages': ['Dry Foods'],
   'Sports' : ['Outdoor','Indoor']
};

// When an option is changed, search the above for matching choices
$('#options').on('change', function() {
   // Set selected option as variable
   var selectValue = $(this).val();

   // Empty the target field
   $('#choices').empty();
   
   // For each chocie in the selected option
   for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
      $('#choices').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
   }
});
        $(document).ready(function(){
            $("#modal").modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#clse').click(function(){
            window.location.replace("shop_cart.php");
        });

        });

    </script>
    
</body>
</html>