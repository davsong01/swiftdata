<?php
require("session_controller.php");

if (!empty($_POST['star_1']) &&  !empty($_POST['star_2']) &&  !empty($_POST['star_3']) &&  !empty($_POST['star_4']) &&  !empty($_POST['star_5']) && !empty($_POST['level'])){

$star_1=mysqli_real_escape_string($con, $_POST['star_1']);
$star_2=mysqli_real_escape_string($con, $_POST['star_2']);
$star_3=mysqli_real_escape_string($con, $_POST['star_3']);
$star_4=mysqli_real_escape_string($con, $_POST['star_4']);
$star_5=mysqli_real_escape_string($con, $_POST['star_5']);
$star_6=mysqli_real_escape_string($con, $_POST['star_6']);
$star_7=mysqli_real_escape_string($con, $_POST['star_7']);
$star_8=mysqli_real_escape_string($con, $_POST['star_8']);
$star_9=mysqli_real_escape_string($con, $_POST['star_9']);
$star_10=mysqli_real_escape_string($con, $_POST['star_10']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE startime_planlist SET star_1='$star_1', star_2='$star_2', star_3='$star_3', star_4='$star_4', star_5='$star_5', star_6='$star_6', star_7='$star_7', star_8='$star_8', star_9='$star_9', star_10='$star_10' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your startimes prices has been successfully updated !!!',
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