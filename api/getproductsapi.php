<?php
    // Get products for api, only works with easy access products, other products should remain as they are
    error_reporting(0);
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $token = trim($data['token']);

    $mtnsme_access = $return_info['mtnsme_access'];
    $mtncg_access = $return_info['mtncg_access'];
    $glo_access = $return_info['glo_access'];
    $airtel_access = $return_info['airtel_access'];
    $airtelcg_access = $return_info['airtelcg_access'];
    $mobile_access = $return_info['mobile_access'];

    $res = [];
    // // First check if a username was provided.
    if (!empty($token)) {
        if (strlen($token)>0){
            require("../functions/web_config.php");
            $check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$token'");
           
            if (mysqli_num_rows($check_user)>0){
                $allowed_services = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$token' AND block='0'"));
                $level = $allowed_services['level'];

                $allowed = [
                    'MTN'=>[
                        'type' => 'data',
                        'product' => 'mtn',
                        'user_status'=>$allowed_services['mtnsme_access'] ?? 0,
                        'system_status'=>$m_lock1,
                        'api'=>'null'
                        ],
                    'MTN-CG' => [
                        'type' => 'data',
                        'product' => 'mtn-cg',
                        'user_status'=>$allowed_services['mtncg_access'] ?? 0,
                        'system_status'=>$mg_lock1,
                        'api'=>$api_gift
                        ],
                    'GLO' => [
                            'type' => 'data',
                            'product' => 'glo',
                            'user_status'=>$allowed_services['glo_access'] ?? 0,
                            'system_status'=>$g_lock1,
                            'api'=>$api_glo
                        ],
                    'GLO-CG' => [
                            'type' => 'data',
                            'product' => 'glo-cg',
                            'user_status'=>$allowed_services['glo_access'] ?? 0,
                            'system_status'=>$gcg_lock1,
                            'api'=>$api_glocg
                        ],
                    'AIRTEL-CG' => [
                        'type' => 'data',
                        'product' => 'airtel-cg',
                        'user_status' => $allowed_services['airtelcg_access'] ?? 0,
                        'system_status' => $ag_lock1,
                        'api' => $api_airtelcg
                    ],
                    'AIRTEL' => [
                        'type' => 'data',
                        'product' => 'airtel',
                        'user_status'=>$allowed_services['airtel_access'] ?? 0,
                        'system_status'=>$a_lock1 ,
                        'api'=>$api_airtel,
                        ],
                    
                    '9MOBILE' => [
                        'type' => 'data',
                        'product' => '9mobile',
                        'user_status'=>$allowed_services['mobile_access'] ?? 0,
                        'system_status'=>$mo_lock1,
                        'api'=>$api_mobile
                    ],
                    'MOBILE SME' => [
                        'type' => 'sme',
                        'product' => 'apimobile-sme',
                        'user_status'=>1,
                        'system_status'=>$mobilesme_lock,
                        'api'=>$api_mobilesme
                    ],
                    '9MOBILE CG' => [
                        'type' => 'data',
                        'product' => 'mobile-sme',
                        'user_status'=>1,
                        'system_status'=>$mobilesme_lock,
                        'api'=>$api_mobilecg
                    ],
                    'GIFTING' => [
                        'type' => 'datacard',
                        'product' => 'mtn-data-card',
                        'user_status'=>1,
                        'system_status'=>1,
                        'api'=>$mtn_data_card
                    ],
                    
                ];
           
                foreach($allowed as $key=>$value){
                    $type = $value['type'];
                    $product = $value['product'];
                    // Check if service is locked
                    if($value['user_status'] == 1 && $value['system_status'] == 1){
                        // Get pricing from the api
                        if($value['api'] == 'easy_access_data.php'){
                            require 'easy_access_pricing.php';
                        }else if ($value['api'] == 'gongzo_data.php' || $value['api'] == 'gongzo.php') {
                            require 'gongzo_pricing.php';
                        }
                        else{
                            require 'generic_pricing.php';
                        }

                    
                        if(isset($response)){
                            $single = [];
                            foreach($response as $r){
                                if(isset($r['price']) && $r['price'] > 0){
                                    $single[] = $r['price'] > 0 ? $r['name']." = N".$r['price']:0;
                                }
                            }
                            if(!empty($single)){
                                $res[$key] = $single;
                            }
                             
                        }
                    }
                }

                header("Content-Type: application/json");
            
                echo json_encode($res, JSON_PRETTY_PRINT);
                
                exit;
                
            }else{
                $response=array(
                'status' => 'fail',
                'status_code' =>'100',
                'message' => 'Authorization Failed! Unable to fetch user record',
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
            'message' => 'Authorization Failed! Please Provide Valid API Key',
            );
            echo json_encode($response);

        }    
    }else{

        // If no username provided, present the auth challenge.
        header('WWW-Authenticate: Basic realm="My Website"');
        header('HTTP/1.0 401 Unauthorized');

        $response=array(
        'status' => 'fail',
        'status_code' =>'100',
        'message' => 'Authorization Failed! Please Provide API Key',
        );
        echo json_encode($response);
        exit;

    }

    function formatBytes($bytes, $precision = 2) { 
        $units = array('MB', 'GB'); 

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1000)); 
        $pow = min($pow, count($units) - 1); 

        // Uncomment one of the following alternatives
        $bytes /= pow(1000, $pow);
        // $bytes /= (1 << (10 * $pow)); 

        return round($bytes, $precision) . $units[$pow]; 
    } 
    function array_map_assoc( $callback , $array ){
        $r = array();
        foreach ($array as $key=>$value)
            $r[$key] = $callback($key,$value);
        return $r;
    }
?>