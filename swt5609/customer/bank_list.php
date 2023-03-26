<?php
require("session_controller.php");

$load_id=$_GET['load_id'];
$banks="";

 $lettr= mysqli_query($con, "SELECT * FROM vtuapp_manualfunding ORDER BY id DESC LIMIT 10");
if (mysqli_num_rows($lettr)<1){

    $banks='<div class="alert" style="background-color: #fff;border-radius: 10px 5px;color:black">
              
                    NO ACCOUNT ADDED YET
             
                </div>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $tid=$data['id'];
      $account_name=$data['account_name'];
      $bank_name=$data['bank_name'];
      $account_no=$data['account_no'];

      $banks.='<div class="alert" style="background-color: #fff;font-size: 25px;text-align: center;text-transform: uppercase;">

      <span>'.$account_name.'</span><br/>
      <span>'.$bank_name.'</span><br/>
      <span>'.$account_no.'</span><br/>

      <span><button class="btn btn-danger" id="'.$tid.'" onclick="delFun(this.id)">Delete Bank Details <i class="fa fa-trash"></i></button></span><br/>
      </p>   
      </div>';
   

  }
  

 }


 $response=array(
 'message' => $banks,
 'status' => 'success',
 );

echo json_encode($response);
exit();

?>