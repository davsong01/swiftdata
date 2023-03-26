<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['black_mobile'])){

$black_mobile=mysqli_real_escape_string($con, $_POST['black_mobile']);

$check_mobile = mysqli_query($con, "SELECT add_mobile FROM blacklist_mobiles WHERE add_mobile='$black_mobile'");

if (mysqli_num_rows($check_mobile)<1){

  $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
  $time=$dateTime->format("d-M-y  h:i A");

$save_no = mysqli_query($con, "INSERT INTO `blacklist_mobiles` (`id`, `email`, `add_mobile`, `add_date`) VALUES (NULL, '$admin_email', '$black_mobile', '$time')");

if ($save_no){

 $response=array(
    'status'=>'success',
    'message' => $black_mobile.' has been successfully added to blacklist !!!',
  );
  echo json_encode($response);
  exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">Critical error occur when saving number to blacklist !!!</div>',
  );
  echo json_encode($response);
  exit();

}



}

else {

$response=array(
    'status'=>'fail',
    'message' => '<div class="alert alert-danger text-left">This mobile number already exist in blacklist table !!!</div>',
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