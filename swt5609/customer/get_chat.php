<?php
require("session_controller.php");

$userid = $_GET['id'];
$message="";

 mysqli_query($con, "UPDATE vtuapp_livechat SET chat_read='1' WHERE user_id='$userid' AND chat_mode='USER'");
$getCommentsxx=mysqli_query($con, "SELECT id, user_id, chat_msg, chat_date, chat_read, chat_email, chat_name, chat_mode FROM vtuapp_livechat WHERE user_id='$userid' ORDER BY id ASC LIMIT 100");

if (mysqli_num_rows($getCommentsxx)<1){

$message = '
<div class="alert alert-danger">
<h4>No Chat Initiated Yet !!!
</div>';

}

else{
 while ($getComments=mysqli_fetch_array($getCommentsxx, MYSQLI_ASSOC)) {

       if ($getComments['chat_mode'] == 'USER'){$actmode='alert-warning';$btnmode='';}
       else {$actmode='alert-success';$btnmode='<button class="btn btn-danger" id="'.$getComments['id'].'" onclick="DelReply(this.id)">Delete Reply</button>';}

$message .= '
<div class="alert '.$actmode.'">
Name: '.$getComments['chat_name'].'<br/>
Date: '.$getComments['chat_date'].'<br/>
Message: '.$getComments['chat_msg'].'<br/>
'.$btnmode.'
</div>';
 }

}

echo $message; 

?>