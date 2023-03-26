<?php
require("session_controller.php");

if (!empty($_POST['staff_email'])){

$staff_email=strtolower($_POST['staff_email']);
$access_finance=$_POST['access_finance'];
$access_lock=$_POST['access_lock'];
$access_history=$_POST['access_history'];
$access_users=$_POST['access_users'];
$access_apiusers=$_POST['access_apiusers'];
$access_staff=$_POST['access_staff'];
$access_automate=$_POST['access_automate'];
$access_price=$_POST['access_price'];
$access_message=$_POST['access_message'];

if (strlen($staff_email)<1){

 $response=array(
    'status'=>'fail',
    'message' => 'Please make a request with valid email !!!',
  );
  echo json_encode($response);
  exit();

}

else {
  
$check_email=mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE email='$staff_email'");

if (mysqli_num_rows($check_email)>0){

  $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
  $time=$dateTime->format("d-M-y  h:i A");
  $admin_token=md5(time().uniqid().rand(10000000, 90000000));
  $admin_sid=md5(uniqid().time().rand(10000000, 90000000));

 $update_staff=mysqli_query($con, "UPDATE vtuapp_admin SET admin_token='$admin_token',  admin_sid='$admin_sid', finance='$access_finance', manage_lock='$access_lock', manage_users='$access_users', manage_history='$access_history', manage_message='$access_message', manage_message='$access_message', manage_apiuser='$access_apiusers', manage_automation='$access_automate', manage_prices='$access_price', manage_staff='$access_staff' WHERE email='$staff_email'");

if ($update_staff){

 $response=array(
    'status'=>'success',
    'message' => 'This staff has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating staff account !!!',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please system detect the email is invalid !!!',
  );
  echo json_encode($response);
  exit();
}

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();

}


?>