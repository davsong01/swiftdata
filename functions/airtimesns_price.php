<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_discount,glo_discount, airtel_discount, mobile_discount FROM airtimesns_plan WHERE id='$level'"));

$mtn_discount=$data_query[0];
$glo_discount=$data_query[1];
$airtel_discount=$data_query[2];
$mobile_discount=$data_query[3];


?>