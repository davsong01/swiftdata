<?php require("site_header.php"); ?>

<?php

require ("request_pin.php");

?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Buy Data Bundle</h4>
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
<span class="" id="basic-addon1"><i class="fa-solid fa-wifi" style="font-size: 25px;"></i></span>
</div>
<select class="form-control" id="network_module" required>
	<option value="">--Choose--</option>
 <?php
  if ($m_lock1 != 0){
  echo '<option value="MTN">MTN-SME</option>';
  }
  if ($mg_lock1 != 0){
  echo '<option value="MTN-CG">MTN-CG</option>';
  }
  if ($g_lock1 != 0){
  echo '<option value="GLO">GLO</option>';
  }
  if ($gcg_lock1 != 0){
  echo '<option value="GLO-CG">GLO-CG</option>';
  }
  if ($a_lock1 != 0){
  echo '<option value="AIRTEL">AIRTEL</option>';
  }
  if ($ag_lock1 != 0){
  echo '<option value="AIRTEL-CG">AIRTEL-CG</option>';
  }
  if ($mo_lock1 != 0){
  echo '<option value="9MOBILE">9MOBILE</option>';
  }
  ?>
</select>
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></span>
</div>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
<select class="form-control" id="dataplanloader" required>
	<option value="">--Select Network--</option>
</select>

</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-phone" style="font-size: 25px;"></i></span>
</div>
<input type="tel" class="form-control" placeholder="Mobile No." id="mobile_no" maxlength="11" required>
</div>

<small>Forget Pin ? <a href="<?php echo $baseurl; ?>/reset_pin">Reset Here</a></small>
<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Security PIN" id="security_pin" required>
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%" id="submitBtn">BUY NOW</button>

<br>
<br>
</form>


<hr/>
              <div id="checkbal">
                <h5 style="font-weight:bold">HOW TO CHECK YOUR DATA BALANCE</h5>
                <h5 style="color:#940798"><img src="backend/img/mtn.png" style="border-radius: 50%;" height="30px"> CHECK MTN SME BALANCE <=> *461*4# </h5>
                <h5 style="color:#940798"><img src="backend/img/mtn.png" style="border-radius: 50%;" height="30px"> CHECK MTN CG BALANCE <=> *460*260# </h5>
                <h5 style="color:#940798"><img src="backend/img/glo.png" style="border-radius: 50%;" height="30px"> CHECK GLO BALANCE <=> *127*0#</span></h5>
                <h5 style="color:#940798"><img src="backend/img/airtel.png" style="border-radius: 50%;" height="30px"> CHECK AIRTEL BALANCE <=> *140# </h5>
                <h5 style="color:#940798"><img src="backend/img/airtel.png" style="border-radius: 50%;" height="30px"> CHECK AIRTEL CG BALANCE <=> *140# </h5>
                <h5 style="color:#940798"><img src="backend/img/mobile.png" style="border-radius: 50%;" height="30px"> CHECK 9MOBILE BALANCE <=> *229*9#</span></h5>
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
    $("#dataplanloader").html(RES_data);
    }
})
}
	})

     $("#form-data").submit(function (event) {
      var formData = {
      network_module: $("#network_module").val(),
      dataplanloader: $("#dataplanloader").val(),
      mobile_no: $("#mobile_no").val(),
      security_pin: $("#security_pin").val(),
      req_token: $("#req_token").val(),
    };

     $.LoadingOverlay("show");
    $.ajax({
      url:'<?php echo $baseurl; ?>/customer/data',
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
