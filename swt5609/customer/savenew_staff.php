<?php
require("session_controller.php");

if (!empty($_POST['staff_fullname']) && !empty($_POST['staff_username']) && !empty($_POST['staff_email']) && !empty($_POST['staff_password'])){

$staff_fullname=$_POST['staff_fullname'];
$staff_username=$_POST['staff_username'];
$staff_password=$_POST['staff_password'];
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

if (strlen($staff_password)<5){

 $response=array(
    'status'=>'fail',
    'message' => 'Please use a password at least 5chars !!!',
  );
  echo json_encode($response);
  exit();

}

else {
  
$check_email=mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE email='$staff_email'");

if (mysqli_num_rows($check_email)<1){

  $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
  $time=$dateTime->format("d-M-y  h:i A");
  $admin_token=md5(time().uniqid().rand(10000000, 90000000));
  $admin_sid=md5(uniqid().time().rand(10000000, 90000000));
  $haspassword=password_hash($staff_password, PASSWORD_BCRYPT);

 $create_staff=mysqli_query($con, "INSERT INTO `vtuapp_admin` (`id`, `type`, `full_name`, `username`, `email`, `admin_token`, `password`, `admin_sid`, `reg_date`, `lastseen`, `admin_pin`, `monitor_mode`, `status`, `finance`, `manage_lock`, `manage_users`, `manage_history`, `manage_message`, `manage_rating`, `manage_apiuser`, `manage_automation`, `manage_prices`, `manage_staff`, `manage_login`) VALUES (NULL, 'STAFF', '$staff_fullname', '$staff_username', '$staff_email', '$admin_token', '$haspassword', '$admin_sid', '$time', '$time', '1234', '0', 'ACTIVE', '$access_finance', '$access_lock', '$access_users', '$access_history', '$access_message', '$access_message', '$access_apiusers', '$access_automate', '$access_price', '$access_staff', '1')");

if ($create_staff){

 $response=array(
    'status'=>'success',
    'message' => 'A new staff has been successfully added to the list !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when creating new staff !!!',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please this email has already been used !!!',
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