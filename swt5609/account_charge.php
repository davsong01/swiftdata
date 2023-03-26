<?php require("site_header.php"); ?>
<?php 
if ($manage_prices==1){
?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>USER LEVEL CHARGES</h4>
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->


<div class="mb-3">
  <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
  <label>Charges For Level 2</label>
  <input type="tel" id="charges2" class="form-control" placeholder="Level 2 Charges" value="<?php echo $level2_charge; ?>">
  <label style="color: red;">Admin Default Charges</label>
  <input type="tel" id="admin2" class="form-control" placeholder="Admin Charges" value="<?php echo $level2_adminch; ?>">
</div>

<div class="mb-3">
  <label>Charges For Level 3</label>
  <input type="tel" id="charges3" class="form-control" placeholder="Level 3 Charges" value="<?php echo $level3_charge; ?>">
  <label style="color: red;">Admin Default Charges</label>
  <input type="tel" id="admin3" class="form-control" placeholder="Admin Charges" value="<?php echo $level3_adminch; ?>">
</div>

<div class="mb-3">
  <label>Charges For Level 4</label>
  <input type="tel" id="charges4" class="form-control" placeholder="Admin Charges" value="<?php echo $level4_charge; ?>">
  <label style="color: red;">Admin Default Charges</label>
  <input type="tel" id="admin4" class="form-control" placeholder="Admin Charges" value="<?php echo $level4_adminch; ?>">
</div>

<button class="btn btn-block btn-success" onclick="saveUPDATES()" style="width: 100%">Save Data</button>

<br>
<br>

<div id="transactionsDiv"></div>

</div>
</div>
</div>


</div>
</div>
</div>

<!-- end-->


</div>




</div>
</div>
</div>

<script type="text/javascript">

    function saveUPDATES() {
    $.LoadingOverlay("show");
     var formData = {
      charges2: $("#charges2").val(),
      charges3: $("#charges3").val(),
      charges4: $("#charges4").val(),
      admin2: $("#admin2").val(),
      admin3: $("#admin3").val(),
      admin4: $("#admin4").val(),
      req_token: $("#req_token").val(),
    };
    $.ajax({
    url:'customer/save_accountcharge',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
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

<?php
}
else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>
<?php require("site_footer.php"); ?>
