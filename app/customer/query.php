<?php
require("session_controller.php");

$search_data=$_GET['search_data'];

$transaction="";
 $lettr= mysqli_query($con, "SELECT * FROM final_transactions WHERE buyer_descr LIKE '%$search_data%' AND buyer_username='$username' OR  buyer_descr LIKE '%$search_data%'  AND buyer_email='$email' ORDER BY id DESC LIMIT 100");
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
 );

echo json_encode($response);
exit();

?>