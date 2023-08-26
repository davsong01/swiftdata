<?php require("site_header.php"); ?>

<div class="alert">
  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff;color: blue;">

      <div id="response" style="text-align: center;">
        <h4>Withdraw Commission</h4>
        <p style="color: red;font-weight: bold;">Withdrawal of commission to bank attract ₦<?php echo $withdraw_charge; ?> charges.</p>
      </div>

    </div>
  </div>

  <div class="col-xl-12">
    <div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

      <div id="response" style="text-align: left;">
        <span>Commission Balance
          <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()">Fund Wallet</button></span>
        </span>
        <br />

        <span style="color: red;font-weight: bold;font-size: 39px;">₦ <?php echo number_format($Account_Bonus, 2); ?></span>

      </div>

    </div>
  </div>

  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff">

      <div id="response"></div>

      <div class="mb-3">
        <label>Select Withdraw Option</label>
        <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
        <select class="form-control" id="withdrawOpt">
          <option value="">--Choose--</option>
          <option value="WALLET">Withdraw To Wallet</option>
        </select>
      </div>

      <div id="WalletOption" style="display: none;">
        <div class="mb-3">
          <label>Full Name</label>
          <input type="text" name="" id="cashName" value="<?php echo $fullname; ?>" readonly="readonly" class="form-control">
        </div>

        <div class="mb-3">
          <label>Email Address</label>
          <input type="text" name="" id="cashEmail" value="<?php echo $email; ?>" readonly="readonly" class="form-control">
        </div>

        <div class="mb-3">
          <label>Amount To Cash</label>
          <input type="number" name="" id="withdrawAmount1" data-max="<?php echo $Account_Bonus ?>" placeholder="Amount To Cash" max="<?php echo $Account_Bonus ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label>Security PIN</label>
          <input type="password" class="form-control" placeholder="Security PIN" id="security_pin" required>
        </div>

        <div class="mb-3">
          <button class="btn btn-success btn-block" style="width: 100%" id="cashToWallet">CASH TO WALLET</button>
        </div>
      </div>


      <div id="bankOption" style="display: none;">

        <div class="mb-3">
          <label>Bank Name</label>
          <select class="form-control" id="bankName">
            <option value="">--Choose--</option>
            <option value="access">Access Bank</option>
            <option value="citibank">Citibank</option>
            <option value="diamond">Diamond Bank</option>
            <option value="ecobank">Ecobank</option>
            <option value="fidelity">Fidelity Bank</option>
            <option value="firstbank">First Bank</option>
            <option value="fcmb">First City Monument Bank (FCMB)</option>
            <option value="gtb">Guaranty Trust Bank (GTB)</option>
            <option value="heritage">Heritage Bank</option>
            <option value="keystone">Keystone Bank</option>
            <option value="polaris">Polaris Bank</option>
            <option value="providus">Providus Bank</option>
            <option value="stanbic">Stanbic IBTC Bank</option>
            <option value="standard">Standard Chartered Bank</option>
            <option value="sterling">Sterling Bank</option>
            <option value="suntrust">Suntrust Bank</option>
            <option value="union">Union Bank</option>
            <option value="uba">United Bank for Africa (UBA)</option>
            <option value="unity">Unity Bank</option>
            <option value="wema">Wema Bank</option>
            <option value="zenith">Zenith Bank</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Account Number</label>
          <input type="tel" name="" id="accountNo" placeholder="Bank account no." class="form-control">
        </div>

        <div class="mb-3" id="bankOptionInfo" style="display: none;">
          <label>Account Name</label>
          <input type="hidden" name="" id="accountCode" class="form-control">
          <input type="text" name="" id="accountName" placeholder="Bank account name" class="form-control">
        </div>


        <div class="mb-3" id="bankOptionPrice" style="display: none;">
          <label>Amount To Cash</label>
          <input type="number" name="" id="withdrawAmount2" placeholder="Amount To Cash" class="form-control">
        </div>

        <div class="mb-3" id="bankOptionSc" style="display: none;">
          <label>Security PIN</label>
          <input type="password" class="form-control" placeholder="Security PIN" id="security_pin2" required>
        </div>

        <br>

        <div class="mb-3">
          <button class="btn btn-success btn-block" style="width: 100%" id="verifyBank">VERIFY BANK</button>
          <button class="btn btn-success btn-block" style="width: 100%;display: none;" id="cashToBank">TRANSFER NOW</button>
        </div>

      </div>

    </div>
    <br>

  </div>
</div>

<script type="text/javascript">
  $('#withdrawOpt').change(function() {
    var getOption = $("#withdrawOpt").val();
    if (getOption == "") {
      $("#WalletOption").hide();
      $("#bankOption").hide();
    } else if (getOption == "WALLET") {
      $("#WalletOption").show();
      $("#bankOption").hide();
    } else {
      $("#WalletOption").hide();
      $("#bankOption").show();
    }

  });

  $("#verifyBank").click(function() {
    var bankName = $("#bankName").val();
    var accountNo = $("#accountNo").val();
    var req_token = $("#req_token").val();
    $.LoadingOverlay("show");
    $.ajax({
      url: "<?php echo $baseurl; ?>/customer/verifybank",
      method: "POST",
      dataType: "Json",
      data: {
        bankName: bankName,
        accountNo: accountNo,
        req_token: req_token
      },
      success: function(response) {
        $.LoadingOverlay("hide");
        if (response.status == 'success') {
          $("#bankOptionInfo").show();
          $("#accountName").val(response.message);
          $("#accountCode").val(response.code);
          $("#verifyBank").hide();
          $("#cashToBank").show();
          $("#accountName").prop('disabled', true);
          $("#accountNo").prop('disabled', true);
          $("#bankName").prop('disabled', true);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(response.message);
        }
      }
    })
  });



  $("#cashToBank").click(function() {
    var withdrawAmount2 = $("#withdrawAmount2").val();
    var security_pin2 = $("#security_pin2").val();
    var accountNo = $("#accountNo").val();
    var accountCode = $("#accountCode").val();
    var req_token = $("#req_token").val();
    $.LoadingOverlay("show");
    $.ajax({
      url: "<?php echo $baseurl; ?>/customer/withdrawtobank",
      method: "POST",
      dataType: "Json",
      data: {
        withdrawAmount2: withdrawAmount2,
        security_pin2: security_pin2,
        accountNo: accountNo,
        req_token: req_token,
        accountCode: accountCode
      },
      success: function(response) {
        $.LoadingOverlay("hide");
        if (response.status == 'success') {
          $("#message").val("");
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(response.message);
        }
      }
    })
  })


  $("#cashToWallet").click(function() {
    var withdrawAmount1 = $("#withdrawAmount1").val();
    var withdrawAmount1 = Number(withdrawAmount1);

    if(withdrawAmount1 <= 0){
      $("#errorModal").modal("show");
      $("#errorModal .modal-body").html("<div class='alert alert-danger text-left'>Invalid Amount!!!</div>");

      return;
    }
    var security_pin = $("#security_pin").val();
    var req_token = $("#req_token").val();
    $.LoadingOverlay("show");
    $.ajax({
      url: "<?php echo $baseurl; ?>/customer/withdrawtowallet",
      method: "POST",
      dataType: "Json",
      data: {
        withdrawAmount1: withdrawAmount1,
        security_pin: security_pin,
        req_token: req_token
      },
      success: function(response) {
        $.LoadingOverlay("hide");
        if (response.status == 'success') {
          $("#message").val("");
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(response.message);
        }
      }
    })
  })
</script>

<?php require("site_footer.php"); ?>