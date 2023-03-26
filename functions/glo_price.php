<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_105,glo_29, glo_41, glo_58, glo_77, glo_10, glo_1325, glo_1825, glo_295, glo_50, glo_93  FROM glodata_plan WHERE id='$level'"));

$glo_105=$data_query[0];
$glo_29=$data_query[1];
$glo_41=$data_query[2];
$glo_58=$data_query[3];
$glo_77=$data_query[4];
$glo_10=$data_query[5];
$glo_1325=$data_query[6];
$glo_1825=$data_query[7];
$glo_295=$data_query[8];
$glo_50=$data_query[9];
$glo_93=$data_query[10];

?>