<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['network_module']) && !empty($_POST['amount']) && !empty($_POST['mobile_no']) && !empty($_POST['security_pin']) && !empty($_POST['req_token']) && $_POST['amount']>0){

$network_module=strtoupper(mysqli_real_escape_string($con, $_POST['network_module']));
$amount=mysqli_real_escape_string($con, $_POST['amount']);
$mobile_no=mysqli_real_escape_string($con, $_POST['mobile_no']);
$security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if (strlen($mobile_no)==11 && is_numeric($mobile_no)){

if ($security_pin == $security){

$payload=array(
  'token' => $sk_token,
  'mobile' => $mobile_no,
  'network' => $network_module,
  'request_id' => strtoupper(rand(10000000, 90000000).time().mt_rand()),
  'amount' => $amount,
);

$url = $api_url.'/airtime';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$apidata=json_decode($request);
$message=$apidata->message;
$status=$apidata->status;

if ($status == "success"){
 $response=array(
 	'title' => 'COMPLETED',
 	'icon' => 'success',
    'status'=>'success',
    'message' => $message,
  );

  echo json_encode($response);
  exit();
}else{
 $response=array(
 	'title' => 'FAILED',
 	'icon' => 'error',
    'status'=>'fail',
    'message' => '<div class="alert alert-danger">'.$message.'</div>',
  );

  echo json_encode($response);
  exit();
}
}else{
 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Incorrect security pin !!!</div>',
  );
  echo json_encode($response);
  exit();


}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use a valid mobile no !!!</div>',
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