<?php

if (isset($_GET['apikey']) && !empty($_GET['apikey'])){

require("../functions/web_config.php");
$apikey=trim($_GET['apikey']);

$check_user=mysqli_query($con, "SELECT * FROM users WHERE sk_token='$apikey' AND block='0'");

if (mysqli_num_rows($check_user)>0){

$return_info=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE sk_token='$apikey'"));
$level=$return_info['level'];

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtelcg_100,airtelcg_300, airtelcg_500, airtelcg_1, airtelcg_2, airtelcg_5  FROM airtelcgdata_plan WHERE id='$level'"));

$airtelcg_100=$data_query[0];
$airtelcg_300=$data_query[1];
$airtelcg_500=$data_query[2];
$airtelcg_1=$data_query[3];
$airtelcg_2=$data_query[4];
$airtelcg_5=$data_query[5];


$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtncg_500,mtncg_1, mtncg_2, mtncg_3, mtncg_5, mtncg_10 FROM mtncgdata_plan WHERE id='$level'"));

$mtncg_500=$data_query[0];
$mtncg_1=$data_query[1];
$mtncg_2=$data_query[2];
$mtncg_3=$data_query[3];
$mtncg_5=$data_query[4];
$mtncg_10=$data_query[5];

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtnsme_500,mtnsme_1, mtnsme_2, mtnsme_3, mtnsme_5, mtnsme_10 FROM mtnsmedata_plan WHERE id='$level'"));

$mtnsme_500=$data_query[0];
$mtnsme_1=$data_query[1];
$mtnsme_2=$data_query[2];
$mtnsme_3=$data_query[3];
$mtnsme_5=$data_query[4];
$mtnsme_10=$data_query[5];

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_750,airtel_15, airtel_2, airtel_3, airtel_45, airtel_6, airtel_10, airtel_11, airtel_20, airtel_40, airtel_75,airtel_120  FROM airteldata_plan WHERE id='$level'"));

$airtel_750=$data_query[0];
$airtel_15=$data_query[1];
$airtel_2=$data_query[2];
$airtel_3=$data_query[3];
$airtel_45=$data_query[4];
$airtel_6=$data_query[5];
$airtel_10=$data_query[6];
$airtel_11=$data_query[7];
$airtel_20=$data_query[8];
$airtel_40=$data_query[9];
$airtel_75=$data_query[10];
$airtel_120=$data_query[11];

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_500,mobile_15, mobile_2, mobile_3, mobile_45, mobile_11, mobile_150, mobile_40, mobile_75  FROM mobiledata_plan WHERE id='$level'"));

$mobile_500=$data_query[0];
$mobile_15=$data_query[1];
$mobile_2=$data_query[2];
$mobile_3=$data_query[3];
$mobile_45=$data_query[4];
$mobile_11=$data_query[5];
$mobile_150=$data_query[6];
$mobile_40=$data_query[7];
$mobile_75=$data_query[8];

$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glo_105,glo_29, glo_41, glo_58, glo_77, glo_10, glo_1325, glo_1825, glo_295, glo_50, glo_93  FROM glodata_plan WHERE id='$level'"));

$glo_105=$data_query[0];
$glo_29=$data_query[1];
$glo_41=$data_query[2];
$glo_58=$data_query[3];
$glo_77=$data_query[4];
$glo_10=$data_query[5];
$glo_1325=$data_query[6];
$glo_1825=$data_query[7];
$glo_295=$data_query[8];
$glo_50=$data_query[9];
$glo_93=$data_query[10];

$response = array(
	'status' =>'true',
	'message' => '
	{AIRTEL-CG 100MB =N'.$airtelcg_100.' & PLAN_CODE => 601} 
	{AIRTEL-CG 300MB =N'.$airtelcg_300.' & PLAN_CODE => 602}
	{AIRTEL-CG 500MB =N'.$airtelcg_500.' & PLAN_CODE => 603}
	{AIRTEL-CG 1GB =N'.$airtelcg_1.' & PLAN_CODE => 604}
	{AIRTEL-CG 2GB =N'.$airtelcg_2.' & PLAN_CODE => 605}
	{AIRTEL-CG 5GB =N'.$airtelcg_5.' & PLAN_CODE => 606}

	{MTN-CG 500MB =N'.$mtncg_500.' & PLAN_CODE => 500}
	{MTN-CG 1GB =N'.$mtncg_1.' & PLAN_CODE => 1000}
	{MTN-CG 2GB =N'.$mtncg_2.' & PLAN_CODE => 2000}
	{MTN-CG 3GB =N'.$mtncg_3.' & PLAN_CODE => 3000}
	{MTN-CG 5GB =N'.$mtncg_5.' & PLAN_CODE => 5000}
	{MTN-CG 10GB =N'.$mtncg_10.' & PLAN_CODE => 10000}

	{MTN-SME 500MB =N'.$mtnsme_500.' & PLAN_CODE => 500}
	{MTN-SME 1GB =N'.$mtnsme_1.' & PLAN_CODE => 1000}
	{MTN-SME 2GB =N'.$mtnsme_2.' & PLAN_CODE => 2000}
	{MTN-SME 3GB =N'.$mtnsme_3.' & PLAN_CODE => 3000}
	{MTN-SME 5GB =N'.$mtnsme_5.' & PLAN_CODE => 5000}
	{MTN-SME 10GB =N'.$mtnsme_10.' & PLAN_CODE => 10000}


	{AIRTEL 750MB =N'.$airtel_750.' & PLAN_CODE => 501}
	{AIRTEL 1.5GB =N'.$airtel_15.' & PLAN_CODE => 502}
	{AIRTEL 2.0GB =N'.$airtel_2.' & PLAN_CODE => 503}
	{AIRTEL 3.0GB =N'.$airtel_3.' & PLAN_CODE => 504}
	{AIRTEL 4.5GB =N'.$airtel_45.' & PLAN_CODE => 505}
	{AIRTEL 6.0GB =N'.$airtel_6.' & PLAN_CODE => 506}
	{AIRTEL 10GB =N'.$airtel_10.' & PLAN_CODE => 507}
	{AIRTEL 11GB =N'.$airtel_11.' & PLAN_CODE => 508}
	{AIRTEL 20.0GB =N'.$airtel_20.' & PLAN_CODE => 509}
	{AIRTEL 40.0GB =N'.$airtel_40.' & PLAN_CODE => 510}
	{AIRTEL 75GB =N'.$airtel_75.' & PLAN_CODE => 511}
	{AIRTEL 120GB =N'.$airtel_120.' & PLAN_CODE => 512}

	{9MOBILE 500MB =N'.$mobile_500.' & PLAN_CODE => 401}
	{9MOBILE 1.5GB =N'.$mobile_15.' & PLAN_CODE => 402}
	{9MOBILE 2.0GB =N'.$mobile_2.' & PLAN_CODE => 403}
	{9MOBILE 3.0GB =N'.$mobile_3.' & PLAN_CODE => 404}
	{9MOBILE 4.5GB =N'.$mobile_45.' & PLAN_CODE => 405}
	{9MOBILE 11GB =N'.$mobile_11.' & PLAN_CODE => 406}
	{9MOBILE 15.0GB =N'.$mobile_150.' & PLAN_CODE => 407}
	{9MOBILE 40.0GB =N'.$mobile_40.' & PLAN_CODE => 408}
	{9MOBILE 75GB =N'.$mobile_75.' & PLAN_CODE => 409}


	{GLO 1.05GB =N'.$glo_105.' & PLAN_CODE => 201}
	{GLO 2.9GB =N'.$glo_29.' & PLAN_CODE => 202}
	{GLO 4.1GB =N'.$glo_41.' & PLAN_CODE => 203}
	{GLO 5.8GB =N'.$glo_58.' & PLAN_CODE => 204}
	{GLO 7.7GB =N'.$glo_77.' & PLAN_CODE => 205}
	{GLO 10.0GB =N'.$glo_10.' & PLAN_CODE => 206}
	{GLO 13.25GB =N'.$glo_1325.' & PLAN_CODE => 207}
	{GLO 18.25GB =N'.$glo_1825.' & PLAN_CODE => 208}
	{GLO 29.5GB =N'.$glo_295.' & PLAN_CODE => 209}
	{GLO 50.0GB =N'.$glo_50.' & PLAN_CODE => 210}
	{GLO 93.0GB =N'.$glo_93.' & PLAN_CODE => 211}

	',
);

echo json_encode($response);
exit();


}

else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Basic Authorization Failed! Unable to fetch user record',
    );
    echo json_encode($response);
    exit;
}
}

else {

    $response=array(
    'status' => 'fail',
    'status_code' =>'100',
    'message' => 'Please make sure you pass your API key',
    );
    echo json_encode($response);
    exit();
}

?>