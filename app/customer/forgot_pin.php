<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token2']){

if (!empty($_POST['new_pin2']) && !empty($_POST['retype_pin2']) && !empty($_POST['req_token2']) && !empty($_POST['accountpass'])){

$accountpass=mysqli_real_escape_string($con, $_POST['accountpass']);
$new_pin2=mysqli_real_escape_string($con, $_POST['new_pin2']);
$retype_pin2=mysqli_real_escape_string($con, $_POST['retype_pin2']);
$req_token2=mysqli_real_escape_string($con, $_POST['req_token2']);


if (md5($accountpass) == $password){

if (strlen($new_pin2) == 5 && is_numeric($new_pin2) && $new_pin2 > 0){

if ($new_pin2 != $retype_pin2){


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Pin entered not match !!!</div>',
  );
  echo json_encode($response);
  exit();
}

else{

 mysqli_query($con, "UPDATE users SET security_pin='$new_pin2' WHERE id='$id' AND email='$email'");

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
    'message' => '<div class="alert alert-danger text-left">Incorrect password !!!</div>',
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