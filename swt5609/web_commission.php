<?php require("site_header.php"); ?>

<?php 

if ($manage_prices==1){



echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Commission</h3>
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
<h3 class="m-0">'.strtoupper($domain).'</h3>
<p>Welcome '.$fullname.'</p>
</div>
</div>

<div class="alert">
<br/>

    <div id="resultHandle"></div>
    
    <form id="form-data">

    <label>MTN SME COMMISSON *</label>
    <input type="text" class="form-control" id="mdata_comm" value="'.$mdata_comm.'">

    <br/>

    <label>MTN CG COMMISSON *</label>
    <input type="text" class="form-control" id="mcdata_comm" value="'.$mcdata_comm.'">

    <br/>

     <label>AIRTEL COMMISSON *</label>
    <input type="text" class="form-control" id="adata_comm" value="'.$adata_comm.'">

    <br/>

    <label>AIRTEL CG COMMISSON *</label>
    <input type="text" class="form-control" id="acdata_comm" value="'.$acdata_comm.'">

    <br/>

    <label>GLO COMMISSON *</label>
    <input type="text" class="form-control" id="gdata_comm" value="'.$gdata_comm.'">

    <br/>

    <label>9MOBILE COMMISSON *</label>
    <input type="text" class="form-control" id="modata_comm" value="'.$modata_comm.'">

    <br/>

    <label>MTN AIRTIME COMMISSON *</label>
    <input type="text" class="form-control" id="mair_comm" value="'.$mair_comm.'">

    <br/>

    <label>GLO AIRTIME COMMISSON  *</label>
    <input type="text" class="form-control" id="gair_comm" value="'.$gair_comm.'">

    <br/>

    <label>AIRTEL AIRTIME COMMISSON *</label>
    <input type="text" class="form-control" id="aair_comm" value="'.$aair_comm.'">

    <br/>

    <label>9MOBILE AIRTIME COMMISSON *</label>
    <input type="text" class="form-control" id="moair_comm" value="'.$moair_comm.'">

    <br/>

    <label>GOTV COMMISSON *</label>
    <input type="text" class="form-control" id="gotv_comm" value="'.$gotv_comm.'">

    <br/>

    <label>DSTV COMMISSON *</label>
    <input type="text" class="form-control" id="dstv_comm" value="'.$dstv_comm.'">

    <br/>

    <label>STARTIMES COMMISSON *</label>
    <input type="text" class="form-control" id="star_comm" value="'.$star_comm.'">

    <br/>

    <label>WAEC COMMISSON *</label>
    <input type="text" class="form-control" id="waec_comm" value="'.$waec_comm.'">

    <br/>

    <label>NECO COMMISSON *</label>
    <input type="text" class="form-control" id="neco_comm" value="'.$neco_comm.'">

    <br/>

    <label>NABTEB COMMISSON *</label>
    <input type="text" class="form-control" id="nabteb_comm" value="'.$nabteb_comm.'">

    <br/>

    <label>BILLS COMMISSON *</label>
    <input type="text" class="form-control" id="bills_comm" value="'.$bills_comm.'">

    <br/>

    <label>SMS COMMISSON *</label>
    <input type="hidden" id="req_token" value="'.$_SESSION['csrftoken'].'">
    <input type="text" class="form-control" id="sms_comm" value="'.$sms_comm.'">

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
      mdata_comm: $("#mdata_comm").val(),
      mcdata_comm: $("#mcdata_comm").val(),
      adata_comm: $("#adata_comm").val(),
      acdata_comm: $("#acdata_comm").val(),
      gdata_comm: $("#gdata_comm").val(),
      modata_comm: $("#modata_comm").val(),
      mair_comm: $("#mair_comm").val(),
      gair_comm: $("#gair_comm").val(),
      aair_comm: $("#aair_comm").val(),
      moair_comm: $("#moair_comm").val(),
      gotv_comm: $("#gotv_comm").val(),
      dstv_comm: $("#dstv_comm").val(),
      star_comm: $("#star_comm").val(),
      waec_comm: $("#waec_comm").val(),
      neco_comm: $("#neco_comm").val(),
      nabteb_comm: $("#nabteb_comm").val(),
      bills_comm: $("#bills_comm").val(),
      sms_comm :$("#sms_comm").val(),
      req_token: $("#req_token").val(),
    };
    $.LoadingOverlay("show");
    $.ajax({
      url:'customer/commission',
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
