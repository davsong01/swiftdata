<?php

    require("session_controller.php");
    // 
    // Update bvn data and nin data if empty
    if(empty($bvn_data) && !empty($reserved_account)){
        $json_decoded = json_decode($reserved_account, true);
        $account_reference = $json_decoded['responseBody']['accountReference'];

        // Generate token
        $monnify_hashkeys = "$monnify_pk:$monnify_sk";
        $stringk = base64_encode($monnify_hashkeys);
        $url = 'https://api.monnify.com/api/v1/auth/login';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                "Authorization: Basic " . $stringk . "",
            ]
        );
        $json = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($json, true);
        $accessToken = $result['responseBody']['accessToken'];

        // Update account with bvn
        $curl = curl_init();


        $url = "https://api.monnify.com/api/v1/bank-transfer/reserved-accounts/" . $account_reference . "kyc-info";
        
        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://api.monnify.com/api/v1/bank-transfer/reserved-accounts/update-customer-bvn/64539ed5bf07613501683201749',
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => array('bvn' => $bvn, 'nin' => $nin),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $accessToken
            ),
        ));

        $response = curl_exec($curl);
        $re = json_decode($response);

        curl_close($curl);
       
        if (isset($re->responseCode) && $re->responseCode == '0') {
            mysqli_query($con, "UPDATE users SET kyc_status = 1, bvn_data='" . json_encode($re) . "' WHERE email='" . $email . "'");
        }

        mysqli_query($con, "UPDATE users SET bvn_data='" . json_encode($response).' Account Ref = ' . $account_reference ."' WHERE email='" . $email . "'");
    }

    if ($payvessel_mode == 'ON'&& $payvessel_reserved_account == "") {
        
        $api_key = $payvessel_api_key;
        $public_key = $payvessel_api_public_key;
        $secret_key = $payvessel_api_secret_key;
        
        $payload = json_encode([
            "name"=> $fullname,
            "email"=> $email,
            "phoneNumber"=> $mobile,
            "bankcode"=>["101","120001"],
            "businessid"=> $payvessel_merchant_id
        ]);

        $headers = [
            'api-key:' . $api_key,
            'api-secret:' . 'Bearer ' . $secret_key,
            'Content-Type:application/json'
        ];

        // $headers = [
        //     'api-key' => 'Bearer PVSECRET-XM5C80TFP0E20WB4ZRLRAMY46B4ZBCJY22HXG6RNL0VS25SEX19MGC86SQAKMSL8',
        //     'api-secret' => 'Bearer PVSECRET-XM5C80TFP0E20WB4ZRLRAMY46B4ZBCJY22HXG6RNL0VS25SEX19MGC86SQAKMSL8',
        //     'Content-Type' => 'application/json'
        // ];
        if($environment == 'local'){
            // $url = "https://sandbox.payvessel.com/api/external/request/customerReservedAccount/";
            $url = "https://api.payvessel.com/api/external/request/customerReservedAccount/";

        }else{
            $url = "https://api.payvessel.com/api/external/request/customerReservedAccount/";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $json = curl_exec($ch);
        curl_close($ch);
    
        mysqli_query($con, "UPDATE users SET payvessel_reserved_account='" . $json . "' WHERE email='" . $email . "'");
    }

    if ($monnify_mode == 'ON' && $reserved_account == "") {
        $monnify_hashkeys = "$monnify_pk:$monnify_sk";
        $stringk = base64_encode($monnify_hashkeys);
        $url = 'https://api.monnify.com/api/v1/auth/login';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,[
                "Authorization: Basic " . $stringk . "",
            ]
        );
        $json = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($json, true);
    
        $accessToken = $result['responseBody']['accessToken'];
    
        $monnifyfullname = $fullname;
        $c_code = rand(1000000000, 9000000000);
        $aref = uniqid();
        $bref = rand(1000, 9000);
        $ref = $aref . $bref . time();
        $monnifyemail = $email;
        $xx = $monnify_cc;

        $postdata = array(
            'accountName' => "$monnifyfullname",
            'accountReference' => "$ref",
            /// Unique ID to update customer wallet
            'currencyCode' => "NGN",
            'customerEmail' => "$monnifyemail",
            'contractCode' => "$xx",
            'customerName' => "$monnifyfullname",
            "getAllAvailableBanks" => false,
            "bvn" => $bvn,
            "nin" => $nin,
            // "restrictPaymentSource" => true,
            "preferredBanks" => ["035", "232", "50515", "058"]
        );

        $rurl = 'https://api.monnify.com/api/v2/bank-transfer/reserved-accounts';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rurl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                "Content-Type: application/json",
                "Authorization: Bearer " . $accessToken . "",
            ]
        );
        $json = curl_exec($ch);
        curl_close($ch);
        
        $re = json_decode($json);

        if (isset($re->responseCode) && $re->responseCode == 0) {
            mysqli_query($con, "UPDATE users SET reserved_account='" . $json . "' WHERE email='" . $monnifyemail . "'");
        }
    }
?>