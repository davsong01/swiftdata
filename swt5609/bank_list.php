<?php require("site_header.php"); ?>
<?php
if ($manage_users==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<div class="col-lg-12">

<div id="transactionsDiv">
    


</div>

<br>


</div>


</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/bank_list?load_id=0',
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(savingRes.message);
            }
        });
    });

    function delFun(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/del_bank?load_id='+id,
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
    }

</script>
<?php
}
else {

require ("admin_pushfail.php"); 
echo $admin_pushfail;
}
?>
<?php require("site_footer.php"); ?>
