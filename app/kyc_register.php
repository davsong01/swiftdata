<?php require("site_header.php"); ?>
<div class="alert">
  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff;color: blue;">
      <div id="response" style="text-align: center;">
        <h4>Update BVN</h4>
      </div>
    </div>
  </div>

  <div class="col-xl-12">
    <div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

      <div id="response" style="text-align: left;">
        <span>Available Balance
          <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()" style="font-size:10px">Fund Wallet</button></span>
        </span>
        <br />

        <span style="color: #940798;font-weight: bold;font-size: 25px;">₦<?php echo number_format($Account_Balance, 2); ?></span>

      </div>

    </div>
  </div>
  <?php if ($kyc_status == 0) {  ?>
    <div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">
      <div class="row">
        <p>
          Due to recent circular from the CBN, you are now required to enter your BVN or NIN in order to facilitate free flow of the virtual account process. <br>
          Please note that this is required for you to be able to use or generate Virtual Accounts and we don't in anyway have access to Your Information. Thanks for choosing SwiftDataNg
        </p>
      </div>

      <div class="row">
        <form id="form-data">
          <?php if (empty($bvn)) { ?>
            <div class="input-group mb-3">
              <!-- <div class="input-group-text">
            <span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
          </div> -->
              <input type="text" class="form-control" value="<?php echo $bvn ?>" placeholder="Enter your BVN" id="bvn" aria-describedby="basic-addon1">
            </div>
          <?php  } ?>

          <?php if (empty($nin)) { ?>
            <div class="input-group mb-3">
              <!-- <div class="input-group-text">
            <span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
          </div> -->
              <input type="text" class="form-control" value="<?php echo $nin ?>" placeholder="Enter your NIN" id="nin" aria-describedby="basic-addon1">
            </div>
          <?php  } ?>

          <?php if (empty($bvn) || empty($nin)) { ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="i-agree" checked required>
              <label class="form-check-label" for="flexCheckChecked">
                I certify that the data supplied above is correct and I consent to give this data out.
              </label>
            </div>
            <button class="btn btn-success btn-block" style="width: 100%">SUBMIT</button>
            <br>
            <br>
            <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
          <?php  } else { ?>
            <p style="margin:top:10px;color:green"><strong><i class="fa fa-check" aria-hidden="true"></i>
                Account update complete</strong></p>
          <?php  } ?>

        </form>
      </div>

    </div>
  <?php } else {  ?>
    <div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">
      <div class="row">
        <p>
          You have successfully updated account info, no other action is required from you.
        </p>
      </div>
    </div>
  <?php }  ?>
</div>

<script type="text/javascript">
  $("#form-data").submit(function(event) {
    var formData = {
      nin: $("#nin").val(),
      bvn: $("#bvn").val(),
      check: $("#i-agree").val(),
      req_token: $("#req_token").val(),

    };

    $.LoadingOverlay("show");
    $.ajax({
      url: '<?php echo $baseurl; ?>/customer/update_kyc',
      method: 'POST',
      dataType: 'json',
      data: formData,

      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {

          $("#successModal .modal-body").html(response_fd.message);
          window.location.href = "automated_pay";

        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(response_fd.message);


        }
      }
    });

    event.preventDefault();
  });
</script>

<?php require("site_footer.php"); ?>