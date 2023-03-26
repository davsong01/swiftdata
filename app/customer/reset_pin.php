<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['new_pin']) && !empty($_POST['retype_pin']) && !empty($_POST['req_token']) && !empty($_POST['old_pin'])){

$old_pin=mysqli_real_escape_string($con, $_POST['old_pin']);
$new_pin=mysqli_real_escape_string($con, $_POST['new_pin']);
$retype_pin=mysqli_real_escape_string($con, $_POST['retype_pin']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if ($old_pin == $security){

if (strlen($new_pin) == 5 && is_numeric($new_pin) && $new_pin > 0){

if ($new_pin != $retype_pin){


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Pin entered not match !!!</div>',
  );
  echo json_encode($response);
  exit();
}

else{

 mysqli_query($con, "UPDATE users SET security_pin='$new_pin' WHERE id='$id' AND email='$email'");

 $response=array(
  'title' => 'COMPLETED',
  'icon' => 'success',
    'status'=>'success',
    'message' => 'Pin reset was successfully !!!',
  );
  echo json_encode($response);
  exit();

}


}

else{


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use 5digits pin !!!</div>',
  );
  echo json_encode($response);
  exit();


}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Incorrect old pin !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}
else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
  );
  echo json_encode($response);
  exit();
}

?>