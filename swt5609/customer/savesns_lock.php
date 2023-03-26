<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$mtn_lock=mysqli_real_escape_string($con, $_POST['mtn_lock']);
$glo_lock=mysqli_real_escape_string($con, $_POST['glo_lock']);
$airtel_lock=mysqli_real_escape_string($con, $_POST['airtel_lock']);
$mobile_lock=mysqli_real_escape_string($con, $_POST['mobile_lock']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET m_lock3='$mtn_lock', g_lock3='$glo_lock', a_lock3='$airtel_lock', mo_lock3='$mobile_lock' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your store control has been successfully updated !!!',
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