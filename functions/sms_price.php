<?php
$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT sms_price FROM bulksms_plan WHERE id='$level'"));
$sms_price=$data_query[0];
?>