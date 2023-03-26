<?php
require("session_controller.php");

$cday=$_GET['cday'];
$cmonth=$_GET['cmonth'];
$cyear=$_GET['cyear'];

$newtime=$cday."-".$cmonth."-".$cyear;

$transaction="";

$seltdatabyte=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='mtn-sme'");
$rows=mysqli_fetch_array($seltdatabyte, MYSQLI_ASSOC);
$total_smedata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='mtn-sme'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_smedatacost=$rows['totalamount'];

////MTN-CG
$seltdatabyte3=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='mtn-cg'");
$rows=mysqli_fetch_array($seltdatabyte3, MYSQLI_ASSOC);
$total_mtncgdata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='mtn-cg'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_mtncgdatacost=$rows['totalamount'];

////AIRTEL-CG
$seltdatabyte3=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='airtel-cg'");
$rows=mysqli_fetch_array($seltdatabyte3, MYSQLI_ASSOC);
$total_airtelcgdata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='airtel-cg'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_airtelcgdatacost=$rows['totalamount'];

////GLO-CG
$seltdatabyte3=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='glo-cg'");
$rows=mysqli_fetch_array($seltdatabyte3, MYSQLI_ASSOC);
$total_glocgdata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='glo-cg'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_glocgdatacost=$rows['totalamount'];

////AIRTEL
$seltdatabyte3=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='airtel'");
$rows=mysqli_fetch_array($seltdatabyte3, MYSQLI_ASSOC);
$total_airteldata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='airtel'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_airteldatacost=$rows['totalamount'];

////GLO
$seltdatabyte3=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='glo'");
$rows=mysqli_fetch_array($seltdatabyte3, MYSQLI_ASSOC);
$total_glodata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='glo'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_glodatacost=$rows['totalamount'];

////9MOBILE
$seltdatabyte3=mysqli_query($con, "SELECT SUM(databyte) AS totaldata FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='9mobile'");
$rows=mysqli_fetch_array($seltdatabyte3, MYSQLI_ASSOC);
$total_mobiledata=$rows['totaldata']/1000;
///
$seltdataamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service='9mobile'");
$rows=mysqli_fetch_array($seltdataamount, MYSQLI_ASSOC);
$total_mobiledatacost=$rows['totalamount'];

////AIRTIME-VTU
$seltairtimeamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service LIKE '%vtu%'");
$rows=mysqli_fetch_array($seltairtimeamount, MYSQLI_ASSOC);
$total_vtucost=$rows['totalamount'];

////AIRTIME-SNS
$seltairtimeamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service LIKE '%sns%'");
$rows=mysqli_fetch_array($seltairtimeamount, MYSQLI_ASSOC);
$total_snscost=$rows['totalamount'];

////BILLS
$seltbillsamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service LIKE '%electric%'");
$rows=mysqli_fetch_array($seltbillsamount, MYSQLI_ASSOC);
$total_billscost=$rows['totalamount'];

////CABLETV
$selttvamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service LIKE '%gotv%' OR buyer_service LIKE '%dstv%' OR buyer_service LIKE '%startime%'");
$rows=mysqli_fetch_array($selttvamount, MYSQLI_ASSOC);
$total_cablecost=$rows['totalamount'];

////E-PINS
$selepinamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service LIKE '%waec%' OR buyer_service LIKE '%neco%' OR buyer_service LIKE '%nabteb%'");
$rows=mysqli_fetch_array($selepinamount, MYSQLI_ASSOC);
$total_pincost=$rows['totalamount'];

////WITHDRAW
$selewithamount=mysqli_query($con, "SELECT SUM(buyer_amount) AS totalamount FROM final_transactions WHERE buyer_status='SUCCESSFUL' AND buyer_service LIKE '%WITHDRAW%'");
$rows=mysqli_fetch_array($selewithamount, MYSQLI_ASSOC);
$total_withdraw=$rows['totalamount'];


$transaction = '
<div>
  MTN SME DATA => '.$total_smedata.'GB <span style="float: right;">N'.number_format($total_smedatacost,2).'</span>
</div>
<hr/>
<div>
  MTN CG DATA => '.$total_mtncgdata.'GB <span style="float: right;">N'.number_format($total_mtncgdatacost,2).'</span>
</div>
<hr/>
<div>
  AIRTEL GIFT. DATA => '.$total_airteldata.'GB <span style="float: right;">N'.number_format($total_airteldatacost,2).'</span>
</div>
<hr/>
<div>
  AIRTEL CG DATA => '.$total_airtelcgdata.'GB <span style="float: right;">N'.number_format($total_airtelcgdatacost,2).'</span>
</div>
<hr/>
<div>
  GLO GIFT. DATA => '.$total_glodata.'GB <span style="float: right;">N'.number_format($total_glodatacost,2).'</span>
</div>
<hr/>
<div>
  GLO CG. DATA => '.$total_glocgdata.'GB <span style="float: right;">N'.number_format($total_glocgdatacost,2).'</span>
</div>
<hr/>
<div>
  9MOBILE GIFT. DATA => '.$total_mobiledata.'GB <span style="float: right;">N'.number_format($total_mobiledatacost,2).'</span>
</div>
<hr/>
<div>
  AIRTIME VTU => <span style="float: right;">N'.number_format($total_vtucost,2).'</span>
</div>
<hr/>
<div>
  AIRTIME SNS => <span style="float: right;">N'.number_format($total_snscost,2).'</span>
</div>
<hr/>
<div>
  BILLS PAYMENT => <span style="float: right;">N'.number_format($total_billscost,2).'</span>
</div>
<hr/>
<div>
  CABLETV PAYMENT => <span style="float: right;">N'.number_format($total_cablecost,2).'</span>
</div>
<hr/>
<div>
  E-PINS PURCHASE => <span style="float: right;">N'.number_format($total_pincost,2).'</span>
</div>
<hr/>
<div>
  BONUS WITHDRAW => <span style="float: right;">N'.number_format($total_withdraw,2).'</span>
</div>';


 $response=array(
 'message' => $transaction,
 'status' => 'success',
 );

echo json_encode($response);
exit();

?>