<?php
require("session_controller.php");

$message="";

$getStaff=mysqli_query($con, "SELECT id, full_name, reg_date, email, status FROM vtuapp_admin WHERE type='STAFF' ORDER BY id DESC LIMIT 100");

if (mysqli_num_rows($getStaff)<1){

$message = '
<div class="alert alert-danger">
<h4>No staff added yet !!!</h4>
</div>';

}

else{
 while ($viewStaff=mysqli_fetch_array($getStaff, MYSQLI_ASSOC)) {

if ($viewStaff['status']=="BLOCK"){

$todobtn='<button class="btn btn-success" id="'.$viewStaff['id'].'" onclick="unblockStaff(this.id)">Unblock</button>';
}

else {

$todobtn='<button class="btn btn-warning" id="'.$viewStaff['id'].'" onclick="blockStaff(this.id)">Block</button>';
}

$message .= '
<div class="alert" style="background-color:grey;color:#fff;cursor:pointer;" id="'.$viewStaff['id'].'">
Full Name: '.$viewStaff['full_name'].'<br/>
Reg. Date: '.$viewStaff['reg_date'].'<br/>
Email : '.$viewStaff['email'].'<br/><br/>
<button class="btn btn-danger" id="'.$viewStaff['email'].'" onclick="manageStaff(this.id)">Edit Info</button>
'.$todobtn.'
<br/>
</div>';
 }

}

echo $message; 

?>