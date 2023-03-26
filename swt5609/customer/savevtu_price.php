<?php
require("session_controller.php");

if (!empty($_POST['mtn_discount']) &&  !empty($_POST['glo_discount']) &&  !empty($_POST['airtel_discount']) && !empty($_POST['mobile_discount']) && !empty($_POST['level'])){

$mtn_discount=mysqli_real_escape_string($con, $_POST['mtn_discount']);
$glo_discount=mysqli_real_escape_string($con, $_POST['glo_discount']);
$airtel_discount=mysqli_real_escape_string($con, $_POST['airtel_discount']);
$mobile_discount=mysqli_real_escape_string($con, $_POST['mobile_discount']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE airtimevtu_plan SET mtn_discount='$mtn_discount', glo_discount='$glo_discount', airtel_discount='$airtel_discount', mobile_discount='$mobile_discount' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your vtu airtime discount has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating price !!!',
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