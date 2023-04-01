<?php
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT showmax1,showmax2, showmax3, showmax4 FROM showmax_planlist WHERE id='$level'"));

$full = $data_query[0];
$mobile_only = $data_query[1];
$sports_full = $data_query[2];
$sports_mobile_only = $data_query[3];


if ($plan_id==900){
    $service_code="full";
    $package_name="Showmax FULL";
    $service_price=$full;
}

if ($plan_id==901){
    $service_code="mobile_only";
    $package_name="Showmax Mobile Only";
    $service_price=$mobile_only;
}

if ($plan_id==902){
    $service_code="sports_full";
    $package_name="Showmax Sports Full";
    $service_price=$sports_full;
}

if ($plan_id==903){
    $service_code="sports_mobile_only";
    $package_name="Showmax Sports Mobile Only";
    $service_price=$sports_mobile_only;
}

if ($account_balance > $service_price){

$new_wallet=$account_balance-$service_price;
mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username='$account_username'");

$postdata=array(
  'billersCode' => $smart_no,
  'serviceID' => strtolower($service),
  'request_id' => $api_reference,
  'variation_code' => $service_code,
  'phone' => $contact_no,
);

if($environment == 'local'){
    $url="https://sandbox.vtpass.com/api/pay";
}else{
    $url="https://vtpass.com/api/pay";
}

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = [
        'Authorization: Basic '.base64_encode($vtpass_account).'',
        'Content-Type: application/json',
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $request = curl_exec($ch);
    curl_close($ch);
    $rdata=json_decode($request);
    $code=$rdata->code;
    $purchased_code = isset($rdata->purchased_code) ? ' ['.$rdata->purchased_code . ']' : null;

    if ($code==000){
        $order_report=strtoupper('Subscription for '.$package_name.'- N'.$service_price.' Successful on '.$smart_no . $purchased_code);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_response`,`api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference','$request', 'DONE', '0', '0','0')");

       
        $response=array(
            'status' => 'success',
            'status_code' =>'200',
            'old_balance'=> $account_balance, ////// 
            'new_bal'=> $new_wallet, ////// 
            'time' => $time,
            'amountPaid' => $service_price,
            'message' => $order_report,
            'raw'=> $rdata,
        );

        echo json_encode($response);
        exit;

    }else{
        $new_wallet=$account_balance;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

        $order_report=strtoupper('Subscription for '.$package_name.'- N'.$service_price.' failed on '.$smart_no);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`,`api_response`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', '$rdata', 'DONE', '0', '0','0')");

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