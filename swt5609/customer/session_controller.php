<?php
session_start();
require("../../functions/web_config.php");

$try_session=mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE admin_token='".$_SESSION['admin_token']."' AND admin_sid='".$_SESSION['admin_sid']."'");
    if (mysqli_num_rows($try_session)>0){


$return_data=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vtuapp_admin WHERE admin_token='".$_SESSION['admin_token']."'"));

$id=$return_data['id'];
$fullname=$return_data['full_name'];
$reg_date=$return_data['reg_date'];
$username=$return_data['username'];
$admin_email=$return_data['email'];
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

    }

 else{

header("location:../logout");
exit();
 }

?>