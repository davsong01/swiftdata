<?php
    error_reporting(1);
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $api_token=trim($data['token']);
    $reference=$data['reference'];
    $service=$data['service'];
    $account=$data['account'];
    $bank_code=$data['bank_code'];
    $amountxx0=$data['amount'];
    $amountxx1=str_replace("-", "", $amountxx0);
    $amount=str_replace("+", "", $amountxx1);

    if (!empty($api_token) && !empty($amount) && !empty($reference) && !empty($service)){
        require("../functions/web_config.php");
        $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
        $time=$dateTime->format("d-M-y  h:i A");
        $timexx=$dateTime->format("YmdHi");
        $timestring=time();
        $api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

        $check_user=mysqli_query($con, "SELECT * FROM `users` where sk_token = '$api_token' AND block = '0'");
        // $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM mtncgdata_plan WHERE id='$level'"));

        if (mysqli_num_rows($check_user)>0){
            $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `users` WHERE sk_token='$api_token'"));

            $account_balance=$return_info['wallets'];
            $cashback_balance=$return_info['cashback'];
            $account_webhook=$return_info['webhook'];
            $account_email=$return_info['email'];
            $account_username=$return_info['username'];
            $level=$return_info['level'];
            $user_id=$return_info['id'];
            $mobile=$return_info['mobile'];

            if ($service=="WALLET" && $withdraw_access==1){
                require("withdrawModule/walletwithdraw.php");
            }else if ($service=="BANK" && $withdraw_access==1) {
                require("withdrawModule/bankwithdraw.php");
            }else {
                $response=array(
                    'status' => 'fail',
                    'status_code' =>'100',
                    'message' => 'Service is currently down or Restricted for this account. kindly check and try again !!!',
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
    }else{
        $response=array(
            'status' => 'fail',
            'status_code' =>'100',
            'message' => 'Please make sure all the parameters are included',
        );
        echo json_encode($response);
        exit();
    }
?>