<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['bank_name']) && !empty($_POST['req_token']) && !empty($_POST['account_name']) && !empty($_POST['account_no'])){

$bank_name=mysqli_real_escape_string($con, $_POST['bank_name']);
$account_name=mysqli_real_escape_string($con, $_POST['account_name']);
$account_no=mysqli_real_escape_string($con, $_POST['account_no']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$update=mysqli_query($con, "INSERT INTO `vtuapp_manualfunding` (`id`, `bank_name`, `account_name`, `account_no`) VALUES (NULL, '$bank_name', '$account_name', '$account_no')");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your new bank info has been successfully record !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating new bank information !!!</div>',
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