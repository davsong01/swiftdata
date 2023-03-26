<?php require("site_header.php"); ?>

<?php 

if ($manage_login==1){


echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Security</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Change Password</a></li>
<li class="breadcrumb-item active">Defaault</li>
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
<h3 class="m-0">'.strtoupper($domain).'</h3>
<p>Welcome '.$fullname.'</p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
    <form id="form-data">

    <label>Old Password *</label>
    
    <input type="password" id="old_password" class="form-control" required>

    <br/>

    <label>New Password *</label>
    
    <input type="password" id="new_password" class="form-control" required>

    <br/>

    <label>Confirm Password *</label>
    <input type="hidden" id="req_token" value="'.$_SESSION['csrftoken'].'">
    <input type="password" id="retype_password" class="form-control" required>

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
}

else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>

<script type="text/javascript">
     $("#form-data").submit(function (event) {
      var formData = {
      old_password: $("#old_password").val(),
      new_password: $("#new_password").val(),
      retype_password: $("#retype_password").val(),
      req_token: $("#req_token").val(),
    };

     $.LoadingOverlay("show");
    $.ajax({
      url:'customer/change_password',
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
   $("#resultHandle").html(response_fd.message);
    }
}
    });

    event.preventDefault();
     });
</script>

<?php require("site_footer.php"); ?>
