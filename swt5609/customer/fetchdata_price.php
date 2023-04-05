<?php
require ("session_controller.php");
$searc_level=$_GET['load_id'];

if ($searc_level=="mtnsme1" || $searc_level=="mtnsme2" || $searc_level=="mtnsme3" || $searc_level=="mtnsme4"){

if ($searc_level=="mtnsme1"){$level=1;}
if ($searc_level=="mtnsme2"){$level=2;}
if ($searc_level=="mtnsme3"){$level=3;}
if ($searc_level=="mtnsme4"){$level=4;}

require ("../../functions/mtnsme_price.php");

$message='

<form method="POST" id="form_submit">

<div>
<label>MTN SME 500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mtnsme_500" class="form-control" value="'.$mtnsme_500.'" required>
</div>

<br/>
<div>
<label>MTN SME 1GB</label>
<input type="tel" id="mtnsme_1" class="form-control" value="'.$mtnsme_1.'" required>
</div>

<br/>
<div>
<label>MTN SME 2GB</label>
<input type="tel" id="mtnsme_2" class="form-control" value="'.$mtnsme_2.'" required>
</div>

<br/>
<div>
<label>MTN SME 3GB</label>
<input type="tel" id="mtnsme_3" class="form-control" value="'.$mtnsme_3.'" required>
</div>

<br/>
<div>
<label>MTN SME 5GB</label>
<input type="tel" id="mtnsme_5" class="form-control" value="'.$mtnsme_5.'" required>
</div>

<br/>
<div>
<label>MTN SME 10GB</label>
<input type="tel" id="mtnsme_10" class="form-control" value="'.$mtnsme_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMTNSME()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///////MTNSME PRICE END

if ($searc_level=="mtncg1" || $searc_level=="mtncg2" || $searc_level=="mtncg3" || $searc_level=="mtncg4"){
    if ($searc_level=="mtncg1"){$level=1;}
    if ($searc_level=="mtncg2"){$level=2;}
    if ($searc_level=="mtncg3"){$level=3;}
    if ($searc_level=="mtncg4"){$level=4;}

    if($api_gift == 'easy_access_data.php'){
        $type = 'data';
        $product = 'mtn-cg';
        require("../../api/easy_access_pricing.php");
        $message = '<form method="POST" id="submit_form">
        <input type="hidden" value="' . $level . '" id="level">';
        
        foreach($response as $res){
            $message .= '<div>
                            <label>' . $res['name'] . '</label>
                           
                            <input type="number" id="' . $res['id'] . '" class="form-control" value="' . $res['price'] . '" required>
                        </div><br>';
        }
                
        $message.='<button class="btn btn-success" type="button" onclick="saveMTNCG()">Save</button></form>';
    }else{
         require ("../../functions/mtncg_price.php");

        $message='

        <form method="POST" id="submit_form">

        <div>
        <label>MTN CG 500MB</label>
        <input type="hidden" value="'.$level.'" id="level">
        <input type="tel" id="mtncg_500" class="form-control" value="'.$mtncg_500.'" required>
        </div>

        <br/>
        <div>
        <label>MTN CG 1GB</label>
        <input type="tel" id="mtncg_1" class="form-control" value="'.$mtncg_1.'" required>
        </div>

        <br/>
        <div>
        <label>MTN CG 2GB</label>
        <input type="tel" id="mtncg_2" class="form-control" value="'.$mtncg_2.'" required>
        </div>

        <br/>
        <div>
        <label>MTN CG 3GB</label>
        <input type="tel" id="mtncg_3" class="form-control" value="'.$mtncg_3.'" required>
        </div>

        <br/>
        <div>
        <label>MTN CG 5GB</label>
        <input type="tel" id="mtncg_5" class="form-control" value="'.$mtncg_5.'" required>
        </div>

        <br/>
        <div>
        <label>MTN CG 10GB</label>
        <input type="tel" id="mtncg_10" class="form-control" value="'.$mtncg_10.'" required>
        </div>

        <br/>
        <button class="btn btn-success" type="button" onclick="saveMTNCG()">Save</button>

        </form>
        ';
    }
   
    $response=array(
    'status' => 'success',
    'data' => $message,
    );

    echo json_encode($response);
    exit();
}
///MTNCG PRICE END
// AIRTEL CG START
if ($searc_level == "airtelcg1" || $searc_level == "airtelcg2" || $searc_level == "airtelcg3" || $searc_level == "airtelcg4") {

    if ($searc_level == "airtelcg1") {
        $level = 1;
    }
    if ($searc_level == "airtelcg2") {
        $level = 2;
    }
    if ($searc_level == "airtelcg3") {
        $level = 3;
    }
    if ($searc_level == "airtelcg4") {
        $level = 4;
    }

    if ($api_airtelcg == 'easy_access_data.php') {
        $type = 'data';
        $product = 'airtel-cg';
        require("../../api/easy_access_pricing.php");
        $message = '<form method="POST" id="submit_form">
        <input type="hidden" value="' . $level . '" id="level">';

        foreach ($response as $res) {
            $message .= '<div><label>' . $res['name'] . '</label><input type="number" id="' . $res['id'] . '" class="form-control" value="' . $res['price'] . '" required></div><br>';
        }

        $message .= '<button class="btn btn-success" type="button" onclick="saveAIRTELCG()">Save</button></form>';
    } else {
        require("../../functions/airtelcg_price.php");

        $message = '
        <form method="POST" id="submit_form">
        <div>
        <label>AIRTEL 100MB</label>
        <input type="hidden" value="' . $level . '" id="level">
        <input type="tel" id="airtelcg_100" class="form-control" value="' . $airtelcg_100 . '" required>
        </div>

        <br/>
        <div>
        <label>AIRTEL 300MB</label>
        <input type="tel" id="airtelcg_300" class="form-control" value="' . $airtelcg_300 . '" required>
        </div>

        <br/>
        <div>
        <label>AIRTEL 500MB</label>
        <input type="tel" id="airtelcg_500" class="form-control" value="' . $airtelcg_500 . '" required>
        </div>

        <br/>
        <div>
        <label>AIRTEL 1.0GB</label>
        <input type="tel" id="airtelcg_1" class="form-control" value="' . $airtelcg_1 . '" required>
        </div>

        <br/>
        <div>
        <label>AIRTEL 2.0GB</label>
        <input type="tel" id="airtelcg_2" class="form-control" value="' . $airtelcg_2 . '" required>
        </div>

        <br/>
        <div>
        <label>AIRTEL 5.0GB</label>
        <input type="tel" id="airtelcg_5" class="form-control" value="' . $airtelcg_5 . '" required>
        </div>
        <br/>

        <br/>
        <button class="btn btn-success" type="button" onclick="saveAIRTELCG()">Save</button>

        </form>
        ';

        $response = array(
            'status' => 'success',
            'data' => $message,
        );

        echo json_encode($response);
        exit();
    }

    $response = array(
        'status' => 'success',
        'data' => $message,
    );

    echo json_encode($response);
    exit();
}
// AIRTEL CG END
if ($searc_level=="glo1" || $searc_level=="glo2" || $searc_level=="glo3" || $searc_level=="glo4"){

if ($searc_level=="glo1"){$level=1;}
if ($searc_level=="glo2"){$level=2;}
if ($searc_level=="glo3"){$level=3;}
if ($searc_level=="glo4"){$level=4;}

require ("../../functions/glo_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>GLO 1.05GB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="glo_105" class="form-control" value="'.$glo_105.'" required>
</div>

<br/>
<div>
<label>GLO 2.9GB</label>
<input type="tel" id="glo_29" class="form-control" value="'.$glo_29.'" required>
</div>

<br/>
<div>
<label>GLO 4.1GB</label>
<input type="tel" id="glo_41" class="form-control" value="'.$glo_41.'" required>
</div>

<br/>
<div>
<label>GLO 5.8GB</label>
<input type="tel" id="glo_58" class="form-control" value="'.$glo_58.'" required>
</div>

<br/>
<div>
<label>GLO 7.7GB</label>
<input type="tel" id="glo_77" class="form-control" value="'.$glo_77.'" required>
</div>

<br/>
<div>
<label>GLO 10GB</label>
<input type="tel" id="glo_10" class="form-control" value="'.$glo_10.'" required>
</div>

<br/>
<div>
<label>GLO 13.25GB</label>
<input type="tel" id="glo_1325" class="form-control" value="'.$glo_1325.'" required>
</div>

<br/>
<div>
<label>GLO 18.25GB</label>
<input type="tel" id="glo_1825" class="form-control" value="'.$glo_1825.'" required>
</div>

<br/>
<div>
<label>GLO 29.5GB</label>
<input type="tel" id="glo_295" class="form-control" value="'.$glo_295.'" required>
</div>

<br/>
<div>
<label>GLO 50GB</label>
<input type="tel" id="glo_50" class="form-control" value="'.$glo_50.'" required>
</div>

<br/>
<div>
<label>GLO 93GB</label>
<input type="tel" id="glo_93" class="form-control" value="'.$glo_93.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveGLO()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

////GLOPRICE END


if ($searc_level=="glocg1" || $searc_level=="glocg2" || $searc_level=="glocg3" || $searc_level=="glocg4"){

if ($searc_level=="glocg1"){$level=1;}
if ($searc_level=="glocg2"){$level=2;}
if ($searc_level=="glocg3"){$level=3;}
if ($searc_level=="glocg4"){$level=4;}

require ("../../functions/glocg_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>GLO 200MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="glocg_200" class="form-control" value="'.$glocg_200.'" required>
</div>

<br/>
<div>
<label>GLO 500MB</label>
<input type="tel" id="glocg_500" class="form-control" value="'.$glocg_500.'" required>
</div>

<br/>
<div>
<label>GLO 1GB</label>
<input type="tel" id="glocg_1" class="form-control" value="'.$glocg_1.'" required>
</div>

<br/>
<div>
<label>GLO 2GB</label>
<input type="tel" id="glocg_2" class="form-control" value="'.$glocg_2.'" required>
</div>

<br/>
<div>
<label>GLO 3GB</label>
<input type="tel" id="glocg_3" class="form-control" value="'.$glocg_3.'" required>
</div>

<br/>
<div>
<label>GLO 5GB</label>
<input type="tel" id="glocg_5" class="form-control" value="'.$glocg_5.'" required>
</div>

<br/>
<div>
<label>GLO 10GB</label>
<input type="tel" id="glocg_10" class="form-control" value="'.$glocg_10.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveGLOCG()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

////GLO-CG PRICE END

if ($searc_level=="airtel1" || $searc_level=="airtel2" || $searc_level=="airtel3" || $searc_level=="airtel3" || $searc_level=="airtel4"){

if ($searc_level=="airtel1"){$level=1;}
if ($searc_level=="airtel2"){$level=2;}
if ($searc_level=="airtel3"){$level=3;}
if ($searc_level=="airtel4"){$level=4;}

require ("../../functions/airtel_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>AIRTEL 750MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="airtel_750" class="form-control" value="'.$airtel_750.'" required>
</div>

<br/>
<div>
<label>AIRTEL 1.5GB</label>
<input type="tel" id="airtel_15" class="form-control" value="'.$airtel_15.'" required>
</div>

<br/>
<div>
<label>AIRTEL 2.0GB</label>
<input type="tel" id="airtel_2" class="form-control" value="'.$airtel_2.'" required>
</div>

<br/>
<div>
<label>AIRTEL 3.0GB</label>
<input type="tel" id="airtel_3" class="form-control" value="'.$airtel_3.'" required>
</div>

<br/>
<div>
<label>AIRTEL 4.5GB</label>
<input type="tel" id="airtel_45" class="form-control" value="'.$airtel_45.'" required>
</div>

<br/>
<div>
<label>AIRTEL 6.0GB</label>
<input type="tel" id="airtel_6" class="form-control" value="'.$airtel_6.'" required>
</div>
<br/>

<br/>
<div>
<label>AIRTEL 10GB</label>
<input type="tel" id="airtel_10" class="form-control" value="'.$airtel_10.'" required>
</div>

<br/>
<div>
<label>AIRTEL 11GB</label>
<input type="tel" id="airtel_11" class="form-control" value="'.$airtel_11.'" required>
</div>

<br/>
<div>
<label>AIRTEL 20GB</label>
<input type="tel" id="airtel_20" class="form-control" value="'.$airtel_20.'" required>
</div>

<br/>
<div>
<label>AIRTEL 40GB</label>
<input type="tel" id="airtel_40" class="form-control" value="'.$airtel_40.'" required>
</div>

<br/>
<div>
<label>AIRTEL 75GB</label>
<input type="tel" id="airtel_75" class="form-control" value="'.$airtel_75.'" required>
</div>

<br/>
<div>
<label>AIRTEL 120GB</label>
<input type="tel" id="airtel_120" class="form-control" value="'.$airtel_120.'" required>
</div>


<br/>
<button class="btn btn-success" type="button" onclick="saveAIRTEL()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}
//AIRTEL-GIFT PRICE END

if ($searc_level=="airtelcg1" || $searc_level=="airtelcg2" || $searc_level=="airtelcg3" || $searc_level=="airtelcg4"){

if ($searc_level=="airtelcg1"){$level=1;}
if ($searc_level=="airtelcg2"){$level=2;}
if ($searc_level=="airtelcg3"){$level=3;}
if ($searc_level=="airtelcg4"){$level=4;}

require ("../../functions/airtelcg_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>AIRTEL 100MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="airtelcg_100" class="form-control" value="'.$airtelcg_100.'" required>
</div>

<br/>
<div>
<label>AIRTEL 300MB</label>
<input type="tel" id="airtelcg_300" class="form-control" value="'.$airtelcg_300.'" required>
</div>

<br/>
<div>
<label>AIRTEL 500MB</label>
<input type="tel" id="airtelcg_500" class="form-control" value="'.$airtelcg_500.'" required>
</div>

<br/>
<div>
<label>AIRTEL 1.0GB</label>
<input type="tel" id="airtelcg_1" class="form-control" value="'.$airtelcg_1.'" required>
</div>

<br/>
<div>
<label>AIRTEL 2.0GB</label>
<input type="tel" id="airtelcg_2" class="form-control" value="'.$airtelcg_2.'" required>
</div>

<br/>
<div>
<label>AIRTEL 5.0GB</label>
<input type="tel" id="airtelcg_5" class="form-control" value="'.$airtelcg_5.'" required>
</div>
<br/>

<br/>
<button class="btn btn-success" type="button" onclick="saveAIRTELCG()">Save</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

///AIRTELCG PRICE END

if ($searc_level=="mobile1" || $searc_level=="mobile2" || $searc_level=="mobile3" || $searc_level=="mobile4"){

if ($searc_level=="mobile1"){$level=1;}
if ($searc_level=="mobile2"){$level=2;}
if ($searc_level=="mobile3"){$level=3;}
if ($searc_level=="mobile4"){$level=4;}

require ("../../functions/mobile_price.php");

$message='

<form method="POST" id="submit_form">

<div>
<label>9MOBILE  500MB</label>
<input type="hidden" value="'.$level.'" id="level">
<input type="tel" id="mobile_500" class="form-control" value="'.$mobile_500.'" required>
</div>

<br/>
<div>
<label>9MOBILE  1.5GB</label>
<input type="tel" id="mobile_15" class="form-control" value="'.$mobile_15.'" required>
</div>

<br/>
<div>
<label>9MOBILE  2.0GB</label>
<input type="tel" id="mobile_2" class="form-control" value="'.$mobile_2.'" required>
</div>

<br/>
<div>
<label>9MOBILE  3.0GB</label>
<input type="tel" id="mobile_3" class="form-control" value="'.$mobile_3.'" required>
</div>

<br/>
<div>
<label>9MOBILE  4.5GB</label>
<input type="tel" id="mobile_45" class="form-control" value="'.$mobile_45.'" required>
</div>


<br/>
<div>
<label>9MOBILE  11GB</label>
<input type="tel" id="mobile_11" class="form-control" value="'.$mobile_11.'" required>
</div>

<br/>
<div>
<label>9MOBILE  15GB</label>
<input type="tel" id="mobile_150" class="form-control" value="'.$mobile_150.'" required>
</div>

<br/>
<div>
<label>9MOBILE  40GB</label>
<input type="tel" id="mobile_40" class="form-control" value="'.$mobile_40.'" required>
</div>

<br/>
<div>
<label>9MOBILE  75GB</label>
<input type="tel" id="mobile_75" class="form-control" value="'.$mobile_75.'" required>
</div>

<br/>
<button class="btn btn-success" type="button" onclick="saveMOBILE()">Save</button>

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