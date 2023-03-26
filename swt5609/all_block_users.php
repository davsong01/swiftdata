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
<h3 class="f_s_25 f_w_700 dark_text">All Suspend Users</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
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
</span>
</h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>

<div class="alert">
<br/>

  <div id="resultHandle">
    
<?php

$message="";

$getUser=mysqli_query($con, "SELECT * FROM users WHERE block='1' ORDER BY id DESC LIMIT 200");

if (mysqli_num_rows($getUser)<1){

$message = '
<div class="alert alert-danger">
<h4>No Suspend Account Yet !!!</h4>
</div>';

}

else{
 while ($viewUsers=mysqli_fetch_array($getUser, MYSQLI_ASSOC)) {

if ($viewUsers['block']==1){

$todobtn='<button class="btn btn-success" id="'.$viewUsers['id'].'" onclick="unblockUser(this.id)">Unblock</button>';
}

else {

$todobtn='<button class="btn btn-warning" id="'.$viewUsers['id'].'" onclick="blockUser(this.id)">Block</button>';
}

$message .= '
<div class="alert" style="background-color:#24B678;color:#fff;cursor:pointer;" id="'.$viewUsers['id'].'">
Full Name: '.$viewUsers['full_name'].'<br/>
Reg. Date: '.$viewUsers['reg_date'].'<br/>
Email : '.$viewUsers['email'].'<br/>
User : '.$viewUsers['username'].'<br/>
Current Bal. : '.$viewUsers['wallets'].'<br/><br/>

'.$todobtn.'
<br/>
</div>';
 }

}


echo $message;

?>
  </div>
    

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
  
   function blockUser(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/block_user?data='+id,
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

 function unblockUser(id){
 $.LoadingOverlay("show");
    $.ajax({
      url:'customer/unblock_user?data='+id,
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
