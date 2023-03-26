<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['bankName']) && !empty($_POST['accountNo'])){

$bankName=mysqli_real_escape_string($con, $_POST['bankName']);
$accountNo=mysqli_real_escape_string($con, $_POST['accountNo']);


if ($bankName=="access"){$bankCode='927';}//
if ($bankName=="citibank"){$bankCode='023';}//
if ($bankName=="diamond"){$bankCode='063';}//
if ($bankName=="ecobank"){$bankCode='050';}//
if ($bankName=="fidelity"){$bankCode='933';}//
if ($bankName=="firstbank"){$bankCode='011';}//
if ($bankName=="fcmb"){$bankCode='214';}//
if ($bankName=="gtb"){$bankCode='058';}//
if ($bankName=="heritage"){$bankCode='030';}//
if ($bankName=="keystone"){$bankCode='082';}//
if ($bankName=="polaris"){$bankCode='076';}//
if ($bankName=="providus"){$bankCode='101';}//
if ($bankName=="stanbic"){$bankCode='221';}//
if ($bankName=="standard"){$bankCode='068';}//
if ($bankName=="sterling"){$bankCode='232';}//
if ($bankName=="suntrust"){$bankCode='100';}//
if ($bankName=="union"){$bankCode='032';}//
if ($bankName=="uba"){$bankCode='033';}//
if ($bankName=="unity"){$bankCode='215';}//
if ($bankName=="wema"){$bankCode='035';}//
if ($bankName=="zenith"){$bankCode='057';}//

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://smeplug.ng/api/v1/transfer/resolveaccount',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "bank_code": "'.$bankCode.'",
  "account_number": "'.$accountNo.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: bearer 59d388720265e06e1367f5f1249d0f706a62a2c394b1afeda3fc034a4212c69d'
  ),
));
$response = curl_exec($curl);
$returninfo = json_decode($response);
$retstatus = $returninfo->status;
$retname = $returninfo->name;
$retmsg = $returninfo->msg;

if ($retstatus != "true"){

 $response=array(
  'status' => 'fail',
  'message' => $retmsg,
  'code' => $bankCode,
);
echo json_encode($response);
exit();
}

else {

 $response=array(
  'status' => 'success',
  'message' => $retname,
  'code' => $bankCode,
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

}
else{

 $response=array(
    'status'=>'fail',
    'message' => 'Something went wrong...',
  );
  echo json_encode($response);
  exit();
}

?>