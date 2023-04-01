<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$service=strtolower($data['service_id']); // getting user post service
$smart_no=trim($data['service_number']);  // getting smart no
$service_plan=trim($data['service_type']);



if (!empty($smart_no) && !empty($service)){
    
    require("../functions/web_config.php");
    
    if (strlen($smart_no)>0){

        $fail_response='Invalid Meter/Smart No';
        $postdata=array(
            'billersCode' => $smart_no,
            'serviceID' => $service,
            'type' => $service_plan,
        );

        if($environment == 'local'){
            $url="https://sandbox.vtpass.com/api/merchant-verify";
        }else{
            $url="https://vtpass.com/api/merchant-verify";
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Basic '.base64_encode($vtpass_account).'',
            'Content-Type: application/json',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $curl_response = curl_exec($ch);
        curl_close($ch);
        $result=json_decode($curl_response, true);

        if (array_key_exists('content', $result) && array_key_exists('Customer_Name', $result['content']) && ($result['content']['Customer_Name']!="")){
            $fullname=$result["content"]["Customer_Name"];
            $response=array(
                'status'=>'success', ////// 
                'message' =>$fullname,
                'desc' => $fullname,
            );
            echo json_encode($response);
            exit();
        }else{
            $response=array(
                'status'=>'fail', ////// 
                'message' => $fail_response,
                'desc' => $fail_response,
            );
            echo json_encode($response);
            exit();
        }

    }else{
        $response=array(
            'status' => 'fail',
            'status_code' =>'100',
            'message' => 'Please use a valid meter no',
        );
        echo json_encode($response);
        exit;
    }


}else{

    header('WWW-Authenticate: Basic realm="My Website"');
    header('HTTP/1.0 401 Unauthorized');

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Please make sure all the parameters are included',
    );
    echo json_encode($response);

}


?>