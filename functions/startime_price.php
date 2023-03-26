
<?php

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT star_1,star_2, star_3, star_4, star_5, star_6, star_7, star_8, star_9, star_10 FROM startime_planlist WHERE id='$level'"));

$nova_weekly=$data_query[0];
$nova_monthly=$data_query[1];
$basic_weekly=$data_query[2];
$basic_monthly=$data_query[3];
$smart_weekly=$data_query[4];
$smart_monthly=$data_query[5];
$classic_weekly=$data_query[6];
$classic_monthly=$data_query[7];
$super_weekly=$data_query[8];
$super_monthly=$data_query[9];

?>