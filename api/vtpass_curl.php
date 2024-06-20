<?php
    if ($environment == 'local') {
        $url = "https://sandbox.vtpass.com/api/pay";
        $credentials = base64_encode($vtpass_sandbox_account);
    } else {
        $url = "https://vtpass.com/api/pay";
        $credentials = base64_encode($vtpass_account);
    }

    if(isset($verify) && $verify == true){
        $url = $verify_link;
    }

    date_default_timezone_set('Africa/Lagos');
    $date = date('YmdHis', time());
    $api_reference = $date . 'SWIFTDATANG-'.rand(10000, 90000);
    $payload['request_id'] = $api_reference;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload)); //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = [
        'Authorization: Basic ' . $credentials . '',
        'Content-Type: application/json',
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);

?>