<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="data"){

$message='
<form id="form-data">
    <label>MTN-SME *</label>
    <select class="form-control" id="mtnsme_data" required>

    <option value="mtnsme_sms.php">BULKSMS</option>
    <option value="mtnsme_don.php">DONLESON</option>
    <option value="mtnsme_gon.php">GONGOZDATA</option>
    <option value="mtnsme_abum.php">ABUMPAY-NG</option>
    </select>

    <br/>
    <label>MTN-CG *</label>
    <select class="form-control" id="mtncg_data" required>

    <option value="mtncg_sms.php">BULKSMS</option>
    <option value="mtncg_don.php">DONLESON</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_data" required>

    <option value="glo_sms.php">BULKSMS</option>
    <option value="glo_don.php">DONLESON</option>
    <option value="glo_gon.php">GONGOZDATA</option>
    </select>
    
    <br/>
    <label>GLO-CG *</label>
    <select class="form-control" id="glocg_data" required>

    <option value="glocg_sms.php">BULKSMS</option>
    <option value="glocg_don.php">DONLESON</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_data" required>

    <option value="airtel_sms.php">BULKSMS</option>
    <option value="airtel_don.php">DONLESON</option>
    <option value="airtel_gon.php">GONGOZDATA</option>
    </select>

    <br/>
    <label>AIRTEL-CG *</label>
    <select class="form-control" id="airtelcg_data" required>

    <option value="airtelcg_sms.php">BULKSMS</option>
    <option value="airtelcg_don.php">DONLESON</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_data" required>

    <option value="mobile_sms.php">BULKSMS</option>
    <option value="mobile_don.php">DONLESON</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveDATA()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////DATA END

if ($searc_level=="vtu"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_vtu" required>

    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_vtu" required>

    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_vtu" required>

    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_vtu" required>

    <option value="airtimevtu_vtpass.php">VTPASS</option>
    <option value="airtimevtu_host.php">SIMHOSTING</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveVTU()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
///VTULOCK END

if ($searc_level=="sns"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_sns" required>

    <option value="airtimesns_sms.php">BULKSMS</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveSNS()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

////SNSLOCK END

?>