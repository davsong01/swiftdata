<?php
if ($airtel_access > 0){

require ("../functions/airtel_price.php");

if ($plan_id==501){
 $service_price=$airtel_750;
 $service="airtel";
 $databyte="750";
 $package_name="AIRTEL 750MB";
 $planCode=501;
 }

 if ($plan_id==502){
 $service_price=$airtel_15;
 $service="airtel";
 $databyte="1500";
 $package_name="AIRTEL 1.5GB";
 $planCode=502;
 }

 if ($plan_id==503){
 $service_price=$airtel_2;
 $service="airtel";
 $databyte="2000";
 $package_name="AIRTEL 2.0GB";
 $planCode=503;
 }

 if ($plan_id==504){
 $service_price=$airtel_3;
 $service="airtel";
 $databyte="3000";
 $package_name="AIRTEL 3.0GB";
 $planCode=504;
 }

 if ($plan_id==505){
 $service_price=$airtel_45;
 $service="airtel";
 $databyte="4500";
 $package_name="AIRTEL 4.5GB";
 $planCode=505;
 }

 if ($plan_id==506){
 $service_price=$airtel_6;
 $service="airtel";
 $databyte="6000";
 $package_name="AIRTEL 6.0GB";
 $planCode=506;
 }

 if ($plan_id==507){
 $service_price=$airtel_10;
 $service="airtel";
 $databyte="10000";
 $package_name="AIRTEL 10GB";
 $planCode=507;
 }

 if ($plan_id==508){
 $service_price=$airtel_11;
 $service="airtel";
 $databyte="11000";
 $package_name="AIRTEL 11GB";
 $planCode=508;
 }

 if ($plan_id==509){
 $service_price=$airtel_20;
 $service="airtel";
 $databyte="20000";
 $package_name="AIRTEL 20GB";
 $planCode=509;
 }

 if ($plan_id==510){
 $service_price=$airtel_40;
 $service="airtel";
 $databyte="40000";
 $package_name="AIRTEL 40GB";
 $planCode=510;
 }

 if ($plan_id==511){
 $service_price=$airtel_75;
 $service="airtel";
 $databyte="75000";
 $package_name="AIRTEL 75GB";
 $planCode=511;
 }

 if ($plan_id==512){
 $service_price=$airtel_120;
 $service="airtel";
 $databyte="120000";
 $package_name="AIRTEL 120GB";
 $planCode=512;
 }


if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

$postdata=array(
  'token' => $don_token,
  'mobile' => $mobile_no,
  'network' => $service,
  'request_id' => $api_reference,
  'plan_code' => $planCode,
);

$url ='https://donleson.com/api/data';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);
$status=$data['status'];

if ($status=="success"){

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte','DONLESON')");

// mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$adata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$adata_comm;
 //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    $response=array(
    'status' => 'success',
    'status_code' =>'200',
	'old_balance'=> $account_balance, ////// 
	'new_balance'=> $new_wallet, ////// 
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

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase failed on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte','DONLESON')");

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


 }


 else{

     $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Airtel data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>