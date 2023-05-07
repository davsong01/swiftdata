<?php
  require("session_controller.php");

  if (!empty($_POST['level'])){

    $sms=mysqli_real_escape_string($con, $_POST['sms']);
    $level=mysqli_real_escape_string($con, $_POST['level']);

    $update=mysqli_query($con, "UPDATE web_settings SET sms_api='$sms' WHERE id='$level'");

    if ($update){
      $response=array(
        'status'=>'success',
        'message' => 'Your sms automation has been successfully updated !!!',
      );
      echo json_encode($response);
      exit();

    }

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating website settings !!!',
  );
  echo json_encode($response);
  exit();

}

}

else{

   $response=array(
    'status'=>'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();
}

?>