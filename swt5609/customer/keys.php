<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){
  $vtpass_account=mysqli_real_escape_string($con, $_POST['vtpass_account']);
  $naijaresultpins_api_key=mysqli_real_escape_string($con, $_POST['naijaresultpins_api_key']);
  $sms_username=mysqli_real_escape_string($con, $_POST['sms_username']);
  $sms_password=mysqli_real_escape_string($con, $_POST['sms_password']);
  $monnify_sk = mysqli_real_escape_string($con, $_POST['monnify_sk']);
  $monnify_pk = mysqli_real_escape_string($con, $_POST['monnify_pk']);
  $monnify_cc = mysqli_real_escape_string($con, $_POST['monnify_cc']);
  $payvessel_mode = mysqli_real_escape_string($con, $_POST['payvessel_mode']);
  $monnify_mode = mysqli_real_escape_string($con, $_POST['monnify_mode']);
  $clubkonnect_user_id = mysqli_real_escape_string($con, $_POST['clubkonnect_user_id']);
  $clubkonnect_api_key = mysqli_real_escape_string($con, $_POST['clubkonnect_api_key']);

  $payvessel_api_public_key = mysqli_real_escape_string($con, $_POST['payvessel_api_public_key']);
  $payvessel_api_secret_key = mysqli_real_escape_string($con, $_POST['payvessel_api_secret_key']);
  $payvessel_api_key = mysqli_real_escape_string($con, $_POST['payvessel_api_key']);
  $payvessel_merchant_id = mysqli_real_escape_string($con, $_POST['payvessel_merchant_id']);
  
  $req_token=mysqli_real_escape_string($con, $_POST['req_token']);

  $update=mysqli_query($con, "UPDATE web_settings SET sms_password='$sms_password', sms_username='$sms_username', vtpass_account='$vtpass_account',naijaresultpins_api_key='$naijaresultpins_api_key',clubkonnect_user_id='$clubkonnect_user_id',clubkonnect_api_key='$clubkonnect_api_key' WHERE id='1'");

  // Update Monnify
  $update = mysqli_query($con, "UPDATE payment_gateways SET secret_key='$monnify_sk',public_key='$monnify_pk',api_key='$monnify_cc', `status`='$monnify_mode' WHERE id='1'");

  // Update Payvessel
  $update=mysqli_query($con, "UPDATE payment_gateways SET public_key='$payvessel_api_public_key', secret_key='$payvessel_api_secret_key', api_key='$payvessel_api_key',merchant_id='$payvessel_merchant_id',`status`='$payvessel_mode' WHERE id='2'");


  if ($update){
    $response=array(
      'status'=>'success',
      'message' => 'API keys have been successfully updated !!!',
    );
    echo json_encode($response);
    exit();

  }else{
    $response=array(
      'status'=>'fail',
      'message' => '<div class="alert alert-danger text-left">Critical error occur when updating web keys !!!</div>',
    );
    echo json_encode($response);
    exit();
  }
}else{
  $response = array(
    'status' => 'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong</div>',
  );
  echo json_encode($response);
  exit();
}
