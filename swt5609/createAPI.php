<?php require("site_header.php"); ?>

<?php 

if ($manage_apiuser==1){

?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">API Deal</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Setup</a></li>
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
<span style="float: right;"><button class="btn btn-danger" onclick="AddAPI()">New API DEal</button>
</span>
</h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>


<div class="alert">

  <p style="color: red;">Note: if a user is allowed to use all your services, this will be cout out of API DEAL.</p>
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
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/view_apideal',
      success:function(response_fd){
     $.LoadingOverlay("hide");
   $("#resultHandle").html(response_fd);
}
    });

      event.preventDefault();
     });

 function blockAPI(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/block_api?data='+id,
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

 function unblockAPI(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/unblock_api?data='+id,
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

 function AddAPI(){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/bringapiform?data=0',
      dataType:"Json",
      success:function(responseData){
     $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
  }
 })
}


 function manageAPI(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/bringapiform2?data='+id,
      dataType:"Json",
      success:function(responseData){
     $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
  }
 })
}

    function saveUPDATEAPI() {
    $.LoadingOverlay("show");
     var formData = {
      api_email: $("#api_email").val(),
      access_mtnsme: $("#access_mtnsme").val(),
      access_mtncg: $("#access_mtncg").val(),
      access_glo: $("#access_glo").val(),
      access_airtel: $("#access_airtel").val(),
      access_airtelcg: $("#access_airtelcg").val(),
      access_mobile: $("#access_mobile").val(),
      access_airtime: $("#access_airtime").val(),
      access_cable : $("#access_cable").val(),
      access_bills: $("#access_bills").val(),
      access_epin: $("#access_epin").val(),
    };
    $.ajax({
    url:'customer/savenew_api',
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

    function saveNEWAPI() {
    $.LoadingOverlay("show");
     var formData = {
      api_email: $("#api_email").val(),
      access_mtnsme: $("#access_mtnsme").val(),
      access_mtncg: $("#access_mtncg").val(),
      access_glo: $("#access_glo").val(),
      access_airtel: $("#access_airtel").val(),
      access_airtelcg: $("#access_airtelcg").val(),
      access_mobile: $("#access_mobile").val(),
      access_airtime: $("#access_airtime").val(),
      access_cable : $("#access_cable").val(),
      access_bills: $("#access_bills").val(),
      access_epin: $("#access_epin").val(),
    };
    $.ajax({
    url:'customer/savenew_api',
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
