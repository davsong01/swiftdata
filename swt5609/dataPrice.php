<?php require("site_header.php"); ?>
<?php
if ($manage_prices==1){
?>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="row justify-content-center">


<div class="alert" style="background-color: orange;color: #000;">

<center>
<h4 style="color: black;">SET MTN-SME PRICES</h4>

<p style="color: black;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="mtnsme1" onclick="editData(this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="mtnsme2" onclick="editData(this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="mtnsme3" onclick="editData(this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="mtnsme4" onclick="editData(this.id)">Level 4</button>
  
</center>  
</div>


<br>
<br>

<div class="alert" style="background-color: orange;color: #000;">

<center>
<h4 style="color: black;">SET MTN-CG PRICES</h4>

<p style="color: black;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="mtncg1" onclick="editData  (this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="mtncg2" onclick="editData  (this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="mtncg3" onclick="editData  (this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="mtncg4" onclick="editData  (this.id)">Level 4</button>
  
</center>  
</div>

<br>
<br>

<div class="alert" style="background-color: green;color: #fff;">

<center>
<h4 style="color: white;">SET GLO PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="glo1" onclick="editData  (this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="glo2" onclick="editData  (this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="glo3" onclick="editData  (this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="glo4" onclick="editData  (this.id)">Level 4</button>
  
</center>  
</div>

<br>
<br>

<div class="alert" style="background-color: green;color: #fff;">

<center>
<h4 style="color: white;">SET GLO-CG PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="glocg1" onclick="editData  (this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="glocg2" onclick="editData  (this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="glocg3" onclick="editData  (this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="glocg4" onclick="editData  (this.id)">Level 4</button>
  
</center>  
</div>

<br>
<br>


<div class="alert" style="background-color: red;color: #fff;">

<center>
<h4 style="color: white;">SET AIRTEL PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="airtel1" onclick="editData  (this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="airtel2" onclick="editData  (this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="airtel3" onclick="editData  (this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="airtel4" onclick="editData  (this.id)">Level 4</button>
  
</center>  
</div>


<br>
<br>


<div class="alert" style="background-color: red;color: #fff;">

<center>
<h4 style="color: white;">SET AIRTEL-CG PRICES</h4>

<p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="airtelcg1" onclick="editData  (this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="airtelcg2" onclick="editData  (this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="airtelcg3" onclick="editData  (this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="airtelcg4" onclick="editData  (this.id)">Level 4</button>
  
</center>  
</div>


<br/>
<br>

<div class="alert" style="background-color: lime;color: #000;">

<center>
<h4 style="color: black;">SET 9MOBILE PRICES</h4>

<p style="color: black;">Click on the level you want to change and a pop up will be display.</p>
 <br/>
 <button class="btn btn-dark btn-block" id="mobile1" onclick="editData  (this.id)">Level 1</button>
 <button class="btn btn-dark btn-block" id="mobile2" onclick="editData  (this.id)">Level 2</button>
 <button class="btn btn-dark btn-block" id="mobile3" onclick="editData  (this.id)">Level 3</button>
 <button class="btn btn-dark btn-block" id="mobile4" onclick="editData  (this.id)">Level 4</button>
  
</center>  
</div>

</div>
</div>
</div>

<script type="text/javascript">
    function editData(id){
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/fetchdata_price?load_id='+id,
    dataType:'json',
    success:function(responseData){   
    $.LoadingOverlay("hide");
     $("#priceModal").modal("show");
     $("#priceModal .modal-body").html(responseData.data);
            }
        });
    }
    

////
    function saveGLOCG() {
 $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      glocg_200: $("#glocg_200").val(),
      glocg_500: $("#glocg_500").val(),
      glocg_1: $("#glocg_1").val(),
      glocg_2: $("#glocg_2").val(),
      glocg_3: $("#glocg_3").val(),
      glocg_5: $("#glocg_5").val(),
      glocg_10: $("#glocg_10").val(),
      level: $("#level").val(),
    };
    
    $.ajax({
    url:'customer/saveglocg_price',
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
    
    }
    ////

    
    function saveMTNSME() {
      $("#priceModal").modal("hide");
          $.LoadingOverlay("show");
          
          var formData = {
            mtnsme_500: $("#mtnsme_500").val(),
            mtnsme_1: $("#mtnsme_1").val(),
            mtnsme_2: $("#mtnsme_2").val(),
            mtnsme_3: $("#mtnsme_3").val(),
            mtnsme_5: $("#mtnsme_5").val(),
            mtnsme_10: $("#mtnsme_10").val(),
            level: $("#level").val(),
          };
      $.ajax({
      url:'customer/savemtnsme_price',
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
      
    }


    function saveMTNCG() {
      $("#priceModal").modal("hide");
          $.LoadingOverlay("show");
          
          var formData = {
            level: $("#level").val(),
            mtncg_500: $("#mtncg_500").val(),
            mtncg_1: $("#mtncg_1").val(),
            mtncg_2: $("#mtncg_2").val(),
            mtncg_3: $("#mtncg_3").val(),
            mtncg_5: $("#mtncg_5").val(),
            mtncg_10: $("#mtncg_10").val(),
            mtncg_10: $("#mtncg_10").val(),
            easy_access125: $("#easy_access125").val(), 
            easy_access126: $("#easy_access126").val(), 
            easy_access127: $("#easy_access127").val(), 
            easy_access45: $("#easy_access45").val(),
            easy_access46: $("#easy_access46").val(),
            easy_access47: $("#easy_access47").val(),
            easy_access48: $("#easy_access48").val(),
            easy_access49: $("#easy_access49").val(),
            easy_access88: $("#easy_access88").val(),
            easy_access89: $("#easy_access89").val(),
            easy_access90: $("#easy_access90").val(),
            easy_access141: $("#easy_access141").val(),
            easy_access142: $("#easy_access142").val(),
            easy_access143: $("#easy_access143").val(),
            easy_access144: $("#easy_access144").val(),
            easy_access145: $("#easy_access145").val(),
            easy_access146: $("#easy_access146").val(),
            easy_access147: $("#easy_access147").val(),
            easy_access148: $("#easy_access148").val(),
            easy_access149: $("#easy_access149").val(),
            easy_access150: $("#easy_access150").val(),
            easy_access151:$("#easy_access151").val(),
          };
          $.ajax({
            url:'customer/savemtncg_price',
            type:"POST",
            data:formData,
            dataType:'json',
            success:function(savingRes){   
            $.LoadingOverlay("hide");
            if (savingRes.status=='success'){
                $("#successModal").modal("show");
                $("#successModal .modal-body").html(savingRes.message);
              }else{
                $("#errorModal").modal("show");
                $("#errorModal .modal-body").html(savingRes.message);
              }
            }
        });
    
    }

    function saveAIRTELCG() {
      $("#priceModal").modal("hide");
          $.LoadingOverlay("show");
          var formData = {
            airtelcg_100: $("#airtelcg_100").val(),
            airtelcg_300: $("#airtelcg_300").val(),
            airtelcg_500: $("#airtelcg_500").val(),
            airtelcg_1: $("#airtelcg_1").val(),
            airtelcg_2: $("#airtelcg_2").val(),
            airtelcg_5: $("#airtelcg_5").val(),
            easy_access104: $("#easy_access104").val(),
            easy_access105: $("#easy_access105").val(),
            easy_access106: $("#easy_access106").val(),
            easy_access107: $("#easy_access107").val(),
            easy_access108: $("#easy_access108").val(),
            easy_access109: $("#easy_access109").val(),
            easy_access124: $("#easy_access124").val(),
            easy_access139: $("#easy_access139").val(),
            easy_access140: $("#easy_access140").val(),
            level: $("#level").val(),
          };
      $.ajax({
      url:'customer/saveairtelcg_price',
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
    
    }

      function saveAIRTEL() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      airtel_750: $("#airtel_750").val(),
      airtel_15: $("#airtel_15").val(),
      airtel_2: $("#airtel_2").val(),
      airtel_3: $("#airtel_3").val(),
      airtel_45: $("#airtel_45").val(),
      airtel_6: $("#airtel_6").val(),
      airtel_10: $("#airtel_10").val(),
      airtel_11: $("#airtel_11").val(),
      airtel_20: $("#airtel_20").val(),
      airtel_40: $("#airtel_40").val(),
      airtel_75: $("#airtel_75").val(),
      airtel_120: $("#airtel_120").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/saveairtel_price',
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

      function saveMOBILE() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      mobile_500: $("#mobile_500").val(),
      mobile_15: $("#mobile_15").val(),
      mobile_2: $("#mobile_2").val(),
      mobile_3: $("#mobile_3").val(),
      mobile_45: $("#mobile_45").val(),
      mobile_11: $("#mobile_11").val(),
      mobile_150: $("#mobile_150").val(),
      mobile_40: $("#mobile_40").val(),
      mobile_75: $("#mobile_75").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/savemobile_price',
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

      function saveGLO() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
     var formData = {
      glo_105: $("#glo_105").val(),
      glo_29: $("#glo_29").val(),
      glo_41: $("#glo_41").val(),
      glo_58: $("#glo_58").val(),
      glo_77: $("#glo_77").val(),
      glo_10: $("#glo_10").val(),
      glo_1325: $("#glo_1325").val(),
      glo_1825: $("#glo_1825").val(),
      glo_295: $("#glo_295").val(),
      glo_50: $("#glo_50").val(),
      glo_93: $("#glo_93").val(),
      level: $("#level").val(),
    };
    $.ajax({
    url:'customer/saveglo_price',
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
