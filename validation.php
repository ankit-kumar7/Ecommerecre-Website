<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN1GV9Jm2u7rmsCe65wKzPTw5jtS38n2tVEGiQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/all.js"></script>
</head>
<body>
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addMyModal">Open Modal</button> -->
<div class="modal fade" id="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Add Stuff</h4> -->
      </div>
      <div class="modal-body">
        <form role="form" id="form">
          <div class="form-group">
            <label class="control-label col-md-3" for="email">A p Name:</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter a p name" require/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="email">Action:</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="action" name="action" placeholder="Enter and action" require>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnSaveIt">Save</button>
            <button type="button" class="btn btn-default" id="btnCloseIt" data-dismiss="modal">Close</button>
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
$(function() {

$("#form").validate({
  rules: {
    pName: {
      required: true,
      minlength: 8
    },
    action: "required"
  },
  messages: {
    pName: {
      required: "Please enter some data",
      minlength: "Your data must be at least 8 characters"
    },
    action: "Please provide some data"
  }
});
});
});
</script>
</body>
</html>