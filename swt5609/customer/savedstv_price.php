<?php
require("session_controller.php");

if (!empty($_POST['dstv_1']) &&  !empty($_POST['dstv_2']) &&  !empty($_POST['dstv_3']) &&  !empty($_POST['dstv_4']) &&  !empty($_POST['dstv_5']) && !empty($_POST['level'])){

$dstv_1=mysqli_real_escape_string($con, $_POST['dstv_1']);
$dstv_2=mysqli_real_escape_string($con, $_POST['dstv_2']);
$dstv_3=mysqli_real_escape_string($con, $_POST['dstv_3']);
$dstv_4=mysqli_real_escape_string($con, $_POST['dstv_4']);
$dstv_5=mysqli_real_escape_string($con, $_POST['dstv_5']);
$dstv_6=mysqli_real_escape_string($con, $_POST['dstv_6']);
$dstv_7=mysqli_real_escape_string($con, $_POST['dstv_7']);
$dstv_8=mysqli_real_escape_string($con, $_POST['dstv_8']);
$dstv_9=mysqli_real_escape_string($con, $_POST['dstv_9']);
$dstv_10=mysqli_real_escape_string($con, $_POST['dstv_10']);
$dstv_11=mysqli_real_escape_string($con, $_POST['dstv_11']);
$dstv_12=mysqli_real_escape_string($con, $_POST['dstv_12']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE dstv_planlist SET dstv_1='$dstv_1', dstv_2='$dstv_2', dstv_3='$dstv_3', dstv_4='$dstv_4', dstv_5='$dstv_5', dstv_6='$dstv_6', dstv_7='$dstv_7', dstv_8='$dstv_8', dstv_9='$dstv_9', dstv_10='$dstv_10', dstv_11='$dstv_11', dstv_12='$dstv_12' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your dstv prices has been successfully updated !!!',
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