<?php require("site_header.php"); ?>
<?php
if ($manage_prices==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">


<div class="alert" style="background-color: green;color: #fff;">

<center>
<h4 style="color: white;">SET GOTV PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="g1" onclick="editGotv(this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="g2" onclick="editGotv(this.id)">Level 2</button>
<button class="btn btn-dark btn-block" id="g3" onclick="editGotv(this.id)">Level 3</button>
<button class="btn btn-dark btn-block" id="g4" onclick="editGotv(this.id)">Level 4</button>

  
</center>  
</div>


<br>
<br>

<div class="alert" style="background-color: steelblue;color: #000;">

<center>
<h4 style="color: white;">SET STARTIMES PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="s1" onclick="editStar(this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="s2" onclick="editStar(this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="s3" onclick="editStar(this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="s4" onclick="editStar(this.id)">Level 4</button>
  
</center>  
</div>


<br/>
<br>

<div class="alert" style="background-color: blue;color: #000;">

<center>
<h4 style="color: white;">SET DSTV PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="d1" onclick="editDstv(this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="d2" onclick="editDstv(this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="d3" onclick="editDstv(this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="d4" onclick="editDstv(this.id)">Level 4</button>
  
</center>  
</div>

</div>
</div>
</div>

<script type="text/javascript">
    function editGotv(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/fetchcable_price?load_id='+id,
    dataType:'json',
    success:function(responseData){   
    $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
            }
        });
    }

    function editStar(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/fetchstar_price?load_id='+id,
    dataType:'json',
    success:function(responseData){   
    $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
            }
        });
    }

    function editDstv(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/fetchdstv_price?load_id='+id,
    dataType:'json',
    success:function(responseData){   
    $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
            }
        });
    }
    
    function saveGotv() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      gotv_1: $("#gotv_1").val(),
      gotv_2: $("#gotv_2").val(),
      gotv_3: $("#gotv_3").val(),
      gotv_4: $("#gotv_4").val(),
      gotv_5: $("#gotv_5").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/savegotv_price',
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

      function saveStar() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      star_1: $("#star_1").val(),
      star_2: $("#star_2").val(),
      star_3: $("#star_3").val(),
      star_4: $("#star_4").val(),
      star_5: $("#star_5").val(),
      star_6: $("#star_6").val(),
      star_7: $("#star_7").val(),
      star_8: $("#star_8").val(),
      star_9: $("#star_9").val(),
      star_10: $("#star_10").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/savestar_price',
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

    function saveDstv() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      dstv_1: $("#dstv_1").val(),
      dstv_2: $("#dstv_2").val(),
      dstv_3: $("#dstv_3").val(),
      dstv_4: $("#dstv_4").val(),
      dstv_5: $("#dstv_5").val(),
      dstv_6: $("#dstv_6").val(),
      dstv_7: $("#dstv_7").val(),
      dstv_8: $("#dstv_8").val(),
      dstv_9: $("#dstv_9").val(),
      dstv_10: $("#dstv_10").val(),
      dstv_11: $("#dstv_11").val(),
      dstv_12: $("#dstv_12").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/savedstv_price',
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
