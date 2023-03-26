<?php require("site_header.php"); ?>


<?php
if ($manage_history==1){
?>

<div class="main_content_iner">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<div class="col-lg-12">

<div class="alert" style="background-color: #fff;color: #000;">

	<input type="text" id="search_data" class="form-control" placeholder="Search Mobile No./ Ref No./ Email/ Username"><button class="btn btn-danger" onclick="findRec()" style="width: 100%">Search</button>
</div>


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

    function findRec(){
    var search_data= $("#search_data").val();
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/query?search_data='+search_data,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").hide();
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
