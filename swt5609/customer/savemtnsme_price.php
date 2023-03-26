<?php
require("session_controller.php");

if (!empty($_POST['mtnsme_500']) &&  !empty($_POST['mtnsme_1']) &&  !empty($_POST['mtnsme_2']) &&  !empty($_POST['mtnsme_3']) &&  !empty($_POST['mtnsme_5']) &&  !empty($_POST['mtnsme_10']) && !empty($_POST['level'])){

$mtnsme_500=mysqli_real_escape_string($con, $_POST['mtnsme_500']);
$mtnsme_1=mysqli_real_escape_string($con, $_POST['mtnsme_1']);
$mtnsme_2=mysqli_real_escape_string($con, $_POST['mtnsme_2']);
$mtnsme_3=mysqli_real_escape_string($con, $_POST['mtnsme_3']);
$mtnsme_5=mysqli_real_escape_string($con, $_POST['mtnsme_5']);
$mtnsme_10=mysqli_real_escape_string($con, $_POST['mtnsme_10']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE mtnsmedata_plan SET mtnsme_500='$mtnsme_500', mtnsme_1='$mtnsme_1', mtnsme_2='$mtnsme_2', mtnsme_3='$mtnsme_3', mtnsme_5='$mtnsme_5', mtnsme_10='$mtnsme_10' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your mtn-sme prices has been successfully updated !!!',
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