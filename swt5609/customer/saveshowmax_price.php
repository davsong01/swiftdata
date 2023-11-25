<?php
require("session_controller.php");

if (!empty($_POST['showmax1']) &&  !empty($_POST['showmax2']) &&  !empty($_POST['showmax3']) &&  !empty($_POST['showmax4']) && !empty($_POST['level'])){

$showmax1=mysqli_real_escape_string($con, $_POST['showmax1']);
$showmax2=mysqli_real_escape_string($con, $_POST['showmax2']);
$showmax3=mysqli_real_escape_string($con, $_POST['showmax3']);
$showmax4=mysqli_real_escape_string($con, $_POST['showmax4']);
$showmax_discount=mysqli_real_escape_string($con, $_POST['showmax_discount']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE showmax_planlist SET showmax1='$showmax1', showmax2='$showmax2', showmax3='$showmax3', showmax4='$showmax4',showmax_discount='$showmax_discount' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your showmax prices have been successfully updated !!!',
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