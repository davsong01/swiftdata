<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtelcg_100,airtelcg_300, airtelcg_500, airtelcg_1, airtelcg_2, airtelcg_5  FROM airtelcgdata_plan WHERE id='$level'"));

$airtelcg_100=$data_query[0];
$airtelcg_300=$data_query[1];
$airtelcg_500=$data_query[2];
$airtelcg_1=$data_query[3];
$airtelcg_2=$data_query[4];
$airtelcg_5=$data_query[5];

?>