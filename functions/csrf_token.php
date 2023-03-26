<?php 
session_start();
$_SESSION['csrftoken']=sha1(uniqid().mt_rand()); 
?>