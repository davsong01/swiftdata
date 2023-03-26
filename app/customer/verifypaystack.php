<?php
require("../../functions/web_config.php");

$result = array();
$url = 'https://api.paystack.co/transaction/verify/'. $_GET['reference'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
    $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '.$paystack_sk.'']
);
$request = curl_exec($ch);
curl_close($ch);
$result = json_decode($request, true);

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {

 $status=$result['data']['status'];
 $trans_amount=$result['data']['amount']/100;
 $customer_email=$result['data']['customer']['email'];
 $trans_reference=$result['data']['reference'];

 $chargeback=$trans_amount*2.0/100;
 $final_amount=ceil($trans_amount-$chargeback);

//TRANSACTIONS
 $api_reference=strtoupper(time().uniqid());
 $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
 $time=$dateTime->format("d-M-y  h:i A"); 
 $timestring=time();

 $cx_trx=mysqli_query($con, "SELECT user_amount, sys_ref FROM deposit_transactions WHERE user_amount='".$final_amount."' AND sys_ref='".$trans_reference."'");
    
  if (mysqli_num_rows($cx_trx)<1){

  $cbal = mysqli_fetch_array(mysqli_query($con, "SELECT wallets,username, mobile, level FROM vtuapp_customuser WHERE email='".$customer_email."'"));
            
      $walletBal=$cbal[0];
      $username=$cbal[1];
      $userMobile=$cbal[2];
      $userType=$cbal[3];
      
    $NewBal=$walletBal+$final_amount;

    $order_descr='Wallet funding of N'.$trans_amount.' was successful';

   mysqli_query($con, "UPDATE vtuapp_customuser SET wallets='".$newbal."' WHERE email='".$customer_email."'");

   mysqli_query($con, "INSERT INTO `deposit_transactions` (`id`, `user_email`, `user_username`, `user_service`, `user_amount`, `user_prebal`, `user_postbal`, `user_descr`, `user_status`, `user_date`, `timestring`, `sys_ref`, `api_ref`, `pay_gateway`, `api_report`, `cashier`) VALUES (NULL, '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', '$trans_reference', '$api_reference', 'PAYSTACK', 'GOOD', 'WEB_PAY')");

   mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`) VALUES (NULL, '$userMobile', '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', 'CARD', '$userType', '$trans_reference', '$api_reference', 'GOOD')");

 $response=array(
    'status'=>'success',
    'message' => $order_descr,
  );
  echo json_encode($response);
   exit();

    }

 else{


 mysqli_query($con, "UPDATE vtuapp_customuser SET block='1' WHERE email='".$customer_email."'");
 $response=array(
    'status'=>'fail',
    'message' => 'System detect payment to be fradulent!',
  );
  echo json_encode($response);
   exit();

 }
  

}


?>