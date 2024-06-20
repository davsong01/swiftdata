<?php
session_start();
require("../../functions/web_config.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['req_token'])){

  $username=strtolower(mysqli_real_escape_string($con, $_POST['username']));
  $password=mysqli_real_escape_string($con, $_POST['password']);
  $req_token=mysqli_real_escape_string($con, $_POST['req_token']);

  $check_username=mysqli_query($con, "SELECT * FROM users WHERE email='$username'");

if (mysqli_num_rows($check_username)<1){

  $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Invalid username or password !!!</div>',
  );
  echo json_encode($response);
  exit();

}

else {

$check_username=mysqli_query($con, "SELECT * FROM users WHERE email='$username' AND status='1'");

if (mysqli_num_rows($check_username)>0){

 $return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email='$username'"));

 if (md5($password) == $return_info['password']){
    $_SESSION['username']=$username;
    $_SESSION['users_sid']=$return_info['users_sid'];
    $_SESSION['LAST_ACTIVITY']=$_SERVER['REQUEST_TIME'];

    // Stop user from logging in on different devices
    $token=uniqid();  // Created Token  
    $platform = "website";
    $ip = $_SERVER['REMOTE_ADDR'];
    $date=date('d/m/Y h:i:s');
    $checktoken ="select count(*) from user_token where user_id='$return_info[id]' and status=1";
    $checktokenresult = mysqli_query($con, $checktoken);
    $checktokenrow = mysqli_fetch_array($checktokenresult);
    if ($checktokenrow[0] > 0) {
      mysqli_query($con, "update user_token set status=0 where user_id='$return_info[id]'");
    }
    mysqli_query($con, "insert into user_token (user_id,token,platform,ip,created_at,updated_at, status) values ('$return_info[id]','$token','$platform','$ip','$date','$date',1)");     // Insert new Token for Current Session
    $_SESSION['token'] = $token; // Store Token in Session Variable
    $_SESSION['userid'] = $return_info['id'];

    // Check use has no active status
    require("../../functions/checkSession.php");
    
    // $response = array(
    //   'status' => 'fail',
    //   'message' => $checktokenrow[0]. $token,
    //   'token' => $row['token'],
    //   'session_token'=> $_SESSION['token'],
    // );
    // echo json_encode($response);
    // exit();
    // $response = array(
    //   'status' => 'success',
    //   'redirect' => 'app',
    //   'message' => 'Welcome ttttt ' . $return_info['username'] . '',
    // );
    // echo json_encode($response);
    // End stop

 $response=array(
    'status'=>'success',
    'redirect' => 'app/dashboard',
    'message' => 'Welcome '.$return_info['username'].'',
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

else {

  $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please check your email and verify this account !!!</div>',
  );
  echo json_encode($response);
  exit(); 
}

}

}

else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
  );
  echo json_encode($response);
  exit();
}

}

else {

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Session expired. reload and try again...</div>',
  );
  echo json_encode($response);
  exit();
}

?>