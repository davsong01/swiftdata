<?php
require("../functions/web_config.php");
session_start();

$time=$_SERVER['REQUEST_TIME'];
$timeout_duration=1800;
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$lastlogin=$dateTime->format("d-M-y  h:i A"); 
$newhash=md5(uniqid().mt_rand());

$try_session=mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE admin_token='".$_SESSION['admin_token']."' AND admin_sid='".$_SESSION['admin_sid']."'");
    if (mysqli_num_rows($try_session)<1){

     session_unset();
     session_destroy();
     header('location:index?access=0');
     exit();

    }

 else{

$return_data=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE admin_token='".$_SESSION['admin_token']."'"));

$id=$return_data['id'];
$type=$return_data['type'];
$fullname=$return_data['full_name'];
$reg_date=$return_data['reg_date'];
$username=$return_data['username'];
$email=$return_data['email'];
$status=$return_data['status'];
$finance=$return_data['finance'];
$manage_lock=$return_data['manage_lock'];
$manage_users = $return_data['manage_users'];
$manage_staff=$return_data['manage_staff'];
$manage_history = $return_data['manage_history'];
$manage_message=$return_data['manage_message'];
$manage_rating = $return_data['manage_rating'];
$manage_apiuser = $return_data['manage_apiuser'];
$manage_automation=$return_data['manage_automation'];
$manage_prices=$return_data['manage_prices'];
$admin_pin=$return_data['admin_pin'];
$manage_login=$return_data['manage_login'];

 }

if ($status=="BLOCK"){

session_unset();
session_destroy();
header("location:index");
}

if (isset($_SESSION['LAST_ACTIVITY']) && ($time-$_SESSION['LAST_ACTIVITY']) > $timeout_duration){

    mysqli_query($con, "UPDATE vtuapp_admin SET admin_sid='$newhash', lastseen='$lastlogin' WHERE admin_token='".$_SESSION['admin_token']."'");

    session_unset();
    session_destroy();
    header("location:index");
}


?>