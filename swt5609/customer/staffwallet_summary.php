<?php
require("session_controller.php");

$cday=$_GET['cday'];
$cmonth=$_GET['cmonth'];
$cyear=$_GET['cyear'];
$query_email=trim($_GET['query_email']);
$newtime=$cday."-".$cmonth."-".$cyear;

$transaction="";

$totalamount=mysqli_query($con, "SELECT SUM(user_amount) AS totalfund FROM deposit_transactions WHERE cashier='$email' AND user_date LIKE '%$newtime%'");
$rows=mysqli_fetch_array($totalamount, MYSQLI_ASSOC);
$total_amountfund=$rows['totalfund'];

 $lettr= mysqli_query($con, "SELECT * FROM deposit_transactions WHERE cashier='$query_email' AND user_date LIKE '%$newtime%' ORDER BY id DESC LIMIT 1000");
if (mysqli_num_rows($lettr)<1){

    $transaction='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">
              
                         No Funding Record Yet For This Staff on '.$newtime.'
             
                </div>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $tid=$data['id'];
      $user_username=$data['user_username'];
      $user_email=$data['user_email'];
      $status=$data['user_status'];
      $amount=$data['user_amount'];
      $trx=$data['sys_ref'];
      $descr=$data['user_descr'];
      $date=$data['user_date'];
      $oldbal=$data['user_prebal'];
      $newbal=$data['user_postbal'];
      $cashier=$data['cashier'];

      $shortDesrc=substr($descr, 0,25);

      if ($status=="SUCCESSFUL"){$actmode="background-color: lightseagreen";}
      else {$actmode="background-color: palevioletred";}


      $transaction.='<div class="alert" style="'.$actmode.';color:#fff;font-size:10px;" id="'.$tid.'" onclick="caller(this.id)">

      <span>Cashier: '.$cashier.'</span><br/>
      <span>Email: '.$user_email.'</span><br/>
      <span>Username: '.$user_username.'</span><br/>
       <span>Refrence No. : '.$trx.'</span><br/>
       <span>Order: '.$descr.'</span><br/>
       <span>Date: '.$date.'</span><br/>
       <span>Amount: ₦'.$amount.'</span><br/>

      Prev Bal:<span style="cursor: pointer;">₦'.$oldbal.'

      <span style="float:right">Post Bal: ₦'.$newbal.'</span>
      <hr/>

      <h3>TOTAL: '.$total_amountfund.'</h3>
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