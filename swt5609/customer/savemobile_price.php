<?php
require("session_controller.php");

if (!empty($_POST['mobile_500']) &&  !empty($_POST['mobile_15']) &&  !empty($_POST['mobile_2']) &&  !empty($_POST['mobile_3']) &&  !empty($_POST['mobile_45']) &&  !empty($_POST['mobile_11']) && !empty($_POST['level'])){

$mobile_500=mysqli_real_escape_string($con, $_POST['mobile_500']);
$mobile_15=mysqli_real_escape_string($con, $_POST['mobile_15']);
$mobile_2=mysqli_real_escape_string($con, $_POST['mobile_2']);
$mobile_3=mysqli_real_escape_string($con, $_POST['mobile_3']);
$mobile_45=mysqli_real_escape_string($con, $_POST['mobile_45']);
$mobile_11=mysqli_real_escape_string($con, $_POST['mobile_11']);
$mobile_150=mysqli_real_escape_string($con, $_POST['mobile_150']);
$mobile_40=mysqli_real_escape_string($con, $_POST['mobile_40']);
$mobile_75=mysqli_real_escape_string($con, $_POST['mobile_75']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE mobiledata_plan SET mobile_500='$mobile_500', mobile_15='$mobile_15', mobile_2='$mobile_2', mobile_3='$mobile_3', mobile_45='$mobile_45', mobile_11='$mobile_11', mobile_150='$mobile_150', mobile_40='$mobile_40', mobile_75='$mobile_75' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your 9mobile prices has been successfully updated !!!',
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