<?php require("site_header.php"); ?>
<?php
if ($manage_history==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<div class="col-lg-12">

<div id="transactionsDiv">
    


</div>

<br>

<div id="loadMoreDiv">
    
</div>

<br>


</div>


</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    //$.LoadingOverlay("show");
    $.ajax({
    url:'customer/wallet_summary?load_id=0',
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").html(transactionsRes.ctrlButton);
            }
        });
    });

    function showMore(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/wallet_summary?load_id='+id,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").html(transactionsRes.ctrlButton);
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
