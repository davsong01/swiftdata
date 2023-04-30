<?php
error_reporting(0);
$rtdata="";

if (!empty($_GET['services']) && !empty($_GET['level'])){
	require("../../../functions/web_config.php");

	$level=$_GET['level'];

	$getservices=strtolower($_GET['services']);

	if ($getservices=="mtn"){
		$type = 'data';
		$product = 'mtn';

		if($api_mtn == 'easy_access_data.php'){
			require('../../../api/easy_access_pricing.php');
		}else{
			require('../../../api/generic_pricing.php');
		}

		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';
				}
			}
		}

		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}
		// $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtnsme_500,mtnsme_1, mtnsme_2, mtnsme_3, mtnsme_5, mtnsme_10 FROM mtnsmedata_plan WHERE id='$level'"));

		// echo '
		// 	<option value="500">MTN SME 500MB - ₦'.$data_query[0].'</option>
		// 	<option value="1000">MTN-SME 1GB - ₦'.$data_query[1].'</option>
		// 	<option value="2000">MTN-SME 2GB - ₦'.$data_query[2].'</option>
		// 	<option value="3000">MTN-SME 3GB - ₦'.$data_query[3].'</option>
		// 	<option value="5000">MTN-SME 5GB - ₦'.$data_query[4].'</option>
		// 	<option value="10000">MTN-SME 10GB - ₦'.$data_query[5].'</option>
		// ';
	}

	if ($getservices=="mtn-cg"){
		$type = 'data';
		$product = 'mtn-cg';

		if($api_gift == 'easy_access_data.php'){
			require('../../../api/easy_access_pricing.php');
		}else{
			require('../../../api/generic_pricing.php');
		}

		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';
				}
			}
		}

		if(!empty($echo)){
			echo $echo;
		}else{
			echo '<option>No Available variations at the moment</option>';
		}
	}

	if ($getservices=="airtel-cg"){
		$type = 'data';
		$product = $getservices;
		if($api_airtelcg == 'easy_access_data.php'){
			require('../../../api/easy_access_pricing.php');
		}else{
			require('../../../api/generic_pricing.php');

			// $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtelcg_100,airtelcg_300, airtelcg_500, airtelcg_1, airtelcg_2, airtelcg_5  FROM airtelcgdata_plan WHERE id='$level'"));

			// $echo = '
			// 	<option value="601">AIRTEL-CG 100MB - ₦'.$data_query[0].'</option>
			// 	<option value="602">AIRTEL-CG 300MB - ₦'.$data_query[1].'</option>
			// 	<option value="603">AIRTEL-CG 500MB - ₦'.$data_query[2].'</option>
			// 	<option value="604">AIRTEL-CG 1GB - ₦'.$data_query[3].'</option>
			// 	<option value="605">AIRTEL-CG 2GB - ₦'.$data_query[4].'</option>
			// 	<option value="606">AIRTEL-CG 5GB - ₦'.$data_query[5].'</option>
			// ';
		}

		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';
				}
			}
		}
		
		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}

	}

	if ($getservices=="glo-cg"){
		$type = 'data';
		$product = 'glo-cg';
		if($api_glocg == 'easy_access_data.php'){
			require('../../../api/easy_access_pricing.php');
		}else{
			require('../../../api/generic_pricing.php');

			// $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glocg_200, glocg_500, glocg_1, glocg_2, glocg_3, glocg_5, glocg_10 FROM glocgdata_plan WHERE id='$level'"));
			// $echo = '
			// 	<option value="901">GLO-CG 200MB - ₦' . $data_query[0] . '</option>
			// 	<option value="902">GLO-CG 500MB - ₦' . $data_query[1] . '</option>
			// 	<option value="903">GLO-CG 1GB - ₦' . $data_query[2] . '</option>
			// 	<option value="904">GLO-CG 2GB - ₦' . $data_query[3] . '</option>
			// 	<option value="905">GLO-CG 3GB - ₦' . $data_query[4] . '</option>
			// 	<option value="906">GLO-CG 5GB - ₦' . $data_query[5] . '</option>
			// 	<option value="907">GLO-CG 10GB - ₦' . $data_query[6] . '</option>
			// ';
		}

		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';
				}
			}
		}
		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}
	}

	// 9 mobile sme
	if ($getservices == "mobile-sme") {
		$type = 'sme';
		$product = 'apimobile-sme';
		if ($api_mobilesme == 'easy_access_data.php') {
			require('../../../api/easy_access_pricing.php');
		} else {
			require('../../../api/generic_pricing.php');

		}

		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';
				}
			}
		}

		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}
	}

	if ($getservices == "mtn-datacard") {
		$type = 'datacard';
		$product = 'mtn-data-card';
		if ($mtn_data_card  == 'easy_access_data.php') {
			require('../../../api/easy_access_pricing.php');
		} else {
			require('../../../api/generic_pricing.php');
		}
		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option style="font-size: 11px" value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';

				}
			}
		}
		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}
	}

	if ($getservices=="glo"){
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_105,glo_29, glo_41, glo_58, glo_77, glo_10, glo_1325, glo_1825, glo_295, glo_50, glo_93  FROM glodata_plan WHERE id='$level'"));

		echo '
			<option value="201">GLO 1.05GB - ₦'.$data_query[0].'</option>
			<option value="202">GLO 2.9GB - ₦'.$data_query[1].'</option>
			<option value="203">GLO 4.1GB - ₦'.$data_query[2].'</option>
			<option value="204">GLO 5.8GB - ₦'.$data_query[3].'</option>
			<option value="205">GLO 7.7GB - ₦'.$data_query[4].'</option>
			<option value="206">GLO 10GB - ₦'.$data_query[5].'</option>
			<option value="207">GLO 13.25GB - ₦'.$data_query[6].'</option>
			<option value="208">GLO 18.25GB - ₦'.$data_query[7].'</option>
			<option value="209">GLO 29.5GB - ₦'.$data_query[8].'</option>
			<option value="210">GLO 50GB - ₦'.$data_query[9].'</option>
			<option value="211">GLO 93GB - ₦'.$data_query[10].'</option>
		';
	}

	if ($getservices=="airtel"){
		$type = 'data';
		$product = 'airtel';
		if ($api_airtel  == 'easy_access_data.php') {
			require('../../../api/easy_access_pricing.php');
		} else {
			require('../../../api/generic_pricing.php');
		}
		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option style="font-size: 11px" value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';

				}
			}
		}
		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}

	}

	if ($getservices=="9mobile"){
		$type = 'data';
		$product = '9mobile';
		if ($api_airtel  == 'easy_access_data.php') {
			require('../../../api/easy_access_pricing.php');
		} else {
			require('../../../api/generic_pricing.php');
		}
		if (isset($response) && !empty($response)) {
			foreach ($response as $res) {
				if (isset($res['price']) && $res['price'] > 0) {
					$echo .= '<option style="font-size: 11px" value="' . $res['code'] . '">' . $res['name'] . ' - ₦' . $res['price'] . '</option>';

				}
			}
		}
		if (!empty($echo)) {
			echo $echo;
		} else {
			echo '<option>No Available variations at the moment</option>';
		}
		
	}

/////////////// DATA ENDS

if ($getservices=="gotv"){
	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gotv_1,gotv_2, gotv_3, gotv_4, gotv_5 FROM gotv_planlist WHERE id='1'"));

	echo '
		<option value="600">Gotv Supa - ₦'.$data_query[0].'</option>
		<option value="601">Gotv Max - ₦'.$data_query[1].'</option>
		<option value="603">Gotv Jolli - ₦'.$data_query[2].'</option>
		<option value="602">Gotv Jinja - ₦'.$data_query[3].'</option>
		<option value="604">Gotv Smallie - ₦'.$data_query[4].'</option>
	';
}

if ($getservices=="startimes"){
	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT star_1,star_2, star_3, star_4, star_5, star_6, star_7, star_8, star_9, star_10 FROM startime_planlist WHERE id='1'"));

	echo '
		<option value="701">Nova Weekly - ₦'.$data_query[0].'</option>
		<option value="702">Nova Monthly - ₦'.$data_query[1].'</option>
		<option value="703">Basic Weekly - ₦'.$data_query[2].'</option>
		<option value="704">Basic Monthly - ₦'.$data_query[3].'</option>
		<option value="705">Smart Weekly - ₦'.$data_query[4].'</option>
		<option value="706">Smart Monthly - ₦'.$data_query[5].'</option>
		<option value="707">Classic Weekly - ₦'.$data_query[6].'</option>
		<option value="708">Classic Monthly - ₦'.$data_query[7].'</option>
		<option value="709">Super Weekly - ₦'.$data_query[8].'</option>
		<option value="710">Super Monthly - ₦'.$data_query[9].'</option>
	';
}

if ($getservices=="dstv"){
	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT dstv_1,dstv_2, dstv_3, dstv_4, dstv_5, dstv_6, dstv_7, dstv_8, dstv_9, dstv_10, dstv_11,dstv_12 FROM dstv_planlist WHERE id='1'"));

	echo '
		<option value="800">Dstv Padi - ₦'.$data_query[0].'</option>
		<option value="801">Dstv Yanga - ₦'.$data_query[1].'</option>
		<option value="802">Dstv Confam - ₦'.$data_query[2].'</option>
		<option value="803">Dstv Padi Extra - ₦'.$data_query[3].'</option>
		<option value="804">Dstv Yanga Extra - ₦'.$data_query[4].'</option>
		<option value="805">Dstv Asia - ₦'.$data_query[5].'</option>
		<option value="806">Dstv Confam Extra - ₦'.$data_query[6].'</option>
		<option value="807">Dstv Compact - N'.$data_query[7].'</option>
		<option value="808">Dstv Compact Plus - ₦'.$data_query[8].'</option>
		<option value="811">Dstv Extra View Access - ₦'.$data_query[9].'</option>
		<option value="809">Dstv Premium - ₦'.$data_query[10].'</option>
		<option value="810">Dstv Premium Asia - ₦'.$data_query[11].'</option>
	';
}

if ($getservices == "showmax") {
	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT showmax1,showmax2, showmax3, showmax4 FROM showmax_planlist WHERE id='1'"));

	echo '
		<option value="900">Showmax Full - ₦' . $data_query[0] . '</option>
		<option value="901">Showmax Mobile Only - ₦' . $data_query[1] . '</option>
		<option value="902">Showmax Sports Full - ₦' . $data_query[2] . '</option>
		<option value="903">Showmax Sports Mobile Only - ₦' . $data_query[3] . '</option>
	';
	}
/////////////////CABLTEV ENDS

//AIRTIME VTU-START

if ($getservices=="mtn-vtu"){

	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_discount FROM airtimevtu_plan WHERE id='$level'"));

	echo ''.$data_query[0].'
	';
}

if ($getservices=="glo-vtu"){

	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_discount FROM airtimevtu_plan WHERE id='$level'"));

	echo ''.$data_query[0].'
	';
}

if ($getservices=="airtel-vtu"){

	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_discount FROM airtimevtu_plan WHERE id='$level'"));

	echo ''.$data_query[0].'
	';
}

if ($getservices=="9mobile-vtu"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_discount FROM airtimevtu_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

///AIRTIME VTU-END


//AIRTIME SNS-START

if ($getservices=="mtn-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="glo-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="airtel-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="9mobile-sns"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_discount FROM airtimesns_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

///AIRTIME SNS-END

//AIRTIME SWAP-START

if ($getservices=="mtn-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtn_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="glo-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="airtel-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

if ($getservices=="9mobile-swap"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_rate FROM airtimeswap_plan WHERE id='$level'"));

echo ''.$data_query[0].'
';
}

///AIRTIME SWAP-END

//EPINS-START

if ($getservices=="waec"){
	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT waec FROM epin_planlist WHERE id='$level'"));
	echo '
		<div class="alert alert-warning">WAEC = ₦'.$data_query[0].'</div>
	';
}
if ($getservices == "gce") {
	$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gce FROM epin_planlist WHERE id='$level'"));
	echo '
	<div class="alert alert-warning">GCE = ₦' . $data_query[0] . '</div>
';
}

if ($getservices=="neco"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT neco FROM epin_planlist WHERE id='$level'"));

echo '
	<div class="alert alert-success">NECO = ₦'.$data_query[0].'</div>
';
}

if ($getservices=="nabteb"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT nabteb FROM epin_planlist WHERE id='$level'"));

echo '
	<div class="alert alert-danger">NABTEB = ₦'.$data_query[0].'</div>
';
}

///EPINS-END


//BILLS-START

if ($getservices=="abuja-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT abuja FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="ibadan-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT ibadan FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="eko-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT eko FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="jos-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT jos FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="kaduna-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT kaduna FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="kano-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT kano FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="ikeja-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT ikeja FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

if ($getservices=="portharcourt-electric"){

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT portharcourt FROM bills_planlists WHERE id='$level'"));

echo '
	<div class="alert alert-danger">₦'.$data_query[0].' charges apply</div>
';
}

}

else{

echo "NULL";
exit();
}

?>