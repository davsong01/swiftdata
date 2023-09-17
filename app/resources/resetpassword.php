<?php
  session_start();
  $token = trim($_POST['token']);
  $password1 = trim($_POST['password1']);
  $password2 = trim($_POST['password2']);
  $token = trim($_POST['token']);

  require("../../functions/web_config.php");
  // Input checks
  if (empty($password2) || empty($password1) || empty($token)){
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Invalid inputs!!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  // Password check
  if ($password1 != $password2) {
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Password entered does not match !!!</div>',
    );
    echo json_encode($response);
    exit();

  }
  // length check
  if (strlen($password1) < 5) {
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Please use a strong password, password length must be greater than 4!!!</div>',
    );
    echo json_encode($response);
    exit();
  }
  $check_data = mysqli_query($con, "SELECT * FROM users WHERE pass_reset_token='$token'");

  // $response = array(
  //   'status' => 'fail',
  //   'message' => '<div class="alert alert-danger text-left">'. mysqli_num_rows($check_data).'...'. $token.'</div>',
  // );
  // echo json_encode($response);
  // exit();

  if (mysqli_num_rows($check_data) > 0) {
    // Reset the password
    $hashpass = md5($password1);
    $newhash = md5(uniqid() . time() . rand(1000000, 90000000));
    
    $update = mysqli_query($con, "UPDATE users SET password='$hashpass', pass_reset_token='$newhash' WHERE pass_reset_token='$token'");

    if ($update) {
      $response = array(
        'status' => 'success',
        'message' => '<div class="alert alert-success text-left">Your password has been reset successfully !!!</div>',
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

  }else{
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Invalid token !!!</div>',
    );
    echo json_encode($response);
    exit();
  }
?>