<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['charges2']) && !empty($_POST['req_token']) && !empty($_POST['charges3']) && !empty($_POST['charges4']) && !empty($_POST['admin2']) && !empty($_POST['admin3']) && !empty($_POST['admin4'])){

$charges2=mysqli_real_escape_string($con, $_POST['charges2']);
$charges3=mysqli_real_escape_string($con, $_POST['charges3']);
$charges4=mysqli_real_escape_string($con, $_POST['charges4']);
$admin2=mysqli_real_escape_string($con, $_POST['admin2']);
$admin3=mysqli_real_escape_string($con, $_POST['admin3']);
$admin4=mysqli_real_escape_string($con, $_POST['admin4']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$update=mysqli_query($con, "UPDATE web_settings SET level2_charge='$charges2', level3_charge='$charges3', level4_charge='$charges4', level2_adminch='$admin2', level3_adminch='$admin3', level4_adminch='$admin4' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your level charges has been successfully updated !!!',
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