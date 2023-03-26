<?php
require("../../functions/web_config.php");

// Check use has no active status
$checkactive = "select * from user_token where user_id='$_SESSION[userid]' and status=1";
$result = mysqli_query($con, $checkactive);
$row = mysqli_fetch_array($result);
if ($row['token'] != $_SESSION['token']) {
     session_unset();
     session_destroy();
     header('location:../login?access=0');
     exit();
    // header('location: login.php'); // Redirect User to Logout Page to destroy session
}
?>