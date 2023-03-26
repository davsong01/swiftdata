<?php
require("session_controller.php");

$load_id=$_GET['load_id'];

$transaction="";

 $lettr= mysqli_query($con, "SELECT * FROM vtuapp_customuser WHERE ref_by='$referral_code' ORDER BY id DESC");
if (mysqli_num_rows($lettr)<1){

    $transaction='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">
              
                         You have not referred anyone on this platform.
             
                </div>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $refreg_date=$data['reg_date'];
      $reflevel=$data['level'];
      $refstatus=$data['status'];
      $refusername=$data['username'];

      if ($refstatus==1){$actmode="background-color: #199263";$actmodeNote="Verified";}
      else {$actmode="background-color: #DB1A22";$actmodeNote="Not Verified";}


      $transaction.='<div class="alert" style="'.$actmode.';color:#fff;font-size:10px;cursor:pointer;">

       <span>'.$actmodeNote.'</span><br/>
       <span>Username: '.$refusername.'</span><br/>
       <span>Join Date: '.$refreg_date.'</small><br/>
       <span>Level: '.$reflevel.'</span><br/>
            
    </div>';
   

  }
  

 }


 $response=array(
 'message' => $transaction,
 'status' => 'success',
 );

echo json_encode($response);
exit();

?>