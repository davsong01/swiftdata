<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$gotv=mysqli_real_escape_string($con, $_POST['gotv']);
$dstv=mysqli_real_escape_string($con, $_POST['dstv']);
$startime=mysqli_real_escape_string($con, $_POST['startime']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET gotv_lock='$gotv', dstv_lock='$dstv', star_lock='$startime' WHERE id='$level'");

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