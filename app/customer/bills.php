<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['service_module']) && !empty($_POST['service_plan']) && !empty($_POST['smart_no']) && !empty($_POST['security_pin']) && !empty($_POST['req_token']) && !empty($_POST['amount']) && $_POST['amount']>0 && is_numeric($_POST['amount'])){

$service_module=strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
$service_plan=mysqli_real_escape_string($con, $_POST['service_plan']);
$smart_no=mysqli_real_escape_string($con, $_POST['smart_no']);
$amount=mysqli_real_escape_string($con, $_POST['amount']);
$security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if ($amount > 499){

if ($security_pin == $security){
  

$payload=array(
  'token' => $sk_token,
  'service_number' => $smart_no,
  'service_id' => $service_module,
  'service_type'=>$service_plan,
  'request_id' => strtoupper(time().rand(10000000, 90000000).mt_rand()),
  'amount' => $amount,
);

$url = $api_url.'/electricity';
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

}

else{

 $response=array(
  'title' => 'FAILED',
  'icon' => 'error',
    'status'=>'fail',
    'message' => '<div class="alert alert-danger">'.$message.'</div>',
  );

echo json_encode($response);
exit();

}

}

else{


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
    'message' => '<div class="alert alert-danger text-left">Minimum you can purchase is N500 !!!</div>',
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