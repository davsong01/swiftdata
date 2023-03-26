<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtnsme_500,mtnsme_1, mtnsme_2, mtnsme_3, mtnsme_5, mtnsme_10 FROM mtnsmedata_plan WHERE id='$level'"));

$mtnsme_500=$data_query[0];
$mtnsme_1=$data_query[1];
$mtnsme_2=$data_query[2];
$mtnsme_3=$data_query[3];
$mtnsme_5=$data_query[4];
$mtnsme_10=$data_query[5];


?>