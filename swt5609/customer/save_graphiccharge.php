<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['charges']) && !empty($_POST['req_token'])){

$charges=mysqli_real_escape_string($con, $_POST['charges']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$update=mysqli_query($con, "UPDATE web_settings SET flyer_charge='$charges' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your flyer charges has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating charges !!!</div>',
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