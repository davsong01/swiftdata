<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Add Money</h4>
          <p style="color: red;font-weight: bold;">Transfer money into one of the reserved account below and your wallet will be automatically credited.</p>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>Available Balance 
            <span style="float: right;"></span>
          </span>
          <br/>

           <span style="color: #940798;font-weight: bold;font-size: 25px;">₦ <?php echo number_format($Account_Balance,2); ?></span>
         
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->

<?php


 if ($reserved_account !== ""){
     
     
  $json_decoded = json_decode($reserved_account,true);

  $acctName=$json_decoded['responseBody']['accountName']; 
  $accountReference=$json_decoded['responseBody']['accountReference']; 
  $bankinfos=$json_decoded['responseBody']["accounts"];

  $message =  '<div><p style="font-size: 15px;text-align: center;text-transform: uppercase;color:red;font-weight:bold;">'.$sitename.' / '.$acctName.'<br/>1% charges apply on all funding through Monnify</p></div>';
                
  if(isset($bankinfos) && !empty($bankinfos)){
    foreach($bankinfos as $info){
      $message .= ' <div class="alert alert-primary" style="font-size: 15px;text-align: center;text-transform: uppercase;">'.$info['bankName'].' - <b>'.$info['accountNumber'].'</b></div><hr/>';
    }
    
  }
             
 }else {
     $message = '<div class="alert alert-primary" style="font-size: 15px;text-align: center;text-transform: uppercase;">
              NO RESERVED ACCOUNT YET
              </div><hr/>';


 }

 echo $message;
?>

</div>
</div>
</div>


</div>
</div>
</div>

<!-- end-->


</div>




</div>
</div>
</div>


<?php require("site_footer.php"); ?>
