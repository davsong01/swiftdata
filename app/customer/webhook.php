<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['webhook_url']) && !empty($_POST['security_pin']) && !empty($_POST['req_token'])){

$webhook_url=mysqli_real_escape_string($con, $_POST['webhook_url']);
$security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if (strlen($webhook_url)<5){

  $response=array(
    'status'=>'fail',
    'message' => 'Please use a valid url !!!',
  );
  echo json_encode($response);
  exit(); 
}

else if ($security_pin != $security){

  $response=array(
    'status'=>'fail',
    'message' => 'Incorrect security pin !!!',
  );
  echo json_encode($response);
  exit();  
}

else {

 mysqli_query($con, "UPDATE vtuapp_customuser SET webhook='$webhook_url', webhook_update='1' WHERE id='$id' AND email='$email'");

 $response=array(
  'title' => 'COMPLETED',
  'icon' => 'success',
    'status'=>'success',
    'message' => 'Your webhook has been updated successfully !!!',
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

}
else{

 $response=array(
    'status'=>'fail',
    'message' => 'Something went wrong...',
  );
  echo json_encode($response);
  exit();
}

?>