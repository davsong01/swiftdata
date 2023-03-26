<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']){

if (!empty($_POST['message_content'])){

$message_contentxx=mysqli_real_escape_string($con, $_POST['message_content']);

$message_content=htmlspecialchars($message_contentxx);

if (strlen($message_content)>0){

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$timexx=$dateTime->format("YmdHi");
$timestring=time();
$api_reference=strtoupper($timexx.uniqid().rand(10000, 90000));

$sendmsg = mysqli_query($con, "INSERT INTO `vtuapp_livechat` (`id`, `user_id`, `chat_msg`, `chat_date`, `chat_read`,`chat_mode`, `chat_email`, `chat_name`) VALUES (NULL, '$id', '$message_content', '$time', '0', 'USER', '$email', '$fullname')");

if ($sendmsg){

 $response=array(
    'status'=>'success',
    'message' => 'Message Sent',
  );

echo json_encode($response);
exit();

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Error occur when sending chat',
  );

echo json_encode($response);
exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please write a full message to understand you',
  );
  echo json_encode($response);
  exit();

}

}

else{

 $response=array(
    'status'=>'fail',
    'message' => 'Please write a message',
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