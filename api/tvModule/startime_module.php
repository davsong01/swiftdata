<?php
require("../functions/startime_price.php");

if ($plan_id == 701) {
    $service_code = "nova-weekly";
    $package_name = "STARTIMES NOVA WEEKLY";
    $service_price = $nova_weekly;
}

if ($plan_id == 702) {
    $service_code = "nova";
    $package_name = "STARTIMES NOVA MONTHLY";
    $service_price = $nova_monthly;
}

if ($plan_id == 703) {
    $service_code = "basic-weekly";
    $package_name = "STARTIMES BASIC WEEKLY";
    $service_price = $basic_weekly;
}

if ($plan_id == 704) {
    $service_code = "basic";
    $package_name = "STARTIMES BASIC MONTHLY";
    $service_price = $basic_monthly;
}

if ($plan_id == 705) {
    $service_code = "smart-weekly";
    $package_name = "STARTIMES SMART WEEKLY";
    $service_price = $smart_weekly;
}

if ($plan_id == 706) {
    $service_code = "smart";
    $package_name = "STARTIMES SMART MONTHLY";
    $service_price = $smart_monthly;
}

if ($plan_id == 707) {
    $service_code = "classic-weekly";
    $package_name = "STARTIMES CLASSIC WEEKLY";
    $service_price = $classic_weekly;
}

if ($plan_id == 708) {
    $service_code = "classic";
    $package_name = "STARTIMES CLASSIC MONTHLY";
    $service_price = $classic_monthly;
}

if ($plan_id == 709) {
    $service_code = "super-weekly";
    $package_name = "STARTIMES SUPER WEEKLY";
    $service_price = $super_weekly;
}

if ($plan_id == 710) {
    $service_code = "super";
    $package_name = "STARTIMES SUPER MONTHLY";
    $service_price = $super_monthly;
}

if ($account_balance > $service_price) {
    if ($star_discount > 0) {
        $off = ($star_discount / 100) * $service_price;
        // $service_price = $service_price - $off;
    } else {
        // $service_price = $service_price;
        $off = 0;
    }
    $new_wallet = $account_balance - $service_price;
    mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

    $payload = array(
        'billersCode' => $smart_no,
        'serviceID' => strtolower($service),
        'request_id' => $api_reference,
        'variation_code' => $service_code,
        'phone' => $contact_no,
    );

    $post_fields = json_encode($payload);

    require '../api/vtpass_curl.php';

    $request = $response;
    $rdata = json_decode($response);
    $code = $rdata->code;
    $provider = 'VTPASS';

    if ($code == 000) {
        $order_report = strtoupper('Subscription for ' . $package_name . '- N' . $service_price . ' Successful on ' . $smart_no);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`charges`,`discount`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','','$charges','$off','$domain','$ipaddress','$provider')");

        if ($off > 0) {
            $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos'));
            $created_at = $dateTime->format("d-M-y  h:i A");

            $insert = mysqli_query($con, "INSERT INTO `discount_earnings` (`id`, `user_id`, `description`, `amount_earned`, `type`,`created_at`,`service`,`provider`,`amount_paid`) VALUES (NULL, '$user_id','$order_report', '$off','discount','$created_at','$service','$provider','$service_price')");

            $newcashback = $account_bonus + $off;
            mysqli_query($con, "UPDATE users SET cashback='$newcashback' WHERE id='$user_id' AND username ='$account_username'");
        }

        $response = array(
            'status' => 'success',
            'status_code' => '200',
            'old_balance' => $account_balance, ////// 
            'new_bal' => $new_wallet, ////// 
            'time' => $time,
            'amountPaid' => $service_price,
            'message' => $order_report,
        );
        echo json_encode($response);
        exit;
    } else {

        $new_wallet = $account_balance;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

        $order_report = strtoupper('Subscription for ' . $package_name . '- N' . $service_price . ' failed on ' . $smart_no);

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`charges`,`discount`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','','$charges','','$domain','$ipaddress','$provider')");

        $response = array(
            'status' => 'fail',
            'status_code' => '100',
            'old_balance' => $account_balance, ////// 
            'new_bal' => $account_balance, ////// 
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
