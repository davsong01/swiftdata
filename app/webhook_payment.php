<?php
// get request
require("../functions/web_config.php");

$type = $_GET['type'] ?? $_POST['type'];

if(isset($type) && $type == 'payvessel'){
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF exemption
   
      $payload = file_get_contents('php://input');
      $payvessel_signature = $_SERVER['HTTP_PAYVESSEL_HTTP_SIGNATURE'];

      //$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR']; 
      $ip_address = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'];
      $payvessel_api_secret_key = "PVSECRET-";
      $hashkey = hash_hmac('sha512', $payload, $secret);
    
      // if($environment == 'local'){
      //   $ip_address = '162.246.254.36';
      //   $payvessel_signature = $hashkey;
      // }
     
      if ($payvessel_signature == $hashkey && $ip_address == "162.246.254.36") {
        $data = json_decode($payload, true);

        $final_amount = floatval($data['order']['settlement_amount']);
        $fee = floatval($data['order']['fee']);
        $reference = $data['transaction']['reference'];
        $description = $data['order']['description'];
        $customer_email = $data['customer']['email'];

        if($final_amount > 0){
          // check if reference exists
          $cx_trx = mysqli_query($con, "SELECT user_amount, sys_ref FROM deposit_transactions WHERE user_amount='" . $final_amount . "' AND sys_ref='" . $reference . "'");

        
          if (mysqli_num_rows($cx_trx) < 1) {
            $api_reference = strtoupper("PV" . $timexx . uniqid() . rand(10000, 90000));

            $cbal = mysqli_fetch_array(mysqli_query($con, "SELECT wallets,username, mobile, level FROM users WHERE email='" . $customer_email . "'"));

            $walletBal = $cbal[0];
            $username = $cbal[1];
            $userMobile = $cbal[2];
            $userType = $cbal[3];

            $NewBal = $walletBal + $final_amount;

            $order_descr = 'Wallet funding of N' . $final_amount . ' was successful';

            mysqli_query($con, "UPDATE users SET wallets='$NewBal' WHERE email='$customer_email'");

            mysqli_query($con, "INSERT INTO `deposit_transactions` (`id`, `user_email`, `user_username`, `user_service`, `user_amount`, `user_prebal`, `user_postbal`, `user_descr`, `user_status`, `user_date`, `timestring`, `sys_ref`, `api_ref`, `pay_gateway`, `api_report`, `cashier`) VALUES (NULL, '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', '$reference', '$api_reference', 'PAYVESSEL', 'GOOD', '$customer_email')");


            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`,`user_type`, `sys_ref`, `api_ref`, `api_report`,`api_response`,`src_price`,`profit`,`databyte`) VALUES (NULL, '$userMobile', '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', 'AUTO', '$userType', '$transactionReference', '$api_reference', 'GOOD','$payload','0','0','0')");
          }else{
            exit();
          }
        }
      } else {
          echo json_encode(["message" => "Permission denied, invalid hash or ip address."]);
          http_response_code(400);
      }
  } else {
    exit();
      // // Handle other HTTP methods if needed
      // echo json_encode(["message" => "Method not allowed"]);
      // http_response_code(405);
  }
}else{

  $MONNIFY_SIGNATURE = $_SERVER['HTTP_MONNIFY_SIGNATURE'];

  $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  $time = $dateTime->format("d-M-y  h:i A");
  $timexx = time();

  $DEFAULT_MERCHANT_CLIENT_SECRET = "$monnify_sk"; // SK

  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $amountPaid = $data->eventData->amountPaid;
  $totalPayable = $data->eventData->totalPayable;
  $paidOn = $data->eventData->paidOn;
  $paymentReference = $data->eventData->paymentReference;
  $transactionReference = $data->eventData->transactionReference;
  $reference = $data->eventData->product->reference;
  $type = $data->eventData->product->type;
  $paymentDescription = $data->eventData->paymentDescription;

  $code = $data->eventData->offlineProductInformation->code; //
  $type2 = $data->eventData->offlineProductInformation->type; //
  $paymentMethod = $data->eventData->paymentMethod;
  $currency = $data->eventData->currency;
  $settlementAmount = $data->eventData->settlementAmount;
  $paymentStatus = $data->eventData->paymentStatus;
  $customer_email = $data->eventData->customer->email;
  $pay_name = $data->eventData->customer->name;
  $eventType = $data->eventType;

  class CustomTransactionHashUtil
  {

    public static function computeSHA512TransactionHash($stringifiedData, $clientSecret)
    {
      $computedHash = hash_hmac('sha512', $stringifiedData, $clientSecret);
      return $computedHash;
    }
  }

  $data_decod = $json;
  $computedHash = CustomTransactionHashUtil::computeSHA512TransactionHash($data_decod, $DEFAULT_MERCHANT_CLIENT_SECRET);

  if ($MONNIFY_SIGNATURE == $computedHash && $amountPaid > 50) {

    $charges = $amountPaid * 1 / 100;
    $final_amount = $amountPaid - $charges;

    $cx_trx = mysqli_query($con, "SELECT user_amount, sys_ref FROM deposit_transactions WHERE user_amount='" . $final_amount . "' AND sys_ref='" . $transactionReference . "'");

    if (mysqli_num_rows($cx_trx) < 1) {

      $api_reference = strtoupper("MY" . $timexx . uniqid() . rand(10000, 90000));

      $cbal = mysqli_fetch_array(mysqli_query($con, "SELECT wallets,username, mobile, level FROM users WHERE email='" . $customer_email . "'"));

      $walletBal = $cbal[0];
      $username = $cbal[1];
      $userMobile = $cbal[2];
      $userType = $cbal[3];

      $NewBal = $walletBal + $final_amount;

      $order_descr = 'Wallet funding of N' . $final_amount . ' was successful';

      mysqli_query($con, "UPDATE users SET wallets='$NewBal' WHERE email='$customer_email'");

      mysqli_query($con, "INSERT INTO `deposit_transactions` (`id`, `user_email`, `user_username`, `user_service`, `user_amount`, `user_prebal`, `user_postbal`, `user_descr`, `user_status`, `user_date`, `timestring`, `sys_ref`, `api_ref`, `pay_gateway`, `api_report`, `cashier`) VALUES (NULL, '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', '$transactionReference', '$api_reference', 'MONNIFY', 'GOOD', '$customer_email')");

      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`,`src_price`,`profit`,`databyte`) VALUES (NULL, '$userMobile', '$customer_email', '$username', 'DEPOSIT', '$final_amount', '$walletBal', '$NewBal', '$order_descr', 'SUCCESSFUL', '$time', '$timestring', 'AUTO', '$userType', '$transactionReference', '$api_reference', 'GOOD','0','0','0')");
    } else {

      exit();
    }
  } else {

    exit();
  }

}

die();
// https://swiftdatang.com/app/webhook_payment.php
?>