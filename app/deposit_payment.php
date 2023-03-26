<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Add Money</h4>
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
$list_acctno="";
$xxx= mysqli_query($con, "SELECT * FROM vtuapp_manualfunding ORDER BY id DESC LIMIT 10");
if (mysqli_num_rows($xxx)<1){

echo '<div class="alert" style="font-size: 25px;text-align: center;text-transform: uppercase;">
      NO ACCOUNT ADDED YET
    </div>';
}
else {
while ($Acc_data = mysqli_fetch_array($xxx, MYSQLI_ASSOC)){ 

$list_acctno.='<div class="alert" style="font-size: 25px;text-align: center;text-transform: uppercase;">
      '.$Acc_data['account_name'].'<br/> '.$Acc_data['bank_name'].' - '.$Acc_data['account_no'].'
    </div><hr/>';

}
}


echo $list_acctno;
?>

</div>
</div>
</div>


<div class="col-xl-12">
<div class="alert" style="background-color: transparent;">

        <div id="response"></div>
                 <label style="color: red;">Let us know your payment narration and your wallet will be funded when confirmed and note you will be charge N20 if you make payment below N1000</label>
                 <textarea class="form-control" id="narration" name="narration" required="required" placeholder="Enter Your Payment Narration">
                   
                 </textarea>
            
               <br/>

                 <button class="btn btn-success btn-block" id="sendNotification">Send Notification</button>
            
</div>
               <br>
</div>

</div>
</div>
</div>

<!-- end-->



</div>



 <script type="text/javascript">
   $(document).ready(function () {
    $("#narration").val("");
   })
   $("#sendNotification").click(function () {
     var narration=$("#narration").val();
     if (narration=="" || narration.length <10){
    $("#response").html('<div class="alert alert-danger">Please submit your payment narration</div>');
     }
     else{
  $.LoadingOverlay("show");
   window.location.href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp_no; ?>&text=Hello%20Admin!%20i%20make%20a%20deposit%20with%20the%20following%20narration%20%20"+narration+"";
   $.LoadingOverlay("hide");
     }
   })
 </script>
</div>
</div>
</div>


<?php require("site_footer.php"); ?>
