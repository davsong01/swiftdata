<?php
  require("session_controller.php");
  $old_password = mysqli_real_escape_string($con, $_POST['old_password']);
  $req_token = mysqli_real_escape_string($con, $_POST['req_token']);
  // mysqli_query($con, "UPDATE users SET password='$new_hashPassword' WHERE id='$id' AND email='$email'");

  if ($_SESSION['csrftoken'] != $_POST['req_token'] || empty($_POST['old_password'])) {
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Please fill all input !!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  if (md5($old_password) != $password){
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Incorrect password !!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  $token = md5($emailId) . rand(10, 9999);
  $expFormat = mktime(date("H"),date("i"),date("s"),date("m"),date("d") + 1,date("Y"));

  $expDate = date("Y-m-d H:i:s", $expFormat);
  $update = mysqli_query($con, "UPDATE users SET pass_reset_token='$token', pass_exp_date='$expDate' WHERE id='$id' AND email='$email'");
  
  $subject = "Your Password Recovery Link Has Arrived";
  $body = '<p>Hello! ' . $full_name . '</p>';
  $reset_link =  $mainpage . "/reset-password?token=".$token;
  $body .= '<p style="line-height: 2.0;">Please click the button below to reset your password <a class="btn btn-info" target="_blank" href="'. $reset_link. '" style="position: relative;color: #fff;font-weight: 500;padding: 8px 20px;font-size: 13px;line-height: 24px;letter-spacing: 0.01em;border-radius: 4px;border: 1px solid;transition: all .4s ease;background:#950eb3;text-align: center;white-space: nowrap;vertical-align: middle;text-decoration:none">RESET PASSWORD</a><br/>If you did not request for Password Recovery, kindly notify us via whatsapp on ' . $contact_no . '. immediately.<b><hr/><br>Warm Regards. (' . $sitename . ')<br/></p>';

  $email_to = $f_emailaddress;
  $email_from = $mail_username; // Enter Sender Email

  sendEmail($email, $from, $subject, $body);

  $response = array(
    'title' => 'COMPLETED',
    'icon' => 'success',
    'status' => 'success',
    'message' => 'Please check your email for a password reset link!!!',
  );
  echo json_encode($response);
  exit();

function sendEmail($to, $from, $subject, $body)
{
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: ' . $from . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $body, $headers);
}