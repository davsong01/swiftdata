<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtncg_500,mtncg_1, mtncg_2, mtncg_3, mtncg_5, mtncg_10 FROM mtncgdata_plan WHERE id='$level'"));

$mtncg_500=$data_query[0];
$mtncg_1=$data_query[1];
$mtncg_2=$data_query[2];
$mtncg_3=$data_query[3];
$mtncg_5=$data_query[4];
$mtncg_10=$data_query[5];

?>