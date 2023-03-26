<?php
session_start();
require("../../functions/web_config.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['full_name']) && !empty($_POST['username']) && !empty($_POST['mobile_no']) && !empty($_POST['email_address']) && !empty($_POST['password']) && !empty($_POST['req_token']) && !empty($_POST['myrefferal'])){

$full_name=mysqli_real_escape_string($con, $_POST['full_name']);
$mobile_no=mysqli_real_escape_string($con, $_POST['mobile_no']);
$email_address=trim(strtolower(mysqli_real_escape_string($con, $_POST['email_address'])));
$myrefferal=mysqli_real_escape_string($con, $_POST['myrefferal']);
$username=trim(strtoupper(mysqli_real_escape_string($con, $_POST['username'])));
$password=mysqli_real_escape_string($con, $_POST['password']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$check_username=mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
$check_email=mysqli_query($con, "SELECT email FROM users WHERE email='$email_address'");
$check_refby=mysqli_query($con, "SELECT username FROM users WHERE username='$myrefferal'");


if (strlen($mobile_no)>11 || strlen($mobile_no)<11){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use a valid mobile no. !!!</div>',
  );
  echo json_encode($response);
  exit();

}

else {

  if (mysqli_num_rows($check_email)>0){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Email has already been used!!!</div>',
  );
  echo json_encode($response);
  exit();

  }

else if (mysqli_num_rows($check_username)>0){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Username has already been used!!!</div>',
  );
  echo json_encode($response);
  exit();

  }

else if (mysqli_num_rows($check_refby)<1){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid referral code !!!</div>',
  );
  echo json_encode($response);
  exit();

  }

else if (strlen($password)<5){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use a strong password !!!</div>',
  );
  echo json_encode($response);
  exit();
}

/*
else if ($password1 != $password2){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Password entered not match !!!</div>',
  );
  echo json_encode($response);
  exit();
}
*/

else {

     $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
     $time=$dateTime->format("d-M-y  h:i A");
     $users_sid=md5(uniqid().time().rand(10000000, 90000000));
     $hashpassword=md5($password);
     $sk_token=md5($email_address).uniqid();
     $f_emailaddress=str_replace("'", "", $email_address);
     $f_username=str_replace("'", "", $username);

    $createUser = mysqli_query($con, "INSERT INTO `users` (`id`, `full_name`, `ref_code`, `ref_by`, `mobile`, `username`, `password`, `wallets`, `cashback`, `block`, `users_sid`, `referral`, `level`, `last_login`, `email`, `sk_token`, `wema`, `acctname`, `rolez`, `sterling`, `fidelity`, `reg_date`, `status`, `mtnsme_access`, `mtncg_access`, `glo_access`, `airtel_access`, `airtelcg_access`, `mobile_access`, `cable_access`, `bills_access`, `epin_access`, `airtime_access`, `susbscription`, `webhook`, `security_pin`, `rating`, `reserved_account`) VALUES (NULL, '$full_name', '$f_username', '$myrefferal', '$mobile_no', '$f_username', '$hashpassword', '0', '0', '0', '$users_sid', '0', '1', '$time', '$f_emailaddress', '$sk_token', '', '', '', '', '', '$time', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '', '', '')");

if ($createUser){

    mysqli_query($con, "UPDATE users SET referral=referral+1 WHERE ref_code='".$myrefferal."'");

   // $_SESSION['username']=$username;
    //$_SESSION['users_sid']=$return_info['users_sid'];
    //$_SESSION['LAST_ACTIVITY']=$_SERVER['REQUEST_TIME'];

    $verify_link=$mainpage.'/verification?email='.$f_emailaddress.'&verifyid='.$users_sid.'';
    $subject = "Welcome To ".$sitename;
    $body  ='<p>Hello! '.$full_name.'</p>';
    $body .='<p>Ready to take your business to the next level ?<br/> You can unlock special perks by just purchasing Data Bundles, AirtimeVTU, Cable Subscription, Billspayment e.t.c. on '.$sitename.' <br/><b>To have you fully on our platform, click the link below to activate your account</b><br/>'.$verify_link.'<br/><br/>You Are Welcome,<br/>Your Customer Support at '.$sitename.'.</p>';

     $email_to = $f_emailaddress;
     $email_from =$mail_username; // Enter Sender Email

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $subject, $body, $headers);

 $response=array(
    'status'=>'success',
    'message' => '<div class="alert alert-success text-left">Welcome!!! Thank you for getting started with us. You can now confirm your email address and sign in.</div>',
  );
  echo json_encode($response);
  exit();


     }

    else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Error occur when creating account !!!</div>',
  );
  echo json_encode($response);
  exit();      
    }

}


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