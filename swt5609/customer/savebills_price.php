<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$abuja=mysqli_real_escape_string($con, $_POST['abuja']);
$eko=mysqli_real_escape_string($con, $_POST['eko']);
$ibadan=mysqli_real_escape_string($con, $_POST['ibadan']);
$ikeja=mysqli_real_escape_string($con, $_POST['ikeja']);
$jos=mysqli_real_escape_string($con, $_POST['jos']);
$kano=mysqli_real_escape_string($con, $_POST['kano']);
$kaduna=mysqli_real_escape_string($con, $_POST['kaduna']);
$portharcourt=mysqli_real_escape_string($con, $_POST['portharcourt']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE bills_planlists SET abuja='$abuja', eko='$eko', ibadan='$ibadan', ikeja='$ikeja', jos='$jos', kano='$kano', kaduna='$kaduna', portharcourt='$portharcourt' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your bills charges has been successfully updated !!!',
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