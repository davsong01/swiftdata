<?php
    $response = array(
        'status' => 'fail',
        'status_code' => '100',
        'message' => $network . ' purchase is not permitted for this account !!!',
    );

    // Get post data
    if($network == 'MTN' || $network == 'MTN-SME'){
        $type = 'data';
        $product = 'mtn';
        $ntwk = 01;

        // Get mtn sms pricess
        require('../api/generic_pricing.php');
        $url = "https://www.gongozconcept.com/api/data/";
        foreach ($response as $res) {
            if ($plan_id==$res['code']){
                $service_price = $res['price'];
                $service = "mtn";
                $databyte = $res['val'];
                $package_name = $res['name'];
                $planCode = $res['code'];
            }
        }
    }

    if ($account_balance > $service_price && $service_price > 0) {
        $new_wallet = $account_balance - $service_price;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

        $postdata = array(
            'network' => $ntwk,
            'plan' => $planCode,
            'mobile_number' => $mobile_no,
            'Ported_number' => true
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = [
            'Authorization: Token  3b24d3f969dd1aa39cc434ada0c4de75f54e4948',
            'Content-Type: application/json'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $request = curl_exec($ch);
        curl_close($ch);
        
        $post_fields = json_encode($postdata);
        
        // $request = '{"id":5356049,"ident":"Data2a67856c7-02b","network":1,"apiresponse":"You are not sending to valid MTN number.","api_response":"You are not sending to valid MTN number.","balance_before":"42439.0","balance_after":"42331.0","mobile_number":"08054343434","plan":289,"Status":"failed","plan_network":"MTN","plan_name":"500.0MB","plan_amount":"108.0","create_date":"2023-04-18T22:56:02.142025","Ported_number":true}';

        // $request = '{"id":5356075,"ident":"Data674d1e13e-b44","network":1,"apiresponse":"Dear Customer, You have successfully shared 500MB Data to 2348143511076. Your SME data balance is 9401.58GB expires 24/07/2023. Thankyou","api_response":"Dear Customer, You have successfully shared 500MB Data to 2348143511076. Your SME data balance is 9401.58GB expires 24/07/2023. Thankyou","balance_before":"42439.0","balance_after":"42331.0","mobile_number":"08143511076","plan":289,"Status":"successful","plan_network":"MTN","plan_name":"500.0MB","plan_amount":"108.0","create_date":"2023-04-18T22:57:15.023383","Ported_number":true}';
        $status = 'fail';
        $manipulate = json_decode($request);

        // Determine success and failure message
        if(isset($manipulate->apiresponse) && !empty($manipulate->apiresponse)){
            if(str_contains($manipulate->apiresponse, 'have successfully')){
                $status = 'success';
                $manipulate = explode('.', $manipulate->apiresponse);
                $message = $manipulate[0] ?? null;
            }else{
                $status = 'fail';
                $message = $manipulate->apiresponse;
            }
        }

        if ($status == 'success') {

            $order_report = strtoupper($package_name . ' N' . $service_price . ' Purchase Successful on ' . $mobile_no).'. '.$message;

            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte','$request','$post_fields')");

            $response = array(
                'status' => 'success',
                'status_code' => '200',
                'old_balance' => $account_balance,
                ////// 
                'new_balance' => $new_wallet,
                ////// 
                'time' => $time,
                'amountPaid' => $service_price,
                'message' => $order_report,
            );
            echo json_encode($response);
            exit;

        } else {

            $new_wallet = $account_balance;
            mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

            $order_report = strtoupper($package_name . ' N' . $service_price . ' Purchase failed on ' . $mobile_no).'. '.$message;

            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`api_response`,`post_fields`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte','$request','$post_fields')");

            $response = array(
                'status' => 'fail',
                'status_code' => '100',
                'old_balance' => $account_balance,
                ////// 
                'new_bal' => $account_balance,
                ////// 
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

    // if ($mtnsme_access > 0) {

    //     require("../functions/mtnsme_price.php");

    //     if ($plan_id == 500) {
    //         $service_price = $mtnsme_500;
    //         $service = "mtn-sme";
    //         $databyte = "500";
    //         $package_name = "MTN SME 500MB";
    //         $planCode = 289;
    //     }

    //     if ($plan_id == 1000) {
    //         $service_price = $mtnsme_1;
    //         $service = "mtn-sme";
    //         $databyte = "1000";
    //         $package_name = "MTN SME 1GB";
    //         $planCode = 290;
    //     }

    //     if ($plan_id == 2000) {
    //         $service_price = $mtnsme_2;
    //         $service = "mtn-sme";
    //         $databyte = "2000";
    //         $package_name = "MTN SME 2GB";
    //         $planCode = 291;
    //     }

    //     if ($plan_id == 3000) {
    //         $service_price = $mtnsme_3;
    //         $service = "mtn-sme";
    //         $databyte = "3000";
    //         $package_name = "MTN SME 3GB";
    //         $planCode = 292;
    //     }

    //     if ($plan_id == 5000) {
    //         $service_price = $mtnsme_5;
    //         $service = "mtn-sme";
    //         $databyte = "5000";
    //         $package_name = "MTN SME 5GB";
    //         $planCode = 293;
    //     }

    //     if ($plan_id == 10000) {
    //         $service_price = $mtnsme_10;
    //         $service = "mtn-sme";
    //         $databyte = "10000";
    //         $package_name = "MTN SME 10GB";
    //         $planCode = 294;
    //     }



    //     if ($account_balance > $service_price && $service_price > 0) {

    //         $new_wallet = $account_balance - $service_price;
    //         mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");


    //         $postdata = array(
    //             'network' => 1,
    //             'plan' => $planCode,
    //             'mobile_number' => $mobile_no,
    //             'Ported_number' => true
    //         );

    //         $url = "https://www.gongozconcept.com/api/data/";
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, $url);
    //         curl_setopt($ch, CURLOPT_POST, 1);
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         $headers = [
    //             'Authorization: Token  3b24d3f969dd1aa39cc434ada0c4de75f54e4948',
    //             'Content-Type: application/json'
    //         ];
    //         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //         $request = curl_exec($ch);
    //         curl_close($ch);
    //         //$rxdata=json_decode($request);
    // //$status=$rxdata->Status;
    // //$api_response=$rxdata->api_response;

    //         // if ($status=="successful") {

    //         if ($request) {

    //             $order_report = strtoupper($package_name . ' N' . $service_price . ' Purchase Successful on ' . $mobile_no);

    //             mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0', '$databyte')");

    //             // mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `buyer_username`, `buyer_email`, `ref_code`, `buyer_amount`, `commission`, `buyer_status`, `buyer_descr`, `buyer_date`, `sys_ref`) VALUES (NULL, '$account_username', '$account_email', '$account_refby', '$service_price', '$mdata_comm', 'SUCCESSFUL', '$order_report', '$time', '$api_reference')");

    //             //$new_bonus=$account_bonus+$mdata_comm;
    //             //mysqli_query($con, "UPDATE users SET cashback='$new_bonus' WHERE id='$user_id' AND username ='$account_username'");

    //             $response = array(
    //                 'status' => 'success',
    //                 'status_code' => '200',
    //                 'old_balance' => $account_balance,
    //                 ////// 
    //                 'new_balance' => $new_wallet,
    //                 ////// 
    //                 'time' => $time,
    //                 'amountPaid' => $service_price,
    //                 'message' => $order_report,
    //             );
    //             echo json_encode($response);
    //             exit;


    //         } else {

    //             $new_wallet = $account_balance;
    //             mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

    //             $order_report = strtoupper($package_name . ' N' . $service_price . ' Purchase failed on ' . $mobile_no);

    //             mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile_no', '$account_email', '$account_username', '$service', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','$databyte')");

    //             $response = array(
    //                 'status' => 'fail',
    //                 'status_code' => '100',
    //                 'old_balance' => $account_balance,
    //                 ////// 
    //                 'new_bal' => $account_balance,
    //                 ////// 
    //                 'time' => $time,
    //                 'message' => $order_report,
    //             );
    //             echo json_encode($response);
    //             exit;

    //         }


    //     } else {

    //         $response = array(
    //             'status' => 'fail',
    //             'status_code' => '100',
    //             'message' => 'Your account is too low for this transaction !!!',
    //         );
    //         echo json_encode($response);
    //         exit;

    //     }

    // } else {

    //     $response = array(
    //         'status' => 'fail',
    //         'status_code' => '100',
    //         'message' => 'MTN-SME data purchase is not permitted for this account !!!',
    //     );
    //     echo json_encode($response);
    //     exit;
    // }


?>