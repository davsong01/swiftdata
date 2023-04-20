<?php
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
        require('../api/easy_access_pricing.php');
        $url = "https://easyaccess.com.ng/api/data.php";
        
        foreach ($response as $res) {
            if ($plan_id==$res['code']){
                $service_price = $res['price'];
                $service = "mtn-cg";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    }elseif($network == 'AIRTEL-CG'){
        $type = 'data';
        $product = 'airtel-cg';
        $ntwk = 03;

        require('../api/easy_access_pricing.php');
        $url = "https://easyaccess.com.ng/api/data.php";
        
        foreach ($response as $res) {
            if ($plan_id==$res['code']){
                $service_price = $res['price'];
                $service = "airtel-cg";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    
    }elseif($network == 'GLO-CG'){
        $type = 'data';
        $product = 'glo-cg';
        $ntwk = 02;
           
        require('../api/easy_access_pricing.php');
        $url = "https://easyaccess.com.ng/api/data.php";
        
        foreach ($response as $res) {
            if ($plan_id==$res['code']){
                $service_price = $res['price'];
                $service = "glo-cg";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
        
    } elseif ($network == 'MOBILE-SME' || $network == 'MOBILE SME') {
        $type = 'sme';
        $product = 'apimobile-sme';
        $ntwk = 04;

        require('../api/easy_access_pricing.php');
        $url = "https://easyaccess.com.ng/api/data.php";

        foreach ($response as $res) {
            if ($plan_id == $res['code']) {
                $service_price = $res['price'];
                $service = "apimobile-sme";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }

    } elseif ($network == 'MTN-DATACARD') {
        $type = 'datacard';
        $product = 'mtn-data-card';
        $ntwk = 01;
        require('../api/easy_access_pricing.php');
        $url = "https://easyaccess.com.ng/api/datacard.php";

        foreach ($response as $res) {
            if ($plan_id == $res['code']) {
                $service_price = $res['price'];
                $service = "mtn_data_card";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    }
    // add  additional easy access services here
    
    // Perform operations
    if($service_price <= 0){
        $response=array(
            'status' => 'fail',
            'status_code' =>'100',
            'message' => 'Price not set!!!',
        );

        echo json_encode($response);
        exit;
    }
   
    if ($account_balance > $service_price ){
            $new_wallet=$account_balance-$service_price;
            mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'network' =>$ntwk, 
                'mobileno' =>  $mobile_no,
                'dataplan' =>  $planCode,
                'client_reference' => '', //update this on your script to receive webhook notifications
                'no_of_pins' => $no_of_pins ?? '',
            ), 
            CURLOPT_HTTPHEADER => array(
                "AuthorizationToken: ".$easyaccess_token."",
                "cache-control: no-cache"
                ),
            )); 

            $response = curl_exec($curl);

            // $response = '{
            //     "success": "true",
            //     "message": "Data Card Purchase was Successful",
            //     "network": "MTN",
            //     "pin": "408335193S",
            //     "pin2": "184305851S",
            //     "dataplan": "1.5GB",
            //     "amount": 574,
            //     "balance_before": "27833",
            //     "balance_after": 27259,
            //     "transaction_date": "07-04-2023 07:57:47 pm",
            //     "reference_no": "ID5345892220",
            //     "client_reference": "client_ref84218868382855",
            //     "status": "Successful",
            //     "auto_refund_status": "success"
            //     }';

            curl_close($curl);

            $pinsx = [];
            $result = json_decode($response);

            if(isset($result) && !empty($result)){
                foreach ($result as $key => $value) {
                    if (strpos($key, 'pin') !== false) {
                        $pinsx[] = $value;
                    }
                }
            }

            $pins = (isset($pinsx) && !empty($pinsx)) ? 'PINS: '.implode(', ', $pinsx) : '';
            $true_response = $result->true_response ?? '';

            $status=strtolower($result->success);
            
            // save post fields
            $pstfields = json_encode([
                'network' =>$ntwk ?? '', 
                'mobileno' =>  $mobile_no ?? '',
                'dataplan' =>  $planCode ?? '',
                'client_reference' => '',
                'url'=>$url ?? '',
                'no_of_pins' => $no_of_pins ?? '',

            ]);
   
            // $status="true";
            if ($status==="true"){
                $order_report=strtoupper('Purchase Successful for '.$package_name.($network != 'MTN-DATACARD' ? ' on '.$mobile_no : '')).'. '.$true_response;

                mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte','$response','$pstfields','$pins')");

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
                $new_wallet=$account_balance;
                mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

                $order_report=strtoupper('Purchase failed for '. $package_name.' on '.$mobile_no);

                mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`,`extra`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte','$response','$pstfields','$pins')");

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