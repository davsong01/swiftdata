<?php
require("session_controller.php");

if (!empty($_POST['easy_access165'])){
  $easy_access165=mysqli_real_escape_string($con, $_POST['easy_access165']);
  $level=mysqli_real_escape_string($con, $_POST['level']);

  $update=mysqli_query($con, "UPDATE mtndata_card_plan SET easy_access165='$easy_access165' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your NTN data card prices have been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating price !!!',
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