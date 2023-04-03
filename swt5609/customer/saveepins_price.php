<?php
require("session_controller.php");

if (!empty($_POST['waec']) &&  !empty($_POST['neco']) &&  !empty($_POST['nabteb']) && !empty($_POST['level'])){

$waec=mysqli_real_escape_string($con, $_POST['waec']);
$gce=mysqli_real_escape_string($con, $_POST['gce']);
$neco = mysqli_real_escape_string($con, $_POST['neco']);
$nabteb=mysqli_real_escape_string($con, $_POST['nabteb']);
$level=mysqli_real_escape_string($con, $_POST['level']);

$update=mysqli_query($con, "UPDATE epin_planlist SET waec='$waec',gce='$gce', neco='$neco', nabteb='$nabteb' WHERE id='$level'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your epins prices has been successfully updated !!!',
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