<?php
require("session_controller.php");

if (!empty($_POST['level'])){

$abuja=mysqli_real_escape_string($con, $_POST['abuja']);
$eko=mysqli_real_escape_string($con, $_POST['eko']);
$ibadan=mysqli_real_escape_string($con, $_POST['ibadan']);
$kano=mysqli_real_escape_string($con, $_POST['kano']);
$kaduna=mysqli_real_escape_string($con, $_POST['kaduna']);
$ikeja=mysqli_real_escape_string($con, $_POST['ikeja']);
$jos=mysqli_real_escape_string($con, $_POST['jos']);
$portharcourt=mysqli_real_escape_string($con, $_POST['portharcourt']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE web_settings SET abuja_lock='$abuja', eko_lock='$eko', ibadan_lock='$ibadan', kano_lock='$kano', kaduna_lock='$kaduna', ikeja_lock='$ikeja', jos_lock='$jos', port_lock='$portharcourt' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your store control has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Critical error occur when updating website settings !!!',
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