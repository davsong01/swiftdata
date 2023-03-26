<?php
require("session_controller.php");

if (!empty($_POST['glocg_200']) &&  !empty($_POST['glocg_500']) &&  !empty($_POST['glocg_1']) &&  !empty($_POST['glocg_2']) &&  !empty($_POST['glocg_5']) &&  !empty($_POST['glocg_10']) && !empty($_POST['level'])){

$glocg_200=mysqli_real_escape_string($con, $_POST['glocg_200']);
$glocg_500=mysqli_real_escape_string($con, $_POST['glocg_500']);
$glocg_1=mysqli_real_escape_string($con, $_POST['glocg_1']);
$glocg_2=mysqli_real_escape_string($con, $_POST['glocg_2']);
$glocg_3=mysqli_real_escape_string($con, $_POST['glocg_3']);
$glocg_5=mysqli_real_escape_string($con, $_POST['glocg_5']);
$glocg_10=mysqli_real_escape_string($con, $_POST['glocg_10']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE glocgdata_plan SET glocg_200='$glocg_200', glocg_500='$glocg_500', glocg_1='$glocg_1', glocg_2='$glocg_2', glocg_3='$glocg_3', glocg_5='$glocg_5', glocg_10='$glocg_10' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your glo-cg prices has been successfully updated !!!',
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