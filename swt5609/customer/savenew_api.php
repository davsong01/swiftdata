<?php
require("session_controller.php");

if (!empty($_POST['api_email'])){

$api_email=strtolower($_POST['api_email']);
$access_mtnsme=$_POST['access_mtnsme'];
$access_mtncg=$_POST['access_mtncg'];
$access_glo=$_POST['access_glo'];
$access_airtel=$_POST['access_airtel'];
$access_airtelcg=$_POST['access_airtelcg'];
$access_mobile=$_POST['access_mobile'];
$access_airtime=$_POST['access_airtime'];
$access_cable=$_POST['access_cable'];
$access_bills=$_POST['access_bills'];
$access_epin=$_POST['access_epin'];

if (strlen($api_email)<5){

 $response=array(
    'status'=>'fail',
    'message' => 'Please use a valid email address !!!',
  );
  echo json_encode($response);
  exit();

}

else {
  
$check_email=mysqli_query($con, "SELECT * FROM vtuapp_customuser WHERE email='$api_email'");

if (mysqli_num_rows($check_email)>0){

  $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
  $time=$dateTime->format("d-M-y  h:i A");
  $admin_token=md5(time().uniqid().rand(10000000, 90000000));
  $admin_sid=md5(uniqid().time().rand(10000000, 90000000));

 $create_api=mysqli_query($con, "UPDATE vtuapp_customuser SET mtnsme_access='$access_mtnsme',  mtncg_access='$access_mtncg', glo_access='$access_glo', airtel_access='$access_airtel', airtelcg_access='$access_airtelcg', mobile_access='$access_mobile', airtime_access='$access_airtime', cable_access='$access_cable', bills_access='$access_bills', epin_access='$access_epin' WHERE email='$api_email'");

if ($create_api){

 $response=array(
    'status'=>'success',
    'message' => 'A new api deal has been updated successfully !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when creating new api deal !!!',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please this email is not a valid email address !!!',
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