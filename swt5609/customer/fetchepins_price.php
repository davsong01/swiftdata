<?php
require ("session_controller.php");
$level=$_GET['load_id'];

require ("../../functions/epins_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>WAEC</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="waec" class="form-control" value="'.$waec.'" required>
</div>

<br/>
<div>
<label>NECO</label>
<input type="tel" id="neco" class="form-control" value="'.$neco.'" required>
</div>

<br/>
<div>
<label>NABTEB</label>
<input type="tel" id="nabteb" class="form-control" value="'.$nabteb.'" required>
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