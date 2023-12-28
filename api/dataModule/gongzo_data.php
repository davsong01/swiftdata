<?php
    $no_of_pins = $no_of_pins ?? 1;
    $level = $return_info['level'];
    // Check if network has access
    $response = array(
        'status' => 'fail',
        'status_code' => '100',
        'message' => $network.' purchase is not permitted for this account !!!',
    );
    
    // Get post data
    if($network == 'MTN-CG' || $network == 'GIFTING'){
        $type = 'data';
        $product = 'mtn-cg';
        $ntwk = 01;
        
        // Get mtn sms pricess
        require('../api/gongzo_pricing.php');
        $url = 'https://www.gongozconcept.com/api/data/';

        foreach ($response as $res) {
            if ($plan_id==$res['code']){
                $service_price = $res['price'];
                $service = "mtn-cg";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    } elseif($network == 'AIRTEL-CG'){
        $type = 'data';
        $product = 'airtel-cg';
        $ntwk = 4;

        require('../api/gongzo_pricing.php');
        $url = "https://www.gongozconcept.com/api/data/";
    
        foreach ($response as $res) {
            if ($plan_id==$res['code']){
                $service_price = $res['price'];
                $service = "airtel-cg";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    
    } elseif ($network == 'AIRTEL') {
        $type = 'data';
        $product = 'airtel';
        $ntwk = 4;

        require('../api/gongzo_pricing.php');
        $url = "https://www.gongozconcept.com/api/data/";

        foreach ($response as $res) {
            if ($plan_id == $res['code']) {
                $service_price = $res['price'];
                $service = "airtel";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    } elseif ($network == 'GLO-CG') {
        $type = 'data';
        $product = 'glo-cg';
        $ntwk = 2;

        require('../api/gongzo_pricing.php');
        $url = "https://www.gongozconcept.com/api/data/";

        foreach ($response as $res) {
            if ($plan_id == $res['code']) {
                $service_price = $res['price'];
                $service = "glo-cg";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    } elseif ($network == 'GLO') {
        $type = 'data';
        $product = 'glo';
        $ntwk = 2;

        require('../api/gongzo_pricing.php');
        $url = "https://www.gongozconcept.com/api/data/";

        foreach ($response as $res) {
            if ($plan_id == $res['code']) {
                $service_price = $res['price'];
                $service = "glo";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    }


    // Perform operations
    
    $service_price = $service_price * $no_of_pins;

    if ($account_balance > $service_price ){
            $new_wallet=$account_balance-$service_price;
            mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

            $postdata = [
                'network' => $ntwk,
                'plan' => $planCode,
                'mobile_number' => $mobile_no,
                'Ported_number' => true,
                'no_of_pins' => $no_of_pins ?? '',
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $headers = [
                'Authorization: Token 3b24d3f969dd1aa39cc434ada0c4de75f54e4948',
                'Content-Type: application/json'
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $res = curl_exec($ch);

            
            // $res = '{"id":8796051,"ident":"Data3c8b22038-740","network":1,"apiresponse":"something went wrong please check back later","api_response":"something went wrong please check back later","balance_before":"3938.0","balance_after":"3711.0","mobile_number":"08149292337","plan":281,"Status":"proccessing","plan_network":"MTN","plan_name":"1.0GB","plan_amount":"227.0","create_date":"2023-08-21T20:56:25.563155","Ported_number":true}';
            
            
            $pinsx = [];
            $result = json_decode($res, true);

            $res = str_replace(array(
                '\'', '"',
                '', 
            ), ' ', $result);
            if(isset($result) && !empty($result)){
                foreach ($result as $key => $value) {
                    if (strpos($key, 'pin') !== false) {
                        $pinsx[] = $value;
                    }
                }
            }

            $pins = (isset($pinsx) && !empty($pinsx)) ? 'PINS: '.implode(', ', $pinsx) : '';
            $true_response = isset($result['api_response']) ? str_replace("'", '', $result['api_response']) : '';

            // save post fields
            $pstfields = json_encode([
                'url' =>  $url,
                'payload' => $postdata, 
            ]);

            $result['Status'] = isset($result['Status']) ? strtoupper($result['Status']) : null;
    
            if((isset($result['Status']) && $result['Status'] !== 'FAILED' && !empty($result['Status']) || (isset($result['Status']) && $result['Status'] == 'NULL'))){
                if ($result['Status'] == 'PROCESSING') {
                    $true_response = '';
                }
                $status = true;
            }else{
                $status = false;
            }
            
            $res = json_encode($result);
            $res = str_replace("'", '', $res);
    
            if ($status){
                $order_report=strtoupper('Purchase Successful for '.$package_name.($network != 'MTN-DATACARD' ? ' on '.$mobile_no : '')).'.'. $true_response;

                mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_quantity`,`buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price','$no_of_pins', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte','$res','$pstfields','$pins','$domain','$ipaddress','GONGZO')");

                $response=array(
                    'status' => 'success',
                    'status_code' =>'200',
                    'old_balance'=> $account_balance, ////// 
                    'new_balance'=> $new_wallet, ////// 
                    'time' => $time,
                    'amountPaid' => $service_price,
                    'message' => $order_report,
                    'extra' => $pins,
                );

                echo json_encode($response);
                exit;
            }else{
       
                $order_report=strtoupper('Purchase failed for '. $package_name.' on '.$mobile_no).'. '. $true_response;
                $new_wallet=$account_balance;
        
                mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

                 mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_quantity`,`buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`domain_name`,`ip_address`,`provider`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price','$no_of_pins', '$account_balance', '$new_wallet', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte','$res','$pstfields','$pins','$domain','$ipaddress','GONGZO')");
                    
                $response = array(
                    'status' => 'fail',
                    'status_code' => '100',
                    'message' => $order_report,
                );
                echo json_encode($response);
                exit;
            }

    }else{
        $response=array(
        'status' => 'fail',
        'status_code' =>'100',
        'message' => 'Your account is too low for this transaction !!!',
        );
        echo json_encode($response);
        exit;

    }

?>