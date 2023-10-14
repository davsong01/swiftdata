<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="data"){

    $message='
    <div class="row">
        <form id="form-data">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="price-label">MTN-SME *</label>
                    <select class="form-control" id="mtnsme_data" required>
                    <option value="mtnsme_sms.php" ' . ($api_mtn == 'mtnsme_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                    <option value="mtnsme_don.php" ' . ($api_mtn == 'mtnsme_don.php' ? 'selected' : '') . '>DONLESON</option>
                    <option value="mtnsme_gon.php" ' . ($api_mtn == 'mtnsme_gon.php' ? 'selected' : '') . '>GONGOZDATA</option>
                    <option value="mtnsme_abum.php" ' . ($api_mtn == 'mtnsme_abum.php' ? 'selected' : '') . '>ABUMPAY-NG</option>
                    <option value="easy_access_data.php" ' . ($api_mtn == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">MTN-CG *</label>
                    <select class="form-control" id="mtncg_data" required>
                    <option value="mtncg_sms.php" ' . ($api_gift == 'mtncg_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                    <option value="gongzo_data.php" ' . ($api_gift == 'gongzo_data.php' ? 'selected' : '') . '>GONGOZDATA</option>
                    <option value="mtncg_don.php" ' . ($api_gift == 'mtncg_don.php' ? 'selected' : '') . '>DONLESON</option>
                    <option value="easy_access_data.php" ' . ($api_gift == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">MTN DATA CARD *</label>
                    <select class="form-control" id="mtn_data_card" required>
                        <option value="easy_access_data.php"' . ($mtn_data_card == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">GLO GIFTING *</label>
                    <select class="form-control" id="glo_data" required>

                    <option value="glo_sms.php"' . ($api_glo == 'glo_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                    <option value="glo_don.php"' . ($api_glo == 'glo_don.php' ? 'selected' : '') . '>DONLESON</option>
                    <option value="gongzo_data.php"' . ($api_glo == 'gongzo_data.php' ? 'selected' : '') . '>GONGOZDATA</option>
                    <option value="easy_access_data.php"' . ($api_glo == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">GLO-CG *</label>
                    <select class="form-control" id="glocg_data" required>

                    <option value="glocg_sms.php"' . ($api_glocg == 'glocg_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                    <option value="gongzo.php"' . ($api_glocg == 'gongzo.php' ? 'selected' : '') . '>GONGOZDATA</option>
                    <option value="glocg_don.php"' . ($api_glocg == 'glocg_don.php' ? 'selected' : '') . '>DONLESON</option>
                    <option value="easy_access_data.php"' . ($api_glocg == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">AIRTEL GIFTING *</label>
                    <select class="form-control" id="airtel_data" required>

                    <option value="airtel_sms.php"' . ($api_airtel == 'airtel_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                    <option value="airtel_don.php"' . ($api_airtel == 'airtel_don.php' ? 'selected' : '') . '>DONLESON</option>
                    <option value="gongzo_data.php"' . ($api_airtel == 'gongzo_data.php' ? 'selected' : '') . '>GONGOZDATA</option>
                    <option value="easy_access_data.php"' . ($api_airtel == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">AIRTEL-CG *</label>
                    <select class="form-control" id="airtelcg_data" required>
                        <option value="airtelcg_sms.php"' . ($api_airtelcg == 'airtelcg_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                        <option value="airtelcg_don.php"' . ($api_airtelcg == 'airtelcg_don.php' ? 'selected' : '') . '>DONLESON</option>
                        <option value="gongzo_data.php"' . ($api_airtelcg == 'gongzo_data.php' ? 'selected' : '') . '>GONGOZDATA</option>
                        <option value="easy_access_data.php"' . ($api_airtelcg == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">9MOBILE *</label>
                    <select class="form-control" id="mobile_data" required>
                        <option value="mobile_sms.php"' . ($api_mobile == 'mobile_sms.php' ? 'selected' : '') . '>BULKSMS</option>
                        <option value="mobile_don.php"' . ($api_mobile == 'mobile_don.php' ? 'selected' : '') . '>DONLESON</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">9MOBILE SME *</label>
                    <select class="form-control" id="mobile_sme" required>
                        <option value="easy_access_data.php"' . ($api_mobilesme == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">SPECTRANET DATA*</label>
                    <select class="form-control" id="api_spectranet" required>
                        <option value="vtpass_data.php"' . ($api_spectranet == 'vtpass_data.php' ? 'selected' : '') . '>VTPASS</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="price-label">SMILE DATA *</label>
                    <select class="form-control" id="api_smile" required>
                        <option value="vtpass_data.php"' . ($api_smile == 'vtpass_data.php' ? 'selected' : '') . '>VTPASS</option>
                    </select>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success price-label" type="button" onclick="saveDATA()">Save</button>
                </div>
            </div>
        </form>
    </div>
    
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
            <option value="airtimevtu_vtpass.php"' . ($api_mtn2 == 'airtimevtu_vtpass.php' ? 'selected' : '') . '>VTPASS</option>
            <option value="airtimevtu_host.php"' . ($api_mtn2 == 'airtimevtu_host.php' ? 'selected' : '') . '>SIMHOSTING</option>
        </select>

        <br/>
        <label>GLO *</label>
        <select class="form-control" id="glo_vtu" required>
            <option value="airtimevtu_vtpass.php"' . ($api_glo2 == 'airtimevtu_vtpass.php' ? 'selected' : '') . '>VTPASS</option>
            <option value="airtimevtu_host.php"' . ($api_glo2 == 'airtimevtu_host.php' ? 'selected' : '') . '>SIMHOSTING</option>
        </select>

        <br/>
        <label>AIRTEL *</label>
        <select class="form-control" id="airtel_vtu" required>

        <option value="airtimevtu_vtpass.php"' . ($api_airtel2== 'airtimevtu_vtpass.php' ? 'selected' : '') . '>VTPASS</option>
        <option value="airtimevtu_host.php"' . ($api_airtel2== 'airtimevtu_host.php' ? 'selected' : '') . '>SIMHOSTING</option>
        </select>

        <br/>
        <label>9MOBILE *</label>
        <select class="form-control" id="mobile_vtu" required>

        <option value="airtimevtu_vtpass.php"' . ($api_mobile2== 'airtimevtu_vtpass.php' ? 'selected' : '') . '>VTPASS</option>
        <option value="airtimevtu_host.php"' . ($api_mobile2 == 'airtimevtu_host.php' ? 'selected' : '') . '>SIMHOSTING</option>
        </select>
        <br/>
        <label>SMILE *</label>
        <select class="form-control" id="smile_vtu" required>

        <option value="vtpass_data.php"' . ($api_smile_vtu == 'vtpass_data.php' ? 'selected' : '') . '>VTPASS</option>
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

if ($searc_level=="data_card"){

    $message='
    <form id="form-data">
        <div>
            <label>MTN *</label>
            <select class="form-control" id="mtn_data_card" required>
                <option value="easy_access_data.php"' . ($api_mtn_data_card == 'easy_access_data.php' ? 'selected' : '') . '>EASY ACCESS</option>
            </select>
        </div><br>
    <button class="btn btn-success" type="button" onclick="saveDATACARD()">Save</button>

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

if ($searc_level=="sms"){
    $message='
    <form id="form-data">
        <label>SMS *</label> 
        <select class="form-control" id="sms" required>

        <option value="sms_ebulksms.php"' . ($sms_api == 'sms_ebulksms.php' ? 'selected' : '') . '>EBULK SMS</option>
        <option value="sms_bulksmsnigeria.php"' . ($sms_api == 'sms_bulksmsnigeria.php' ? 'selected' : '') . '>SMS BULK NIGERIA</option>
        </select>

       <br>
    <button class="btn btn-success" type="button" onclick="saveSMS()">Save</button>

    </form>
    ';

    $response=array(
    'status' => 'success',
    'data' => $message,
    );

    echo json_encode($response);
    exit();
}

if ($searc_level=="education"){
    $message= '
    <form id="form-data">
        <label>WAEC *</label> 
        <select class="form-control" id="waec" required>
        <option value="easyaccess.php"' . ($api_waec == 'easyaccess.php' ? 'selected' : '') . '>EASY ACCESS</option>
        <option value="naijaresultpins.php"' . ($api_waec == 'naijaresultpins.php' ? 'selected' : '') . '>NAIJA RESULTS PINS</option>
        </select>

        <br/>
        <label>WAEC REGISTRATION PIN *</label>
        <select class="form-control" id="waec_registration" required>
        <option value="vtpasseducation.php"' . ($api_waec_registration == 'vtpasseducation.php.php' ? 'selected' : '') . '>VTPASS</option>
        <option value="naijaresultpins.php"' . ($api_waec_registration == 'naijaresultpins.php' ? 'selected' : '') . '>NAIJA RESULTS PINS</option>

        </select>

        <br/>
        <label>NECO *</label>
        <select class="form-control" id="neco" required>
        <option value="easyaccess.php"' . ($api_neco == 'easyaccess.php' ? 'selected' : '') . '>EASY ACCESS</option>
        <option value="naijaresultpins.php"' . ($api_neco == 'naijaresultpins.php' ? 'selected' : '') . '>NAIJA RESULTS PINS</option>

        </select>

        <br/>
        <label>NABTEB *</label>
        <select class="form-control" id="nabteb" required>
        <option value="easyaccess.php"' . ($api_nabteb == 'easyaccess.php' ? 'selected' : '') . '>EASY ACCESS</option>
        <option value="naijaresultpins.php"' . ($api_nabteb == 'naijaresultpins.php' ? 'selected' : '') . '>NAIJA RESULTS PINS</option>

        </select>
        <br/>
        <label>NBAIS *</label>
        <select class="form-control" id="nbais" required>
        <option value="naijaresultpins.php"' . ($api_nbais == 'naijaresultpins.php' ? 'selected' : '') . '>NAIJA RESULTS PINS</option>

        </select>
        <br/>
    <button class="btn btn-success" type="button" onclick="saveEducation()">Save</button>

    </form>
    ';

    $response=array(
        'status' => 'success',
        'data' => $message,
    );

    echo json_encode($response);
    exit();
}

// if ($searc_level == "payment_gateway") {
//     $message = '
//     <form id="form-data">
//         <label>PAYMENT GATEWAY *</label> 
//         <select class="form-control" id="patment_gateway" required>
//         <option value="monnify"' . ($api_payment_gateway == 'monnify' ? 'selected' : '') . '>MONNIFY</option>
//         <option value="payvessel"' . ($api_payment_gateway == 'payvessel' ? 'selected' : '') . '>PAYVESSEL</option>
//         </select>

//         <br/>
       
//     <button class="btn btn-success" type="button" onclick="savePaymentGateway()">Save</button>

//     </form>
//     ';

//     $response = array(
//         'status' => 'success',
//         'data' => $message,
//     );

//     echo json_encode($response);
//     exit();
// }

////SNSLOCK END

?>