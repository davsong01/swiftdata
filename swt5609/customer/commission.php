<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['mdata_comm']) &&  !empty($_POST['mcdata_comm']) && !empty($_POST['adata_comm']) &&  !empty($_POST['acdata_comm']) && !empty($_POST['modata_comm']) && !empty($_POST['gdata_comm']) && !empty($_POST['mair_comm']) && !empty($_POST['gair_comm']) && !empty($_POST['aair_comm']) && !empty($_POST['moair_comm']) && !empty($_POST['gotv_comm']) && !empty($_POST['dstv_comm']) && !empty($_POST['star_comm']) && !empty($_POST['waec_comm']) && !empty($_POST['neco_comm']) && !empty($_POST['nabteb_comm']) && !empty($_POST['bills_comm']) && !empty($_POST['sms_comm'])){

$mdata_comm=mysqli_real_escape_string($con, $_POST['mdata_comm']);
$mcdata_comm=mysqli_real_escape_string($con, $_POST['mcdata_comm']);
$adata_comm=mysqli_real_escape_string($con, $_POST['adata_comm']);
$acdata_comm=mysqli_real_escape_string($con, $_POST['acdata_comm']);
$gdata_comm=mysqli_real_escape_string($con, $_POST['gdata_comm']);
$modata_comm=mysqli_real_escape_string($con, $_POST['modata_comm']);
$mair_comm=mysqli_real_escape_string($con, $_POST['mair_comm']);
$gair_comm=mysqli_real_escape_string($con, $_POST['gair_comm']);
$aair_comm=mysqli_real_escape_string($con, $_POST['aair_comm']);
$moair_comm=mysqli_real_escape_string($con, $_POST['moair_comm']);
$gotv_comm=mysqli_real_escape_string($con, $_POST['gotv_comm']);
$dstv_comm=mysqli_real_escape_string($con, $_POST['dstv_comm']);
$star_comm=mysqli_real_escape_string($con, $_POST['star_comm']);
$waec_comm=mysqli_real_escape_string($con, $_POST['waec_comm']);
$neco_comm=mysqli_real_escape_string($con, $_POST['neco_comm']);
$nabteb_comm=mysqli_real_escape_string($con, $_POST['nabteb_comm']);
$bills_comm=mysqli_real_escape_string($con, $_POST['bills_comm']);
$sms_comm=mysqli_real_escape_string($con, $_POST['sms_comm']);

$update=mysqli_query($con, "UPDATE web_settings SET mdata_comm='$mdata_comm', mcdata_comm='$mcdata_comm', adata_comm='$adata_comm', acdata_comm='$acdata_comm', gdata_comm='$gdata_comm', modata_comm='$modata_comm', mair_comm='$mair_comm', gair_comm='$gair_comm', aair_comm='$aair_comm', moair_comm='$moair_comm', gotv_comm='$gotv_comm', dstv_comm='$dstv_comm', star_comm='$star_comm', waec_comm='$waec_comm', neco_comm='$neco_comm', nabteb_comm='$nabteb_comm', bills_comm='$bills_comm', sms_comm='$sms_comm' WHERE id='1'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => 'Your website commission has been successfully updated !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when updating web commission !!!</div>',
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