<?php
require ("../functions/epins_price.php");

if ($service=="WAEC"){
    $service_url="https://www.naijaresultpins.com/api/v1/exam-card";
    $card_type_id = 1;
    $service_price=$waec * $quantity;
    $service_comm = $waec_comm;
}

if ($service=="NECO"){
    $card_type_id = 2;
    $service_url= "https://www.naijaresultpins.com/api/v1/exam-card";
    $service_price=$neco * $quantity;
    $service_comm=$neco_comm;
}

if ($service== "NBAIS"){
    $card_type_id = 5;
    $service_url= "https://www.naijaresultpins.com/api/v1/exam-card";
    $service_price=$nbais * $quantity;
    $service_comm= $nbais_comm;
}

if ($service == "WAEC-REG") {
    $card_type_id = 4;
    $service_url = "https://www.naijaresultpins.com/api/v1/exam-card";
    $service_price = $waec_registration * $quantity;
    $service_comm = $waec_comm;
}

if ($account_balance > $service_price && $service_price > 0){
    $new_wallet=$account_balance-$service_price;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

    $post_fields = json_encode([
        'url' => $service_url,
        'quantity' => $quantity ?? 1,
        'card_type_id' => $card_type_id,
    ]);

    $headers = [
        "Authorization: Bearer ". $naijaresultpins_api_key,
        'Content-Type: application/json'
    ];

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
        CURLOPT_POSTFIELDS => $post_fields,
        CURLOPT_HTTPHEADER => $headers,
    )); 

    $response = curl_exec($curl);

    // $response = '{"status": "success","message": "2 WAEC Scratch Card generated","reference": "qXFPHaTZM3rSkfY","amount": 6700,"quantity": "3","old_balance": 259800,"new_balance": 253100,"transaction_date": "2023-10-02 02:45:13","cards":[{"pin": "941264752596","serial_no": "WRN193474585"},{"pin": "941264877068","serial_no": "WRN193474586"}]}';

    curl_close($curl);

    $result=json_decode($response);
    $status=strtolower($result->status);
    
    $pin = 'PIN: '. $result->cards ?? '';
    $pin = !empty($pin) ? str_replace('[' ,'',json_encode($result->cards, true)) : '';
    $epin = str_replace(']' ,'',$pin) ;


    if (isset($status) && $status == "success"){
        $order_report=strtoupper($service.' N'.number_format($service_price).' E-Pin Purchase Successful. '. $epin);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`domain_name`,`ip_address`,`api_response`,`post_fields`,`extra`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$domain','$ipaddress','$response','$post_fields','$epin')");
    
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

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`domain_name`,`ip_address`,`api_response`,`post_fields`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$domain','$ipaddress','$response','$post_fields')");

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
