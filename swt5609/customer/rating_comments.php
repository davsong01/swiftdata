<?php
require("session_controller.php");

$message="";

$getCommentsxx=mysqli_query($con, "SELECT email, comment, date FROM vtuapp_rating ORDER BY id DESC LIMIT 100");

if (mysqli_num_rows($getCommentsxx)<1){

$message = '
<div class="alert alert-danger">
<h4>Not Reveiw Yet !!!
</div>';

}

else{
 while ($getComments=mysqli_fetch_array($getCommentsxx, MYSQLI_ASSOC)) {

$message .= '
<div class="alert" style="background-color:grey;color:#fff">
Email: '.$getComments['email'].'<br/>
Date: '.$getComments['date'].'<br/>
Message: '.$getComments['comment'].'<br/>
</div>';
 }

}

echo $message; 

?>