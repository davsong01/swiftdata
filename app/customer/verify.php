<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['service_module']) && !empty($_POST['smart_no']) && !empty($_POST['security_pin']) && !empty($_POST['req_token'])){
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

    }

else{
    $service_module=strtoupper(mysqli_real_escape_string($con, $_POST['service_module']));
    $service_plan=mysqli_real_escape_string($con, $_POST['service_plan']);
    $smart_no=mysqli_real_escape_string($con, $_POST['smart_no']);
    $security_pin=mysqli_real_escape_string($con, $_POST['security_pin']);
    $req_token=mysqli_real_escape_string($con, $_POST['req_token']);

    $button='<button class="btn btn-success btn-block" onclick="pay4Bills()">Make Payment</button> <button class="btn btn-danger" onclick="closeModal()">Close</button>';
    $payload=array(
      'service_id' => $service_module,
      'service_type' => $service_plan,
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

  // start dummy
  // $dummy = [
  //   'url' => $url,
  //   'response' => $request,
  // ];
  // var_dump($request);

  // $response=array(
  //   'message' => '<div class="alert alert-danger">'.json_encode($dummy).'</div>',
  // );

  // echo json_encode($response);
  // exit();
  // End dummy
       
  if ($status=="success"){

      $response=array(
          'status'=>'success',
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

  }
else{
    $response=array(
      'status'=>'fail',
      'message' => '<div class="alert alert-danger text-left">Incorrect security pin !!!</div>',
    );
    echo json_encode($response);
    exit();
}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please enter a valid smart no !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}
else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
  );
  echo json_encode($response);
  exit();
}

?>