<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="datalock"){

$message='
<form id="form-data">
    <label>MTN-SME *</label>
    <select class="form-control" id="mtnsme_lock" required>
    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>MTN-CG *</label>
    <select class="form-control" id="mtncg_lock" required>
    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_lock" required>
    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>
    
    <br/>
    <label>GLO-CG *</label>
    <select class="form-control" id="glocg_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL-CG *</label>
    <select class="form-control" id="airtelcg_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE SME*</label>
    <select class="form-control" id="mobilesme_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveDATALOCK()">Save</button>

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

if ($searc_level=="vtulock"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_lock" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveVTULOCK()">Save</button>

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

if ($searc_level=="snslock"){

$message='
<form id="form-data">
    <label>MTN *</label>
    <select class="form-control" id="mtn_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>GLO *</label>
    <select class="form-control" id="glo_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>AIRTEL *</label>
    <select class="form-control" id="airtel_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>9MOBILE *</label>
    <select class="form-control" id="mobile_lock3" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveSNSLOCK()">Save</button>

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

if ($searc_level=="cablelock"){

$message='
<form id="form-data">
    <label>GOTV *</label>
    <select class="form-control" id="gotv" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>DSTV *</label>
    <select class="form-control" id="dstv" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>STARTIMES *</label>
    <select class="form-control" id="startime" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>SHOWMAX *</label>
    <select class="form-control" id="showmax" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveCABLELOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
//CABLELOCK END

if ($searc_level=="epinslock"){
$waec_status = isset($waec_lock) && $waec_lock == 1 ? ENABLED : DISABLED;
$waec_style = isset($waec_lock) && $waec_lock == 1 ? ENABLED : DISABLED;
$gce_status = isset($gce_lock) && $gce_lock == 1 ? ENABLED : DISABLED;
$gce_style = isset($gce_lock) && $gce_lock == 1 ? ENABLED : DISABLED;
$nab_status = isset($nabt_lock) && $nabt_lock == 1 ? ENABLED : DISABLED;
$nab_style = isset($nabt_lock) && $nabt_lock == 1 ? ENABLED : DISABLED;
$neco_status = isset($neco_lock) && $neco_lock == 1 ? ENABLED : DISABLED;
$neco_style = isset($neco_lock) && $neco_lock == 1 ? ENABLED : DISABLED;

$message='
<form id="form-data">
    <label>WAEC * <span class="'. $waec_style.'">('.$waec_status .')</span></label>
    <select class="form-control" id="waec" required>
    
    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
     <label>GCE * <span class="'. $gce_style.'">(' . $gce_status . ')</span></label>
    <select class="form-control" id="gce" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>NECO *<span class="'. $neco_style.'">(' . $neco_status . ')</span></label>
    <select class="form-control" id="neco" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>NABTEB * <span class="'. $nab_style.'">('.$nab_status .')</span></label>
    <select class="form-control" id="nabteb" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveEPINSLOCK()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///E-PINSLOCK END

if ($searc_level=="billslock"){

$message='
<form id="form-data">
    <label>ABUJA ELECTRIC *</label>
    <select class="form-control" id="abuja" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>EKO ELECTRIC *</label>
    <select class="form-control" id="eko" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>IBADAN ELECTRIC *</label>
    <select class="form-control" id="ibadan" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>IKEJA ELECTRIC *</label>
    <select class="form-control" id="ikeja" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>JOS ELECTRIC *</label>
    <select class="form-control" id="jos" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>KANO ELECTRIC *</label>
    <select class="form-control" id="kano" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>KADUNA ELECTRIC *</label>
    <select class="form-control" id="kaduna" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

      <br/>
    <label>PORTHA. ELECTRIC *</label>
    <select class="form-control" id="portharcourt" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>

    <br/>
    <label>BENIN ELECTRIC *</label>
    <select class="form-control" id="benin" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>
    <br/>
    <label>ENUGU ELECTRIC *</label>
    <select class="form-control" id="enugu" required>

    <option value="1">ENABLE</option>
    <option value="0">DISABLE</option>
    </select>
<button class="btn btn-success" type="button" onclick="saveBILLSLOCK()">Save</button>

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