<?php require("site_header.php"); ?>

<?php

require 'request_pin.php';

?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Result E-Pins</h4>
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
<span class="" id="basic-addon1"><i class="	fa fa-graduation-cap" style="font-size: 25px;"></i></span>
</div>
<select class="form-control" id="service_module">
	<option value="">--Choose--</option>
 <?php

  if ($waec_lock != 0){
  echo '<option value="WAEC">WAEC</option>';
  }
  if ($neco_lock != 0){
  echo '<option value="NECO">NECO</option>';
  }
  if ($nabt_lock != 0){
  echo '<option value="NABTEB">NABTEB</option>';
  }
  ?>
</select>
</div>
<span id="result"></span>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></span>
</div>
<select class="form-control" id="service_quantity">
	<option value="">--Choose--</option>
	<option value="1">1 Result Epins</option>
</select>
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fas fa-phone" style="font-size: 25px;"></i></span>
</div>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
<input type="tel" class="form-control" placeholder="Mobile No." id="mobile_no" value="<?php echo $mobile; ?>" maxlength="11" required>
</div>

<br>

<small>Forget Pin ? <a href="<?php echo $baseurl; ?>/reset_pin">Reset Here</a></small>
<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Security PIN" id="security_pin" required>
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%" id="submitBtn">Purchase Now</button>

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
$("#service_module").change(function(){

if ($("#service_module").val() !=""){
 var service_module=$("#service_module").val();
 $.LoadingOverlay("show");
$.ajax({
    url:'resources/plans/serviceslists?services='+service_module+'&level=<?php echo $level; ?>',
    method:'GET',
    success:function(RES_data){
 $.LoadingOverlay("hide");
    $("#result").html(RES_data);
    }
})
}
	})

     $("#form-data").submit(function (event) {
      var formData = {
      service_module: $("#service_module").val(),
      service_quantity: $("#service_quantity").val(),
      mobile_no: $("#mobile_no").val(),
      security_pin: $("#security_pin").val(),
      req_token: $("#req_token").val(),
    };

     $.LoadingOverlay("show");
    $.ajax({
      url:'<?php echo $baseurl; ?>/customer/epins',
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
