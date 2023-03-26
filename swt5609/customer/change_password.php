<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['retype_password']) && !empty($_POST['req_token'])){

$old_password=mysqli_real_escape_string($con, $_POST['old_password']);
$new_password=mysqli_real_escape_string($con, $_POST['new_password']);
$retype_password=mysqli_real_escape_string($con, $_POST['retype_password']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

 $return_pass=mysqli_fetch_assoc(mysqli_query($con, "SELECT password FROM vtuapp_admin WHERE admin_token='".$_SESSION['admin_token']."' AND admin_sid='".$_SESSION['admin_sid']."'"));

 if (md5($old_password) == $return_pass['password']){

 if (strlen($new_password)<5){


 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use a strong password !!!</div>',
  );
  echo json_encode($response);
  exit();

 }

 else{

 if ($new_password == $retype_password){

$newpassword=md5($new_password);
$update=mysqli_query($con, "UPDATE vtuapp_admin SET password='$newpassword' WHERE admin_token='".$_SESSION['admin_token']."' AND admin_sid='".$_SESSION['admin_sid']."'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your admin access password has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when resetting your admin access !!!</div>',
  );
  echo json_encode($response);
  exit();

}


 }

 else{

  $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Password entered not match !!!</div>',
  );
  echo json_encode($response);
  exit();
   
 }

 }

 }

else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid old password !!!</div>',
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