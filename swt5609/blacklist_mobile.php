<?php require("site_header.php"); ?>

<?php 

if ($manage_users==1){

?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Blacklist</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Default</a></li>
<li class="breadcrumb-item active">Settings</li>
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
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
    <form id="form-data">

    <label>Enter Mobile No. *</label>
    <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
    <input type="text" class="form-control" id="black_mobile">

    <br/>

    <button class="btn btn-success btn-block" type="submit" style="width:100%">SUBMIT</button>

    </form>

  <br>
  <br>

   <div>
    <?php

$mobiles="";

$getMobile=mysqli_query($con, "SELECT id, add_mobile, add_date, email FROM blacklist_mobiles ORDER BY id DESC LIMIT 100");

if (mysqli_num_rows($getMobile)<1){

$mobiles = '
<div class="alert alert-danger">
<h4>No Mobile No. Added Yet !!!</h4>
</div>';

}

else {

while ($viewMobile=mysqli_fetch_array($getMobile, MYSQLI_ASSOC)) {

$tbtn='<button class="btn btn-success" id="'.$viewMobile['id'].'" onclick="remMobile(this.id)">Remove</button>';

$mobiles .= '
<div class="alert" style="background-color:grey;color:#fff;cursor:pointer;" id="'.$viewMobile['id'].'">
Mobile No.: '.$viewMobile['add_mobile'].'<br/>
Add Date: '.$viewMobile['add_date'].'<br/>
Who Add It : '.$viewMobile['email'].'<br/><br/>
'.$tbtn.'
<br/>
</div>';
}

}
echo $mobiles;

?>
  </div>

  <br/>
</div>


</div>
</div>



</div>
</div>
</div>

<?php
}

else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>


    <script type="text/javascript">

     $("#form-data").submit(function (event) {
     var formData = {
      black_mobile :$("#black_mobile").val(),
      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/blacklist',
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

 function remMobile(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/whitelist?data='+id,
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
  </script>

<?php require("site_footer.php"); ?>
