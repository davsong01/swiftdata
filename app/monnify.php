<?php

require("session_controller.php");
// 
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
   
    $url = "https://api.payvessel.com/api/external/request/customerReservedAccount/";
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

    mysqli_query($con, "UPDATE users SET reserved_account='" . $json . "' WHERE email='" . $monnifyemail . "'");
}
?>