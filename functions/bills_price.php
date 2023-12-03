<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT abuja,eko, ibadan, jos, kaduna, kano, portharcourt, ikeja,benin,enugu, abuja_discount,eko_discount, ibadan_discount, jos_discount, kaduna_discount, kano_discount, portharcourt_discount, ikeja_discount,benin_discount,enugu_discount,aba,aba_discount FROM bills_planlists WHERE id='$level'"));

$abuja=$data_query[0];
$eko=$data_query[1];
$ibadan=$data_query[2];
$jos=$data_query[3];
$kaduna=$data_query[4];
$kano=$data_query[5];
$portharcourt=$data_query[6];
$ikeja=$data_query[7];
$benin = $data_query[8];
$enugu= $data_query[9];

$abuja_discount=$data_query[10];
$eko_discount=$data_query[11];
$ibadan_discount=$data_query[12];
$jos_discount=$data_query[13];
$kaduna_discount=$data_query[14];
$kano_discount=$data_query[15];
$portharcourt_discount=$data_query[16];
$ikeja_discount = $data_query[17];
$benin_discount = $data_query[18];
$enugu_discount = $data_query[19];
$aba = $data_query[20];
$aba_discount = $data_query[21];

?>