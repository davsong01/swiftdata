<?php require("site_header.php"); ?>

<div class="alert">
  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff;color: blue;">

      <div id="response" style="text-align: center;">
        <h4>CashBack Summary</h4>
        <p style="color: red;font-weight: bold;">This shows the proccess of your earning on their each purchase.</p>
      </div>

    </div>
  </div>

  <div class="col-xl-12">
    <div class="alert" id="temp"
      style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

      <div id="response" style="text-align: left;">
        <span>Commission Balance
          <span><button class="btn btn-success" style="font-size:10px;display:none" id="withdrawButton">Withdraw to
              wallet</button></span>
        </span>
        <br />

        <span style="color: #940798;font-weight: bold;font-size: 25px;">₦
          <?php echo number_format($Account_Bonus, 2); ?>
        </span>

      </div>

    </div>
  </div>

  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff">

      <div id="transactionsDiv"></div>

    </div>
    <br>

    <div id="loadMoreDiv"></div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $.LoadingOverlay("show");
    $.ajax({
      url: '<?php echo $baseurl; ?>/customer/refearning',
      dataType: 'json',
      // success: function (transactionsRes) {
      //   $.LoadingOverlay("hide");

      //   $("#transactionsDiv").html(transactionsRes.message);
      //   $("#loadMoreDiv").html(transactionsRes.ctrlButton);
      // }
      success: function (transactionsRes) {
            $.LoadingOverlay("hide");
            if (transactionsRes.count > 0) {
              $("#withdrawButton").show();
            }
            $("#transactionsDiv").html(transactionsRes.message);
          }
    });
  });

  // $(document).ready(function () {
  //   $.LoadingOverlay("show");
  //   $.ajax({
  //     url: '<?php echo $baseurl; ?>/customer/refdownline?load_id=0',
  //     dataType: 'json',
  //     success: function (transactionsRes) {
  //       $.LoadingOverlay("hide");
  //       if (transactionsRes.count > 0) {
  //         $("#withdrawButton").show();
  //       }
  //       $("#transactionsDiv").html(transactionsRes.message);
  //     }
  //   });
  // });

  function showMore(id) {
    $.LoadingOverlay("show");
    $.ajax({
      url: '<?php echo $baseurl; ?>/customer/refearning?load_id=' + id,
      dataType: 'json',
      success: function (transactionsRes) {
        $.LoadingOverlay("hide");
        $("#transactionsDiv").html(transactionsRes.message);
        $("#loadMoreDiv").html(transactionsRes.ctrlButton);
      }
    });
  }

  $('#withdrawButton').click(function () {
    $.LoadingOverlay("show");
    var confirmText = "You are about to withdraw your referral commissions to your wallet";
    if (confirm(confirmText)) {
      $.ajax({
        url: '<?php echo $baseurl; ?>/customer/withdrawreferralbonus',
        dataType: 'json',
        success: function (transactionsRes) {
          $.LoadingOverlay("hide");
          $("#temp").hide();
          $("#transactionsDiv").html(transactionsRes.message);
        }
      });
      return false;
    } else {
      $.LoadingOverlay("hide");
    }
  });
</script>

<?php require("site_footer.php"); ?>