<?php

  require("session_controller.php");
  $r_bvn = $_POST['bvn'];
  $r_nin = $_POST['nin'];
  $check = $_POST['check'];

  if ($_SESSION['csrftoken'] == $_POST['req_token']){
      $check_email  = mysqli_fetch_assoc(mysqli_query($con, "SELECT `password`,`id` FROM users WHERE email='$email'"));

      try {
        //code...
        if(!empty($r_bvn)){
          $update = mysqli_query($con, "UPDATE users SET bvn='$r_bvn' WHERE email='$email'");
        }
  
        if(!empty($r_nin)){
          $update = mysqli_query($con, "UPDATE users SET nin='$r_nin' WHERE email='$email'");
        }
        $location = $baseurl. '/app/automated_pay';
       
        $response = array(
          'title' => 'COMPLETED',
          'icon' => 'success',
          'status' => 'success',
          'message' => 'Update Successful',
          'extra' => $extra
        );

        echo json_encode($response);
        exit();
      } catch (\Throwable $th) {
        $response = array(
          'status' => 'fail',
          'message' => '<div class="alert alert-danger text-left">'.$th->getMessage().'</div>',
        );

        echo json_encode($response);
        exit();
      }

      
  }
?>