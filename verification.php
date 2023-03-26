<?php
require("functions/web_config.php");
$update_user=mysqli_query($con, "UPDATE users SET status='1' WHERE users_sid='".$_GET['verifyid']."' AND email='".$_GET['email']."'");
if ($update_user){

$newhash=md5(uniqid().mt_rand());

mysqli_query($con, "UPDATE users SET users_sid='$newhash' WHERE email='".$_GET['email']."'");

header("Location:login");

}

else{

	die("ERROR ACTIVATING ACCOUNT.");
}
?>