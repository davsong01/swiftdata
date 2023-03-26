<?php
require("session_controller.php");

if (!empty($_POST['airtel_750']) &&  !empty($_POST['airtel_15']) &&  !empty($_POST['airtel_2']) &&  !empty($_POST['airtel_3']) &&  !empty($_POST['airtel_45']) &&  !empty($_POST['airtel_6']) && !empty($_POST['level'])){

$airtel_750=mysqli_real_escape_string($con, $_POST['airtel_750']);
$airtel_15=mysqli_real_escape_string($con, $_POST['airtel_15']);
$airtel_2=mysqli_real_escape_string($con, $_POST['airtel_2']);
$airtel_3=mysqli_real_escape_string($con, $_POST['airtel_3']);
$airtel_45=mysqli_real_escape_string($con, $_POST['airtel_45']);
$airtel_6=mysqli_real_escape_string($con, $_POST['airtel_6']);
$airtel_10=mysqli_real_escape_string($con, $_POST['airtel_10']);
$airtel_11=mysqli_real_escape_string($con, $_POST['airtel_11']);
$airtel_20=mysqli_real_escape_string($con, $_POST['airtel_20']);
$airtel_40=mysqli_real_escape_string($con, $_POST['airtel_40']);
$airtel_75=mysqli_real_escape_string($con, $_POST['airtel_75']);
$airtel_120=mysqli_real_escape_string($con, $_POST['airtel_120']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE airteldata_plan SET airtel_750='$airtel_750', airtel_15='$airtel_15', airtel_2='$airtel_2', airtel_3='$airtel_3', airtel_45='$airtel_45', airtel_6='$airtel_6', airtel_10='$airtel_10', airtel_11='$airtel_11', airtel_20='$airtel_20', airtel_40='$airtel_40', airtel_75='$airtel_75', airtel_120='$airtel_120' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your airtel prices has been successfully updated !!!',
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