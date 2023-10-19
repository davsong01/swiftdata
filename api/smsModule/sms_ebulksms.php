<?php

    require ("../functions/sms_price.php");
    
    $check_nom=strlen($message_body);
    if ($check_nom<165){$msgVolume=1;}
    if ($check_nom>165 && $check_nom<=330){$msgVolume=2;}
    if ($check_nom>330){$msgVolume=3;}

    $check_nos=substr_count($receipent_no,",");
    $plus_denos=$check_nos+1;
    $amount=$plus_denos*$sms_price*$msgVolume;
    $service_price=$amount;
    $quantity = $msgVolume * $plus_denos;

    if ($account_balance > $service_price && $service_price > 0){
        $new_wallet=$account_balance+$service_price;
        mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");
        
        $message_body2=htmlentities($message_body);
        $gsm = [];
        $country_code = '234';
        $arr_recipient = explode(',', $receipent_no);
        foreach ($arr_recipient as $recipient) {
            $mobilenumber = trim($recipient);
            if (substr($mobilenumber, 0, 1) == '0'){
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            }
            elseif (substr($mobilenumber, 0, 1) == '+'){
                $mobilenumber = substr($mobilenumber, 1);
            }
            $generated_id = uniqid('int_', false);
            $generated_id = substr($generated_id, 0, 30);
            $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
        }
        $request = [
            'SMS' => [
                // "sender" => $sender_id,
                "recipients" => $gsm,
                "message" => [
                    'sender' => $sender_id,
                    'messagetext' => $message_body,
                    'flash' => 0,
                ],
                "auth" => [
                    "username" => "adeglobaltelecom@gmail.com",
                    "apikey" => "d75a8f986bf4e6eadebd88c1fc5eb14497d31f10"
                ],
                "flash" => "0",
                "dndsender" => 1,
            ],
        ];
        $encodedRequest = json_encode($request);

        $url = "https://api.ebulksms.com:443/sendsms";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedRequest); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = [
            'Content-Type: application/json',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $res = curl_exec($ch);
        curl_close($ch);


        $res= '{"response":{"status":"SUCCESS","totalsent":1,"cost":2}}';
        $decodedResponse = json_decode($res);
            
        if (isset($decodedResponse->response) && $decodedResponse->response->status == "SUCCESS"){
           
            $order_report=strtoupper('BulkSMS Sent To '.$plus_denos.' Numbers(s)');

            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`post_fields`,`api_response`,`buyer_quantity`) VALUES (NULL, '$mobile', '$account_email', '$account_username', 'BULKSMS', '$service_price', '$account_balance', '$new_wallet', '$order_report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$encodedRequest','$res','$quantity')");


            mysqli_query($con, "INSERT INTO `sms_transactions` (`id`, `sender`, `message_body`, `buyer_date`, `buyer_email`, `reference` ,`status`) VALUES (NULL, '$sender_id', '$message_body2', '$time', '$account_email', '$api_reference', 'SUCCESSFUL')");

            $response=array(
            'status' => 'success',
            'status_code' =>'200',
            'old_balance'=> $account_balance, ////// 
            'new_bal'=> $new_wallet, ////// 
            'time' => $time,
            'amountPaid' => $service_price,
            'message' => $order_report,
            );
            echo json_encode($response);
            exit;
        }else{

            $new_wallet=$account_balance;
            mysqli_query($con, "UPDATE users SET wallets='$new_wallet' WHERE id='$user_id' AND username ='$account_username'");

            $order_report=strtoupper('BulkSMS Sending Failed To '.$plus_denos.' Member(s) ');
            
            mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`,`post_fields`,`api_response`,`buyer_quantity`) VALUES (NULL, '$mobile', '$account_email', '$account_username', 'BULKSMS', '$service_price', '$account_balance', '$account_balance', '$order_report', 'FAILED', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$reference', 'DONE', '0', '0','0','$encodedRequest','$res','$quantity')");

            mysqli_query($con, "INSERT INTO `sms_transactions` (`id`, `sender`, `message_body`, `buyer_date`, `buyer_email`, `reference`,`status`) VALUES (NULL, '$sender_id', '$message_body2', '$time', '$account_email', '$api_reference', 'FAILED')");

            $response=array(
                'status' => 'fail',
                'status_code' =>'100',
                'old_balance'=> $account_balance,
                'new_bal'=> $account_balance,
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
            'message' => 'Your balance is too low for this transaction !!!',
        );
        echo json_encode($response);
        exit;
    }
?>