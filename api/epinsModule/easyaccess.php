<?php
require ("../functions/epins_price.php");

if ($service=="WAEC"){
    $service_url="https://easyaccess.com.ng/api/waec_v2.php";
    $service_price=$waec;
    $service_comm=$waec_comm;
}

if ($service=="NECO"){
    $service_url="https://easyaccess.com.ng/api/neco_v2.php";
    $service_price=$neco;
    $service_comm=$neco_comm;
}

if ($service=="NABTEB"){
    $service_url="https://easyaccess.com.ng/api/nabteb_v2.php";
    $service_price=$nabteb;
    $service_comm=$nabteb_comm;
}

if ($account_balance > $service_price && $service_price > 0){
    $new_wallet=$account_balance-$service_price;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $service_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array(
    'no_of_pins' =>1,
    ),
    CURLOPT_HTTPHEADER => array(
    "AuthorizationToken: ".$easyaccess_token."",
    "cache-control: no-cache"
    ),
    )); 
    $response = curl_exec($curl);
    curl_close($curl);
    $result=json_decode($response);
    $status=strtolower($result->status);
    $epin=$result->pin;

    if ($status=="successful"){
        $order_report=strtoupper($service.' N'.$service_price.' E-Pin Purchase Successful on '.$mobile_no.' ['.$epin.']');

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$response')");

    //mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$service_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

    //$new_bonus=$account_bonus+$service_comm;
    //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

        $response=array(
        'status' => 'success',
        'status_code' =>'200',
        'old_balance'=> $account_balance, ////// 
        'new_bal'=> $new_wallet, ////// 
        'time' => $time,
        'amountPaid' => $service_price,
        'pin' => $epin,
        'message' => $order_report,
        );
        echo json_encode($response);
        exit;


    }else{
        $new_wallet=$account_balance;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

        $order_report=strtoupper($service.' N'.$service_price.' E-pin Purchase failed on '.$mobile_no);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

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