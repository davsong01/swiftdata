<?php
  require("session_controller.php");
  $security_pin = mysqli_real_escape_string($con, $_POST['security_pin']);
  $req_token = mysqli_real_escape_string($con, $_POST['req_token']);


  if ($_SESSION['csrftoken'] == $_POST['req_token']){
      if ($security_pin == $security){
          $payload=array(
            'token' => $sk_token,
            'amount' => $withdrawAmount1,
            'service' => 'WALLET',
            'account' => '',
            'bank_code' => '',
            'reference' => strtoupper(rand(10000000, 90000000).time().mt_rand()),
          );

          $url = $api_url.'/withdraw';
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));  //Post Fields
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $request = curl_exec($ch);
          curl_close($ch);
          $apidata=json_decode($request);
          
          $message=$apidata->message;
          $status=$apidata->status;
       
          if ($status == "success"){
            $response = [
              'title' => 'COMPLETED',
              'icon' => 'success',
              'status'=>'success',
              'message' => $message,
            ];
          }else{
            $response = [
              'title' => 'FAILED',
              'icon' => 'error',
              'status'=>'fail',
              'message' => '<div class="alert alert-danger">'.$message.'</div>',
            ];
          }
          echo json_encode($response);
          exit();
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
        'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
      );
      echo json_encode($response);
      exit();
  }
?>