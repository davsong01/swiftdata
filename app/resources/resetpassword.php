<?php
session_start();
require("../../functions/web_config.php");

if (!empty($_POST['password2']) && !empty($_POST['password1']) && !empty($_POST['email']) && !empty($_POST['hash'])){

$password2=mysqli_real_escape_string($con, $_POST['password2']);
$password1=mysqli_real_escape_string($con, $_POST['password1']);
$email=mysqli_real_escape_string($con, $_POST['email']);
$hash=mysqli_real_escape_string($con, $_POST['hash']);

$check_data=mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND users_sid='$hash'");

if (mysqli_num_rows($check_data)>0){


 if (strlen($password1)<5){

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please use a strong password !!!</div>',
  );
  echo json_encode($response);
  exit();


 }

else {

  if ($password1 == $password2){

$hashpass=md5($password1);
$newhash=md5(uniqid().time().rand(1000000, 90000000));

$update = mysqli_query($con, "UPDATE users SET password='$hashpass', users_sid='$newhash' WHERE email='$email'");

if ($update){

 $response=array(
    'status'=>'success',
    'message' => '<div class="alert alert-success text-left">Your password has been reset successfully !!!</div>',
  );
  echo json_encode($response);
  exit();

}

else {

   $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-success text-left">Error occour while resetting password !!!</div>',
  );
  echo json_encode($response);
  exit();
}

  }

  else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Password entered not match !!!</div>',
  );
  echo json_encode($response);
  exit();

  }
}


}


else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid token has been detected !!!</div>',
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


?>