<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$mtn_sns=mysqli_real_escape_string($con, $_POST['mtn_sns']);
$glo_sns=mysqli_real_escape_string($con, $_POST['glo_sns']);
$airtel_sns=mysqli_real_escape_string($con, $_POST['airtel_sns']);
$mobile_sns=mysqli_real_escape_string($con, $_POST['mobile_sns']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET api_mtn3='$mtn_sns', api_glo3='$glo_sns', api_airtel3='$airtel_sns', api_mobile3='$mobile_sns' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your sns automation has been successfully updated !!!',
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