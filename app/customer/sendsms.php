<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['sender_name']) && !empty($_POST['receipent_no']) && !empty($_POST['message_body']) && !empty($_POST['security_pin']) && !empty($_POST['req_token'])){

$sender_name=mysqli_real_escape_string($con, $_POST['sender_name']);
$receipent_no=mysqli_real_escape_string($con, $_POST['receipent_no']);
$security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
$message_body=mysqli_real_escape_string($con, $_POST['message_body']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);


if (strlen($sender_name)<9){

if ($security_pin == $security){

$payload=array(
  'token' => $sk_token,
	'sender_id' => $sender_name,
  'message' => $message_body,
  'receipent_no' => $receipent_no,
	'reference' => strtoupper(rand(10000000, 90000000).time().mt_rand()),
);

$url = $api_url.'/sms';
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
    'message' => '<div class="alert alert-danger text-left">Maximum character for sender name is 8letters !!!</div>',
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