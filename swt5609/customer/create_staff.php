<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['staff_password2']) && !empty($_POST['staff_password1']) && !empty($_POST['staff_name']) && !empty($_POST['staff_email']) && !empty($_POST['finance']) && !empty($_POST['manage_lock']) && !empty($_POST['manage_users']) && !empty($_POST['manage_staff']) && !empty($_POST['manage_history']) && !empty($_POST['manage_message']) && !empty($_POST['manage_rating']) && !empty($_POST['manage_apiuser']) && !empty($_POST['manage_automation']) && !empty($_POST['manage_prices']) && !empty($_POST['manage_login']) && !empty($_POST['req_token'])){

$staff_email=strtolower(mysqli_real_escape_string($con, $_POST['staff_email']));
$staff_name=mysqli_real_escape_string($con, $_POST['staff_name']);
$staff_password1=mysqli_real_escape_string($con, $_POST['staff_password1']);
$staff_password2=mysqli_real_escape_string($con, $_POST['staff_password2']);
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

if (mysqli_num_rows($check_email)< 1){

  if (strlen($staff_password1)>3){

 if ($staff_password1 != $staff_password2){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Both password are not matched !!!</div>',
  );
  echo json_encode($response);
  exit();

 }

 else{

  $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
  $time=$dateTime->format("d-M-y  h:i A");
  $reference=strtoupper(time().uniqid().rand(10000000, 90000000));
  $haspassword=md5($staff_password1);
  
 $create_staff=mysqli_query($con, "INSERT INTO `vtuapp_admin` (`id`, `type`, `full_name`, `username`, `email`, `admin_token`, `password`, `admin_sid`, `reg_date`, `lastseen`, `admin_pin`, `monitor_mode`, `status`, `finance`, `manage_lock`, `manage_users`, `manage_history`, `manage_message`, `manage_rating`, `manage_apiuser`, `manage_automation`, `manage_prices`, `manage_staff`, `manage_login`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");

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
    'message' => '<div class="alert alert-danger text-left">Critical error occur when creating new staff !!!</div>',
  );
  echo json_encode($response);
  exit();

}

 }


  }

  else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use strong password !!!</div>',
  );
  echo json_encode($response);
  exit();  
  }

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">This email as already exits in the admin section !!!</div>',
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