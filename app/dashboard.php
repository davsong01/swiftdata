<?php require("site_header.php"); ?>
<?php

if ($notification_mode=="ON"){
?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#myModal3").modal("show");
    })
</script>

<?php

}

?>

<div class="alert">

    <div class="col-xl-12">
        <div class="alert" style="background-color: #fff;display: <?php echo $notification1_mode; ?>;">

            <div id="response" style="text-align: center;">
                <p><?php echo $notification1; ?></p>
            </div>

        </div>
    </div>

    <div class="col-xl-12">
        <div class="alert" style="background-color: #fff;display: <?php echo $notification2_mode; ?>">

            <div id="response" style="text-align: center;">
                <p><?php echo $notification2; ?></p>
            </div>

        </div>
    </div>

    <div class="col-xl-12">
        <div class="alert" style="background-color: #fff;display: <?php echo $notification3_mode; ?>;color: blue;">

            <div id="response" style="text-align: center;">
                <h4><?php echo $notification3; ?></h4>
            </div>

        </div>
    </div>


    <div class="col-xl-12">
        <span style="color:blue">
            <marquee><?php if ($scrolling_mode=="ON"){ echo $notification_scroll; } ?> </marquee>
        </span>
        <div class="alert"
            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

            <div id="response" style="text-align: left;">
                <span>Available Balance
                    <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()"
                            style="font-size:10px">Fund Wallet</button></span>
                </span>
                <br />

                <span
                    style="color: #940798;font-weight: bold;font-size: 25px;">₦<?php echo number_format($Account_Balance,2); ?></span>

            </div>

        </div>
    </div>

    <div class="col-xl-12">
        <div class="alert" style="background-color: transparent;">
            <center>
                <span class="btn" style="font-size:12px;background-color:#940798;color:#fff" onclick="SalesAna()">Sales
                    Summary</span>
                <span class="btn" style="font-size:12px;background-color:#940798;color:#fff"
                    onclick="Transact()">Transactions</span>
            </center>
        </div>
    </div>


    <!-- Option-section -->
    <center>
        <div class="alert" style="background-color: #fff;color:#fff;border-radius: 7px 7px;">
            <div class="option-section mb-15">
                <div class="row gx-3">
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card border-2 border-rose-600">
                            <a href="<?php echo $baseurl; ?>/airtime_vtu">
                                <div class="option-card-icon">
                                    <i class="fa fa-phone" style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Airtime</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/data">
                                <div class="option-card-icon">
                                    <i class="fa fa-wifi" style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Buy Data</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/cable">
                                <div class="option-card-icon">
                                    <i class="fa fa-tv" style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">CableTv</p>
                            </a>
                        </div>
                    </div>
                </div>

                <br />

                <div class="row gx-3">
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/bills">
                                <div class="option-card-icon">
                                    <i class="fa fa-lightbulb" style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Pay Bills</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/epins">
                                <div class="option-card-icon">
                                    <i class="fa fa-qrcode" style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Buy E-Pins</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/withdraw">
                                <div class="option-card-icon">

                                    <i class="fa fa-download" style="font-size: 25px;margin: 5px;color: #940798"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Withdraw</p>
                            </a>
                        </div>
                    </div>
                </div>

                <br />

                <div class="row gx-3">
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/bulk_sms">
                                <div class="option-card-icon">
                                    <i class="fa fa-envelope" style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Bulk SMS</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/exchange_airtime">
                                <div class="option-card-icon">
                                    <i class="fa fa-wallet" style="font-size: 25px;margin: 5px;color: #940798"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Swap Airtime</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15"
                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;height: 70px;border-radius: 20px;margin: 5px;">
                        <div class="option-card">
                            <a href="<?php echo $baseurl; ?>/get_flyer">
                                <div class="option-card-icon">
                                    <i class="fa fa-paper-plane"
                                        style="font-size: 25px;color: #940798;margin: 5px;"></i>
                                </div>
                                <p style="font-weight:bold;font-size:10px;">Get Graphic</p>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </center>
    <!-- Option-section -->

    <div class="col-xl-12">
        <div class="alert" style="background-color: #fff">

            <div id="response"></div>
            <label style="color: red;">Refer a friend and earn extra cash on <?php echo $sitename; ?></label>
            <p>Get 50% bonus immediately a user you referred upgrade to level 2 or 3.</p>
            <p class="text-dark" style="font-weight: bold;">Referral Link
                <span><?php echo $mainpage; ?>/regsiter?referral=<?php echo $username; ?></span> <i class="fa fa-copy"
                    style="font-size: 13px;cursor: pointer;" onclick="copyFunction()">Copy</i> <span id="refres"></span>
            </p>
            <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
            <select class="form-control" id="level">
                <option value="">--Choose--</option>
                <option value="2">Upgrade To Level 2 => N<?php echo $level2_charge; ?></option>
                <option value="3">Upgrade To Level 3 => N<?php echo $level3_charge; ?></option>
                <option value="4">Upgrade To Level 4 => N<?php echo $level4_charge; ?></option>
            </select>

            <br />
            <button class="btn btn-success btn-block" style="width: 100%" id="upgrade">UPGRADE</button>
        </div>

        <!-- <div class="alert" style="background-color: #fff">

            <div id="response"></div>
            <label style="color: red;">Do you have any challengies ? We love to hear from you. Reach us anytime.</label>
            <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
            <textarea class="form-control" id="message" required="required"
                placeholder="Write your message..."></textarea>

            <br />

            <button class="btn btn-success btn-block" id="contactus">Contact Us</button>
            <button class="btn btn-warning btn-block" id="#">Report</button>

        </div> -->
    </div>
</div>


<input type="text" id="myCode" value="<?php echo $mainpage; ?>/register?referral=<?php echo $username; ?>"
    style="background-color: transparent; color: transparent; height: 0px;border: none;">

<script>
    function LiveChat() {
        $.LoadingOverlay("show");
        window.location.href = "live_chat";
    }

    function SalesAna() {
        $.LoadingOverlay("show");
        window.location.href = "sales_analysis";
    }

    function Transact() {
        $.LoadingOverlay("show");
        window.location.href = "transactions";
    }
</script>


<script type="text/javascript">
    function copyFunction() {
        var copyText = document.getElementById("myCode");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        navigator.clipboard.writeText(copyText.value);
        $("#refres").text("COPIED");
    }

    $("#contactus").click(function () {
        var message_report = $("#message").val();
        var req_token = $("#req_token").val();
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?php echo $baseurl; ?>/customer/report",
            method: "POST",
            dataType: "Json",
            data: {
                message_report: message_report,
                req_token: req_token
            },
            success: function (response) {
                $.LoadingOverlay("hide");
                if (response.status == 'success') {
                    $("#message").val("");
                    $("#successModal").modal("show");
                    $("#successModal .modal-body").html(response.message);
                } else {
                    $("#errorModal").modal("show");
                    $("#errorModal .modal-body").html(response.message);
                }
            }
        })
    })

    $("#upgrade").click(function () {
        var level = $("#level").val();
        var req_token = $("#req_token").val();
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?php echo $baseurl; ?>/customer/level",
            method: "POST",
            dataType: "Json",
            data: {
                level: level,
                req_token: req_token
            },
            success: function (response) {
                $.LoadingOverlay("hide");
                if (response.status == 'success') {
                    $("#message").val("");
                    $("#successModal").modal("show");
                    $("#successModal .modal-body").html(response.message);
                } else {
                    $("#errorModal").modal("show");
                    $("#errorModal .modal-body").html(response.message);
                }
            }
        })
    })
</script>

<?php require("site_footer.php"); ?>