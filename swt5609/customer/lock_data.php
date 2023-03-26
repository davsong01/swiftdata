<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['req_token'])){

$mtnsme_lock=$_POST['mtnsme_lock'];
$mtncg_lock=$_POST['mtncg_lock'];
$glo_lock=$_POST['glo_lock'];
$airtel_lock=$_POST['airtel_lock'];
$airtelcg_lock=$_POST['airtelcg_lock'];
$mobile_lock=$_POST['mobile_lock'];
$req_token=$_POST['req_token'];


$update=mysqli_query($con, "UPDATE web_settings SET m_lock1='$mtnsme_lock', mg_lock1='$mtncg_lock', g_lock1='$glo_lock', a_lock1='$airtel_lock', ag_lock1='$airtelcg_lock', mo_lock1='$mobile_lock' WHERE id='1'");

 if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your data control has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating system !!!</div>',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();

}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
  );
  echo json_encode($response);
  exit();
}


?>