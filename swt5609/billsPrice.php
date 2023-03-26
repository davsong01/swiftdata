<?php require("site_header.php"); ?>
<?php
if ($manage_prices==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">

<center>
<div class="alert" style="background-color: black;color: #000;">
<h4 style="color: #fff">SET BILLS CHARGES</h4>

<p style="color: #fff">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-warning btn-block" id="1" onclick="editPrice(this.id)">Level 1</button>
 <button class="btn btn-warning btn-block" id="2" onclick="editPrice(this.id)">Level 2</button>
 <button class="btn btn-warning btn-block" id="3" onclick="editPrice(this.id)">Level 3</button>
 <button class="btn btn-warning btn-block" id="4" onclick="editPrice(this.id)">Level 4</button>
    
</div>

</center>
<br>


</div>
</div>
</div>

<script type="text/javascript">
    function editPrice(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/fetchbills_price?load_id='+id,
    dataType:'json',
    success:function(responseData){   
    $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
            }
        });
    }
    
    function saveData() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      abuja: $("#abuja").val(),
      eko: $("#eko").val(),
      ikeja: $("#ikeja").val(),
      ibadan: $("#ibadan").val(),
      jos: $("#jos").val(),
      kano: $("#kano").val(),
      kaduna: $("#kaduna").val(),
      portharcourt: $("#portharcourt").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/savebills_price',
    type:"POST",
    data:formData,
    dataType:'json',
    success:function(savingRes){   
    $.LoadingOverlay("hide");
    if (savingRes.status=='success'){
     $("#successModal").modal("show");
     $("#successModal .modal-body").html(savingRes.message);
    }
    else{
     $("#errorModal").modal("show");
     $("#errorModal .modal-body").html(savingRes.message);
    }
            }
        });
    
    };
</script>
<?php
}
else {

require ("admin_pushfail.php"); 
echo $admin_pushfail;
}
?>
<?php require("site_footer.php"); ?>
