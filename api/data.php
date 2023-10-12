<?php

    error_reporting(1);
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $api_token = trim($data['token'] ?? $_POST['token'] );
    $mobile_no = trim($data['mobile'] ?? $_POST['mobile']); // getting mobile no
    $account_id = trim($data['account_id'] ?? $_POST['account_id']); // getting mobile no
    $plan_id = $data['plan_code'] ?? $_POST['plan_code'];
    $plan_name = $data['plan_name'] ?? $_POST['plan_name'];
    $network = strtoupper($data['network'] ?? $_POST['network']);
    $reference = $data['request_id'] ?? $_POST['request_id'];
    $no_of_pins = $data['no_of_pins'] ?? $_POST['no_of_pins'];

    require("checkip.php");

    // Check if request has plan name and get the plan_id from the pricing lists
    if(isset($plan_name) && !empty($plan_name)){
        $plan_id = getPlanId($plan_name, $network,$plan_id ?? '');
        // Get plan code from pricing lists using the plan name
    }

    if (!empty($mobile_no) && !empty($reference) && !empty($network) && !empty($api_token)) {
    // if (!empty($mobile_no) && !empty($plan_id) && !empty($reference) && !empty($network) && !empty($api_token)) {
        $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos'));
        $time = $dateTime->format("d-M-y  h:i A");
        $timexx = $dateTime->format("YmdHi");
        $timestring = time();
        $api_reference = strtoupper($timexx . uniqid() . rand(10000, 90000));

        $check_user = mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'");

        if (mysqli_num_rows($check_user) > 0) {
            
            $check_mobile = mysqli_query($con, "SELECT add_mobile FROM blacklist_mobiles WHERE add_mobile='$mobile_no'");

            if (mysqli_num_rows($check_mobile) > 0) {
                $response = array(
                    'status' => 'fail',
                    'status_code' => '100',
                    'message' => 'Mobile no. found in blacklist !!!',
                );
                echo json_encode($response);
                exit;
            } else {
           
                $return_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$api_token' AND block='0'"));
                
                $account_balance = $return_info['wallets'];
                $account_bonus = $return_info['cashback'];
                $account_webhook = $return_info['webhook'];
                $account_email = $return_info['email'];
                $account_username = $return_info['username'];
                $account_refby = $return_info['ref_by'];
                $mtnsme_access = $return_info['mtnsme_access'];
                $mtncg_access = $return_info['mtncg_access'];
                $glo_access = $return_info['glo_access'];
                $airtel_access = $return_info['airtel_access'];
                $airtelcg_access = $return_info['airtelcg_access'];
                $mobile_access = $return_info['mobile_access'];
                $level = $return_info['level'];
                $user_id = $return_info['id'];
                $account_mobile = $return_info['mobile'];
                $type = 'data';

                if ($network == "MTN" && $m_lock1 == 1 && $mtnsme_access == 1) {
                    require("dataModule/$api_mtn");
                } else if ($network == "MTN-DATACARD" ){
                    require("dataModule/$mtn_data_card");
                } else if ($network == "MTN-CG" && $mg_lock1 == 1 && $mtncg_access == 1 || $network == "GIFTING" && $mg_lock1 == 1 && $mtncg_access == 1) {
                    require("dataModule/$api_gift");
                } else if ($network == "9MOBILE" && $mo_lock1 == 1 && $mobile_access == 1 || $network == "ETISALAT" && $mo_lock1 == 1 && $mobile_access == 1) {
                    require("dataModule/$api_mobile");
                } else if ($network == "AIRTEL" && $a_lock1 == 1 && $airtel_access == 1) {
                    $product = 'airtel';
                    
                    if ($api_airtel == 'gongzo_data.php') {
                        require("dataModule/gongzo_data.php");
                    }
                    if ($api_airtel == 'easy_access_data.php') {
                        require("dataModule/easy_access_data.php");
                    } else {
                        require("dataModule/$api_airtel");
                    }
                } else if ($network == "AIRTEL-CG" && $ag_lock1 == 1 && $airtelcg_access == 1) {
                    require("dataModule/$api_airtelcg");
                } else if ($network == "GLO" && $g_lock1 == 1 && $glo_access == 1) {
                    $product = 'glo';
                    require("dataModule/$api_glo");
                } else if ($network == "GLO-CG" && $gcg_lock1 == 1 && $glo_access == 1) {
                    if($api_glocg == 'gongzo.php'){
                        require("dataModule/gongzo_data.php");
                    }else{
                        require("dataModule/$api_glocg");
                    }
                } else if ($network == "9MOBILE-CG" && $mo_lock1 == 1 && $mobile_access == 1 || $network == "ETISALAT" && $mo_lock1 == 1 && $mobile_access == 1) {
                    require("dataModule/$api_mobile");
                }else if (($network == "MOBILE-SME" || $network == "MOBILE SME") && $mobilesme_lock == 1) {
                    require("dataModule/$api_mobilesme");
                } else if ($network == "SPECTRANET-DATA" && $spectranet_lock == 1) {
                    require("dataModule/$api_spectranet");
                } else if ($network == "SMILE-DATA" && $smile_lock == 1) {
                    require("dataModule/$api_smile");
                }else {
                    $response = array(
                        'status' => 'fail',
                        'status_code' => '100',
                        'message' => 'Service is currently down or Restricted for this account. kindly check and try again !!!',
                    );
                    echo json_encode($response);
                    exit;
                }
            }
        } else {
                $response = array(
                'status' => 'fail',
                'status_code' => '100',
                'message' => 'Basic Authorization Failed! Unable to fetch user record',
             );
            echo json_encode($response);
            exit;
        }
    } else {
        $response = array(
            'status' => 'fail',
            'status_code' => '100',
            'message' => 'Please make sure all the parameters are included.',
        );
        echo json_encode($response);
        exit();
    }

    function getPlanId($plan_name, $network,$plan_id){
        require("../functions/web_config.php");

        $pId = $plan_id;
        $type = "data";
        $product = strtolower($network);

        if ($network == "MTN") {
            $api = $api_mtn;
        } else if ($network == "MTN-DATACARD" ){
            $api = $mtn_data_card;
        } else if ($network == "MTN-CG" || $network == "GIFTING") {
            $product = "mtn-cg";
            $api = $api_gift;
        } else if ($network == "9MOBILE" || $network == "ETISALAT") {
            $api = $api_mobile;
        } else if ($network == "AIRTEL") {
            $api = $api_airtel;
        } else if ($network == "AIRTEL-CG") {
            $product = 'airtel-cg';
            $api = $api_airtelcg;
        } else if ($network == "GLO") {
            $api = $api_glo;
        } else if ($network == "GLO-CG") {
            $api = $api_glocg;
        } else if ($network == "9MOBILE-CG" || $network == "ETISALAT") {
            $api = $api_mobile;
        }else if ($network == "MOBILE-SME" || $network == "MOBILE SME") {
            $api = $api_mobilesme;
            $type = "sme";
            $product = "apimobile-sme";
        }

        if($api == 'easy_access_data.php') {
            require("easy_access_pricing.php");
        }else if ($api == 'gongzo_data.php') {
            require("gongzo_pricing.php");
        }else if ($api == 'gongzo.php') {
            require("gongzo_pricing.php");
        }else{
            require("generic_pricing.php");
        }
    
        if(isset($response) && !empty($response)){
            foreach($response as $res){
                if(isset($res['name']) && !empty($res['name'])){
                    $needle = str_replace(' ', '', $res['name']);
                    $haystack = str_replace(' ', '', $plan_name);
                    // check if name matches plan_name
                    if (strpos($haystack, $needle) !== false) {
                        $pId = $res['code'];
                    }
                }
            }
        }
        return $pId;
    }
