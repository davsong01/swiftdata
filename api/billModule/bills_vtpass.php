<?php
require("../functions/bills_price.php");
require("../functions/web_config.php");

if ($service == "ABUJA-ELECTRIC") {
  $charges = $abuja;
  $discount = $abuja_discount;
}

if ($service == "IBADAN-ELECTRIC") {
  $charges = $ibadan;
  $discount = $ibadan_discount;
}

if ($service == "EKO-ELECTRIC") {
  $charges = $eko;
  $discount = $eko_discount;
}

if ($service == "IKEJA-ELECTRIC") {
  $charges = $ikeja;
  $discount = $ikeja_discount;
}

if ($service == "PORTHARCOURT-ELECTRIC") {
  $charges = $portharcourt;
  $discount = $portharcourt_discount;
}

if ($service == "JOS-ELECTRIC") {
  $charges = $jos;
  $discount = $jos_discount;
}

if ($service == "KADUNA-ELECTRIC") {
  $charges = $kaduna;
  $discount = $kaduna_discount;
}

if ($service == "KANO-ELECTRIC") {
  $charges = $kano;
  $discount = $kano_discount;
}

if ($service == "BENIN-ELECTRIC") {
  $charges = $benin;
  $discount = $benin_discount;
}

if ($service == "ENUGU-ELECTRIC") {
  $charges = $enugu;
  $discount = $enugu_discount;
}

$service_price = $amount + $charges;

if ($discount > 0) {
  $off = ($discount/100) * $service_price;
  // $service_price = $service_price - $off;
}else{
  // $service_price = $service_price;
  $off = 0;
}

if ($account_balance > $service_price && $service_price > 0) {

  $new_wallet = $account_balance - $service_price;
  mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

  $postdata = array(
    'billersCode' => $smart_no,
    'serviceID' => strtolower($service),
    'request_id' => $api_reference,
    'variation_code' => $service_type,
    'amount' => $amount,
    'phone' => $contact_no,
  );


  if ($environment == 'local') {
    $url = "https://sandbox.vtpass.com/api/pay";
    $credentials = base64_encode($vtpass_sandbox_account);

  } else {
    $url = "https://vtpass.com/api/pay";
    $credentials = base64_encode($vtpass_account);
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $headers = [
    'Authorization: Basic ' . $credentials . '',
    'Content-Type: application/json',
  ];
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $request = curl_exec($ch);
  curl_close($ch);
  $rdata = json_decode($request);
  $status = $rdata->content->transactions->status;
  $response_description = $rdata->response_description;
  $purchased_code = $rdata->purchased_code ?? '';
  $post_fields = json_encode($postdata);

  $provider = 'VTPASS';

  $chargeableStatuses = ['pending', 'delivered'];
  // $status = 'failed';
  if (in_array($status,$chargeableStatuses)) {
    if($status == 'pending'){
      $order_report = strtoupper($service . ' N' . $amount . ' Purchase Pending on ' . $smart_no . ' [' . $purchased_code . ']');
      $stat = 'PENDING';
    }

    if ($status == 'delivered') {
      $order_report = strtoupper($service . ' N' . $amount . ' Purchase Successful on ' . $smart_no . ' [' . $purchased_code . ']');
      $stat = 'SUCCESSFUL';
    }

    try {
      //code...
      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`,`api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`charges`,`discount`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', '$stat', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','$purchased_code','$charges','$off','$domain','$ipaddress','VTPASS')");

      if($off > 0){
        $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos'));
        $created_at = $dateTime->format("d-M-y  h:i A");

        $insert = mysqli_query($con, "INSERT INTO `discount_earnings` (`id`, `user_id`, `description`, `amount_earned`, `type`,`created_at`,`service`,`provider`,`amount_paid`) VALUES (NULL, '$user_id','$order_report', '$off','discount','$created_at','$service','$provider','$service_price')");

        $newcashback = $account_bonus + $off;
        mysqli_query($con, "UPDATE users SET cashback='$newcashback' WHERE id='$user_id' AND username ='$account_username'");
      }
    } catch (\Throwable $th) {
      $response = array(
        'status' => 'fail',
        'status_code' => '100',
        'message' => $th->getMessage(),
      );
      echo json_encode($response);
      exit;
      //throw $th;
    }

    $response = array(
      'status' => 'success',
      'status_code' => '200',
      'old_balance' => $account_balance,
      'new_bal' => $new_wallet,
      'time' => $time,
      'desc' => $order_report,
      'amountPaid' => $service_price,
      'charges' => $charges,
      'message' => $order_report,
    );
    echo json_encode($response);
    exit;
  } else {
    $new_wallet = $account_balance;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

    $order_report = strtoupper($service . ' N' . $amount . ' Purchase failed on ' . $smart_no);

    mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`charges`,`discount`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','$purchased_code','$charges','','$domain','$ipaddress','VTPASS')");

    $response = array(
      'status' => 'fail',
      'status_code' => '100',
      'old_balance' => $account_balance,
      'new_bal' => $account_balance,
      'time' => $time,
      'message' => $order_report,
    );
    echo json_encode($response);
    exit;
  }
} else {
  $response = array(
    'status' => 'fail',
    'status_code' => '100',
    'message' => 'Your account is too low for this transaction !!!',
  );
  echo json_encode($response);
  exit;
}

?>