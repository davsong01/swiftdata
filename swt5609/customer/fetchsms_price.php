<?php
require ("session_controller.php");
$level=$_GET['load_id'];

require ("../../functions/sms_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>SMS CHARGES</label>
<input type="hidden" value="'.$level.'" id="level" name="level">
<input type="text" id="sms_price" class="form-control" value="'.$sms_price.'" required>
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