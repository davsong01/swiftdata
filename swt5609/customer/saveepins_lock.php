<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$waec=mysqli_real_escape_string($con, $_POST['waec']);
$neco=mysqli_real_escape_string($con, $_POST['neco']);
$nabteb=mysqli_real_escape_string($con, $_POST['nabteb']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET waec_lock='$waec', neco_lock='$neco', nabt_lock='$nabteb' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your store control has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating website settings !!!',
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