<?php
  session_start();
  $token = trim($_POST['token']);
  $pin1 = trim($_POST['pin1']);
  $pin2 = trim($_POST['pin2']);

  require("../../functions/web_config.php");
  // Input checks
  if (empty($pin2) || empty($pin1) || empty($token)){
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Invalid inputs!!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  if ($pin1 != $pin2) {
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">PIN does not match!!!</div>',
    );
    echo json_encode($response);
    exit();
  }


  $check_data = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id`,`email`,`pin_reset_token` FROM users WHERE pin_reset_token='$token'"));
  $user_email = $check_data['email'];

  if(!$check_data){
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Incorect token!!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  $hashpass = md5($password1);
  $newhash = md5(uniqid() . time() . rand(1000000, 90000000)).base64_encode($user_email);

  $update = mysqli_query($con, "UPDATE users SET `security_pin`='$pin1', pin_reset_token='$newhash' WHERE pin_reset_token='$token'");

  if ($update) {
    $response = array(
      'status' => 'success',
      'message' => '<div class="alert alert-success text-left">Your pin has been reset successfully !!!</div>',
    );
    echo json_encode($response);
    exit();
  } else {
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-success text-left">Error occour while resetting password !!!</div>',
    );
    echo json_encode($response);
    exit();
  }

?>