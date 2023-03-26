<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glocg_200, glocg_500, glocg_1, glocg_2, glocg_3, glocg_5, glocg_10  FROM glocgdata_plan WHERE id='$level'"));

$glocg_200=$data_query[0];
$glocg_500=$data_query[1];
$glocg_1=$data_query[2];
$glocg_2=$data_query[3];
$glocg_3=$data_query[4];
$glocg_5=$data_query[5];
$glocg_10=$data_query[6];

?>