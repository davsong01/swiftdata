<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];
if ($searc_level=="s1"){

$level=1;
}
if ($searc_level=="s2"){

$level=2;
}

if ($searc_level=="s3"){

$level=3;
}

if ($searc_level=="s4"){

$level=4;
}

require ("../../functions/startime_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>NOVA WEEKLY</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="star_1" class="form-control" value="'.$nova_weekly.'" required>
</div>

<br/>
<div>
<label>NOVA MONTHLY</label>
<input type="tel" id="star_2" class="form-control" value="'.$nova_monthly.'" required>
</div>

<br/>
<div>
<label>BASIC WEEKLY</label>
<input type="tel" id="star_3" class="form-control" value="'.$basic_weekly.'" required>
</div>

<br/>
<div>
<label>BASIC MONTHLY</label>
<input type="tel" id="star_4" class="form-control" value="'.$basic_monthly.'" required>
</div>

<br/>
<div>
<label>SMART WEEKLY</label>
<input type="tel" id="star_5" class="form-control" value="'.$smart_weekly.'" required>
</div>

<br/>
<div>
<label>SMART MONTHLY</label>
<input type="tel" id="star_6" class="form-control" value="'.$smart_monthly.'" required>
</div>

<br/>
<div>
<label>CLASSIC WEEKLY</label>
<input type="tel" id="star_7" class="form-control" value="'.$classic_weekly.'" required>
</div>

<br/>
<div>
<label>CLASSIC MONTHLY</label>
<input type="tel" id="star_8" class="form-control" value="'.$classic_monthly.'" required>
</div>

<br/>
<div>
<label>SUPER WEEKLY</label>
<input type="tel" id="star_9" class="form-control" value="'.$super_weekly.'" required>
</div>

<br/>
<div>
<label>SUPER MONTHLY</label>
<input type="tel" id="star_10" class="form-control" value="'.$super_monthly.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveStar()">Save</button>

</form>

';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();



?>