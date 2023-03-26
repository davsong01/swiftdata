<?php
require("../../functions/web_config.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$_GET['transaction_id']."/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer ".$flutterwave_sk.""
  ),
));
$response = curl_exec($curl);
curl_close($curl);

    $result = json_decode($response, true);
    $status2=$result['status'];
    $amountpaid=$result['data']['amount'];
    $tx_ref=$result['data']['tx_ref'];
    $paidemail=$result['data']['customer']['email'];
    
    
     $aa1=$amountpaid*2;
     $aa2=$aa1/100;
     $aa3=ceil($amountpaid-$aa2);
     
     
if ($status2=="success" && $amountpaid !=0){
   
   $cx_trx=mysqli_query($con, "SELECT buyer_amount, sys_ref FROM final_transactions WHERE buyer_amount='".$aa3."' AND sys_ref='".$tx_ref."'");
   if (mysqli_num_rows($cx_trx)<1){

  $cbal = mysqli_fetch_array(mysqli_query($con, "SELECT wallets,email FROM vtuapp_customuser WHERE email='".$paidemail."'"));
     $oldbal = $cbal[0];
     $username=$cbal[1];

     $newbal=$oldbal+$aa3;
     mysqli_query($con, "UPDATE vtuapp_customuser SET wallets='".$newbal."' WHERE email='".$paidemail."'");

    $descr='ATM Wallet Funding';
    mysqli_query($con,"");

    header("location:../transactions");
    exit();

    }

 else{

 mysqli_query($con, "UPDATE vtuapp_customuser SET status='1' WHERE email='".$paidemail."'");
 exit();

 }
     }


    else {
        
         exit();
    }


?>