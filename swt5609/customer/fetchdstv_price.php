<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];
if ($searc_level=="d1"){

$level=1;
}
if ($searc_level=="d2"){

$level=2;
}

if ($searc_level=="d3"){

$level=3;
}

if ($searc_level=="d4"){

$level=4;
}

require ("../../functions/dstv_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>DSTV PADI</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="dstv_1" class="form-control" value="'.$dstv_padi.'" required>
</div>

<br/>
<div>
<label>DSTV YANGA</label>
<input type="tel" id="dstv_2" class="form-control" value="'.$dstv_yanga.'" required>
</div>

<br/>
<div>
<label>DSTV CONFAM</label>
<input type="tel" id="dstv_3" class="form-control" value="'.$dstv_confam.'" required>
</div>

<br/>
<div>
<label>DSTV PAD EXTRA</label>
<input type="tel" id="dstv_4" class="form-control" value="'.$dstv_padi_extra.'" required>
</div>

<br/>
<div>
<label>DSTV YANGA EXTRA</label>
<input type="tel" id="dstv_5" class="form-control" value="'.$dstv_yanga_extra.'" required>
</div>

<br/>
<div>
<label>DSTv ASIA</label>
<input type="tel" id="dstv_6" class="form-control" value="'.$dstv_asia.'" required>
</div>

<br/>
<div>
<label>DSTV CONFAM EXTRA</label>
<input type="tel" id="dstv_7" class="form-control" value="'.$dstv_confam_extra.'" required>
</div>

<br/>
<div>
<label>DSTV COMPACT</label>
<input type="tel" id="dstv_8" class="form-control" value="'.$dstv_compact.'" required>
</div>

<br/>
<div>
<label>DSTV COMPACT PLUS</label>
<input type="tel" id="dstv_9" class="form-control" value="'.$dstv_compact_plus.'" required>
</div>

<br/>
<div>
<label>DSTV EXTRA VIEW</label>
<input type="tel" id="dstv_10" class="form-control" value="'.$dstv_extra_view.'" required>
</div>

<br/>
<div>
<label>DSTV PREMIUN</label>
<input type="tel" id="dstv_11" class="form-control" value="'.$dstv_premium.'" required>
</div>

<br/>
<div>
<label>DSTV PREMIUN ASIA</label>
<input type="tel" id="dstv_12" class="form-control" value="'.$dstv_premium_asia.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveDstv()">Save</button>

</form>

';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();



?>