<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['mtn_n']) &&  !empty($_POST['glo_n']) && !empty($_POST['airtel_n']) && !empty($_POST['req_token'])){

$mtn_n=mysqli_real_escape_string($con, $_POST['mtn_n']);
$glo_n=mysqli_real_escape_string($con, $_POST['glo_n']);
$airtel_n=mysqli_real_escape_string($con, $_POST['airtel_n']);
$mobile_n=mysqli_real_escape_string($con, $_POST['mobile_n']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$update=mysqli_query($con, "UPDATE web_settings SET mtn_n='$mtn_n', glo_n='$glo_n', airtel_n='$airtel_n', mobile_n='$mobile_n' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your mobile numbers has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating web numbers !!!</div>',
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