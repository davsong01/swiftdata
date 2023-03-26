<?php require("site_header.php"); ?>


<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<div class="col-lg-12">

<div id="transactionsDiv">
	


</div>

<br>
<br>


</div>


</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
	$.ajax({
    url:'<?php echo $baseurl; ?>/customer/wallets',
    dataType:'json',
    success:function(transactions){   
    $("#transactionsDiv").html(transactions.message);
    $("#ctrlButton").html(transactions.ctrlButton);
     setTimeout(function(){
     sendRequest();
     }, 1000);
			}
        })
	})
</script>

<?php require("site_footer.php"); ?>
