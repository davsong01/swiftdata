<?php
    require("session_controller.php");
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $lastlogin=$dateTime->format("d-M-y  h:i A"); 
    $newhash=md5(uniqid().mt_rand());
    mysqli_query($con, "UPDATE users SET last_login='$lastlogin', users_sid='$newhash' WHERE email='".$_SESSION['username']."'" );

    session_unset();
    session_destroy();
    header("location:../login");

?>