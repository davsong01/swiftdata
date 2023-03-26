<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['withdrawAmount2']) && !empty($_POST['security_pin2']) && !empty($_POST['accountCode']) && !empty($_POST['accountNo']) && !empty($_POST['req_token']) && $_POST['withdrawAmount2']>0){

$withdrawAmount2=mysqli_real_escape_string($con, $_POST['withdrawAmount2']);
$security_pin2=mysqli_real_escape_string($con, $_POST['security_pin2']);
$accountNo=mysqli_real_escape_string($con, $_POST['accountNo']);
$accountCode=mysqli_real_escape_string($con, $_POST['accountCode']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if ($withdrawAmount2>499){

if ($security_pin2 == $security){

$payload=array(
  'token' => $sk_token,
	'amount' => $withdrawAmount2,
  'service' => 'BANK',
  'account' => $accountNo,
  'bank_code' => $accountCode,
	'reference' => strtoupper(rand(10000000, 90000000).time().mt_rand()),
);

$url = $api_url.'/withdraw';
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
    'message' => '<div class="alert alert-danger text-left">Minimum withdraw at once is N500 !!!</div>',
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