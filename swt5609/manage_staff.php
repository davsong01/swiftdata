<?php require("site_header.php"); ?>
<?php

if (!empty($_GET['id']) && isset($_GET['id'])){
$staff_id=$_GET['id'];
$staffinfo = mysqli_fetch_array(mysqli_query($con, "SELECT email, full_name FROM vtuapp_admin WHERE id='$staff_id' AND type='STAFF'"));
$staff_email=$staffinfo['email'];
$staff_fullname=$staffinfo['full_name'];
}
?>
<?php 

if ($manage_staff==1){


echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Manage Staff</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Information</a></li>
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
<h3 class="m-0">'.strtoupper($domain).'</h3>
<p>Welcome '.$fullname.'</p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
    <form id="form-data">

    <label>Staff Name *</label>
    <input type="hidden" id="req_token" value="'.$_SESSION['csrftoken'].'">
    <input type="text" id="staff_name" class="form-control" value="'.$staff_fullname.'" disabled>
    <input type="hidden" id="staff_email" class="form-control" value="'.$staff_email.'">

    <br/>
    <label>Permission to finance *</label>
    <select class="form-control" id="finance" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to lock/unlock *</label>
    <select class="form-control" id="manage_lock" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to manage users *</label>
    <select class="form-control" id="manage_users" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to manage staff *</label>
    <select class="form-control" id="manage_staff" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to manage history *</label>
    <select class="form-control" id="manage_history" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to change notification *</label>
    <select class="form-control" id="manage_message" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to manage review *</label>
    <select class="form-control" id="manage_rating" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to setup APIUSER *</label>
    <select class="form-control" id="manage_apiuser" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to control switch *</label>
    <select class="form-control" id="manage_automation" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to setup prices *</label>
    <select class="form-control" id="manage_prices" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
    </select>

    <br/>
    <label>Permission to change password *</label>
    <select class="form-control" id="manage_login" required>
    <option value="">--Select--</option>
    <option value="1">YES</option>
    <option value="0">NO</option>
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

require ("../functions/htmlpages/admin_pushfail.php"); 
echo $admin_pushfail;

}

?>


    <script type="text/javascript">

     $("#form-data").submit(function (event) {
     var formData = {
      staff_email: $("#staff_email").val(),
      finance: $("#finance").val(),
      manage_lock: $("#manage_lock").val(),
      manage_users: $("#manage_users").val(),
      manage_staff: $("#manage_staff").val(),
      manage_history: $("#manage_history").val(),
      manage_message: $("#manage_message").val(),
      manage_rating: $("#manage_rating").val(),
      manage_apiuser: $("#manage_apiuser").val(),
      manage_automation: $("#manage_automation").val(),
      manage_prices: $("#manage_prices").val(),
      manage_login: $("#manage_login").val(),
      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/manage_staff',
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
                    }, 7000);
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
