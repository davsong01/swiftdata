<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>KYC Registration</h4>
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
<span class="" id="basic-addon1"><i class="fa fa-user" style="font-size: 25px;"></i></span>
</div>
<input type="text" class="form-control" placeholder="Adegboye Ayomide" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="text" class="form-control" placeholder="Mobile No."  aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-calendar" style="font-size: 25px;"></i></span>
</div>
<input type="date" class="form-control"  aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa-solid fa-signal" style="font-size: 25px;"></i></span>
</div>
<select class="form-control">
	<option>--Means Of ID--</option>
	<option>NIN</option>
	<option>BVN</option>
</select>
</div>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-calendar" style="font-size: 25px;"></i></span>
</div>
<input type="text" class="form-control" id=""  aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1">
</div>


<button class="btn btn-success btn-block" style="width: 100%">SUBMIT</button>

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
$("#service_module").change(function(){

if ($("#service_module").val() !=""){
 var service_module=$("#service_module").val();
 //JsLoadingOverlay.show(configs);
$.ajax({
    url:'resources/plans/serviceslists?services='+service_module+'&level=<?php echo $level; ?>',
    method:'GET',
    success:function(RES_data){
 //JsLoadingOverlay.hide(configs);
    $("#result").html(RES_data);
    }
})
}
	})
</script>

<?php require("site_footer.php"); ?>
