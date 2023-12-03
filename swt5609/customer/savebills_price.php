<?php
require("session_controller.php");

if (!empty($_POST['level'])) {
  $abuja = mysqli_real_escape_string($con, $_POST['abuja']);
  $eko = mysqli_real_escape_string($con, $_POST['eko']);
  $ibadan = mysqli_real_escape_string($con, $_POST['ibadan']);
  $ikeja = mysqli_real_escape_string($con, $_POST['ikeja']);
  $jos = mysqli_real_escape_string($con, $_POST['jos']);
  $kano = mysqli_real_escape_string($con, $_POST['kano']);
  $kaduna = mysqli_real_escape_string($con, $_POST['kaduna']);
  $portharcourt = mysqli_real_escape_string($con, $_POST['portharcourt']);
  $benin = mysqli_real_escape_string($con, $_POST['benin']);
  $enugu = mysqli_real_escape_string($con, $_POST['enugu']);
  $aba = mysqli_real_escape_string($con, $_POST['aba']);

  $abuja_discount = mysqli_real_escape_string($con, $_POST['abuja_discount']);
  $eko_discount = mysqli_real_escape_string($con, $_POST['eko_discount']);
  $ibadan_discount = mysqli_real_escape_string($con, $_POST['ibadan_discount']);
  $ikeja_discount = mysqli_real_escape_string($con, $_POST['ikeja_discount']);
  $jos_discount = mysqli_real_escape_string($con, $_POST['jos_discount']);
  $kano_discount = mysqli_real_escape_string($con, $_POST['kano_discount']);
  $kaduna_discount = mysqli_real_escape_string($con, $_POST['kaduna_discount']);
  $portharcourt_discount = mysqli_real_escape_string($con, $_POST['portharcourt_discount']);
  $benin_discount = mysqli_real_escape_string($con, $_POST['benin_discount']);
  $enugu_discount = mysqli_real_escape_string($con, $_POST['enugu_discount']);
  $aba_discount = mysqli_real_escape_string($con, $_POST['aba_discount']);

  $level = mysqli_real_escape_string($con, $_POST['level']);
  try {
    //data from database
    $update = mysqli_query($con, "UPDATE bills_planlists SET abuja='$abuja', eko='$eko', ibadan='$ibadan', ikeja='$ikeja', jos='$jos', kano='$kano', kaduna='$kaduna', portharcourt='$portharcourt', benin='$benin', enugu='$enugu', abuja_discount='$abuja_discount', eko_discount='$eko_discount', ibadan_discount='$ibadan_discount', ikeja_discount='$ikeja_discount', jos_discount='$jos_discount', kano_discount='$kano_discount', kaduna_discount='$kaduna_discount', portharcourt_discount='$portharcourt_discount', benin_discount='$benin_discount', enugu_discount='$enugu_discount',aba_discount='$aba_discount', aba='$aba' WHERE id='$level'");
  } catch (\Exception $e) {
    $response = array(
      'status' => 'fail',
      'message' =>  $e->getMessage(),
    );

    echo json_encode($response);
    exit();
    // throw new \Exception('Error: ' . $e->getMessage());
  }

  if ($update) {
    $response = array(
      'status' => 'success',
      'message' => 'Your bills charges has been successfully updated !!!',
    );
    echo json_encode($response);
    exit();
  } else {
    $response = array(
      'status' => 'fail',
      'message' => 'Critical error occur when updating price !!!',
    );
    echo json_encode($response);
    exit();
  }
} else {
  $response = array(
    'status' => 'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();
}

?>
