<?php
require("session_controller.php");

if (!empty($_POST['level'])){
  $mtnsme_data=mysqli_real_escape_string($con, $_POST['mtnsme_data']);
  $mtncg_data=mysqli_real_escape_string($con, $_POST['mtncg_data']);
  $glo_data=mysqli_real_escape_string($con, $_POST['glo_data']);
  $glocg_data=mysqli_real_escape_string($con, $_POST['glocg_data']);
  $airtel_data=mysqli_real_escape_string($con, $_POST['airtel_data']);
  $airtelcg_data=mysqli_real_escape_string($con, $_POST['airtelcg_data']);
  $mobile_data=mysqli_real_escape_string($con, $_POST['mobile_data']);
  $mobile_sme = mysqli_real_escape_string($con, $_POST['mobile_sme']);
  $mtn_data_card=mysqli_real_escape_string($con, $_POST['mtn_data_card']);
  $api_spectranet = mysqli_real_escape_string($con, $_POST['api_spectranet']);
  $api_smile=mysqli_real_escape_string($con, $_POST['api_smile']);

  $level=mysqli_real_escape_string($con, $_POST['level']);

  $update=mysqli_query($con, "UPDATE web_settings SET api_mtn='$mtnsme_data', api_gift='$mtncg_data', api_glo='$glo_data', api_airtel='$airtel_data', api_airtelcg='$airtelcg_data', api_mobile='$mobile_data', api_glocg='$glocg_data',api_mobilesme='$mobile_sme', mtn_data_card='$mtn_data_card',api_spectranet='$api_spectranet',api_smile='$api_smile' WHERE id='$level'");

  if ($update){

  $response=array(
      'status'=>'success',
      'message' => 'Your data automation has been successfully updated !!!',
    );
    echo json_encode($response);
    exit();

  }else{

  $response=array(
      'status'=>'fail',
      'message' => 'Critical error occur when updating website settings !!!',
    );
    echo json_encode($response);
    exit();

  }

}else{
  $response=array(
    'status'=>'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();
}

?>