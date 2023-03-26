<?php
require("session_controller.php");

if (!empty($_POST['sms_price']) && !empty($_POST['level'])){

$sms_price=mysqli_real_escape_string($con, $_POST['sms_price']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE bulksms_plan SET sms_price='$sms_price' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your bulksms charges has been successfully updated !!!',
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