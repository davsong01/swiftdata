<?php

require ("../functions/airtimevtu_price.php");

if ($network=="MTN-VTU" || $network=="MTN"){
    $discount=$mtn_discount;
    $service_comm=$mair_comm;
    $discount_now = $amount * $discount / 100;
    $service_price = $amount - $discount_now;
    
    $MobileNetwork = '01';
    $url = 'https://www.nellobytesystems.com/APIAirtimeV1.asp?UserID='. $clubkonnect_user_id. '&APIKey='.$clubkonnect_api_key. '&MobileNetwork='. $MobileNetwork. '&Amount='. $service_price;
}

if ($network=="GLO-VTU" || $network=="GLO"){
    $discount=$glo_discount;
    $service_comm=$gair_comm;
    $discount_now = $amount * $discount / 100;
    $service_price = $amount - $discount_now;

    $MobileNetwork = '02';
    $url = 'https://www.nellobytesystems.com/APIAirtimeV1.asp?UserID=' . $clubkonnect_user_id . '&APIKey=' . $clubkonnect_api_key . '&MobileNetwork=' . $MobileNetwork . '&Amount=' . $service_price;
}

if ($network=="AIRTEL-VTU" || $network=="AIRTEL"){
    $discount=$airtel_discount;
    $service_comm=$aair_comm;

    $discount_now = $amount * $discount / 100;
    $service_price = $amount - $discount_now;

    $MobileNetwork = '04';
    $url = 'https://www.nellobytesystems.com/APIAirtimeV1.asp?UserID=' . $clubkonnect_user_id . '&APIKey=' . $clubkonnect_api_key . '&MobileNetwork=' . $MobileNetwork . '&Amount=' . $service_price;
}

if ($network=="9MOBILE-VTU" || $network=="9MOBILE" || $network=="ETISALAT-VTU" || $network=="ETISALAT"){
    $discount=$mobile_discount;
    $service_comm=$moair_comm;
    $discount_now = $amount * $discount / 100;
    $service_price = $amount - $discount_now;

    $MobileNetwork = 03;
    $url = 'https://www.nellobytesystems.com/APIAirtimeV1.asp?UserID=' . $clubkonnect_user_id . '&APIKey=' . $clubkonnect_api_key . '&MobileNetwork=' . $MobileNetwork . '&Amount=' . $service_price;
}

if ($account_balance > $service_price && $service_price > 0){
    $new_wallet=$account_balance-$service_price;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");
    $postdata= json_encode([
        'url' => $url,
        'request_id' => $api_reference,
        'amount' => $amount,
        'phone' => $mobile_no,
    ]);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $res = json_decode($response, true);
    $status = $res['status'] ?? '';

    $chargeable_statuses = ['ORDER_RECEIVED', 'ORDER_PROCESSED', 'ORDER_COMPLETED', 'ORDER_ONHOLD'];
    $chargeable_response_codes = ['100', '300', '200', '201', '601'];

    if(in_array($status, $chargeable_statuses) && in_array($code, $chargeable_response_codes)){
        $status = 'success';
    }else{
        $status = 'failed';
    }


    if ($status == 'success'){
        $order_report=strtoupper($service.' N'.$amount.' Recharge Successful on '.$mobile_no);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`post_fields`,`api_response`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$postdata','$response','CLUBKONNECT')");

        $response=array(
        'status' => 'success',
        'status_code' =>'200',
        'old_balance'=> $account_balance, ////// 
        'new_bal'=> $new_wallet, ////// 
        'time' => $time,
        'amountPaid' => $service_price,
        'discount' => $discount_now,
        'message' => $order_report,
        );
        echo json_encode($response);
        exit;


    }else{
        $new_wallet=$account_balance;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

        $order_report=strtoupper($service.' N'.$amount.' Recharge failed on '.$mobile_no);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`post_fields`,`api_response`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$postdata','$response','CLUBKONNECT')");

        $response=array(
            'status' => 'fail',
            'status_code' =>'100',
        'old_balance'=> $account_balance, ////// 
        'new_bal'=> $account_balance, ////// 
        'time' => $time,
        'message' => $order_report,
        );
        echo json_encode($response);
        exit;
    }
}else{
    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Your account is too low for this transaction !!!',
    );
    echo json_encode($response);
    exit;
}
