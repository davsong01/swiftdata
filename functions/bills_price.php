<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT abuja,eko, ibadan, jos, kaduna, kano, portharcourt, ikeja FROM bills_planlists WHERE id='$level'"));

$abuja=$data_query[0];
$eko=$data_query[1];
$ibadan=$data_query[2];
$jos=$data_query[3];
$kaduna=$data_query[4];
$kano=$data_query[5];
$portharcourt=$data_query[6];
$ikeja=$data_query[7];


?>