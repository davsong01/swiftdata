<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gotv_1,gotv_2, gotv_3, gotv_4, gotv_5 FROM gotv_planlist WHERE id='$level'"));

$gotv_supa=$data_query[0];
$gotv_max=$data_query[1];
$gotv_jolli=$data_query[2];
$gotv_jinja=$data_query[3];
$gotv_smallie=$data_query[4];


?>