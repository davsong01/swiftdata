<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_rate,glo_rate, airtel_rate, mobile_rate FROM airtimeswap_plan WHERE id='$level'"));

$mtn_discount=$data_query[0];
$glo_discount=$data_query[1];
$airtel_discount=$data_query[2];
$mobile_discount=$data_query[3];


?>