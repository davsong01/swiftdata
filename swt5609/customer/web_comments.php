<?php
require("session_controller.php");

$message="";

$getCommentsxx=mysqli_query($con, "SELECT email, message_body, message_date FROM vtuapp_report ORDER BY id DESC LIMIT 100");

if (mysqli_num_rows($getCommentsxx)<1){

$message = '
<div class="alert alert-danger">
<h4>Not Complaints Yet !!!
</div>';

}

else{
 while ($getComments=mysqli_fetch_array($getCommentsxx, MYSQLI_ASSOC)) {

$message .= '
<div class="alert alert-info">
Email: '.$getComments['email'].'<br/>
Date: '.$getComments['message_date'].'<br/>
Message: '.$getComments['message_body'].'<br/>
</div>';
 }

}

echo $message; 

?>