<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['vtpass_account']) &&  !empty($_POST['sms_username']) && !empty($_POST['sms_password']) && !empty($_POST['req_token'])){

$vtpass_account=mysqli_real_escape_string($con, $_POST['vtpass_account']);
$sms_username=mysqli_real_escape_string($con, $_POST['sms_username']);
$sms_password=mysqli_real_escape_string($con, $_POST['sms_password']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$update=mysqli_query($con, "UPDATE web_settings SET sms_password='$sms_password', sms_username='$sms_username', vtpass_account='$vtpass_account' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your website keys has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating web keys !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}

else{

   $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();
}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
  );
  echo json_encode($response);
  exit();
}


?>