<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['notification3']) &&  !empty($_POST['notification3_mode']) && !empty($_POST['req_token'])){

$notification3=mysqli_real_escape_string($con, $_POST['notification3']);
$notification3_mode=mysqli_real_escape_string($con, $_POST['notification3_mode']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$real_message=str_replace("'", "", $notification3);

$update=mysqli_query($con, "UPDATE web_settings SET notification3='$real_message', notification3_mode='$notification3_mode' WHERE id='1'");

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