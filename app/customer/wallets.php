<?php
require("session_controller.php");

$transaction="";
 $lettr= mysqli_query($con, "SELECT * FROM deposit_transactions WHERE user_username='$username' OR user_email='$email' ORDER BY id DESC LIMIT 300");
if (mysqli_num_rows($lettr)<1){

    $transaction='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">
              
                         No Funding Record Yet !!!
             
                </div>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $tid=$data['id'];
      $status=$data['user_status'];
      $amount=$data['user_amount'];
      $trx=$data['sys_ref'];
      $descr=$data['user_descr'];
      $date=$data['user_date'];
      $oldbal=$data['user_prebal'];
      $newbal=$data['user_postbal'];

      $shortDesrc=substr($descr, 0,25);

      if ($status=="SUCCESSFUL"){$actmode="background-color: lightseagreen";}
      else {$actmode="background-color: palevioletred";}


      $transaction.='<div class="alert" style="'.$actmode.';color:#fff;font-size:10px;" id="'.$tid.'" onclick="caller(this.id)">

      <p style="color:white;">'.$tid.'</p><br/>
       <span>Refrence No. : '.$trx.'</span><br/>
       <span>Order: '.$descr.'</span><br/>
       <span>Date: '.$date.'</span><br/>
       <span>Amount: ₦'.$amount.'</span><br/>

      <span>Prev Bal:</span> <span style="cursor: pointer;">₦'.$oldbal.'</span>

      <span style="float:right">Post Bal: ₦'.$newbal.'</span>
        </p>
            
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