<?php
require ("session_controller.php");
$data=$_GET['data'];

if ($data != ""){

$message='
<form id="form-data">


<div>
<label>Email Address:</label>
<input type="text" id="" value="'.$data.'" class="form-control" required>
<input type="hidden" id="api_email" value="'.$data.'" class="form-control" required>
</div>

<br/>

    <label>ACCESS TO MTN-SME *</label>
    <select class="form-control" id="access_mtnsme" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MTN-CG *</label>
    <select class="form-control" id="access_mtncg" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO GLO *</label>
    <select class="form-control" id="access_glo" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO AIRTEL *</label>
    <select class="form-control" id="access_airtel" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO AIRTEL-CG *</label>
    <select class="form-control" id="access_airtelcg" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO 9MOBILE *</label>
    <select class="form-control" id="access_mobile" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO AIRTIME *</label>
    <select class="form-control" id="access_airtime" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO CABLTV *</label>
    <select class="form-control" id="access_cable" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO BILLS *</label>
    <select class="form-control" id="access_bills" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO E-PINS *</label>
    <select class="form-control" id="access_epin" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveUPDATEAPI()">UPDATE</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();

}
?>