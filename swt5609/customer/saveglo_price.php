<?php
require("session_controller.php");

if (!empty($_POST['glo_105']) &&  !empty($_POST['glo_29']) &&  !empty($_POST['glo_41']) &&  !empty($_POST['glo_58']) &&  !empty($_POST['glo_77']) &&  !empty($_POST['glo_10']) && !empty($_POST['level'])){

$glo_105=mysqli_real_escape_string($con, $_POST['glo_105']);
$glo_29=mysqli_real_escape_string($con, $_POST['glo_29']);
$glo_41=mysqli_real_escape_string($con, $_POST['glo_41']);
$glo_58=mysqli_real_escape_string($con, $_POST['glo_58']);
$glo_77=mysqli_real_escape_string($con, $_POST['glo_77']);
$glo_10=mysqli_real_escape_string($con, $_POST['glo_10']);
$glo_1325=mysqli_real_escape_string($con, $_POST['glo_1325']);
$glo_1825=mysqli_real_escape_string($con, $_POST['glo_1825']);
$glo_295=mysqli_real_escape_string($con, $_POST['glo_295']);
$glo_50=mysqli_real_escape_string($con, $_POST['glo_50']);
$glo_93=mysqli_real_escape_string($con, $_POST['glo_93']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE glodata_plan SET glo_105='$glo_105', glo_29='$glo_29', glo_41='$glo_41', glo_58='$glo_58', glo_77='$glo_77', glo_10='$glo_10', glo_1325='$glo_1325', glo_1825='$glo_1825', glo_295='$glo_295', glo_50='$glo_50', glo_93='$glo_93' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your glo prices has been successfully updated !!!',
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