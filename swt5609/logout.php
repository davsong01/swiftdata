<?php
require("session_controller.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$lastlogin=$dateTime->format("d-M-y  h:i A"); 
$newhash=md5(uniqid().mt_rand().time());
mysqli_query($con, "UPDATE vtuapp_admin SET lastseen='$lastlogin', admin_sid='$newhash' WHERE username='".$_SESSION['username']."'");

session_unset();
session_destroy();
header("location:index");


?>