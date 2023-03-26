<?php
session_start();
require("../../functions/web_config.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['req_token'])){

$username=strtoupper(mysqli_real_escape_string($con, $_POST['username']));
$password=mysqli_real_escape_string($con, $_POST['password']);
$req_token=mysqli_real_escape_string($con, $_POST['req_token']);

$check_username=mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE admin_token='$username'");

if (mysqli_num_rows($check_username)>0){

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE admin_token='$username'"));

if (password_verify($password, $return_info['password'])){

    $_SESSION['LAST_ACTIVITY']=$_SERVER['REQUEST_TIME'];
    $_SESSION['admin_token']=$return_info['admin_token'];
    $_SESSION['username']=$return_info['username'];
    $_SESSION['admin_sid']=$return_info['admin_sid'];

 $response=array(
    'status'=>'success',
    'redirect' => 'dashboard',
    'message' => 'Login successful !!!',
  );
  echo json_encode($response);
  exit();
 }

 else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid username or password</div>',
  );
  echo json_encode($response);
  exit();

 }

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Access denied. Sorry you may not be a verified staff !!!</div>',
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