<?php
require ("../functions/dstv_price.php");

if ($plan_id==800){
$service_code="dstv-padi";
$package_name="DSTV PADI";
$service_price=$dstv_padi;
}

if ($plan_id==801){
$service_code="dstv-yanga";
$package_name="DSTV YANGA";
$service_price=$dstv_yanga;
}

if ($plan_id==802){
$service_code="dstv-confam";
$package_name="DSTV CONFAM";
$service_price=$dstv_confam;
}

if ($plan_id==803){
$service_code="padi-extra";
$package_name="DSTV PADI EXTRA";
$service_price=$dstv_padi_extra;
}

if ($plan_id==804){
$service_code="yanga-extra";
$package_name="DSTV YANGA EXTRA";
$service_price=$dstv_yanga_extra;
}

if ($plan_id==805){
$service_code="dstv6";
$package_name="DSTV ASIA";
$service_price=$dstv_asia;
}

if ($plan_id==806){
$service_code="confam-extra";
$package_name="DSTV CONFAM EXTRA";
$service_price=$dstv_confam_extra;
}

if ($plan_id==807){
$service_code="dstv79";
$package_name="DSTV COMPACT";
$service_price=$dstv_compact;
}

if ($plan_id==808){
$service_code="dstv7";
$package_name="DSTV COMPACT PLUS";
$service_price=$dstv_compact_plus;
}

if ($plan_id==809){
$service_code="dstv3";
$package_name="DSTV PREMIUM";
$service_price=$dstv_premium;
}

if ($plan_id==810){
$service_code="dstv10";
$package_name="DSTV PREMIUM ASIA";
$service_price=$dstv_premium_asia;
}

if ($plan_id==811){
$service_code="extraview-access";
$package_name="DSTV EXTRA VIEW";
$service_price=$dstv_extra_view;
}

if ($account_balance > $service_price){

$new_wallet=$account_balance-$service_price;
mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$postdata=array(
  'billersCode' => $smart_no,
  'serviceID' => strtolower($service),
  'request_id' => $api_reference,
  'variation_code' => $service_code,
  'phone' => $contact_no,
);

$url ="https://vtpass.com/api/pay";
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

if ($code==000){


 $order_report=strtoupper('Subscription for '.$package_name.'- N'.$service_price.' Successful on '.$smart_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

//mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$dstv_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

//$new_bonus=$account_bonus+$dstv_comm;
 //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
	  'old_balance'=> $account_balance, ////// 
	  'new_bal'=> $new_wallet, ////// 
	  'time' => $time,
    'amountPaid' => $service_price,
	  'message' => $order_report,
    );
    echo json_encode($response);
    exit;


}

else{

$new_wallet=$account_balance;
mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

 $order_report=strtoupper('Subscription for '.$package_name.'- N'.$service_price.' failed on '.$smart_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

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

}

else{

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Your account is too low for this transaction !!!',
    );
    echo json_encode($response);
    exit;
}

?>