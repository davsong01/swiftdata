<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['business_type']) && !empty($_POST['business_name']) && !empty($_POST['business_email']) && !empty($_POST['business_line']) && !empty($_POST['business_content'])){

$business_type=strtoupper(mysqli_real_escape_string($con, $_POST['business_type']));
$business_name=mysqli_real_escape_string($con, $_POST['business_name']);
$business_email=mysqli_real_escape_string($con, $_POST['business_email']);
$business_line=mysqli_real_escape_string($con, $_POST['business_line']);
$business_content=mysqli_real_escape_string($con, $_POST['business_content']);


if (strlen($business_content)>0){

if ($Account_Balance > $flyer_charge){

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=$dateTime->format("YmdHi");
$timestring=time();
$api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

$report = "Purchase of flyer for your ".$business_type." business has been received !!!";
$new_wallet = $Account_Balance-$flyer_charge;
mysqli_query($con, "UPDATE vtuapp_customuser SET wallets='$new_wallet' WHERE id='$id' AND email='$email'");

mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$email', '$username', 'FLYERS', '$flyer_charge', '$Account_Balance', '$new_wallet', '$report', 'SUCCESSFUL', '$time', '$timestring', 'WALLET', '$level', '$api_reference', '$api_reference', 'DONE', '0', '0','0')");

     $subject = "A New Business Has Arrived !!!";
     $body ='<p>Hello Admin !</p>';
     $body .='<p>My Name Is '.$fullname.'!</p>';
     $body .='<p>I just proccess a request for flyers for my business and here is my information below.</p>';
     $body .='<p>Business Name: '.$business_name.'!</p>';
     $body .='<p>Business Type: '.$business_type.'!</p>';
     $body .='<p>Business Email: '.$business_email.'!</p>';
     $body .='<p>Business Lines: '.$business_line.'!</p>';
     $body .='<p>Business Content: '.$business_content.'!</p>';

     $email_to =$admin_email;
     $email_from =$mail_username; // Enter Sender Email

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $mailSend=mail($email_to, $subject, $body, $headers);

if ($mailSend){

 $response=array(
 	'title' => 'COMPLETED',
 	'icon' => 'success',
    'status'=>'success',
    'message' => $report,
  );

echo json_encode($response);
exit();

}

else{

 $response=array(
 	'title' => 'FAILED',
 	'icon' => 'error',
    'status'=>'fail',
    'message' => 'Error occur when submitting request for business flyers.',
  );

echo json_encode($response);
exit();

}

}

else{


 $response=array(
    'status'=>'fail',
    'message' => 'Insufficient balance, please try again.',
  );
  echo json_encode($response);
  exit();


}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please write a full content about your business !!!</div>',
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