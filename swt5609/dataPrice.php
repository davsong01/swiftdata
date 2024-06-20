<?php require("site_header.php"); ?>
<?php
if ($manage_prices == 1) {
?>

  <div class="main_content_iner ">
    <div class="container-fluid p-0 sm_padding_15px">
      <div class="row">
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: orange;color: #000;">

              <center>
                <h4 style="color: black;">SET MTN-SME PRICES</h4>
                <p style="color: black;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="mtnsme1" onclick="editData(this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="mtnsme2" onclick="editData(this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="mtnsme3" onclick="editData(this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="mtnsme4" onclick="editData(this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: green;color: white;">

              <center>
                <h4 style="color: black;">SET MTN-CG PRICES</h4>

                <p style="color: black;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="mtncg1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="mtncg2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="mtncg3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="mtncg4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: #ff00d7;color: #fff;">
              <center>
                <h4 style="color: white;">SET MTN DATA CARD PRICES</h4>
                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="mtn_data_card1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="mtn_data_card2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="mtn_data_card3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="mtn_data_card4" onclick="editData  (this.id)">Level 4</button>
              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: #3b513b;color: white;">
              <center>
                <h4 style="color: white;">SET GLO GIFTING PRICES</h4>

                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="glo1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="glo2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="glo3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="glo4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: #ffc30e;color: white;">
              <center>
                <h4 style="color: white;">SET GLO-CG PRICES</h4>

                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="glocg1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="glocg2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="glocg3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="glocg4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: green;color: white;">
              <center>
                <h4 style="color: white;">SET AIRTEL GIFTING</h4>

                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="airtel1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="airtel2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="airtel3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="airtel4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: red;color: #fff;">
              <center>
                <h4 style="color: white;">SET AIRTEL-CG PRICES</h4>

                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="airtelcg1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="airtelcg2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="airtelcg3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="airtelcg4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: #4b3dae;color: #fff;">
              <center>
                <h4 style="color: black;">SET 9MOBILE PRICES</h4>

                <p style="color: black;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="mobile1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="mobile2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="mobile3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="mobile4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: lime;color: #fff;">
              <center>
                <h4 style="color: white;">SET 9MOBILE-SME PRICES</h4>
                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="mobile_sme1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="mobile_sme2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="mobile_sme3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="mobile_sme4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: brown;color: #fff;">
              <center>
                <h4 style="color: white;">SPECTRANET PRICES
                  <!-- <button id="pull_spectranet_prices" class="btn btn-info btn-sm">Pull prices from provider</button> -->
                </h4>
                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="spectranet1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="spectranet2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="spectranet3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="spectranet4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="justify-content-center">
            <div class="alert" style="background-color: #3296a6;color: #fff;">
              <center>
                <h4 style="color: white;">SMILE PRICES
                  <!-- <button id="pull_smile_prices" class="btn btn-info btn-sm">Pull prices from provider</button> -->
                </h4>
                <p style="color: white;">Click on the level you want to change and a pop up will be display.</p>
                <br />
                <button class="btn btn-dark btn-block" id="smile1" onclick="editData  (this.id)">Level 1</button>
                <button class="btn btn-dark btn-block" id="smile2" onclick="editData  (this.id)">Level 2</button>
                <button class="btn btn-dark btn-block" id="smile3" onclick="editData  (this.id)">Level 3</button>
                <button class="btn btn-dark btn-block" id="smile4" onclick="editData  (this.id)">Level 4</button>

              </center>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <script type="text/javascript">
    function editData(id) {
      $.LoadingOverlay("show");
      $.ajax({
        url: 'customer/fetchdata_price?load_id=' + id,
        dataType: 'json',
        success: function(responseData) {
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

        easy_access158: $("#easy_access158").val(),
        easy_access159: $("#easy_access159").val(),
        easy_access160: $("#easy_access160").val(),
        easy_access161: $("#easy_access161").val(),
        easy_access162: $("#easy_access162").val(),
        easy_access163: $("#easy_access163").val(),
        easy_access164: $("#easy_access164").val(),

        gongzo_data321: $("#gongzo_data321").val(),
        gongzo_data322: $("#gongzo_data322").val(),
        gongzo_data323: $("#gongzo_data323").val(),
        gongzo_data324: $("#gongzo_data324").val(),
        gongzo_data325: $("#gongzo_data325").val(),
        gongzo_data326: $("#gongzo_data326").val(),
        gongzo_data327: $("#gongzo_data327").val(),
        gongzo_data337: $("#gongzo_data337").val(),

        level: $("#level").val(),
      };

      $.ajax({
        url: 'customer/saveglocg_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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
    ////
    ////
    function saveSPECTRANETDATA() {
      $("#priceModal").modal("hide");
      $.LoadingOverlay("show");
      var formData = {
        spectranet1: $("#spectranet1").val(),
        spectranet2: $("#spectranet2").val(),
        spectranet3: $("#spectranet3").val(),
        spectranet4: $("#spectranet4").val(),

        level: $("#level").val(),
      };

      $.ajax({
        url: 'customer/savespectranet_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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
        url: 'customer/savemtnsme_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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

    function saveMOBILESME() {
      $("#priceModal").modal("hide");
      $.LoadingOverlay("show");

      var formData = {
        easy_access166: $("#easy_access166").val(),
        easy_access167: $("#easy_access167").val(),
        easy_access168: $("#easy_access168").val(),
        easy_access128: $("#easy_access128").val(),
        easy_access129: $("#easy_access129").val(),
        easy_access130: $("#easy_access130").val(),
        easy_access131: $("#easy_access131").val(),
        easy_access132: $("#easy_access132").val(),
        easy_access169: $("#easy_access169").val(),
        easy_access134: $("#easy_access134").val(),
        easy_access135: $("#easy_access135").val(),
        easy_access170: $("#easy_access170").val(),
        easy_access136: $("#easy_access136").val(),
        easy_access171: $("#easy_access171").val(),
        easy_access137: $("#easy_access137").val(),
        easy_access138: $("#easy_access138").val(),
        easy_access172: $("#easy_access172").val(),
        easy_access173: $("#easy_access173").val(),
        easy_access174: $("#easy_access174").val(),
        easy_access175: $("#easy_access175").val(),
        easy_access176: $("#easy_access176").val(),
        level: $("#level").val(),
      };
      $.ajax({
        url: 'customer/savemobilesme_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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
        easy_access151: $("#easy_access151").val(),
        gongzo_data280: $("#gongzo_data280").val(),
        gongzo_data281: $("#gongzo_data281").val(),
        gongzo_data282: $("#gongzo_data282").val(),
        gongzo_data283: $("#gongzo_data283").val(),
        gongzo_data284: $("#gongzo_data284").val(),
        gongzo_data285: $("#gongzo_data285").val(),
        gongzo_data286: $("#gongzo_data286").val(),
        gongzo_data287: $("#gongzo_data287").val(),
        gongzo_data288: $("#gongzo_data288").val(),
      };
      $.ajax({
        url: 'customer/savemtncg_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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

    function saveAIRTELCG() {
      $("#priceModal").modal("hide");
      $.LoadingOverlay("show");
      var formData = {
        airtelcg_100: $("#airtelcg_100").val() ?? 0,
        airtelcg_300: $("#airtelcg_300").val() ?? 0,
        airtelcg_500: $("#airtelcg_500").val() ?? 0,
        airtelcg_1: $("#airtelcg_1").val() ?? 0,
        airtelcg_2: $("#airtelcg_2").val() ?? 0,
        airtelcg_5: $("#airtelcg_5").val() ?? 0,
        easy_access104: $("#easy_access104").val() ?? 0,
        easy_access105: $("#easy_access105").val() ?? 0,
        easy_access106: $("#easy_access106").val() ?? 0,
        easy_access107: $("#easy_access107").val() ?? 0,
        easy_access108: $("#easy_access108").val() ?? 0,
        easy_access109: $("#easy_access109").val() ?? 0,
        easy_access124: $("#easy_access124").val() ?? 0,
        easy_access139: $("#easy_access139").val() ?? 0,
        easy_access140: $("#easy_access140").val() ?? 0,

        gongzo_data312: $("#gongzo_data312").val() ?? 0,
        gongzo_data313: $("#gongzo_data313").val() ?? 0,
        gongzo_data314: $("#gongzo_data314").val() ?? 0,
        gongzo_data315: $("#gongzo_data315").val() ?? 0,
        gongzo_data317: $("#gongzo_data317").val() ?? 0,
        gongzo_data318: $("#gongzo_data318").val() ?? 0,
        gongzo_data319: $("#gongzo_data319").val() ?? 0,
        level: $("#level").val(),
      };
      $.ajax({
        url: 'customer/saveairtelcg_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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

    function saveAIRTEL() {
      $("#priceModal").modal("hide");
      $.LoadingOverlay("show");
      var formData = {

        gongzo_data40: $("#gongzo_data40").val() ?? 0,
        gongzo_data45: $("#gongzo_data45").val() ?? 0,
        gongzo_data46: $("#gongzo_data46").val() ?? 0,
        gongzo_data47: $("#gongzo_data47").val() ?? 0,
        gongzo_data48: $("#gongzo_data48").val() ?? 0,
        gongzo_data144: $("#gongzo_data144").val() ?? 0,
        gongzo_data145: $("#gongzo_data145").val() ?? 0,
        gongzo_data146: $("#gongzo_data146").val() ?? 0,
        gongzo_data296: $("#gongzo_data296").val() ?? 0,
        gongzo_data297: $("#gongzo_data297").val() ?? 0,
        gongzo_data298: $("#gongzo_data298").val() ?? 0,

        easy_access66: $("#easy_access66").val() ?? 0,
        easy_access67: $("#easy_access67").val() ?? 0,
        easy_access68: $("#easy_access68").val() ?? 0,
        easy_access69: $("#easy_access69").val() ?? 0,
        easy_access70: $("#easy_access70").val() ?? 0,
        easy_access71: $("#easy_access71").val() ?? 0,
        easy_access72: $("#easy_access72").val() ?? 0,
        easy_access74: $("#easy_access74").val() ?? 0,
        easy_access96: $("#easy_access96").val() ?? 0,
        easy_access97: $("#easy_access97").val() ?? 0,
        easy_access157: $("#easy_access157").val() ?? 0,

        airtel_750: $("#airtel_750").val() ?? 0,
        airtel_15: $("#airtel_15").val() ?? 0,
        airtel_2: $("#airtel_2").val() ?? 0,
        airtel_3: $("#airtel_3").val() ?? 0,
        airtel_45: $("#airtel_45").val() ?? 0,
        airtel_6: $("#airtel_6").val() ?? 0,
        airtel_10: $("#airtel_10").val() ?? 0,
        airtel_11: $("#airtel_11").val() ?? 0,
        airtel_20: $("#airtel_20").val() ?? 0,
        airtel_40: $("#airtel_40").val() ?? 0,
        airtel_75: $("#airtel_75").val() ?? 0,
        airtel_120: $("#airtel_120").val() ?? 0,

        level: $("#level").val(),

      };

      $.ajax({
        url: 'customer/saveairtel_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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

    };

    function saveMTNDATACARD() {
      $("#priceModal").modal("hide");
      $.LoadingOverlay("show");
      var formData = {
        easy_access165: $("#easy_access165").val(),
        level: $("#level").val(),
      };
      $.ajax({
        url: 'customer/savemtndatacard_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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
        url: 'customer/savemobile_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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

        easy_access59: $("#easy_access59").val(),
        easy_access60: $("#easy_access60").val(),
        easy_access87: $("#easy_access87").val(),
        easy_access61: $("#easy_access61").val(),
        easy_access62: $("#easy_access62").val(),
        easy_access63: $("#easy_access63").val(),
        easy_access64: $("#easy_access64").val(),
        easy_access92: $("#easy_access92").val(),
        easy_access93: $("#easy_access93").val(),
        easy_access94: $("#easy_access94").val(),
        easy_access100: $("#easy_access100").val(),
        easy_access101: $("#easy_access101").val(),
        easy_access102: $("#easy_access102").val(),
        
        level: $("#level").val(),
      };
      $.ajax({
        url: 'customer/saveglo_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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

    function saveSMILEDATA() {
      $("#priceModal").modal("hide");
      $.LoadingOverlay("show");
      var formData = {
        smile1: $("#smile1").val(),
        smile2: $("#smile2").val(),
        smile3: $("#smile3").val(),
        smile4: $("#smile4").val(),
        smile5: $("#smile5").val(),
        smile6: $("#smile6").val(),
        smile7: $("#smile7").val(),
        smile8: $("#smile8").val(),
        smile9: $("#smile9").val(),
        smile10: $("#smile10").val(),
        smile11: $("#smile11").val(),
        smile12: $("#smile12").val(),
        smile13: $("#smile13").val(),
        smile14: $("#smile14").val(),
        smile15: $("#smile15").val(),
        smile16: $("#smile16").val(),
        smile17: $("#smile17").val(),
        smile18: $("#smile18").val(),
        smile19: $("#smile19").val(),
        smile20: $("#smile20").val(),
        smile21: $("#smile21").val(),
        smile22: $("#smile22").val(),
        smile23: $("#smile23").val(),
        smile24: $("#smile24").val(),
        smile25: $("#smile25").val(),
        smile26: $("#smile26").val(),
        smile27: $("#smile27").val(),
        smile28: $("#smile28").val(),
        smile29: $("#smile29").val(),
        smile30: $("#smile30").val(),
        smile31: $("#smile31").val(),
        smile32: $("#smile32").val(),
        smile33: $("#smile33").val(),
        smile34: $("#smile34").val(),
        smile35: $("#smile35").val(),
        smile36: $("#smile36").val(),
        smile37: $("#smile37").val(),
        smile38: $("#smile38").val(),
        smile39: $("#smile39").val(),
        smile40: $("#smile40").val(),
        smile41: $("#smile41").val(),
        smile42: $("#smile42").val(),
        smile43: $("#smile43").val(),
        smile44: $("#smile44").val(),
        smile45: $("#smile45").val(),
        smile46: $("#smile46").val(),
        smile47: $("#smile47").val(),
        smile48: $("#smile48").val(),
        smile49: $("#smile49").val(),

        level: $("#level").val(),
      };
      $.ajax({
        url: 'customer/savesmile_price',
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(savingRes) {
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
} else {

  require("admin_pushfail.php");
  echo $admin_pushfail;
}

?>
<?php require("site_footer.php"); ?>