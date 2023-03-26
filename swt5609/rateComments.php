<?php require("site_header.php"); ?>

<?php 

if ($manage_rating==1){


echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Star Rating</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Comments</a></li>
<li class="breadcrumb-item active">Users</li>
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

    $(document).ready(function (event) {
    //$.LoadingOverlay("show");
    $.ajax({
      url:'customer/rating_comments',
      success:function(response_fd){
     $.LoadingOverlay("hide");
   $("#resultHandle").html(response_fd);
}
    });

      event.preventDefault();
     });
  </script>

<?php require("site_footer.php"); ?>
