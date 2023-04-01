<?php
require("../functions/autoload.php");
session_start();

$time=$_SERVER['REQUEST_TIME'];
$timeout_duration=1800;
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$lastlogin=$dateTime->format("d-M-y  h:i A"); 
$newhash=md5(uniqid().mt_rand());

// Check active
$checkactive = "select * from user_token where user_id='$_SESSION[userid]' and status=1";
$result = mysqli_query($con, $checkactive);

$row = mysqli_fetch_array($result);
if ($row['token'] != $_SESSION['token']) {
    session_unset();
    session_destroy();
    $login = $mainpage . '/login';
    var_dump($_SESSION['userid'], $checkactive, $login);
    header('Location:'.$login);
    exit();
    // header('location: login.php'); // Redirect User to Logout Page to destroy session
}
// Check active
$try_session=mysqli_query($con, "SELECT * FROM users WHERE email='".$_SESSION['username']."' AND users_sid='".$_SESSION['users_sid']."'");
    if (mysqli_num_rows($try_session)<1){
     session_unset();
     session_destroy();
     header('location:../login?access=0');
     exit();

    }

 else{

$return_data=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email='".$_SESSION['username']."'"));

$id=$return_data['id'];
$fullname=$return_data['full_name'];
$reg_date=$return_data['reg_date'];
$mobile=$return_data['mobile'];
$Account_Balance=$return_data['wallets'];
$Account_Bonus=$return_data['cashback'];
$kyc_update=$return_data['kyc_update'];
$webhook=$return_data['webhook'];
$username=$return_data['username'];
$email=$return_data['email'];
$status=$return_data['status'];
$block=$return_data['block'];
$sk_token=$return_data['sk_token'];
$level=$return_data['level'];
$ref_code=$return_data['ref_code'];
$rating=$return_data['rating'];
$admin_access = $return_data['admin_access'];
$admin_token = $return_data['admin_token'];
$security=$return_data['security_pin'];

$acctname=$return_data['acctname'];
$wema=$return_data['wema'];
$rolez=$return_data['rolez'];
$sterling=$return_data['sterling'];
$fidelity=$return_data['fidelity'];
$reserved_account=$return_data['reserved_account'];

 }

if ($sk_token==""){

$newsk_token=md5($email).uniqid();
mysqli_query($con, "UPDATE users SET sk_token='$newsk_token' WHERE email='".$_SESSION['username']."'");
}

if ($status==0){

session_unset();
session_destroy();
header("location:../login");
}

if ($block==1){

session_unset();
session_destroy();
header("location:../login");
}

if (isset($_SESSION['LAST_ACTIVITY']) && ($time-$_SESSION['LAST_ACTIVITY']) > $timeout_duration){

    mysqli_query($con, "UPDATE users SET users_sid='$newhash', last_login='$lastlogin' WHERE email='".$_SESSION['username']."'");

    session_unset();
    session_destroy();
    header("location:../login");
}


?>