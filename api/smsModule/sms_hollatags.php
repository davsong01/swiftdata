<?php
require ("../functions/sms_price.php");

$check_nom=$strlen($message_body);
if ($check_nom<165){$msgVolume=1;}
if ($check_nom>165 && $check_nom<=330){$msgVolume=2;}
if ($check_nom>330){$msgVolume=3;}

$check_nos=substr_count($receipent_no,",");
$plus_denos=$check_nos+1;
$amount=$plus_denos*$sms_price*$msgVolume;

$service_price=$amount;

if ($account_balance > $service_price && $service_price > 0){

$new_wallet=$account_balance+$service_price;
mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");
$message_body2=htmlentities($message_body);

 $request = array(
        "user"=>$sms_username,
        "pass"=>$sms_password,
        "from"=>$sender_id.'-SMS',
        "to"=>$receipent_no,
        "msg"=>$message_body,
);

$url = 'https://sms.hollatags.com/api/send/'; //this is the url of the gateway's interface
$ch = curl_init(); //initialize curl handle
curl_setopt($ch, CURLOPT_URL, $url); //set the url
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request)); //set the POST variables
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return as a variable
curl_setopt($ch, CURLOPT_POST, 1); //set POST method
$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
curl_close($ch);

if ($response=="sent"){

 $order_report=strtoupper('BulkSMS Sent To '.$plus_denos.' Member(s)');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', 'BULKSMS', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

 mysqli_query($con, "INSERT INTO `sms_transactions` (`id`, `sender`, `message_body`, `buyer_date`, `buyer_email`, `reference` ,`status`) VALUES (NULL, '$sender_id', '$message_body2', '$time', '$account_email', '$api_reference', 'SUCCESSFUL')");

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
 
 $order_report=strtoupper('BulkSMS Sending Failed To '.$plus_denos.' Member(s) ');

 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$account_email', '$account_username', 'WITHDRAWTOWALLET', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0')");

 mysqli_query($con, "INSERT INTO `sms_transactions` (`id`, `sender`, `message_body`, `buyer_date`, `buyer_email`, `reference`,`status`) VALUES (NULL, '$sender_id', '$message_body2', '$time', '$account_email', '$api_reference', 'FAILED')");

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
    'message' => 'Your balance is too low for this transaction !!!',
    );
    echo json_encode($response);
    exit;
}

?>