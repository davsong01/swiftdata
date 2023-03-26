<?php require("site_header.php"); ?>
<?php

require ("request_pin.php");

?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Cheap Airtime SNS</h4>
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


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->

<div id="response"></div>

<form id="form-data">
<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa-solid fa-signal" style="font-size: 25px;"></i></span>
</div>
<input type="hidden" id="network_discount">
<select class="form-control" id="network_module" required>
	<option value="">--Choose--</option>
 <?php
  if ($m_lock3 != 0){
  echo '<option value="MTN-SNS">MTN-SNS</option>';
  }
  if ($g_lock3 != 0){
  echo '<option value="GLO-SNS">GLO-SNS</option>';
  }
  if ($a_lock3 != 0){
  echo '<option value="AIRTEL-SNS">AIRTEL-SNS</option>';
  }
  if ($mo_lock3 != 0){
  echo '<option value="9MOBILE-SNS">9MOBILE-SNS</option>';
  }
  ?>
</select>
</div>
<span id="result"></span>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-phone" style="font-size: 25px;"></i></span>
</div>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
<input type="tel" class="form-control" placeholder="Mobile No." id="mobile_no" required>
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><span style="font-weight: bold;font-size: 22px;">₦</span></span>
</div>
<input type="tel" class="form-control" placeholder="Amount" onkeyup="CalDiscount()"  id="amount" required>
</div>
<div>
<small style="color: red;font-weight: bold;" id="valAmount"></small>
</div>
<br>


<small>Forget Pin ? <a href="<?php echo $baseurl; ?>/reset_pin">Reset Here</a></small>
<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Security PIN" id="security_pin">
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%">Purchase Now</button>

<br>
<br>
<br>
</form>

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

<script type="text/javascript">

function CalDiscount(){
var amount=$("#amount").val();
var network_discount=$("#network_discount").val();
if (amount !="" && amount>99 && network_discount !=""){
var charges=parseInt(amount)*parseInt(network_discount)/100;
var fin_amount=amount-charges;
$("#valAmount").text("You will be paid N"+fin_amount);
}
else {
$("#valAmount").text(""); 
}
}

$("#network_module").change(function(){

if ($("#network_module").val() !=""){
 var network_module=$("#network_module").val();
 $.LoadingOverlay("show");
$.ajax({
    url:'resources/plans/serviceslists?services='+network_module+'&level=<?php echo $level; ?>',
    method:'GET',
    success:function(RES_data){
 $.LoadingOverlay("hide");
    //$("#result").html(RES_data);
    $("#network_discount").val(RES_data);
    }
})
}
	})

     $("#form-data").submit(function (event) {
      var formData = {
      network_module: $("#network_module").val(),
      amount: $("#amount").val(),
      mobile_no: $("#mobile_no").val(),
      security_pin: $("#security_pin").val(),
      req_token: $("#req_token").val(),
    };

     $.LoadingOverlay("show");
    $.ajax({
      url:'<?php echo $baseurl; ?>/customer/airtime',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
      $.LoadingOverlay("hide");
     if (response_fd.status == 'success'){
    $("#successModal").modal("show");
    $("#successModal .modal-body").html(response_fd.message);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
     }
    else {
       $("#errorModal").modal("show");
    $("#errorModal .modal-body").html(response_fd.message);
    }
}
    });

    event.preventDefault();
     });
</script>

<?php require("site_footer.php"); ?>
