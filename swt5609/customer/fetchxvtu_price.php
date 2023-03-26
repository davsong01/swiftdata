<?php
require ("session_controller.php");
$level=$_GET['load_id'];

require ("../../functions/airtimexvtu_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>MTN RATE</label>
<input type="hidden" value="'.$level.'" id="level" name="level">
<input type="text" id="mtn_discount" class="form-control" value="'.$mtn_discount.'" required>
</div>

<br/>
<div>
<label>GLO RATE</label>
<input type="text" id="glo_discount" class="form-control" value="'.$glo_discount.'" required>
</div>

<br/>
<div>
<label>AIRTEL RATE</label>
<input type="text" id="airtel_discount" class="form-control" value="'.$airtel_discount.'" required>
</div>

<br/>
<div>
<label>9MOBILE RATE</label>
<input type="text" id="mobile_discount" class="form-control" value="'.$mobile_discount.'" required>
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