<?php
require("session_controller.php");

if (!empty($_POST['gotv_1']) &&  !empty($_POST['gotv_2']) &&  !empty($_POST['gotv_3']) &&  !empty($_POST['gotv_4']) &&  !empty($_POST['gotv_5']) && !empty($_POST['level'])){

$gotv_1=mysqli_real_escape_string($con, $_POST['gotv_1']);
$gotv_2=mysqli_real_escape_string($con, $_POST['gotv_2']);
$gotv_3=mysqli_real_escape_string($con, $_POST['gotv_3']);
$gotv_4=mysqli_real_escape_string($con, $_POST['gotv_4']);
$gotv_5=mysqli_real_escape_string($con, $_POST['gotv_5']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE gotv_planlist SET gotv_1='$gotv_1', gotv_2='$gotv_2', gotv_3='$gotv_3', gotv_4='$gotv_4', gotv_5='$gotv_5' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your gotv prices has been successfully updated !!!',
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