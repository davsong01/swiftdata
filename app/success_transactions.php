<?php require("site_header.php"); ?>


<div class="main_content_iner">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<div class="col-lg-12">

<div class="alert" style="background-color: #fff;color: #000;">

	<input type="text" id="search_data" class="form-control" placeholder="Search Mobile No.">
    <hr/><button class="btn btn-danger" onclick="findRec()">Search</button>
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
    
	$(document).ready(function () {
    $.LoadingOverlay("show");
	$.ajax({
    url:'<?php echo $baseurl; ?>/customer/stransactions?load_id=500',
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
    url:'<?php echo $baseurl; ?>/customer/stransactions?load_id='+id,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").html(transactionsRes.ctrlButton);
            }
        });
    }

    function findRec(){
    var search_data= $("#search_data").val();
    $.LoadingOverlay("show");
    $.ajax({
    url:'<?php echo $baseurl; ?>/customer/query?search_data='+search_data,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
    $("#loadMoreDiv").hide();
            }
        });
    }

    function rceipt(id){
    $.LoadingOverlay("show");
    window.location.href="invoice?reference="+id;
    }

</script>

<?php require("site_footer.php"); ?>
