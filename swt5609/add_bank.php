<?php require("site_header.php"); ?>
<?php 
if ($manage_users==1){
?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>ADD NEW BANK</h4>
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->


<div class="mb-3">
  <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
  <label>Bank Name</label>
  <input type="text" id="bank_name" class="form-control" placeholder="Bank Name">
</div>

<div class="mb-3">
  <label>Account Name</label>
  <input type="text" id="account_name" class="form-control" placeholder="Account Name">
</div>

<div class="mb-3">
  <label>Account Number</label>
  <input type="text" id="account_no" class="form-control" placeholder="Account Number">
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
      bank_name: $("#bank_name").val(),
      account_name: $("#account_name").val(),
      account_no: $("#account_no").val(),
      req_token: $("#req_token").val(),
    };
    $.ajax({
    url:'customer/save_newbank',
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
