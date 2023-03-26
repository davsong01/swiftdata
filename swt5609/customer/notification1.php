<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['notification1']) &&  !empty($_POST['notification1_mode']) && !empty($_POST['req_token'])){

$notification1=mysqli_real_escape_string($con, $_POST['notification1']);
$notification1_mode=mysqli_real_escape_string($con, $_POST['notification1_mode']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$real_message=str_replace("'", "", $notification1);

$update=mysqli_query($con, "UPDATE web_settings SET notification1='$real_message', notification1_mode='$notification1_mode' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your block notification has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating notification !!!</div>',
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