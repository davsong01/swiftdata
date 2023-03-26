<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];
if ($searc_level=="g1"){

$level=1;
}
if ($searc_level=="g2"){

$level=2;
}

if ($searc_level=="g3"){

$level=3;
}

if ($searc_level=="g4"){

$level=4;
}

require ("../../functions/gotv_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>GOTV SUPA</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="gotv_1" class="form-control" value="'.$gotv_supa.'" required>
</div>

<br/>
<div>
<label>GOTV MAX</label>
<input type="tel" id="gotv_2" class="form-control" value="'.$gotv_max.'" required>
</div>

<br/>
<div>
<label>GOTV JOLLI</label>
<input type="tel" id="gotv_3" class="form-control" value="'.$gotv_jolli.'" required>
</div>

<br/>
<div>
<label>GOTV JINJA</label>
<input type="tel" id="gotv_4" class="form-control" value="'.$gotv_jinja.'" required>
</div>

<br/>
<div>
<label>GOTV SMALLIE</label>
<input type="tel" id="gotv_5" class="form-control" value="'.$gotv_smallie.'" required>
</div>



<br/>
<button class="btn btn-success" type="button" onclick="saveGotv()">Save</button>

</form>

';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();



?>