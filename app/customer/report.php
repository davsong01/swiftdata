<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['message_report']) && !empty($_POST['req_token'])){

$message=mysqli_real_escape_string($con, $_POST['message_report']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$message_tosave=str_replace("'", '', $message);
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

if (strlen($message)>10){


$save=mysqli_query($con, "INSERT INTO `vtuapp_report` (`id`, `email`, `message_body`, `message_date`, `req_token`) VALUES (NULL, '$email', '$message_tosave', '$time', '$req_token')");

if ($save){

     $subject = "New Message Has Arrived";
     $body =$email." Sent You A Message (".$message_tosave.')<br/><br/>';
     $body .='<p>Kindly attend to this message.'.'<br/></p>';

     $email_to =$admin_email;
     $email_from ="report@swiftdatang.com"; // Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $subject, $body, $headers);

 $response=array(
    'status'=>'success',
    'message' => 'Dear '.$fullname.'! Thank you for observation. Am glad to tell you that you message has been received and it will be look into in some minutes. Thank you for been part of our success.',
  );
  echo json_encode($response);
  exit();

}

else{


 $response=array(
    'status'=>'fail',
    'message' => 'An error occur when transferring your message to our customer support !!!',
  );
  echo json_encode($response);
  exit();

}

}

else{


 $response=array(
    'status'=>'fail',
    'message' => 'Please write in details to understand you !!!',
  );
  echo json_encode($response);
  exit();
}


}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please write a message !!!',
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