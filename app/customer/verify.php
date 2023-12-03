<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){
  if (!empty($_POST['service_module']) && !empty($_POST['smart_no']) && !empty($_POST['security_pin']) && !empty($_POST['req_token'])){
    if ($_POST['service_module'] == 'SMILE-DATA') {
      $verify = true;
      if ($environment == 'local') {
        $verify_link = "https://sandbox.vtpass.com/api/merchant-verify/smile/email";
      } else {
        $verify_link = "https://vtpass.com/api/merchant-verify/smile/email";
      }

      $service_module = strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
      $dataplanloader = mysqli_real_escape_string($con, $_POST['dataplanloader']);
      $smart_no = mysqli_real_escape_string($con, $_POST['smart_no']);
      $security_pin = mysqli_real_escape_string($con, $_POST['security_pin']);
      $req_token = mysqli_real_escape_string($con, $_POST['req_token']);

      date_default_timezone_set('Africa/Lagos');
      $date = date('YmdHis', time());
      $api_reference = $date . 'SWIFTDATANG-' . rand(10000, 90000);

      $payload = array(
        'serviceID' => 'smile-direct',
        'service_type' => $service_plan,
        'billersCode' => $smart_no,
      );

      require '../../api/vtpass_curl.php';
      $result = json_decode($response, true);
      
      if($result){
        if (array_key_exists('content', $result) && array_key_exists('Customer_Name', $result['content']) && ($result['content']['Customer_Name'] != "")) {
          $fullname = $result["content"]["Customer_Name"];
          $accountId = $result['content']['AccountList']['Account'][0]['AccountId'];
          $button = '<button class="btn btn-success btn-block" onclick="pay4smile('.$accountId.')">Make Payment</button> <button class="btn btn-danger" onclick="closeModal()">Close</button>';
      
          $response = array(
            'status' => 'success', ////// 
            'message' => 'Account Name: '.$fullname . '<br/>Account ID: ' . $accountId . '<br/><br/>' . $button . '',
            'title' => '<strong>Please confirm that the smile details are correct before you click make payment</strong>',
            'desc' => 'Account Name: ' . $fullname . '<br/>Account ID: ' . $accountId . '<br/><br/>' . $button . '',
          );
          echo json_encode($response);
          exit();
        } else {
          $fail_response =  $fail_response = 'Validation Error: '. $result["content"]["error"] ?? 'Unable to verify at the moment, please try again';
          $response = array(
            'status' => 'fail', ////// 
            'status_code' => '100',
            'message' => $fail_response,
            'desc' => $fail_response,
          );
          echo json_encode($response);
          exit();
        }
      }else{
        $fail_response = 'Unable to verify at the moment, please try again';
        $response = array(
          'status' => 'fail', ////// 
          'status_code' => '100',
          'message' => $fail_response,
          'desc' => $fail_response,
        );
        echo json_encode($response);
        exit();
      }

    }

    if (!empty($_POST['dataplanloader'])){
      $service_module=strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
      $dataplanloader=mysqli_real_escape_string($con, $_POST['dataplanloader']);
      $smart_no=mysqli_real_escape_string($con, $_POST['smart_no']);
      $security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
      $req_token=mysqli_real_escape_string($con, $_POST['req_token']);

      $button='<button class="btn btn-success btn-block" onclick="pay4Tv()">Make Payment</button> <button class="btn btn-danger" onclick="closeModal()">Close</button>';
      
      $payload=array(
        'service_id' => $service_module,
        'service_number' => $smart_no,
      );
      $verify_link = $api_url.'/verifyiuc';

      // Take care of showmax not needing verification
    
      if($service_module == 'SHOWMAX'){
          $response=array(
            'status'=>'success',
            'message' => $message.'<br/>'.$service_module.'TV Subscription<br/><br/>'.$button.'',
          );

        echo json_encode($response);
        exit();
      }

    }else{
      $service_module=strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
      $service_plan=mysqli_real_escape_string($con, $_POST['service_plan']);
      $smart_no=mysqli_real_escape_string($con, $_POST['smart_no']);
      $security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
      $req_token=mysqli_real_escape_string($con, $_POST['req_token']);

      $button='<button class="btn btn-success btn-block" onclick="pay4Bills()">Make Payment</button> <button class="btn btn-danger" onclick="closeModal()">Close</button>';
      $payload=array(
        'service_id' => $service_module,
        'service_type' => $service_plan,
        'title' => '<strong>Please confirm that the details are correct before you click make payment</strong>',
        'service_number' => $smart_no,
      );
      
      $verify_link = $api_url.'/verifymeter';

  }

  if (strlen($smart_no)>5 && is_numeric($smart_no)){
    if ($security_pin == $security){
      $url = $verify_link;
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

      $response=array(
        'message' => '<div class="alert alert-danger">'.json_encode($request).'</div>',
      );

      if ($status=="success"){
        $response=array(
            'status'=>'success',
            'title' => '<strong>Please confirm that the details are correct before you click make payment</strong>',
            'message' => $message.'<br/>'.$service_module.'<br/><br/>'.$button.'',
          );

        echo json_encode($response);
        exit();

      }else{
        $response=array(
          'status'=>'fail',
          'message' => '<div class="alert alert-danger">'.$message.'</div>',
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
      'message' => '<div class="alert alert-danger text-left">Please enter a valid smart no !!!</div>',
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

}else{
  $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
  );
  echo json_encode($response);
  exit();
}
