<?php
  require("session_controller.php");

  $old_pin = mysqli_real_escape_string($con, $_POST['old_pin']);
  $req_token = mysqli_real_escape_string($con, $_POST['req_token']);


  if ($_SESSION['csrftoken'] == $_POST['req_token']){
    if(empty($req_token || empty($old_pin))){
      $response = array(
        'status' => 'fail',
        'message' => '<div class="alert alert-danger text-left">Please fill all fields !!!</div>',
      );
      echo json_encode($response);
      exit();
    }

    if ($old_pin != $security) {
      $response = array(
        'status' => 'fail',
        'message' => '<div class="alert alert-danger text-left">Incorrect old pin !!!</div>',
      );
      echo json_encode($response);
      exit();
    }

    if (!empty($req_token) && !empty($old_pin)){
      // Process pin reset
      $check_email = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

      if (mysqli_num_rows($check_email) > 0) {
        $token = md5($emailId) . rand(10,9999).base64_encode(date("Y/m/d"));
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));

        $expDate = date("Y-m-d H:i:s", $expFormat);
        $update = mysqli_query($con, "UPDATE users SET pin_reset_token='$token', pin_exp_date='$expDate' WHERE email='$email'");

        $subject = "Your PIN Reset Link Has Arrived";
        $body = '<p>Hello! ' . $full_name . '</p>';
        $reset_link =  $mainpage . "/confirm_reset_pin?token=" . $token;
        $body .= '<p style="line-height: 2.0;">Please <strong>login</strong> to your account on '.$sitename.' and click the button below to reset your security pin <br> <a class="btn btn-info" target="_blank" href="' . $reset_link . '" style="position: margin:5px; relative;margin-bottom:50px;color: #fff;font-weight: 500;padding: 8px 20px;font-size: 13px;line-height: 24px;letter-spacing: 0.01em;border-radius: 4px;border: 1px solid;transition: all .4s ease;background:#950eb3;text-align: center;white-space: nowrap;vertical-align: middle;text-decoration:none">RESET PIN</a><br/>If you did not request for a PIN change, kindly notify us on ' . $contact_no . '. immediately.<b><hr/><br>Warm Regards. (' . $sitename . ')<br/></p>';

        $email_to = $email;
        $email_from = $mail_username; // Enter Sender Email

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . $email_from . "\r\n" .
        'Reply-To: ' . $email_from . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        $mailSend = mail($email_to, $subject,
          $body,
          $headers
        );

      if ($mailSend) {
        $response = array(
          'status' => 'success',
          'message' => '<div class="alert alert-success text-left">Thank you for reaching to us. PIN reset link has been forwarded to your email !!!</div>',
        );
        echo json_encode($response);
        exit();
      } else {
        $response = array(
          'status' => 'fail',
          'message' => '<div class="alert alert-danger text-left">Fatal error occur when pushing PIN reset mail to your email address !!!</div>',
        );
        echo json_encode($response);
        exit();
      }
    } else {
      $response = array(
        'status' => 'fail',
        'message' => '<div class="alert alert-danger text-left">This email is not registered here !!!</div>',
      );
      echo json_encode($response);
      exit();
    }
    }

  }
?>