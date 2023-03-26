<?php
require("session_controller.php");

if (!empty($_GET['data'])){

$data_id=$_GET['data'];

$update=mysqli_query($con, "UPDATE vtuapp_admin SET status='BLOCK' WHERE id='$data_id' AND type='STAFF'");

 if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'This staff has been successfully added to block list !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when blocking staff account !!!',
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