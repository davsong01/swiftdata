<?php
  require("session_controller.php");
  $type = $_POST['type'];
  if (!empty($type)){
    if($type == 'education'){
      $waec = $_POST['waec'];
      $waec_registration = $_POST['waec_registration'];
      $neco = $_POST['neco'];
      $nabteb = $_POST['nabteb'];
      $nbais = $_POST['nbais'];

      $update=mysqli_query($con, "UPDATE web_settings SET api_waec='$waec',api_waec_registration='$waec_registration',api_neco='$neco',api_nabteb='$nabteb',api_nbais='$nbais' WHERE id=1");

    }
   

    if ($update){
      $response=array(
        'status'=>'success',
        'message' => 'Provider updated successfully!!!',
      );
      echo json_encode($response);
      exit();

    }

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating Provider!!!',
  );
  echo json_encode($response);
  exit();

}

}

else{

   $response=array(
    'status'=>'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();
}

?>