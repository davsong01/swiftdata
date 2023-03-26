<?php
require("session_controller.php");

$id=$_GET['id'];

$start=$id-3;
$end=$start-3;

$new_start=$end;
$new_end=$end+3;

$transaction="";
$ctrlButton='<button class="btn btn-primary" id="'.$new_start.'"  onclick="callPrev(this.id)">Prevx2</button> <button class="btn btn-primary" id="'.$new_end.'"  onclick="callNext(this.id)">Nextx2</button>';

 $lettr= mysqli_query($con, "SELECT * FROM final_transactions WHERE buyer_username='$username' AND id BETWEEN $end AND $start OR buyer_email='$email' AND id BETWEEN $end AND $start ORDER BY id DESC LIMIT 3");
if (mysqli_num_rows($lettr)<1){

    $transaction='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">
              
                         No Transaction Record Yet
             
                </div>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $tid=$data['id'];
      $status=$data['buyer_status'];
      $amount=$data['buyer_amount'];
      $trx=$data['sys_ref'];
      $descr=$data['buyer_descr'];
      $date=$data['buyer_date'];
      $oldbal=$data['buyer_prebal'];
      $newbal=$data['buyer_postbal'];

      $shortDesrc=substr($descr, 0,25);

      if ($status=="SUCCESSFUL"){$actmode="background-color: lightseagreen";}
      else {$actmode="background-color: palevioletred";}


      $transaction.='<div class="alert" style="'.$actmode.';color:#fff;" id="'.$tid.'" onclick="caller(this.id)">

       <p style="color:white;">'.$tid.'</p><br/>
       <small>Refrence No. : '.$trx.'</samll><br/>
       <small>Order: '.$descr.'</samll><br/>
       <small>Date: '.$date.'</samll><br/>
       <small>Amount: ₦'.$amount.'</samll><br/>

      <small>Prev Bal:</small> <small style="cursor: pointer;">₦'.$oldbal.'</small>

      <small style="float:right">Post Bal: ₦'.$newbal.'</small>
        </p>
            
    </div>';

  }
  

 }


 $response=array(
 'message' => $transaction,
 'status' => 'success',
 'ctrlButton' => $ctrlButton,
 );

echo json_encode($response);
exit();

?>