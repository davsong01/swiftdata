<?php
require("session_controller.php");

$search_data=$_GET['search_data'];

$transaction="";
 $lettr= mysqli_query($con, "SELECT * FROM deposit_transactions WHERE user_descr LIKE '%$search_data%' OR sys_ref='$search_data' OR api_ref='$search_data' OR user_email='$search_data' OR user_username='$search_data' ORDER BY id DESC LIMIT 100");
if (mysqli_num_rows($lettr)<1){

    $transaction='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">
              
                         No Funding Record Found !!!
             
                </div>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $tid=$data['id'];
      $buyer_username=$data['user_username'];
      $buyer_email=$data['user_email'];
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

      <span>Email: '.$buyer_email.'</span><br/>
      <span>Username: '.$buyer_username.'</span><br/>
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