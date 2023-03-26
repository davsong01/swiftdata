<?php
if ($glo_access > 0){

require ("../functions/glocg_price.php");

if ($plan_id=="901"){
 $service_price=$glocg_200;
 $service="glo-cg";
 $databyte="200";
 $package_name="GLO 200MB";
 $planCode=901;
 }

 if ($plan_id=="902"){
 $service_price=$glocg_500;
 $service="glo-cg";
 $databyte="500";
 $package_name="GLO 500MB";
 $planCode=902;
 }

 if ($plan_id=="903"){
 $service_price=$glocg_1;
 $service="glo-cg";
 $databyte="1000";
 $package_name="GLO 1GB";
 $planCode=903;
 }

 if ($plan_id=="904"){
 $service_price=$glocg_2;
 $service="glo-cg";
 $databyte="2000";
 $package_name="GLO 2GB";
 $planCode=904;
 }

 if ($plan_id=="905"){
 $service_price=$glocg_3;
 $service="glo-cg";
 $databyte="3000";
 $package_name="GLO 3GB";
 $planCode=905;
 }

 if ($plan_id=="906"){
 $service_price=$glocg_5;
 $service="glo-cg";
 $databyte="5000";
 $package_name="GLO 5GB";
 $planCode=906;
 }

 if ($plan_id=="907"){
 $service_price=$glocg_10;
 $service="glo-cg";
 $databyte="10000";
 $package_name="GLO 10GB";
 $planCode=907;
 }


 if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username='$account_username'");

$request_msg=($package_name." TO ".$mobile_no);  
$request = array(
        "user"=>$sms_username,
        "pass"=>$sms_password,
        "from"=> $sms_sender,
        "type"=> "NORMAL",
        "to"=> $glo_n,
        "msg"=> $request_msg,
);

$url = 'https://sms.hollatags.com/api/send/'; //this is the url of the gateway's interface
$ch = curl_init(); //initialize curl handle
curl_setopt($ch, CURLOPT_URL, $url); //set the url
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request)); //set the POST variables
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
curl_setopt($ch, CURLOPT_POST, 1); //set POST method
$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
curl_close($ch); //close the curl handle

if ($response=="sent"){
  
 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no.' ('.$api_response.')');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

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

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte')");

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
    'message' => 'GLO data purchase is not permitted for this account !!!',
    );
    echo json_encode($response);
    exit;
 }


?>