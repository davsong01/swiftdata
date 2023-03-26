<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$token=trim($data['token']);  

// First check if a username was provided.
if (!empty($token)) {

if (strlen($token)>0){

require("../functions/web_config.php");

$check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$token'");

if (mysqli_num_rows($check_user)>0){

 //Basic Authorization Verified
 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$token' AND block='0'"));

 $account_balance=$return_info['wallets'];
 $account_webhook=$return_info['webhook'];
 $account_email=$return_info['email'];
 $full_name=$return_info['full_name'];
 $level=$return_info['level'];
 $mobile=$return_info['mobile'];

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
    'full_name' => $full_name,
    'balance' => $account_balance,
    'email_address' =>$account_email,
    'webhook' => $account_webhook,
    'mobile_no' => $mobile,
    );
    echo json_encode($response);
    exit;

}

else{

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Authorization Failed! Unable to fetch user record',
    );
    echo json_encode($response);
    exit;
}


}

else{

    header('WWW-Authenticate: Basic realm="My Website"');
    header('HTTP/1.0 401 Unauthorized');

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Authorization Failed! Please Provide Valid API Key',
    );
    echo json_encode($response);

}

   
}

else{

 // If no username provided, present the auth challenge.
    header('WWW-Authenticate: Basic realm="My Website"');
    header('HTTP/1.0 401 Unauthorized');

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Authorization Failed! Please Provide API Key',
    );
    echo json_encode($response);
    exit;

}



?>