<?php
require("session_controller.php");

if (!empty($_POST['airtelcg_100']) &&  !empty($_POST['airtelcg_300']) &&  !empty($_POST['airtelcg_500']) &&  !empty($_POST['airtelcg_1']) &&  !empty($_POST['airtelcg_2']) &&  !empty($_POST['airtelcg_5']) && !empty($_POST['level'])){

$airtelcg_100=mysqli_real_escape_string($con, $_POST['airtelcg_100']);
$airtelcg_300=mysqli_real_escape_string($con, $_POST['airtelcg_300']);
$airtelcg_500=mysqli_real_escape_string($con, $_POST['airtelcg_500']);
$airtelcg_1=mysqli_real_escape_string($con, $_POST['airtelcg_1']);
$airtelcg_2=mysqli_real_escape_string($con, $_POST['airtelcg_2']);
$airtelcg_5=mysqli_real_escape_string($con, $_POST['airtelcg_5']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE airtelcgdata_plan SET airtelcg_100='$airtelcg_100', airtelcg_300='$airtelcg_300', airtelcg_500='$airtelcg_500', airtelcg_1='$airtelcg_1', airtelcg_2='$airtelcg_2', airtelcg_5='$airtelcg_5' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your airtel-cg prices has been successfully updated !!!',
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