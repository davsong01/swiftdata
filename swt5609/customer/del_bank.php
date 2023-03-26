<?php
require("session_controller.php");

if (!empty($_GET['load_id'])){

$data_id=$_GET['load_id'];

$update=mysqli_query($con, "DELETE FROM vtuapp_manualfunding WHERE id='$data_id'");

 if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'This bank details has been successfully removed !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when removing bank account !!!',
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