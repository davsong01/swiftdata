<?php require("site_header.php"); ?>

<?php 
if ($finance==1){
?>
<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Remove Money</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Charge</a></li>
<li class="breadcrumb-item active">Default</li>
</ol>
</div>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 social_media_card" style="background-color:#fff;">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0"><?php echo strtoupper($domain); ?></h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
    <form id="form-data">

    <label>Email address</label>
    <input type="email" id="buyer_email" class="form-control" placeholder="Email Address" required>

    <br/>

    <label>Amount To charge</label>
    <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
    <input type="tel" id="buyer_amount" class="form-control" placeholder="Amount To Charge" required>

    <br/>

    <label>Narration of payment</label>
    <select class="form-control" id="buyer_narration" required>
    <option value="">--Select--</option>
    <option value="CHARGEBACK">Wallet Charge Back</option>
    </select>

    <br/>

    <button class="btn btn-success btn-block" type="submit" style="width:100%">CHARGE WALLET</button>

    </form>

  <br>
  <br>
  <br/>
</div>


</div>
</div>



</div>
</div>
</div>

    <script type="text/javascript">

     $("#form-data").submit(function (event) {
     var formData = {
      buyer_email: $("#buyer_email").val(),
      buyer_amount: $("#buyer_amount").val(),
      buyer_narration: $("#buyer_narration").val(),
      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/debitwallet',
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
                    }, 5000);
     }
    else {
   $("#resultHandle").html(response_fd.message);
    }
}
    });

      event.preventDefault();
     });
  </script>

<?php
}
else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>

<?php require("site_footer.php"); ?>
