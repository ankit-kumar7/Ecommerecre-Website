<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
</head>
<body>
<select id="options">
  <option value="" disabled selected>Select an option</option>
  <option value="Option 1">Option 1</option>
  <option value="Option 2">Option 2</option>
  <option value="Option 3">Option 3</option>
</select>

<select id="choices">
  <option value="" disabled selected>Please select an option</option>
</select>    
</form>
<script type="text/javascript">
var lookup = {
   'Option 1': ['Option 1 - Choice 1', 'Option 1 - Choice 2', 'Option 1 - Choice 3'],
   'Option 2': ['Option 2 - Choice 1', 'Option 2 - Choice 2'],
   'Option 3': ['Option 3 - Choice 1'],
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
</script>
</body>
</html>