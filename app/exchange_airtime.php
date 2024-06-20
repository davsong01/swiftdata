<?php require("site_header.php"); ?>
<?php

require ("request_pin.php");

?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Swap Airtime To Cash</h4>
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

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa-solid fa-signal" style="font-size: 25px;"></i></span>
</div>
<input type="hidden" id="network_discount">
<select class="form-control" id="network_module">
	<option>--Choose--</option>
	<option value="MTN-SWAP">MTN</option>
	<option value="GLO-SWAP">GLO</option>
	<option value="AIRTEL-SWAP">AIRTEL</option>
	<option value="9MOBILE-SWAP">9MOBILE</option>
</select>
</div>
<span id="result"></span>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-phone" style="font-size: 25px;"></i></span>
</div>
<input type="tel" class="form-control" id="mobile_no" placeholder="Mobile No." aria-describedby="basic-addon1">
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><span style="font-weight: bold;font-size: 22px;">₦</span></span>
</div>
<input type="tel" class="form-control" id="amount" onkeyup="CalDiscount()" placeholder="Amount"  aria-describedby="basic-addon1">
</div>
<div>
<small style="color: red;font-weight: bold;" id="valAmount"></small>
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%" onclick="MakePay()">Procced Now</button>

<br>
<br>
<br>

  <hr/>
  <div id="checkbal">
    <h5 style="font-weight:bold">HOW TO TRANSFER AIRTIME TO ANOTHER NUMBER</h5>
    <div style="color:#940798">
        <img src="backend/img/mtn.png" style="border-radius: 50%;" height="30px"> <br/>
    TO TRANSFER MTN AIRTIME <br/>
    <p>*600*recipient-number*amount*pin#</p>
    
    TO CHANGE MTN TRANSFER PIN <br/>
    <p>*600*default-pin*new-pin*new-pin#</p>
    </div>
    <hr/>
    
    <div style="color:#940798">
        <img src="backend/img/glo.png" style="border-radius: 50%;" height="30px"> <br/>
    TO TRANSFER GLO AIRTIME <br/>
    <p>*131*recipient-number*amount*pin#</p>
    
    TO CHANGE GLO TRANSFER PIN <br/>
    <p>*132*00000*new-pin*new-pin#</p>
    </div>
    <hr/>
    
    <div style="color:#940798">
        <img src="backend/img/airtel.png" style="border-radius: 50%;" height="30px"> <br/>
    TO TRANSFER AIRTEL AIRTIME <br/>
    <p>*432*1#</p>
    
    TO CHANGE AIRTEL TRANSFER PIN <br/>
    <p>*432*3# (Default Pin: 1234)</p>
    </div>
    <hr/>
    
    <div style="color:#940798">
        <img src="backend/img/mobile.png" style="border-radius: 50%;" height="30px"> <br/>
    TO TRANSFER 9MOBILE AIRTIME <br/>
    <p>*223*pin*amount*number#</p>
    
    TO CHANGE 9MOBILE TRANSFER PIN <br/>
    <p>*247*default-pin*new-pin# (E.g *247*0000*new-pin#)</p>
    </div>
    
    
  </div>

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

function MakePay(){
var network_module =$("#network_module").val();
var mobile_no =$("#mobile_no").val();
var amount =$("#amount").val();
var network_discount=$("#network_discount").val();

if (network_discount !="" && mobile_no !="" && amount !="" && network_module !=""){
  window.location.href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp_no; ?>&text=Hello%20admin!%20i%20want%20to%20convert%20"+network_module+"%20₦"+amount+"%20to%20cash.";
}
else {
  
}
}
</script>

<?php require("site_footer.php"); ?>
