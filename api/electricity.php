<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$api_token=trim($data['token']);
$smart_no=trim($data['service_number']);  // getting mobile no
$service_type=$data['service_type'];
$service=strtoupper($data['service_id']);
$reference=$data['request_id'];
$amountxx0=$data['amount'];
$amountxx1=str_replace("-", "", $amountxx0);
$amount=str_replace("+", "", $amountxx1);

require("checkip.php");

if (!empty($smart_no) && !empty($service_type) && !empty($reference) && !empty($service) && !empty($api_token) && !empty($amount)){

// require("../functions/web_config.php");
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
 $service_access=$return_info['bills_access'];
 $level=$return_info['level'];
 $user_id=$return_info['id'];
 $account_mobile=$return_info['mobile'];

if ($service=="IBADAN-ELECTRIC" && $ibadan_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}

else if ($service=="ABUJA-ELECTRIC" && $abuja_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}

else if ($service=="EKO-ELECTRIC" && $eko_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}

else if ($service=="IKEJA-ELECTRIC" && $ikeja_lock==1 && $service_access==1){

	require("billModule/bills_vtpass.php");
}

else if ($service=="YOLA-ELECTRIC" && $yola_lock==1 && $service_access==1){

	require("billModule/bills_vtpass.php");
}

else if ($service=="PORTHARCOURT-ELECTRIC" && $port_lock==1 && $service_access==1){

	require("billModule/bills_vtpass.php");
}

else if ($service=="JOS-ELECTRIC" && $jos_lock==1 && $service_access==1){

	require("billModule/bills_vtpass.php");
}

else if ($service=="KADUNA-ELECTRIC" && $kaduna_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}

else if ($service=="KANO-ELECTRIC" && $kano_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}
else if ($service=="BENIN-ELECTRIC" && $benin_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}
else if ($service=="ENUGU-ELECTRIC" && $enugu_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}else if ($service=="ABA-ELECTRIC" && $aba_lock==1 && $service_access==1){
	require("billModule/bills_vtpass.php");
}else {
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