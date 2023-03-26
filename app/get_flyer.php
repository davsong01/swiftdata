<?php require("site_header.php"); ?>
<?php

if ($notification_mode=="ON"){
?>

   <script type="text/javascript">
  
  $(document).ready(function () {
  $("#myModal3").modal("show");
  })
</script>

<?php

}

?>

<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Get Flyers Design For Business @ Affordable Price.</h4>
          <p style="color: red;font-weight: bold;">This service cost ₦<?php echo $flyer_charge; ?> charges.</p>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="background-color: #fff">

        <div id="response"></div>

                 <div class="mb-3">
                 <label>Select Business Type</label>
                 <input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
                 <select class="form-control" id="business_type">
                   <option value="">--Choose--</option>
                   <option value="Corporate">Corporate Business</option>
                   <option value="Individual">Individual Business</option>
                 </select>
               </div>

                 <div class="mb-3">
                   <label>Business Name</label>
                   <input type="text" name="" id="business_name" placeholder="Business Name" class="form-control">
                 </div>

                 <div class="mb-3">
                   <label>Email Address</label>
                   <input type="text" name="" id="business_email" placeholder="Business Email" class="form-control">
                 </div>

                 <div class="mb-3">
                   <label>Business Line <span style="color: red;">Separate by commas if more than one.</span></label>
                   <input type="text" name="" id="business_line" placeholder="Business No(s)" class="form-control">
                 </div>

                 <div class="mb-3">
                   <label>Flyer Contents</label>
                   <textarea id="business_content" placeholder="Describe about your business" class="form-control" rows="6"></textarea>
                 </div>
            
               <br/>
              <button class="btn btn-success btn-block" style="width: 100%" id="buyFlyer">BUY FLYER</button>
              <br>
</div>
<br>

</div>
</div>

<script type="text/javascript">

$("#buyFlyer").click(function () {
var formData ={
business_type : $("#business_type").val(),
business_name :$("#business_name").val(),
business_email :$("#business_email").val(),
business_line : $("#business_line").val(),
business_content : $("#business_content").val(),
req_token :$("#req_token").val(),
};
$.LoadingOverlay("show");
$.ajax({
  url:"<?php echo $baseurl; ?>/customer/flyers",
  method:"POST",
  dataType:"Json",
  data:formData,
  success:function(response){
  $.LoadingOverlay("hide");
  if (response.status=='success'){
    $("#message").val("");
    $("#successModal").modal("show");
    $("#successModal .modal-body").html(response.message);
      setTimeout(function() {
                        window.location.reload();
                    }, 2000);
  }
else {
    $("#errorModal").modal("show");
    $("#errorModal .modal-body").html(response.message);
  }
}
})
})
 </script> 

<?php require("site_footer.php"); ?>
