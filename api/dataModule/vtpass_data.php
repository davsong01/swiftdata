<?php
    $no_of_pins = $no_of_pins ?? 1;
    // Check if network has access
    if ($network == 'SPECTRANET-DATA') {
        $type = 'data';
        $product = 'spectranet-data';
        
        // Get mtn sms pricess
        require('../api/vtpass_pricing.php');
        
        foreach ($response as $res) {
            if ($plan_id == $res['variation_code']) {
                $service_price = $res['price'];
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['variation_code'];
            }
        }
    }
    
    $service_price = $service_price * $no_of_pins;
    if ($service_price <= 0) {
        $response = array(
            'status' => 'fail',
            'status_code' => '100',
            'message' => 'Price not set!!!',
        );

        echo json_encode($response);
        exit;
    }

    $payload = [
        'serviceID' => 'spectranet',
        'variation_code' => $planCode,
        'quantity' => $quantity,
        'phone' => $mobile_no,
        'amount' => $service_price,
        'billersCode' => $mobile_no
    ];

    if ($account_balance > $service_price && $service_price > 0) {
        $new_wallet = $account_balance - $service_price;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

        require '../api/vtpass_curl.php';
    
        $rdata = json_decode($response, true);
        $status = $rdata['content']['transactions']['status'];
        $response_description = $rdata['response_description'];
        $epin = isset($rdata['purchased_code']) ? $rdata['purchased_code'] : '';
        $post_fields = json_encode($payload);

        $chargeableStatuses = ['pending', 'delivered'];

        if (in_array($status, $chargeableStatuses)) {
            $status = "successful";
        }

        $service = $network;

        if ($status=="successful"){
            $order_report=strtoupper($service.' N'.$service_price.' E-Pin Purchase Successful on '.$mobile_no.' ['.$epin.']');

            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`domain_name`,`ip_address`,`extra`,`api_response`,`post_fields`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$domain','$ipaddress','$epin','$response','$post_fields')");

            $response=array(
            'status' => 'success',
            'status_code' =>'200',
            'old_balance'=> $account_balance, ////// 
            'new_bal'=> $new_wallet, ////// 
            'time' => $time,
            'amountPaid' => $service_price,
            'pin' => $epin,
            'message' => $order_report,
            );
            echo json_encode($response);
            exit;
        }else{
            $new_wallet=$account_balance;
            mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");
            $order_report=strtoupper($service.' N'.$service_price.' E-pin Purchase failed on '.$mobile_no);

            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`domain_name`,`ip_address`,`api_response`,`post_fields`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$domain','$ipaddress','$response','$post_fields')");

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
    } else {
        $response = array(
            'status' => 'fail',
            'status_code' => '100',
            'message' => 'Your account is too low for this transaction !!!',
        );
        echo json_encode($response);
        exit;
    }
    
