<?php
require("session_controller.php");

if (!empty($_GET['data'])){

$data_id=$_GET['data'];

$update=mysqli_query($con, "DELETE FROM blacklist_mobiles WHERE id='$data_id'");

 if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Mobile no. has been successfully remove from blacklist !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when removing mobile no. from blacklist !!!',
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