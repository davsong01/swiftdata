<?php

require ("../functions/airtimevtu_price.php");

if ($network=="MTN-VTU" || $network=="MTN"){
    $service_code="mtn";
    $service="MTN-VTU";
    $discount=$mtn_discount;
    $service_comm=$mair_comm;
}

if ($network=="GLO-VTU" || $network=="GLO"){
    $service_code="glo";
    $service="GLO-VTU";
    $discount=$glo_discount;
    $service_comm=$gair_comm;
}

if ($network=="AIRTEL-VTU" || $network=="AIRTEL"){
    $service_code="airtel";
    $service="AIRTEL-VTU";
    $discount=$airtel_discount;
    $service_comm=$aair_comm;
}

if ($network=="9MOBILE-VTU" || $network=="9MOBILE" || $network=="ETISALAT-VTU" || $network=="ETISALAT"){
    $service_code="etisalat";
    $service="9MOBILE-VTU";
    $discount=$mobile_discount;
    $service_comm=$moair_comm;
}


$discount_now=$amount*$discount/100;
$service_price=$amount-$discount_now;




if ($account_balance > $service_price && $service_price > 0){

    $new_wallet=$account_balance-$service_price;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");
    $postdata=array(
    'serviceID' => strtolower($service_code),
    'request_id' => $api_reference,
    'amount' => $amount,
    'phone' => $mobile_no,
    );

    if ($environment == 'local') {
        $url = "https://sandbox.vtpass.com/api/pay";
        $credentials = $vtpass_sandbox_account;
    } else {
        $url = "https://vtpass.com/api/pay";
        $credentials = $vtpass_account;
    }

    $headers = [
        'Authorization: Basic '.base64_encode($credentials).'',
        'Content-Type: application/json',
    ];

    $post_fields = json_encode([
        'url' => $url,
        'header' => $headers,
        'postData' => $postdata,
    ]);

    // $url ="https://vtpass.com/api/pay";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $request = curl_exec($ch);
    curl_close($ch);
    $rdata=json_decode($request);
    $code=$rdata->code;


    if (isset($code) && $code==000){
        $order_report=strtoupper($service.' N'.$amount.' Recharge Successful on '.$mobile_no);
       
        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','$domain','$ipaddress','VTPASS')");

    //       $response = array(
    //     'status' => 'fail',
    //     'message' => '<div class="alert alert-warning text-left">'. addslashes(mysqli_error($con)).'</div>',
    // );
    // echo json_encode($response);
    // exit();

        //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$service_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

        // $new_bonus=$account_bonus+$service_comm;
        // mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

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

        

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','$domain','$ipaddress','VTPASS')");

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

?>