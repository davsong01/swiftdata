<?php
    $no_of_pins = $no_of_pins ?? 1;
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
            curl_close($ch);
            
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
            $true_response = $result['api_response'] ?? '';

            // save post fields
            $pstfields = json_encode([
                'url' =>  $url,
                'payload' => $postdata, 
            ]);

            if(isset($result['error'])){
                $status = false;
                $true_response = $result['error'][0];
            }else{
                $status = true;
            }

            
            if(isset($result['status']) && $result['status'] !== 'failed'){
                $status = true;
                $true_response = $result['apiresponse'];

            }else{
                $status = false;
                $true_response = $result['apiresponse'];
            }

            if ($status){
                $order_report=strtoupper('Purchase Successful for '.$package_name.($network != 'MTN-DATACARD' ? ' on '.$mobile_no : '')).'.';

                mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_quantity`,`buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price','$no_of_pins', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte','$res','$pstfields','$pins')");

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

                // Dues to funny characters
                $res = json_encode($result);

                mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`,`buyer_quantity`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte','$res','$pstfields','$pins','$no_of_pins')");


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