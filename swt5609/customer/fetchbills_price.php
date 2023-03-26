<?php
require ("session_controller.php");
$level=$_GET['load_id'];

require ("../../functions/bills_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>ABUJA CHARGES</label>
<input type="hidden" value="'.$level.'" id="level" name="level">
<input type="tel" id="abuja" class="form-control" value="'.$abuja.'" required>
</div>

<br/>
<div>
<label>EKO CHARGES</label>
<input type="text" id="eko" class="form-control" value="'.$eko.'" required>
</div>

<br/>
<div>
<label>IBADAN CHARGES</label>
<input type="text" id="ibadan" class="form-control" value="'.$ibadan.'" required>
</div>

<br/>
<div>
<label>JOS CHARGES</label>
<input type="text" id="jos" class="form-control" value="'.$jos.'" required>
</div>

<br/>
<div>
<label>KADUNA CHARGES</label>
<input type="text" id="kaduna" class="form-control" value="'.$kaduna.'" required>
</div>

<br/>
<div>
<label>KANO CHARGES</label>
<input type="text" id="kano" class="form-control" value="'.$kano.'" required>
</div>

<br/>
<div>
<label>PORTHARCOURT CHARGES</label>
<input type="text" id="portharcourt" class="form-control" value="'.$portharcourt.'" required>
</div>

<br/>
<div>
<label>JOS CHARGES</label>
<input type="text" id="ikeja" class="form-control" value="'.$ikeja.'" required>
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