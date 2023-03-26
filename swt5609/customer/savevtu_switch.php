<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$mtn_vtu=mysqli_real_escape_string($con, $_POST['mtn_vtu']);
$glo_vtu=mysqli_real_escape_string($con, $_POST['glo_vtu']);
$airtel_vtu=mysqli_real_escape_string($con, $_POST['airtel_vtu']);
$mobile_vtu=mysqli_real_escape_string($con, $_POST['mobile_vtu']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET api_mtn2='$mtn_vtu', api_glo2='$glo_vtu', api_airtel2='$airtel_vtu', api_mobile2='$mobile_vtu' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your vtu automation has been successfully updated !!!',
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