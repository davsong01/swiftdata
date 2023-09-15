<?php

    error_reporting(0);
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $api_token=trim($data['token']);
    $network=strtoupper($data['network']); // getting user post service
    $mobile_no=trim($data['mobile']);  // getting mobile no
    $reference=$data['request_id'];
    $amountxx0=$data['amount'];
    $amountxx1=str_replace("-", "", $amountxx0);
    $amount=str_replace("+", "", $amountxx1);


    require("checkip.php");

    if (!empty($mobile_no) && !empty($amount) && !empty($reference) && !empty($network) && !empty($api_token) && $amount>0){

    // require("../functions/web_config.php");
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    $timexx=$dateTime->format("YmdHi");
    $timestring=time();
    $api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

    $check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

    if (mysqli_num_rows($check_user)>0){

    $check_mobile = mysqli_query($con, "SELECT add_mobile FROM blacklist_mobiles WHERE add_mobile='$mobile_no'");

    if (mysqli_num_rows($check_mobile)>0){

        $response=array(
            'status' => 'fail',
            'status_code' =>'100',
            'message' => 'Mobile no. found in blacklist !!!',
        );
        echo json_encode($response);
        exit;

    }

    else {

    $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token'"));

    $account_balance=$return_info['wallets'];
    $account_bonus=$return_info['cashback'];
    $account_webhook=$return_info['webhook'];
    $account_email=$return_info['email'];
    $account_refby=$return_info['ref_by'];
    $account_username=$return_info['username'];
    $service_access=$return_info['airtime_access'];
    $level=$return_info['level'];
    $user_id=$return_info['id'];
    $mobile=$return_info['mobile'];

    if ($network=="MTN-VTU" && $m_lock2==1 && $service_access==1 || $network=="MTN" && $m_lock2==1 && $service_access==1){

    require("airtimeModule/$api_mtn2");
    }

    else if ($network=="GLO-VTU" && $g_lock2==1 && $service_access==1 || $network=="GLO" && $g_lock2==1 && $service_access==1){

    require("airtimeModule/$api_glo2");
    }

    else if ($network=="AIRTEL-VTU" && $a_lock2==1 && $service_access==1 || $network=="AIRTEL" && $a_lock2==1 && $service_access==1){

    require("airtimeModule/$api_airtel2");
    }

    else if ($network=="9MOBILE-VTU" && $mo_lock2==1 && $service_access==1 || $network=="9MOBILE" && $mo_lock2==1 && $service_access==1){

    require("airtimeModule/$api_mobile2");
    }

    else if ($network=="ETISALAT-VTU" && $mo_lock2==1 && $service_access==1 || $network=="ETISALAT" && $mo_lock2==1 && $service_access==1){

    require("airtimeModule/$api_mobile2");
    }

    //////

    else if ($network=="MTN-SNS" && $m_lock3==1){

        require("airtimeModule/$api_mtn3"); 
    }

    else if ($network=="GLO-SNS" && $g_lock3==1){

        require("airtimeModule/$api_glo3");
    }
    
    else if ($network=="AIRTEL-SNS" && $a_lock3==1){

        require("airtimeModule/$api_airtel3");
    }

    else if ($network=="9MOBILE-SNS" && $mo_lock3==1){

    require("airtimeModule/$api_mobile3"); 
    }

    else {

        $response=array(
        'status' => 'fail',
        'status_code' =>'100',
        'message' => 'Invalid Network ID or service is currently down. kindly check and try again !!!',
        );
        echo json_encode($response);
        exit;
    }

    }


    }

    else{

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