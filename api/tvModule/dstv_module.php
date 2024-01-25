<?php
require("../functions/dstv_price.php");


if ($plan_id == 800) {
    $service_code = "dstv-padi";
    $package_name = "DSTV PADI";
    $service_price = $dstv_padi;
}

if ($plan_id == 801) {
    $service_code = "dstv-yanga";
    $package_name = "DSTV YANGA";
    $service_price = $dstv_yanga;
}

if ($plan_id == 802) {
    $service_code = "dstv-confam";
    $package_name = "DSTV CONFAM";
    $service_price = $dstv_confam;
}

if ($plan_id == 803) {
    $service_code = "padi-extra";
    $package_name = "DSTV PADI EXTRA";
    $service_price = $dstv_padi_extra;
}

if ($plan_id == 804) {
    $service_code = "yanga-extra";
    $package_name = "DSTV YANGA EXTRA";
    $service_price = $dstv_yanga_extra;
}

if ($plan_id == 805) {
    $service_code = "dstv6";
    $package_name = "DSTV ASIA";
    $service_price = $dstv_asia;
}

if ($plan_id == 806) {
    $service_code = "confam-extra";
    $package_name = "DSTV CONFAM EXTRA";
    $service_price = $dstv_confam_extra;
}

if ($plan_id == 807) {
    $service_code = "dstv79";
    $package_name = "DSTV COMPACT";
    $service_price = $dstv_compact;
}

if ($plan_id == 808) {
    $service_code = "dstv7";
    $package_name = "DSTV COMPACT PLUS";
    $service_price = $dstv_compact_plus;
}

if ($plan_id == 809) {
    $service_code = "dstv3";
    $package_name = "DSTV PREMIUM";
    $service_price = $dstv_premium;
}

if ($plan_id == 810) {
    $service_code = "dstv10";
    $package_name = "DSTV PREMIUM ASIA";
    $service_price = $dstv_premium_asia;
}

if ($plan_id == 811) {
    $service_code = "extraview-access";
    $package_name = "DSTV EXTRA VIEW";
    $service_price = $dstv_extra_view;
}

if ($account_balance > $service_price) {
    if ($dstv_discount > 0) {
        $off = ($dstv_discount / 100) * $service_price;
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

    $post_fields = json_encode($postdata);

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

        mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`charges`,`discount`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$request','$post_fields','','','','$domain','$ipaddress','$provider')");

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
