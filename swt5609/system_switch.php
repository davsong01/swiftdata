<?php require("site_header.php"); ?>
<?php
$colors = array('#d98383', '#111', 'green');

$key = array_rand($colors);

if ($manage_automation == 1) {

?>
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert" style="background-color:<?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE DATA PROVIDER</h4>

                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="data" onclick="switchFun(this.id)">EDIT
                            </button>

                        </center>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="alert" style="background-color:<?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE DATA CARD PROVIDER</h4>

                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="data_card" onclick="switchFun(this.id)">EDIT
                            </button>

                        </center>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="alert" style="background-color: <?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE VTU PROVIDER</h4>

                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="vtu" onclick="switchFun(this.id)">EDIT
                            </button>

                        </center>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert" style="background-color: <?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE SNS PROVIDER</h4>

                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="sns" onclick="switchFun(this.id)">EDIT
                            </button>

                        </center>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert" style="background-color: <?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE SMS PROVIDER</h4>
                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="sms" onclick="switchFun(this.id)">EDIT
                            </button>
                        </center>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert" style="background-color: <?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE EDUCATION PINS PROVIDER</h4>
                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="education" onclick="switchFun(this.id)">EDIT
                            </button>
                        </center>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="alert" style="background-color: <?php echo $colors[$key]; ?>;color: #000;">
                        <center>
                            <h4 style="color: white;">CHANGE PAYMENT PROCESSOR</h4>
                            <p style="color: white;">click the button to see option.</p>
                            <br />
                            <button class="btn btn-danger btn-block" id="payment_gateway" onclick="switchFun(this.id)">EDIT
                            </button>
                        </center>
                    </div>
                </div> -->

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function switchFun(id) {
            $.LoadingOverlay("show");
            $.ajax({
                url: 'customer/fetchswitch_data?load_id=' + id,
                dataType: 'json',
                success: function(responseData) {
                    $.LoadingOverlay("hide");
                    $("#priceModal").modal("show");
                    $("#priceModal .modal-body").html(responseData.data);
                }
            });
        }

        function saveDATA() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                mtnsme_data: $("#mtnsme_data").val(),
                mtncg_data: $("#mtncg_data").val(),
                glo_data: $("#glo_data").val(),
                glocg_data: $("#glocg_data").val(),
                airtel_data: $("#airtel_data").val(),
                airtelcg_data: $("#airtelcg_data").val(),
                mobile_data: $("#mobile_data").val(),
                mobile_sme: $("#mobile_sme").val(),
                mtn_data_card: $("#mtn_data_card").val(),
                api_spectranet: $("#api_spectranet").val(),
                api_smile: $("#api_smile").val(),

                level: 1,
            };
            $.ajax({
                url: 'customer/savedata_switch',
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

        function saveDATACARD() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                mtn_data_card: $("#mtn_data_card").val(),
                level: 1,
            };
            $.ajax({
                url: 'customer/savedata_switch',
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

        function saveVTU() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                mtn_vtu: $("#mtn_vtu").val(),
                glo_vtu: $("#glo_vtu").val(),
                airtel_vtu: $("#airtel_vtu").val(),
                mobile_vtu: $("#mobile_vtu").val(),
                smile_vtu: $("#smile_vtu").val(),

                level: 1,
            };
            $.ajax({
                url: 'customer/savevtu_switch',
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

        function saveSNS() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                mtn_sns: $("#mtn_sns").val(),
                glo_sns: $("#glo_sns").val(),
                airtel_sns: $("#airtel_sns").val(),
                mobile_sns: $("#mobile_sns").val(),
                level: 1,
            };
            $.ajax({
                url: 'customer/savesns_switch',
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

        function savePaymentGateway() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                selected: $("#patment_gateway").val(),
                type: 'payment_gateway'
            };
            $.ajax({
                url: 'customer/save_all_switch',
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

        function saveSMS() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                sms: $("#sms").val(),
                level: 1,
            };
            $.ajax({
                url: 'customer/savesms_switch',
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

        function saveEducation() {
            $("#priceModal").modal("hide");
            $.LoadingOverlay("show");
            var formData = {
                waec: $("#waec").val(),
                waec_registration: $("#waec_registration").val(),
                neco: $("#neco").val(),
                nabteb: $("#nabteb").val(),
                nbais: $("#nbais").val(),
                type: 'education',
                level: 1
            };

            $.ajax({
                url: 'customer/update_provider',
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