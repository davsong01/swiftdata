<?php
require("session_controller.php");

$message="";

$getCommentsxx=mysqli_query($con, "SELECT user_id, chat_msg, chat_date, chat_read, chat_email, chat_name FROM vtuapp_livechat WHERE chat_mode='USER' ORDER BY id DESC LIMIT 100");

if (mysqli_num_rows($getCommentsxx)<1){

$message = '
<div class="alert alert-danger">
<h4>No Chat Initiated Yet !!!
</div>';

}

else{
 while ($getComments=mysqli_fetch_array($getCommentsxx, MYSQLI_ASSOC)) {

       if ($getComments['chat_read'] == 1){$actmode='alert-success';$btnmode='<button class="btn btn-success" id="'.$getComments['user_id'].'" onclick="AddReply(this.id)">Add Reply</button>';}
       else {$actmode='alert-danger';$btnmode='<button class="btn btn-danger" id="'.$getComments['user_id'].'" onclick="AddReply(this.id)">Add Reply</button>';}

$message .= '
<div class="alert '.$actmode.'">
Name: '.$getComments['chat_name'].'<br/>
Email: '.$getComments['chat_email'].'<br/>
Date: '.$getComments['chat_date'].'<br/>
Message: '.$getComments['chat_msg'].'<br/>
'.$btnmode.'
</div>';
 }

}

echo $message; 

?>