<?php

require("session_controller.php");

$_POST['mobile_no'] = !empty($_POST['mobile_no']) ? $_POST['mobile_no'] : '00000000000';

if ($_SESSION['csrftoken'] == $_POST['req_token']){
 
  if (!empty($_POST['network_module']) && !empty($_POST['dataplanloader']) && !empty($_POST['mobile_no']) && !empty($_POST['security_pin']) && !empty($_POST['req_token'])){
     
    $network_module=strtoupper(mysqli_real_escape_string($con, $_POST['network_module']));
    $dataplanloader=mysqli_real_escape_string($con, $_POST['dataplanloader']);
    $mobile_no=mysqli_real_escape_string($con, $_POST['mobile_no']);
    
    $security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
    $req_token=mysqli_real_escape_string($con, $_POST['req_token']);
    $no_of_pins = mysqli_real_escape_string($con, $_POST['no_of_pins']);
    $account_id=mysqli_real_escape_string($con, $_POST['account_id']);

    
    if (strlen($mobile_no)==11 && is_numeric($mobile_no)){
        if ($security_pin == $security){
          $payload=array(
            'token' => $sk_token,
            'mobile' => $mobile_no,
            'account_id' => $account_id,
            'network' => $network_module,
            'request_id' => strtoupper(time().rand(10000000, 90000000).mt_rand()),
            'plan_code' => $dataplanloader,
            'no_of_pins' => $no_of_pins ?? 1
          );
          
          $url = $api_url.'/data';

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));  //Post Fields
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $req = curl_exec($ch);
    
          if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
          }
          curl_close($ch);
          $apidata=json_decode($req);
          $message=$apidata->message;
          $extra = $apidata->extra ?? '';
          $status=$apidata->status;

          if ($status == "success"){
            $response=array(
              'title' => 'COMPLETED',
              'icon' => 'success',
                'status'=>'success',
                'message' => $message,
                'extra' => $extra
            );

            echo json_encode($response);
            exit();
          }

        else{
          $response=array(
            'title' => 'FAILED',
            'icon' => 'error',
              'status'=>'fail',
              'message' => '<div class="alert alert-danger">'.$message.$error_msg.'</div>',
            );

          echo json_encode($response);
          exit();

        }

        }else{
            $response=array(
              'status'=>'fail',
              'message' => '<div class="alert alert-danger text-left">Incorrect security pin !!!</div>',
            );
            echo json_encode($response);
            exit();
        }

     
    }else{
        $response=array(
            'status'=>'fail',
            'message' => '<div class="alert alert-danger text-left">Please use a valid mobile no !!!</div>',
          );
          echo json_encode($response);
          exit();

    }
   
  }else{

  $response=array(
      'status'=>'fail',
      'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
    );
    echo json_encode($response);
    exit();
  }
  

}else{$response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong..token issue.</div>',
  );
  echo json_encode($response);
  exit();
}

?>