<?php
require ("../functions/epins_price.php");

if ($service=="WAEC"){
    $service_url="https://easyaccess.com.ng/api/waec_v2.php";
    $service_price=$waec * $quantity;
    $service_comm = $waec_comm;
}

if ($service=="NECO"){
    $service_url="https://easyaccess.com.ng/api/neco_v2.php";
    $service_price=$neco * $quantity;
    $service_comm=$neco_comm;
}

if ($service=="NABTEB"){
    $service_url="https://easyaccess.com.ng/api/nabteb_v2.php";
    $service_price=$nabteb * $quantity;
    $service_comm=$nabteb_comm;
}

if ($account_balance > $service_price && $service_price > 0){
    $new_wallet=$account_balance-$service_price;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

    $post_fields = json_encode([
        'url' => $service_url,
        'no_of_pins' => $quantity ?? 1
    ]);

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
        'no_of_pins' => $quantity ?? 1,
    ),
    CURLOPT_HTTPHEADER => array(
        "AuthorizationToken: ".$easyaccess_token."",
        "cache-control: no-cache"
    ),
    )); 
    $response = curl_exec($curl);

    // $response = '{"success":"true","message":"E-pin was Successful","pin":"175913539286","amount":775,"transaction_date":"30-09-2023 08:27:05 am","reference_no":"ID67964548679","status":"fail"}';

    // $response = '{"success":"true","message":"E-pin was Successful","pin":"212171481223","pin2":"213366968668","amount":1360,"transaction_date":"13-10-2023 10:00:25 pm","reference_no":"ID35929683779","status":"Successful"}';

    curl_close($curl);

    $result=json_decode($response);
    $status=strtolower($result->status);

    if ($service == "WAEC" || $service == 'NECO' || $service == 'NABTEB') {
        if (isset($result) && !empty($result)) {
            foreach ($result as $key => $value) {
                if (strpos($key, 'pin') !== false) {
                    $pinsx[] = $value;
                }
            }
        }
        
        $epin = (isset($pinsx) && !empty($pinsx)) ? 'PINS: ' . implode(', ', $pinsx) : '';
    }else{
        $epin = 'PIN: '. $result->pin ?? '';
    }
    
    
    if (isset($status) && $status == "successful"){
        $order_report=strtoupper($service.' N'.number_format($service_price).' E-Pin Purchase Successful. '. $epin);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`domain_name`,`ip_address`,`api_response`,`post_fields`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$domain','$ipaddress','$response','$post_fields','EASYACCESS')");
    
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

        $order_report=strtoupper($service.' N'.number_format($service_price).' E-pin Purchase failed.');

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`domain_name`,`ip_address`,`api_response`,`post_fields`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$domain','$ipaddress','$response','$post_fields','EASYACCESS')");

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
