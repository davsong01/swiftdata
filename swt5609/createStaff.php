<?php require("site_header.php"); ?>

<?php 

if ($manage_staff==1){

?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Manage Staff</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Staff</a></li>
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
<h3 class="m-0"><?php echo strtoupper($domain); ?> 
<span style="float: right;"><button class="btn btn-success" onclick="AddStaff()">Add New Staff</button>
</span>
</h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    

  <br>
  <br>
  <br/>
</div>


</div>
</div>



</div>
</div>
</div>;

<?php
}

else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>


    <script type="text/javascript">

    $(document).ready(function (event) {
    //$.LoadingOverlay("show");
    $.ajax({
      url:'customer/view_staff',
      success:function(response_fd){
     $.LoadingOverlay("hide");
   $("#resultHandle").html(response_fd);
}
    });

      event.preventDefault();
     });

  function manageStaff(id){
  $.LoadingOverlay("show");

  }

 function blockStaff(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/block_staff?data='+id,
      dataType:"Json",
      success:function(response_fd){
     $.LoadingOverlay("hide");
    if (response_fd.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(response_fd.message);
     setTimeout(function() {
                        window.location.reload();
                    }, 2000);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(response_fd.message);
     setTimeout(function() {
                        window.location.reload();
                    }, 2000);
    }
  }
 })
}

 function unblockStaff(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/unblock_staff?data='+id,
      dataType:"Json",
      success:function(response_fd){
     $.LoadingOverlay("hide");
    if (response_fd.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(response_fd.message);
     setTimeout(function() {
                        window.location.reload();
                    }, 2000);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(response_fd.message);
     setTimeout(function() {
                        window.location.reload();
                    }, 2000);
    }
  }
 })
}

 function AddStaff(){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/bringform?data=0',
      dataType:"Json",
      success:function(responseData){
     $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
  }
 })
}


 function manageStaff(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/bringform2?data='+id,
      dataType:"Json",
      success:function(responseData){
     $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
  }
 })
}

    function saveUPDATESTAFF() {
    $.LoadingOverlay("show");
     var formData = {
      staff_email: $("#staff_email").val(),
      access_finance: $("#access_finance").val(),
      access_lock: $("#access_lock").val(),
      access_history: $("#access_history").val(),
      access_users: $("#access_users").val(),
      access_apiusers : $("#access_apiusers").val(),
      access_staff: $("#access_staff").val(),
      access_automate: $("#access_automate").val(),
      access_price: $("#access_price").val(),
      access_message: $("#access_message").val(),
    };
    $.ajax({
    url:'customer/saveupdate_staff',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
    $("#priceModal").modal("hide");
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
          setTimeout(function() {
                        window.location.reload();
                    }, 2000);
    }
    else{
    alert(savingRes.message);
    }
            }
        });
    
    };

    function saveNEWSTAFF() {
    $.LoadingOverlay("show");
     var formData = {
      staff_fullname: $("#staff_fullname").val(),
      staff_username: $("#staff_username").val(),
      staff_email: $("#staff_email").val(),
      staff_password: $("#staff_password").val(),
      access_finance: $("#access_finance").val(),
      access_lock: $("#access_lock").val(),
      access_history: $("#access_history").val(),
      access_users: $("#access_users").val(),
      access_apiusers : $("#access_apiusers").val(),
      access_staff: $("#access_staff").val(),
      access_automate: $("#access_automate").val(),
      access_price: $("#access_price").val(),
      access_message: $("#access_message").val(),
      //userid: $("#level").val(),
    };
    $.ajax({
    url:'customer/savenew_staff',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
    $("#priceModal").modal("hide");
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
          setTimeout(function() {
                        window.location.reload();
                    }, 2000);
    }
    else{
    alert(savingRes.message);
    }
            }
        });
    
    };
  </script>

<?php require("site_footer.php"); ?>
