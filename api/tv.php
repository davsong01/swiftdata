<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$api_token=trim($data['token']);
$smart_no=trim($data['service_number']);  // getting mobile no
$plan_id=$data['plan_code'];
$service=strtoupper($data['service_id']);
$reference=$data['request_id'];


if (!empty($smart_no) && !empty($plan_id) && !empty($reference) && !empty($service) && !empty($api_token)){

require("../functions/web_config.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=$dateTime->format("YmdHi");
$timestring=time();
$api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

$check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

if (mysqli_num_rows($check_user)>0){

 //Basic Authorization Verified

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'"));

 $account_balance=$return_info['wallets'];
 $account_bonus=$return_info['cashback'];
 $account_webhook=$return_info['webhook'];
 $account_email=$return_info['email'];
 $account_username=$return_info['username'];
 $account_refby=$return_info['ref_by'];
 $service_access=$return_info['cable_access'];
 $level=$return_info['level'];
 $user_id=$return_info['id'];
 $account_mobile=$return_info['mobile'];

if ($service=="DSTV" && $dstv_lock==1 && $service_access==1){

	require("tvModule/dstv_module.php");
}

else if ($service=="GOTV" && $gotv_lock==1 && $service_access==1){

	require("tvModule/gotv_module.php");
}

else if ($service=="STARTIME" && $star_lock==1 && $service_access==1 || $service=="STARTIMES" && $star_lock==1 && $service_access==1){

	require("tvModule/startime_module.php");
}

else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Service is currently down or Restricted for this account. kindly check and try again !!!',
    );
    echo json_encode($response);
    exit;
}


}

else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Basic Authorization Failed! Unable to fetch user record',
    );
    echo json_encode($response);
    exit;
}


}

else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Please make sure all the parameters are included',
    );
    echo json_encode($response);
}


?>