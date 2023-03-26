<?php
session_start();
require("../../functions/web_config.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['email']) && !empty($_POST['req_token'])){

$email=strtolower(mysqli_real_escape_string($con, $_POST['email']));
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$check_email=mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($check_email)>0){

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email='$email'"));
 $users_sid=$return_info['users_sid'];


     $reset_link=$mainpage.'/resetpassword?email='.$email.'&hashtoken='.$return_info['users_sid'].'';
     $subject = "Your Password Recovery Link Has Arrived";
     $body ='<p>Hello '.$return_info['username'].'!</p>';
     $body .='<p>Your request for password reset was successful. Click the link below to reset your password'.'<br/>'.$reset_link.'<br/><br/><b>If you did not request for Password Recovery, kindly notify us on '.$contact_no.'. immediately.<b><hr/><br>Warm Regards. ('.$sitename.')<br/></p>';

     $email_to =$email;
     $email_from =$mail_username; // Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $mailSend=mail($email_to, $subject, $body, $headers);

if ($mailSend){

 $response=array(
    'status'=>'success',
    'message' => '<div class="alert alert-success text-left">Thank you for reaching to us. Password recover link has been forwarded to your email !!!</div>',
  );
  echo json_encode($response);
  exit();
 }

 else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Fatal error occur when pushing recovery mail to your address !!!</div>',
  );
  echo json_encode($response);
  exit();

 }

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">This email is not register here or might be transfer !!!</div>',
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