<?php
if ($glo_access > 0){

require ("../functions/glo_price.php");

if ($plan_id==201){
 $service_price=$glo_105;
 $service="glo";
 $databyte="1000";
 $package_name="GLO 1.05GB";
 $planCode=1000;
 }

 if ($plan_id==202){
 $service_price=$glo_29;
 $service="glo";
 $databyte="2900";
 $package_name="GLO 2.9GB";
 $planCode=1000;
 }

 if ($plan_id==203){
 $service_price=$glo_41;
 $service="glo";
 $databyte="4100";
 $package_name="GLO 4.1GB";
 $planCode=1000;
 }

 if ($plan_id==204){
 $service_price=$glo_58;
 $service="glo";
 $databyte="5800";
 $package_name="GLO 5.8GB";
 $planCode=1000;
 }

 if ($plan_id==205){
 $service_price=$glo_77;
 $service="glo";
 $databyte="7700";
 $package_name="GLO 7.7GB";
 $planCode=1000;
 }

 if ($plan_id==206){
 $service_price=$glo_10;
 $service="glo";
 $databyte="10000";
 $package_name="GLO 10GB";
 $planCode=1000;
 }

 if ($plan_id==207){
 $service_price=$glo_1325;
 $service="glo";
 $databyte="13250";
 $package_name="GLO 13.25GB";
 $planCode=1000;
 }

 if ($plan_id==208){
 $service_price=$glo_1825;
 $service="glo";
 $databyte="18250";
 $package_name="GLO 18.25GB";
 $planCode=1000;
 }

 if ($plan_id==209){
 $service_price=$glo_295;
 $service="glo";
 $databyte="29500";
 $package_name="GLO 29.5GB";
 $planCode=1000;
 }

 if ($plan_id==210){
 $service_price=$glo_50;
 $service="glo";
 $databyte="50000";
 $package_name="GLO 50GB";
 $planCode=1000;
 }

 if ($plan_id==211){
 $service_price=$glo_93;
 $service="glo";
 $databyte="90300";
 $package_name="GLO 93GB";
 $planCode=1000;
 }


 if ($account_balance > $service_price && $service_price > 0){

 $new_wallet=$account_balance-$service_price;
 mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

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

 $order_report=strtoupper($package_name.' N'.$service_price.' Purchase Successful on '.$mobile_no);

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

//mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$gdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

 //$new_bonus=$account_bonus+$gdata_comm;
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