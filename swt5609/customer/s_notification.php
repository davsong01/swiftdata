<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['message']) && !empty($_POST['req_token']) && !empty($_POST['message_opt'])){

$message=mysqli_real_escape_string($con, $_POST['message']);
$message_opt=mysqli_real_escape_string($con, $_POST['message_opt']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$real_message=str_replace("'", "", $message);

$update=mysqli_query($con, "UPDATE web_settings SET notification_scroll='$real_message', scrolling_mode='$message_opt' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your scrolling notification has been successfully updated !!!',
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