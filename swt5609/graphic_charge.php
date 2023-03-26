<?php require("site_header.php"); ?>
<?php 
if ($manage_prices==1){
?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>GRAPHICS CHARGES</h4>
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->


<div class="mb-3">
  <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
  <input type="text" id="charges" class="form-control" placeholder="Withdraw Charges" value="<?php echo $flyer_charge; ?>">
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
      charges: $("#charges").val(),
      req_token: $("#req_token").val(),
    };
    $.ajax({
    url:'customer/save_graphiccharge',
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
