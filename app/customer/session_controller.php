<?php
session_start();
require("../../functions/web_config.php");

$try_session=mysqli_query($con, "SELECT * FROM users WHERE email='".$_SESSION['username']."' AND users_sid='".$_SESSION['users_sid']."'");
    if (mysqli_num_rows($try_session)>0){


$return_data=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email='".$_SESSION['username']."'"));

$id=$return_data['id'];
$fullname=$return_data['full_name'];
$reg_date=$return_data['reg_date'];
$mobile=$return_data['mobile'];
$password=$return_data['password'];
$Account_Balance=$return_data['wallets'];
$kyc_update=$return_data['kyc_update'];
$webhook=$return_data['webhook'];
$username=$return_data['username'];
$email=$return_data['email'];
$status=$return_data['status'];
$sk_token=$return_data['sk_token'];
$level=$return_data['level'];
$security=$return_data['security_pin'];
$myreferral=$return_data['ref_by'];
$referral_code=$return_data['ref_code'];

    }

 else{

header("location:../logout");
exit();
 }

?>