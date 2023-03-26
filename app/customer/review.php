<?php
require("session_controller.php");

if (!empty($_POST['rate_comment'])){

$rate_comment=mysqli_real_escape_string($con, $_POST['rate_comment']);

$rate_message=str_replace("'", "", $rate_comment);
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$save=mysqli_query($con, "INSERT INTO `vtuapp_rating` (`id`, `username`, `email`, `comment`, `date`) VALUES (NULL, '$username', '$email', '$rate_message', '$time')");
mysqli_query($con, "UPDATE vtuapp_customuser SET rating='1' WHERE id='$id' AND email='$email'");

if ($save){
    
     $subject = "New Review Has Arrived";
     $body =$email." Sent You A Review (".$rate_message.')<br/><br/>';
     $body .='<p>Kindly attend to this review.'.'<br/></p>';

     $email_to =$admin_email;
     $email_from ="review@swiftdatang.com";// Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $subject, $body, $headers);

 $response=array(
    'status'=>'success',
    'message' => 'Thank you for your review. We always happy to hear from you !!!',
  );
  echo json_encode($response);
  exit();
}

else{
   $response=array(
    'status'=>'fail',
    'message' => 'We encounter an error when submitting your review !!!',
  );
  echo json_encode($response);
  exit();
}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please write something about us !!!',
  );
  echo json_encode($response);
  exit();

}

?>