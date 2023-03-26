<?php
require("session_controller.php");

$message="";

$getAPIDEAL=mysqli_query($con, "SELECT id, full_name, reg_date, email, block, wallets FROM users WHERE mtnsme_access !='1' OR mtncg_access !='1' OR glo_access !='1' OR airtel_access !='1' OR airtelcg_access !='1' OR mobile_access !='1' OR airtime_access !='1' OR cable_access !='1' OR bills_access !='1' OR epin_access !='1' ORDER BY id DESC LIMIT 1000");

if (mysqli_num_rows($getAPIDEAL)<1){

$message = '
<div class="alert alert-danger">
<h4>You have not setup any API Deal !!!<h4>
</div>';

}

else{
 while ($viewDeal=mysqli_fetch_array($getAPIDEAL, MYSQLI_ASSOC)) {

if ($viewDeal['block']=="1"){

$todobtn='<button class="btn btn-success" id="'.$viewDeal['email'].'" onclick="unblockAPI(this.id)">Unblock</button>';
}

else {

$todobtn='<button class="btn btn-warning" id="'.$viewDeal['email'].'" onclick="blockAPI(this.id)">Block</button>';
}

$message .= '
<div class="alert" style="background-color:grey;color:#fff;cursor:pointer;" id="'.$viewDeal['id'].'">
Full Name: '.$viewDeal['full_name'].'<br/>
Reg. Date: '.$viewDeal['reg_date'].'<br/>
Email : '.$viewDeal['email'].'<br/>
Currebt Bal : ₦'.$viewDeal['wallets'].'<br/><br/>

<button class="btn btn-danger" id="'.$viewDeal['email'].'" onclick="manageAPI(this.id)">Edit Info</button>
'.$todobtn.'
<br/>
</div>';
 }

}

echo $message; 

?>