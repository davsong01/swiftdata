<?php require("site_header.php"); ?>

<?php

if ($manage_message == 1) {



  echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">API Keys</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Default</a></li>
<li class="breadcrumb-item active">API</li>
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
<h3 class="m-0">' . strtoupper($domain) . '</h3>
<p>Welcome ' . $fullname . '</p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
    <form id="form-data">

    <label>Vtpass Logins *</label>
    <input type="text" class="form-control" id="vtpass_account" value="' . $vtpass_account . '" placeholder="Vtpass Login">

    <br/>

    <label>SMS Username *</label>
    <input type="text" class="form-control" id="sms_username" value="' . $sms_username . '" placeholder="SMS Username">

    <br/>

     <label>SMS Password *</label>
     <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="sms_password" value="' . $sms_password . '" placeholder="SMS Password">
    <br/>

     <label>NAIJA RESULTS API KEY *</label>
     <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="naijaresultpins_api_key" value="' . $naijaresultpins_api_key . '" placeholder="NAIJA RESULTS API KEY">

    <br/>
    <label style="color:green">PAY VESSEL STATUS *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <select class="form-control" id="payvessel_mode" required>
    <option value="ON"' . ($payvessel_mode == 'ON' ? 'selected' : '') . '>ON</option>
    <option value="OFF"' . ($payvessel_mode == 'OFF' ? 'selected' : '') . '>OFF</option>
    </select>
    <br/>
    <label style="color:green">PAY VESSEL API KEY *</label>
     <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="payvessel_api_key" value="' . $payvessel_api_key . '" placeholder="">

    <br/>
    
    <label style="color:green">PAY VESSEL SECRET KEY *</label>
     <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="payvessel_api_secret_key" value="' . $payvessel_api_secret_key . '" placeholder="">

    <br/>
    <label style="color:green">PAY VESSEL PUBLIC KEY *</label>
     <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="payvessel_api_public_key" value="' . $payvessel_api_public_key . '" placeholder="">

    <br/>
    <label style="color:green">PAY VESSEL MERCHANT ID *</label>
     <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="payvessel_merchant_id" value="' . $payvessel_merchant_id . '" placeholder="">

    <br/>
    
    <label style="color:blue">MONIFY STATUS *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <select class="form-control" id="monnify_mode" required>
    <option value="active"' . ($monnify_mode == 'ON' ? 'selected' : '') . '>ON</option>
    <option value="inactive"' . ($monnify_mode == 'OFF' ? 'selected' : '') . '>OFF</option>
    </select>

    <br/>
    <label style="color:blue">MONIFY SECRET KEY *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="monnify_sk" value="' . $monnify_sk . '" placeholder="">

    <br/>
    <label style="color:blue">MONIFY PUBLIC KEY *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="monnify_pk" value="' . $monnify_pk . '" placeholder="">

    <br/>
    <label style="color:blue">MONIFY CC *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="monnify_cc" value="' . $monnify_cc . '" placeholder="">

    <br/>
    <label style="color:blue">CLUB KONNECT USER ID *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="clubkonnect_user_id" value="' . $clubkonnect_user_id . '" placeholder="">

    <br/>
    <label style="color:blue">CLUB KONNECT API KEY *</label>
    <input type="hidden" id="req_token" value="' . $_SESSION['csrftoken'] . '">
    <input type="text" class="form-control" id="clubkonnect_api_key" value="' . $clubkonnect_api_key . '" placeholder="">

    <br/>

    <button class="btn btn-success btn-block type="submit" style="width:100%">SUBMIT</button>

    </form>
  <br>
  <br>
  <br/>
</div>
</div>
</div>



</div>
</div>
</div>';
} else {

  require("admin_pushfail.php");
  echo $admin_pushfail;
}

?>


<script type="text/javascript">
  $("#form-data").submit(function(event) {
    var formData = {
      vtpass_account: $("#vtpass_account").val(),
      sms_username: $("#sms_username").val(),
      sms_password: $("#sms_password").val(),
      naijaresultpins_api_key: $("#naijaresultpins_api_key").val(),
      payvessel_api_public_key: $("#payvessel_api_public_key").val(),
      payvessel_api_secret_key: $("#payvessel_api_secret_key").val(),
      payvessel_api_key: $("#payvessel_api_key").val(),
      monnify_pk: $("#monnify_pk").val(),
      monnify_cc: $("#monnify_cc").val(),
      monnify_sk: $("#monnify_sk").val(),
      payvessel_mode: $("#payvessel_mode").val(),
      monnify_mode: $("#monnify_mode").val(),
      payvessel_merchant_id: $("#payvessel_merchant_id").val(),
      clubkonnect_user_id: $("#clubkonnect_user_id").val(),
      clubkonnect_api_key: $("#clubkonnect_api_key").val(),

      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url: 'customer/keys',
      method: 'POST',
      dataType: 'json',
      data: formData,
      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response_fd.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        } else {
          $("#resultHandle").html(response_fd.message);
        }
      }
    });

    event.preventDefault();
  });
</script>

<?php require("site_footer.php"); ?>