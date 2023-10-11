<?php
require ("session_controller.php");
$level=$_GET['load_id'];

require ("../../functions/epins_price.php");
// <label>GCE</label>
// <input type="hidden" value="' . $level . '" id="level">
// <input type="tel" id="gce" class="form-control" value="' . $gce . '" required>
// </div>

// <br/>
// <div>
$message='

<form method="POST" id="submit_form">

<div>
<label>WAEC</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="waec" class="form-control" value="'.$waec. '" required>
</div>
<br/>
<div>
<label>WAEC REGISTRATION PIN</label>
<input type="hidden" value="' . $level . '" id="level">
<input type="tel" id="waec_registration" class="form-control" value="' . $waec_registration . '" required>
</div>
<br/>
<div>

<label>NECO</label>
<input type="tel" id="neco" class="form-control" value="'.$neco.'" required>
</div>

<br/>
<div>
<label>NABTEB</label>
<input type="tel" id="nabteb" class="form-control" value="'.$nabteb. '" required>
</div>
<br/>
<div>
<label>NBAIS</label>
<input type="tel" id="nbais" class="form-control" value="' . $nbais . '" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveData()">Save</button>

</form>

';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();



?>