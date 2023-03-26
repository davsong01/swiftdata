<?php require("site_header.php"); ?>

<?php 

if ($manage_message==1){



echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Notification</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Message</a></li>
<li class="breadcrumb-item active">PopUp</li>
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

    <label>Write Notification *</label>
    
    <textarea class="form-control" id="notification2" rows="5" required>'.$notification1.'</textarea>

    <br/>

    <label>Option for notification *</label>
    <input type="hidden" id="req_token" value="'.$_SESSION['csrftoken'].'">
    <select class="form-control" id="notification2_mode" required>
    <option value="">--Select--</option>
    <option value="block">SHOW THIS MESSAGE</option>
    <option value="none">HIDE THIS MESSAGE</option>
    </select>

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
      notification2: $("#notification2").val(),
      notification2_mode: $("#notification2_mode").val(),
      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/notification2',
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
