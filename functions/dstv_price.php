<?php
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT dstv_1,dstv_2, dstv_3, dstv_4, dstv_5, dstv_6, dstv_7, dstv_8, dstv_9, dstv_10, dstv_11,dstv_12 FROM dstv_planlist WHERE id='$level'"));

$dstv_padi=$data_query[0];
$dstv_yanga=$data_query[1];
$dstv_confam=$data_query[2];
$dstv_padi_extra=$data_query[3];
$dstv_yanga_extra=$data_query[4];
$dstv_asia=$data_query[5];
$dstv_confam_extra=$data_query[6];
$dstv_compact=$data_query[7];
$dstv_compact_plus=$data_query[8];
$dstv_extra_view=$data_query[9];
$dstv_premium=$data_query[10];
$dstv_premium_asia=$data_query[11];

?>