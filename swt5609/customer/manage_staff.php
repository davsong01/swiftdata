<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['staff_email']) && !empty($_POST['finance']) && !empty($_POST['manage_lock']) && !empty($_POST['manage_users']) && !empty($_POST['manage_staff']) && !empty($_POST['manage_history']) && !empty($_POST['manage_message']) && !empty($_POST['manage_rating']) && !empty($_POST['manage_apiuser']) && !empty($_POST['manage_automation']) && !empty($_POST['manage_prices']) && !empty($_POST['manage_login']) && !empty($_POST['req_token'])){

$staff_email=strtolower(mysqli_real_escape_string($con, $_POST['staff_email']));
$finance=mysqli_real_escape_string($con, $_POST['finance']);
$manage_lock=mysqli_real_escape_string($con, $_POST['manage_lock']);
$manage_users=mysqli_real_escape_string($con, $_POST['manage_users']);
$manage_staff=mysqli_real_escape_string($con, $_POST['manage_staff']);
$manage_history=mysqli_real_escape_string($con, $_POST['manage_history']);
$manage_message=mysqli_real_escape_string($con, $_POST['manage_message']);
$manage_rating=mysqli_real_escape_string($con, $_POST['manage_rating']);
$manage_apiuser=mysqli_real_escape_string($con, $_POST['manage_apiuser']);
$manage_automation=mysqli_real_escape_string($con, $_POST['manage_automation']);
$manage_prices=mysqli_real_escape_string($con, $_POST['manage_prices']);
$manage_login=mysqli_real_escape_string($con, $_POST['manage_login']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


$check_email=mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE email='$staff_email'");

if (mysqli_num_rows($check_email)>0){

  $update=mysqli_query($con, "UPDATE vtuapp_admin SET finance='$finance', manage_lock='$manage_lock',manage_users='$manage_users', manage_staff='$manage_staff', manage_history='$manage_history',manage_message='$manage_message', manage_rating='$manage_rating', manage_apiuser='$manage_apiuser',manage_automation='$manage_automation', manage_prices='$manage_prices', manage_login='$manage_login'  WHERE email='$staff_email'");

if ($update){


 $response=array(
    'status'=>'success',
    'message' => 'Roles permission updated successful !!!',
  );
  echo json_encode($response);
  exit();


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating staff permission roles !!!</div>',
  );
  echo json_encode($response);
  exit();

}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Staff record not found !!!</div>',
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