<?php
require("session_controller.php");
$level = mysqli_real_escape_string($con, $_POST['level']);

$corporate = intval($_POST['corporate']);
$individual = intval($_POST['individual']);

$update = mysqli_query($con, "UPDATE graphics_planlist SET corporate='$corporate', individual='$individual' WHERE id='$level'");

if ($update){
  $response=array(
    'status'=>'success',
    'message' => 'Prices successfully updated!!!',
  );
  echo json_encode($response);
  exit();
}else{
  $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating price !!!',
  );
  echo json_encode($response);
  exit();
}
?>