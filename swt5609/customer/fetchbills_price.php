<?php
require ("session_controller.php");
$level=$_GET['load_id'];

require ("../../functions/bills_price.php");


$message= '
<form method="POST" id="submit_form">

<div class="row justify-content-center">
    <div class="col-md-6">
        <label>ABUJA CHARGES</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" id="abuja" class="form-control" value="' . $abuja . '" required>
    </div>
    <div class="col-md-6">
        <label>ABUJA DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" min="0" step=".01" id="abuja_discount" class="form-control" value="' . $abuja_discount . '" required>
    </div>
    <hr class="discount-line">
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>EKO CHARGES</label>
        <input type="number" id="eko" class="form-control" value="' . $eko . '" required>
    </div>
    <div class="col-md-6">
        <label>EKO DISCOUNT</label>
        <input type="number" step=".01" min="0" id="eko_discount" class="form-control" value="' . $eko_discount . '" required>
    </div>
    <hr class="discount-line">
<div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>IBADAN CHARGES</label>
        <input type="number" step=".01" min="0" id="ibadan" class="form-control" value="' . $ibadan . '" required>
    </div>
    <div class="col-md-6">
        <label>IBADAN DISCOUNT</label>
        <input type="number" step=".01" min="0" id="ibadan_discount" class="form-control" value="' . $ibadan_discount . '" required>
    </div>
    <hr class="discount-line">
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>JOS CHARGES</label>
        <input type="number" id="jos" class="form-control" value="' . $jos . '" required>
    </div>
    <div class="col-md-6">
        <label>JOS DISCOUNT</label>
        <input type="number" step=".01" min="0" id="jos_discount" class="form-control" value="' . $jos_discount . '" required>
    </div>
    <hr class="discount-line">
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>KADUNA CHARGES</label>
        <input type="number" id="kaduna" class="form-control" value="' . $kaduna . '" required>
    </div>
    <div class="col-md-6">
        <label>KADUNA DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="kaduna_discount" class="form-control" value="' . $kaduna_discount . '" required>
    </div>
    <hr class="discount-line">
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>KANO CHARGES</label>
        <input type="number" id="kano" class="form-control" value="' . $kano . '" required>
    </div>
    <div class="col-md-6">
        <label>KANO DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="kano_discount" class="form-control" value="' . $kano_discount . '" required>
    </div>
    <hr class="discount-line">
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>PORTHARCOURT CHARGES</label>
        <input type="number" id="portharcourt" class="form-control" value="' . $portharcourt . '" required>
    </div>
    <div class="col-md-6">
        <label>PORTHARCOURT DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="portharcourt_discount" class="form-control" value="' . $portharcourt_discount . '" required>
    </div>
    <hr class="discount-line">
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <label>JOS CHARGES</label>
        <input type="number" id="jos" class="form-control" value="' . $jos . '" required>
    </div>
    <div class="col-md-6">
        <label>JOS DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="jos_discount" class="form-control" value="' . $jos_discount . '" required>
    </div>
    <hr class="discount-line">
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <label>IKEJA CHARGES</label>
        <input type="number" id="ikeja" class="form-control" value="' . $ikeja . '" required>
    </div>
    <div class="col-md-6">
        <label>IKEJA DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="ikeja_discount" class="form-control" value="' . $ikeja_discount . '" required>
    </div>
    <hr class="discount-line">
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <label>BENIN CHARGES</label>
        <input type="number" id="benin" class="form-control" value="' . $benin . '" required>
    </div>
    <div class="col-md-6">
        <label>BENIN DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="benin_discount" class="form-control" value="' . $benin_discount . '" required>
    </div>
    <hr class="discount-line">
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <label>ENUGU CHARGES</label>
        <input type="number" id="enugu" class="form-control" value="' . $enugu . '" required>
    </div>
    <div class="col-md-6">
        <label>ENUGU DISCOUNT</label>
        <input type="hidden" value="' . $level . '" id="level" name="level">
        <input type="number" step=".01" min="0" id="enugu_discount" class="form-control" value="' . $enugu_discount . '" required>
    </div>
    <hr class="discount-line">
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