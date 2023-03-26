<?php
require("session_controller.php");

$load_id=$_GET['load_id'];
$load_amount=$load_id+200;
$load_next=$load_amount;

$nextbtn="";
$transaction="";

$getAllTransaction2=mysqli_query($con, "SELECT COUNT(*) FROM final_transactions WHERE buyer_username='$username' AND buyer_status='FAILED' OR buyer_email='$email' AND buyer_status='FAILED'");
$aa2=mysqli_fetch_array($getAllTransaction2);
$returnall=$aa2[0];

if ($returnall > 200 && $returnall > $load_next){$nextbtn='<button class="btn btn-primary" id="'.$load_next.'"  onclick="showMore(this.id)">Load More >>> </button>';}
else {$nextbtn='';}

 $lettr= mysqli_query($con, "SELECT * FROM final_transactions WHERE buyer_username='$username' AND buyer_status='FAILED' OR buyer_email='$email' AND buyer_status='FAILED' ORDER BY id DESC LIMIT $load_amount");
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

      if ($status=="SUCCESSFUL"){$actmode="background-color: #199263";}
      else {$actmode="background-color: #DB1A22";}

      $transaction.='<div class="alert" style="'.$actmode.';color:#fff;font-size:10px;cursor:pointer;" id="'.$trx.'" onclick="rceipt(this.id)">

       <span>Refrence No. : '.$trx.'</span><br/>
       <span>Order: '.$descr.'</span><br/>
       <span>Date: '.$date.'</small><br/>
       <span>Amount: ₦'.$amount.'</span> <span style="float:right"><i class="fa fa-eye"></i></span><br/>

      <span>Prev Bal:</span> <span style="cursor: pointer;">₦'.$oldbal.'</span>

      <span style="float:right">Post Bal: ₦'.$newbal.'</span>
        </p>
            
    </div>';
   

  }
  

 }


 $response=array(
 'message' => $transaction,
 'status' => 'success',
 'ctrlButton' => $nextbtn,
 );

echo json_encode($response);
exit();

?>