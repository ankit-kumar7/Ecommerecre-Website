<?php

$name= $_POST['name'];
$email= $_POST['email'];
$mobile= $_POST['phone'];

$API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/$mobile/AUTOGEN"),false);
$VerificationSessionId= $API_Response_json->Details;

?>

<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="action_otp.php" method="post">
Password:<br>
<input type="text" id='otp' name="otp" maxlength="6" placeholder="XXXXXX" required="required">
<input type="hidden" name="VerificationSessionId" value="<?php echo $VerificationSessionId; ?>" >
<input type="hidden" name="name" value="<?php echo $name; ?>" ><input type="hidden" name="email" value="<?php echo $email; ?>" ><input type="hidden" name="phone" value="<?php echo $mobile; ?>" ><input type="submit" value="Submit">
</form>
</body>
</html>

<?php

$VerificationSessionId=$_REQUEST['VerificationSessionId'];
$API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/VERIFY/$VerificationSessionId/$otpValue"),false);
$VerificationStatus= $API_Response_json->Details;

?>

