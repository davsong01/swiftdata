<?php

    error_reporting(0);
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $request_id=$data['request_id'] ?? $_POST['request_id'];

    // $response=array(
    // 'status'=>'success', ////// 
    // 'message' => json_encode($request_id),
    // );
    // echo json_encode($response);
    // exit();

    if (!empty($request_id)){
        require("../functions/web_config.php");
        
        $postdata = ['request_id' => $request_id];

        if($environment == 'local'){
            $url="https://sandbox.vtpass.com/api/requery";
            $credentials = base64_encode($vtpass_sandbox_account);
        }else{
            $url="https://vtpass.com/api/requery";
            $credentials = base64_encode($vtpass_account);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Basic '. $credentials.'',
            'Content-Type: application/json',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $curl_response = curl_exec($ch);
        curl_close($ch);
        $result=json_decode($curl_response, true);

        $transaction = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM final_transactions WHERE sys_ref='$request_id' AND buyer_status='PENDING'"));

 
        if($result['code'] == '000'){
            if (array_key_exists('content', $result)){
                $status = $result['content']['transactions']['status'] ?? '';
                if( $status == 'delivered'){
                        // if delivered, update extras and transaction status
                        // get purchase code
                        $purchased_code = $result['purchased_code'] ?? '';
                        $stat = 'SUCCESSFUL';
                $modal_status = 'success';
                        $order_report = strtoupper($transaction['buyer_service'] . ' N' . $transaction['buyer_amount'] . ' Purchase: '.$stat.'. [' . $purchased_code . ']').'<br><br>Please reload the page';

                        mysqli_query($con, "UPDATE final_transactions SET buyer_status='$stat',extra='$purchased_code',api_response='$curl_response' WHERE sys_ref='$request_id' ");

                    }else if( $status == 'pending'){
                        // if pending, do nothing
                        $stat = 'PENDING';
                        $modal_status = 'fail';
                        $order_report = strtoupper($transaction['buyer_service'] . ' N' . $transaction['buyer_amount'] . ' Purchase: '.$stat);
                    }else{
                        // if pending, do nothing
                        $stat = 'FAILED';
                        $modal_status = 'fail';
                        $order_report = strtoupper($transaction['buyer_service'] . ' N' . $transaction['buyer_amount'] . ' Purchase: '.$stat);
                    }
                
                // if failed, update transaction and refund user by writing new transaction from this transaction
            }
        }

        $response = array(
            'status' => $modal_status,
            'status_code' => '200',
            'message' => $order_report,
        );
        echo json_encode($response);
        exit();
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