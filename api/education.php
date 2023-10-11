<?php

    error_reporting(0);
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $api_token=trim($data['token']);
    $service=strtoupper($data['service_id']); // getting user post service
    $reference = $data['request_id'];
    $mobile_no = $data['mobile_no'];
    $quantity=$data['quantity'] ?? 1;

    require("checkip.php");

    if (!empty($reference) && !empty($service) && !empty($api_token)){
        // require("../functions/web_config.php");
        $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
        $time=$dateTime->format("d-M-y  h:i A");
        $timexx=$dateTime->format("YmdHi");
        $timestring=time();
        $api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

        $check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

        if (mysqli_num_rows($check_user)>0){

            $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token'"));

            $account_balance=$return_info['wallets'];
            $account_bonus=$return_info['cashback'];
            $account_webhook=$return_info['webhook'];
            $account_email=$return_info['email'];
            $account_username=$return_info['username'];
            $account_refby=$return_info['ref_by'];
            $service_access=$return_info['epin_access'];
            $level=$return_info['level'];
            $user_id=$return_info['id'];
            $mobile=$return_info['mobile'];

            if ($service=="WAEC" && $waec_lock==1 && $service_access==1){
                if( $api_waec == 'naijaresultpins.php'){
                    require("epinsModule/naijaresultpins.php");
                }

                if( $api_waec == 'easyaccess.php'){
                    require("epinsModule/easyaccess.php");
                }

            }else if ($service=="WAEC-REG" && $waec_reg_lock==1 && $service_access==1){
                if ($api_waec_registration == 'naijaresultpins.php') {
                    require("epinsModule/naijaresultpins.php");
                }
                if ($api_waec_registration == 'vtpasseducation.php') {
                    require("epinsModule/vtpasseducation.php");
                }
            }else if ($service=="GCE" && $gce_lock==1 && $service_access==1){
                if ($api_gce == 'easyaccess.php') {
                    require("epinsModule/easyaccess.php");
                }
                if ($api_gec == 'naijaresultpins.php') {
                    require("epinsModule/naijaresultpins.php");
                }
            }else if ($service=="NECO" && $neco_lock==1 && $service_access==1){
                if ($api_neco == 'easyaccess.php') {
                    require("epinsModule/easyaccess.php");
                }
                if ($api_neco == 'naijaresultpins.php') {
                    require("epinsModule/naijaresultpins.php");
                }
                
            }else if ($service=="NABTEB" && $nabt_lock==1 && $service_access==1){
                if( $api_nabteb == 'naijaresultpins.php'){
                    require("epinsModule/naijaresultpins.php");
                }

                if( $api_nabteb == 'easyaccess.php'){
                    require("epinsModule/easyaccess.php");
                }
            }else {
                $response=array(
                    'status' => 'fail',
                    'status_code' =>'100',
                    'message' => 'Invalid Service ID or service is currently down. kindly check and try again !!!',
                );
                echo json_encode($response);
                exit;
        }
    }else{
        $response=array(
            'status' => 'fail',
            'status_code' =>'100',
            'message' => 'Basic Authorization Failed! Unable to fetch user record',
        );
        echo json_encode($response);
        exit;
    }


    }else {
        $response=array(
        'status' => 'fail',
        'status_code' =>'100',
        'message' => 'Please make sure all the parameters are included',
        );
        echo json_encode($response);

    }
?>