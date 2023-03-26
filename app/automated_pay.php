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

$acctName=$json_decoded['responseBody']['accountName']; ////// acctname
$accountReference=$json_decoded['responseBody']['accountReference'];  // ref
$bankinfos=$json_decoded['responseBody']["accounts"];
$bankacct1=$bankinfos[0]['accountNumber'];
$bankacct2=$bankinfos[1]['accountNumber'];
$bankacct3=$bankinfos[2]['accountNumber'];
$bankname1=$bankinfos[0]['bankName'];
$bankname2=$bankinfos[1]['bankName'];
$bankname3=$bankinfos[2]['bankName'];

              echo '
              
              <div>
              <p style="font-size: 15px;text-align: center;text-transform: uppercase;color:red;font-weight:bold;">'.$sitename.' / '.$acctName.'<br/>1% charges apply on all funding through Monnify</p>
              </div>
              
              <div class="alert alert-primary" style="font-size: 15px;text-align: center;text-transform: uppercase;">
              '.$bankname1.' - '.$bankacct1.'
              </div><hr/>
              
              <div class="alert alert-primary" style="font-size: 15px;text-align: center;text-transform: uppercase;">
              '.$bankname2.' - '.$bankacct2.'
              </div><hr/>
              
              <div class="alert alert-primary" style="font-size: 15px;text-align: center;text-transform: uppercase;">
              '.$bankname3.' - '.$bankacct3.'
              </div>';
              
 }

 else {
     
     
     echo '<div class="alert alert-primary" style="font-size: 15px;text-align: center;text-transform: uppercase;">
              NO RESERVED ACCOUNT YET
              </div><hr/>';


 }
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
