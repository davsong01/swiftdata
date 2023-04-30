<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['address']) &&  !empty($_POST['contact_no']) && !empty($_POST['whatsapp_no']) &&  !empty($_POST['admin_email']) && !empty($_POST['req_token']) && !empty($_POST['group_link']) && !empty($_POST['group_link2'])){

$address=mysqli_real_escape_string($con, $_POST['address']);
$contact_no=mysqli_real_escape_string($con, $_POST['contact_no']);
$whatsapp_no=mysqli_real_escape_string($con, $_POST['whatsapp_no']);
$admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
$admin_notification_email = mysqli_real_escape_string($con, $_POST['admin_notification_email']);
$group_link=mysqli_real_escape_string($con, $_POST['group_link']);
$group_link2=mysqli_real_escape_string($con, $_POST['group_link2']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$update=mysqli_query($con, "UPDATE web_settings SET admin_email='$admin_email',admin_notification_email='$admin_notification_email', whatsapp_no='$whatsapp_no', contact_no='$contact_no', address='$address', group_link='$group_link', group_link2='$group_link2' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your website settings has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating web settings !!!</div>',
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