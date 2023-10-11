<?php
  require("session_controller.php");

  if (!empty($_POST['level'])){
    $waec=mysqli_real_escape_string($con, $_POST['waec']);
    $waec_reg=mysqli_real_escape_string($con, $_POST['waec_reg']);
    $neco=mysqli_real_escape_string($con, $_POST['neco']);
    $nabteb=mysqli_real_escape_string($con, $_POST['nabteb']);
    $nbais=mysqli_real_escape_string($con, $_POST['nbais']);
    // $gce=mysqli_real_escape_string($con, $_POST['gce']);
    $gce=0;
    $level=mysqli_real_escape_string($con, $_POST['level']);

    $update=mysqli_query($con, "UPDATE web_settings SET waec_lock='$waec', waec_registration_lock='$waec_reg', gce_lock='$gce', neco_lock='$neco', nabt_lock='$nabteb',nbais_lock='$nbais' WHERE id='$level'");

    if ($update){
      $response=array(
        'status'=>'success',
        'message' => 'Updated successfully !!!',
      );
      echo json_encode($response);
      exit();

    }else{
      $response=array(
        'status'=>'fail',
        'message' => 'Critical error occur when updating website settings !!!',
      );
      echo json_encode($response);
      exit();

    }
  }else{
    $response=array(
      'status'=>'fail',
      'message' => 'Please fill all form !!!',
    );
    echo json_encode($response);
    exit();
  }

?>