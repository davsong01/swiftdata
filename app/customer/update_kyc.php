<?php

  require("session_controller.php");
  $bvn = $_POST['bvn'];
  $nin = $_POST['nin'];
  $check = $_POST['check'];

  if ($_SESSION['csrftoken'] == $_POST['req_token']){
    if (empty($nin) && empty($bvn)){
      $response = array(
        'status' => 'fail',
        'message' => '<div class="alert alert-danger text-left">Please fill all fields !!!</div>',
      );

      echo json_encode($response);
      exit();
    }else {
      $check_email  = mysqli_fetch_assoc(mysqli_query($con, "SELECT `password`,`id` FROM users WHERE email='$email'"));

      $update = mysqli_query($con, "UPDATE users SET bvn='$bvn', nin='$nin' WHERE email='$email'");

      if($update){
        $response = array(
          'title' => 'COMPLETED',
          'icon' => 'success',
          'status' => 'success',
          'message' => 'Update Successful',
          'extra' => $extra
        );
    
        echo json_encode($response);
        exit();

      }else{
        $response = array(
          'status' => 'fail',
          'message' => '<div class="alert alert-danger text-left">Something went wrong while updating KYC info!!!</div>',
        );

        echo json_encode($response);
        exit();
      }
    }
  }
?>