<?php require("site_header.php"); ?>

<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Send BulkSMS</h4>
          <p style="color: red;font-weight: bold;">
            <?php
            $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT sms_price FROM bulksms_plan WHERE id='$level'"));
            echo "You can now send bulksms on ".$sitename." for N".$data_query[0]."naira per/page/contact.";
            ?>
          </p>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>Available Balance 
            <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()" style="font-size:10px">Fund Wallet</button></span>
          </span>
          <br/>

           <span style="color: #940798;font-weight: bold;font-size: 25px;">₦<?php echo number_format($Account_Balance,2); ?></span>
         
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="background-color: #fff">

        <div id="response"></div>

               <div id="BulkSMSOpt">
                 <div class="mb-3">
                   <input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
                   <label>Sender Name <span style="color: red;">This should not be more than 8chars</span></label>
                   <input type="text" name="" id="sender_name" placeholder="Sender Name" class="form-control">
                 </div>

                 <div class="mb-3">
                   <label>Receipent No(s) <span style="color: red;">Separate by comma if more 1contact.</span></label>
                   <textarea id="receipent_no" placeholder="081324567***,0906754232***,07067233***" class="form-control"></textarea>
                 </div>

                 <div class="mb-3">
                   <label>Message Body</label>
                    <textarea id="message_body" placeholder="Typing..." class="form-control"></textarea>
                     <small id="counter" class="text-success"></small>
                     <br/>
                     <small id="pages" class="text-danger"></small>
                 </div>

                <div class="mb-3">
                <label>Security PIN</label>
                <input type="password" class="form-control" placeholder="Security PIN" id="security_pin" required>
                </div>

              <div class="mb-3">
              <button class="btn btn-success btn-block" style="width: 100%" id="sendBulkSMS">SEND MESSAGE</button>
              </div>
               </div>


              
            
</div>
<br>

</div>
</div>

<script type="text/javascript">

$("#sendBulkSMS").click(function () {
var sender_name = $("#sender_name").val();
var receipent_no = $("#receipent_no").val(); 
var message_body = $("#message_body").val(); 
var security_pin = $("#security_pin").val(); 
var req_token = $("#req_token").val();
$.LoadingOverlay("show");
$.ajax({
  url:"<?php echo $baseurl; ?>/customer/sendsms",
  method:"POST",
  dataType:"Json",
  data:{sender_name:sender_name, receipent_no:receipent_no, message_body:message_body, req_token:req_token, security_pin:security_pin},
  success:function(response){
  $.LoadingOverlay("hide");
  if (response.status=='success'){
    $("#message").val("");
    $("#successModal").modal("show");
    $("#successModal .modal-body").html(response.message);
     setTimeout(function() {
                        window.location.reload();
                    }, 2000);
  }
else {
    $("#errorModal").modal("show");
    $("#errorModal .modal-body").html(response.message);
  }
}
})
})


 $("#message_body").keyup(function () {
   var message_body=$(this).val();;
   if (message_body==""){
    $("#counter").text("");
    $("#pages").text("");
  }
   else{
   var message=message_body.length;
    $("#counter").text("Characters "+message);
    $("#pages").text("No of pages 1");
  if (message<=167){
   $("#pages").text("No of pages 1");
   }
   else{
   pagesL=parseInt(message)/167+1;
   $("#pages").text("No of pages "+pagesL.toFixed());
   }
   }
  })

 </script> 

<?php require("site_footer.php"); ?>
