<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];
if ($searc_level=="sh1"){

$level=1;
}
if ($searc_level=="sh2"){
$level=2;
}

if ($searc_level=="sh3"){
$level=3;
}

if ($searc_level=="sh4"){
$level=4;
}

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT showmax1,showmax2, showmax3, showmax4,showmax_discount FROM showmax_planlist WHERE id='$level'"));

$full=$data_query[0];
$mobile_only=$data_query[1];
$sports_full=$data_query[2];
$sports_mobile_only = $data_query[3];
$showmax_discount=$data_query[4];

$message='

<form method="POST" id="submit_form">

<div>
<label>Showmax FULL</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="showmax1" class="form-control" value="'. $full.'" required>
</div>

<br/>
<div>
<label>Showmax Mobile Only</label>
<input type="tel" id="showmax2" class="form-control" value="'. $mobile_only.'" required>
</div>

<br/>
<div>
<label>Showmax Sports Full</label>
<input type="tel" id="showmax3" class="form-control" value="'.$sports_full.'" required>
</div>

<br/>
<div>
<label>Showmax Sports Mobile Only</label>
<input type="tel" id="showmax4" class="form-control" value="'.$sports_mobile_only. '" required>
</div>

<br/>
<div>
<label>SHOWMAX DISCOUNT</label>
<input type="number" min="0" step=".01" id="showmax_discount" class="form-control" value="' . $showmax_discount . '" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveShowmax()">Save</button>

</form>

';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();



?>