<?php require("site_header.php"); ?>


<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Webhook Update</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Webhook</a></li>
<li class="breadcrumb-item active">Default</li>
</ol>
</div>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 social_media_card">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0"><?php echo strtoupper($domain); ?></h3>
<span>Please fill all form and procced</span>
</div>
</div>

<div class="media_thumb ml_25">
	<center></center>
</div>



<div class="alert" style="background-color: #fff; border-radius: 20px 20px 0px 0px;">

  <label style="color: red;">Please enter your webhook url.</label>
<!-- start -->
<div id="response"></div>

<form id="form-data">

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-globe" style="font-size: 25px;"></i></span>
</div>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
<input type="url" class="form-control" placeholder="https://mywebsite.com/webhookfilename" id="webhook_url" required>
</div>

<br>

<div class="input-group mb-3">
<div class="input-group-text">
<span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
</div>
<input type="password" class="form-control" placeholder="Security PIN" id="security_pin" required>
</div>

<br>

<button class="btn btn-success btn-block" style="width: 100%" id="submitBtn">SUBMIT</button>

<br>

</form>


<br>
<br>
<br>

<p style="color: green;font-weight: bold;">How do i receive response in my webhook ?</p>
<div style="color: black;font-weight: bold;">
<p>GET METHOD (required) example below</p>
  <code style="font-weight: bold;">

    <p>$response = $_GET['response']; //real-time-response</p>
    <p>$reference = $_GET['reference']; //reference-we-get-from-your-request</p>
    <p>$status = $_GET['status']; //status-of-the-transaction. failed or success</p>

  <p>if ($status == "failed"){</p>

   <p> //DO FAIL ACTION AND REFUND YOUR CUSTOMER</p>
  <p>}</p>

  <p>else {</p>

 <p> //DO SUCCESS ACTION AND UPDATE YOUR DATABASE WITH THE ABOVE $response</p>
<p>}</p>
  

  </code>
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
     $("#form-data").submit(function (event) {
      var formData = {
      webhook_url: $("#webhook_url").val(),
      security_pin: $("#security_pin").val(),
      req_token: $("#req_token").val(),
    };

     $.LoadingOverlay("show");
    $.ajax({
      url:'<?php echo $baseurl; ?>/customer/webhook',
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
