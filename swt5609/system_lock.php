<?php require("site_header.php"); ?>
<?php
if ($manage_lock==1){
?>

<div class="main_content_iner ">
  <div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">


      <div class="alert" style="background-color: black;color: #000;">

        <center>
          <h4 style="color: white;">LOCK/UNLOCK DATA</h4>

          <p style="color: white;">click the button to see option.</p>
          <br />
          <button class="btn btn-danger btn-block" id="datalock" onclick="lockFun(this.id)">EDIT INFORMATION</button>

        </center>
      </div>


      <br>
      <br>

      <div class="alert" style="background-color: black;color: #000;">

        <center>
          <h4 style="color: white;">LOCK/UNLOCK VTU AIRTIME</h4>

          <p style="color: white;">click the button to see option.</p>
          <br />
          <button class="btn btn-danger btn-block" id="vtulock" onclick="lockFun(this.id)">EDIT INFORMATION</button>

        </center>
      </div>



      <br>
      <br>

      <div class="alert" style="background-color: black;color: #000;">

        <center>
          <h4 style="color: white;">LOCK/UNLOCK SNS AIRTIME</h4>

          <p style="color: white;">click the button to see option.</p>
          <br />
          <button class="btn btn-danger btn-block" id="snslock" onclick="lockFun(this.id)">EDIT INFORMATION</button>

        </center>
      </div>

      <br>
      <br>

      <div class="alert" style="background-color: black;color: #fff;">

        <center>
          <h4 style="color: white;">LOCK/UNLOCK CABLETV</h4>

          <p style="color: white;">click the button to see option.</p>
          <br />
          <button class="btn btn-danger btn-block" id="cablelock" onclick="lockFun(this.id)">EDIT INFORMATION</button>

        </center>
      </div>

      <br>
      <br>


      <div class="alert" style="background-color: black;color: #fff;">

        <center>
          <h4 style="color: white;">LOCK/UNLOCK E-PINS</h4>

          <p style="color: white;">click the button to see option.</p>
          <br />
          <button class="btn btn-danger btn-block" id="epinslock" onclick="lockFun(this.id)">EDIT INFORMATION</button>

        </center>
      </div>


      <br>
      <br>


      <div class="alert" style="background-color: black;color: #fff;">

        <center>
          <h4 style="color: white;">LOCK/UNLOCK BILLS</h4>

          <p style="color: white;">click the button to see option.</p>
          <br />
          <button class="btn btn-danger btn-block" id="billslock" onclick="lockFun(this.id)">EDIT INFORMATION</button>

        </center>
      </div>

      <br />
      <br>

    </div>
  </div>
</div>

<script type="text/javascript">
  function lockFun(id) {
    $.LoadingOverlay("show");
    $.ajax({
      url: 'customer/fetchlock_data?load_id=' + id,
      dataType: 'json',
      success: function (responseData) {
        $.LoadingOverlay("hide");
        $("#priceModal").modal("show");
        $("#priceModal .modal-body").html(responseData.data);
      }
    });
  }


  function saveDATALOCK() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
    var formData = {
      mtnsme_lock: $("#mtnsme_lock").val(),
      mtncg_lock: $("#mtncg_lock").val(),
      glo_lock: $("#glo_lock").val(),
      glocg_lock: $("#glocg_lock").val(),
      airtel_lock: $("#airtel_lock").val(),
      airtelcg_lock: $("#airtelcg_lock").val(),
      mobile_lock: $("#mobile_lock").val(),
      mobilesme_lock: $("#mobilesme_lock").val(),
      mtn_data_card_lock: $("#mtn_data_card_lock").val(),
      
      level: 1,
    };
    $.ajax({
      url: 'customer/savedata_lock',
      type: "POST",
      data: formData,
      dataType: 'json',
      success: function (savingRes) {
        $.LoadingOverlay("hide");
        if (savingRes.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(savingRes.message);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(savingRes.message);
        }
      }
    });

  }

  function saveVTULOCK() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
    var formData = {
      mtn_lock: $("#mtn_lock").val(),
      glo_lock: $("#glo_lock").val(),
      airtel_lock: $("#airtel_lock").val(),
      mobile_lock: $("#mobile_lock").val(),
      level: 1,
    };
    $.ajax({
      url: 'customer/savevtu_lock',
      type: "POST",
      data: formData,
      dataType: 'json',
      success: function (savingRes) {
        $.LoadingOverlay("hide");
        if (savingRes.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(savingRes.message);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(savingRes.message);
        }
      }
    });

  }

  function saveSNSLOCK() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
    var formData = {
      mtn_lock: $("#mtn_lock3").val(),
      glo_lock: $("#glo_lock3").val(),
      airtel_lock: $("#airtel_lock3").val(),
      mobile_lock: $("#mobile_lock3").val(),
      level: 1,
    };
    $.ajax({
      url: 'customer/savesns_lock',
      type: "POST",
      data: formData,
      dataType: 'json',
      success: function (savingRes) {
        $.LoadingOverlay("hide");
        if (savingRes.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(savingRes.message);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(savingRes.message);
        }
      }
    });

  }


  function saveCABLELOCK() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
    var formData = {
      dstv: $("#dstv").val(),
      gotv: $("#gotv").val(),
      startime: $("#startime").val(),
      showmax: $("#showmax").val(),
      level: 1,
    };
    $.ajax({
      url: 'customer/savecable_lock',
      type: "POST",
      data: formData,
      dataType: 'json',
      success: function (savingRes) {
        $.LoadingOverlay("hide");
        if (savingRes.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(savingRes.message);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(savingRes.message);
        }
      }
    });
  }

  function saveEPINSLOCK() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
    var formData = {
      waec: $("#waec").val(),
      neco: $("#neco").val(),
      gce: $("#gce").val(),
      nabteb: $("#nabteb").val(),
      level: 1,
    };
    $.ajax({
      url: 'customer/saveepins_lock',
      type: "POST",
      data: formData,
      dataType: 'json',
      success: function (savingRes) {
        $.LoadingOverlay("hide");
        if (savingRes.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(savingRes.message);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(savingRes.message);
        }
      }
    });
  }


  function saveBILLSLOCK() {
    $("#priceModal").modal("hide");
    $.LoadingOverlay("show");
    var formData = {
      abuja: $("#abuja").val(),
      eko: $("#eko").val(),
      ibadan: $("#ibadan").val(),
      ikeja: $("#ikeja").val(),
      jos: $("#jos").val(),
      kano: $("#kano").val(),
      kaduna: $("#kaduna").val(),
      portharcourt: $("#portharcourt").val(),
      benin: $("#benin").val(),
      enugu: $("#enugu").val(),

      level: 1,
    };
    $.ajax({
      url: 'customer/savebills_lock',
      type: "POST",
      data: formData,
      dataType: 'json',
      success: function (savingRes) {
        $.LoadingOverlay("hide");
        if (savingRes.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(savingRes.message);
        } else {
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