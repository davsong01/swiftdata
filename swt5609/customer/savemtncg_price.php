<?php
require("session_controller.php");

if (!empty($_POST['mtncg_500']) &&  !empty($_POST['mtncg_1']) &&  !empty($_POST['mtncg_2']) &&  !empty($_POST['mtncg_3']) &&  !empty($_POST['mtncg_5']) &&  !empty($_POST['mtncg_10']) && !empty($_POST['level'])){

$mtncg_500=mysqli_real_escape_string($con, $_POST['mtncg_500']);
$mtncg_1=mysqli_real_escape_string($con, $_POST['mtncg_1']);
$mtncg_2=mysqli_real_escape_string($con, $_POST['mtncg_2']);
$mtncg_3=mysqli_real_escape_string($con, $_POST['mtncg_3']);
$mtncg_5=mysqli_real_escape_string($con, $_POST['mtncg_5']);
$mtncg_10=mysqli_real_escape_string($con, $_POST['mtncg_10']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE mtncgdata_plan SET mtncg_500='$mtncg_500', mtncg_1='$mtncg_1', mtncg_2='$mtncg_2', mtncg_3='$mtncg_3', mtncg_5='$mtncg_5', mtncg_10='$mtncg_10' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your mtn-cg prices has been successfully updated !!!',
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