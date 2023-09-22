<?php
    $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT waec,gce,neco,nabteb,waec_registration FROM epin_planlist WHERE id='$level'"));

    $waec=$data_query[0];
    $gce=$data_query[1];
    $neco=$data_query[2];
    $nabteb=$data_query[3];
    $waec_registration=$data_query[4];
?>