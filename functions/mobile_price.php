<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_500,mobile_15, mobile_2, mobile_3, mobile_45, mobile_11, mobile_150, mobile_40, mobile_75  FROM mobiledata_plan WHERE id='$level'"));

$mobile_500=$data_query[0];
$mobile_15=$data_query[1];
$mobile_2=$data_query[2];
$mobile_3=$data_query[3];
$mobile_45=$data_query[4];
$mobile_11=$data_query[5];
$mobile_150=$data_query[6];
$mobile_40=$data_query[7];
$mobile_75=$data_query[8];

?>