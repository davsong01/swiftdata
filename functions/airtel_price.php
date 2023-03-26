<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_750,airtel_15, airtel_2, airtel_3, airtel_45, airtel_6, airtel_10, airtel_11, airtel_20, airtel_40, airtel_75,airtel_120  FROM airteldata_plan WHERE id='$level'"));

$airtel_750=$data_query[0];
$airtel_15=$data_query[1];
$airtel_2=$data_query[2];
$airtel_3=$data_query[3];
$airtel_45=$data_query[4];
$airtel_6=$data_query[5];
$airtel_10=$data_query[6];
$airtel_11=$data_query[7];
$airtel_20=$data_query[8];
$airtel_40=$data_query[9];
$airtel_75=$data_query[10];
$airtel_120=$data_query[11];

?>