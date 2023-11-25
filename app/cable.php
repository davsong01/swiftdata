<?php require("site_header.php"); ?>

<?php

require 'request_pin.php';

?>
<div class="alert">
  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff;color: blue;">

      <div id="response" style="text-align: center;">
        <h4>CableTv Subscription</h4>
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


  <div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

    <!-- start -->
    <div id="response"></div>

    <form id="form-data">
      <div class="input-group mb-3">
        <div class="input-group-text">
          <span class="" id="basic-addon1"><i class="fa-solid fa-tv" style="font-size: 25px;"></i></span>
        </div>

        <select class="form-control" id="service_module" required>
          <option value="">--Choose--</option>
          <?php

          if ($dstv_lock != 0) {
            echo '<option value="DSTV">DSTV</option>';
          }
          if ($gotv_lock != 0) {
            echo '<option value="GOTV">GOTV</option>';
          }
          if ($star_lock != 0) {
            echo '<option value="STARTIMES">STARTIMES</option>';
          }

          if ($showmax_lock != 0) {
            echo '<option value="SHOWMAX">SHOWMAX</option>';
          }
          ?>
        </select>
      </div>
      <span id="result"></span>

      <br>

      <div class="input-group mb-3">
        <div class="input-group-text">
          <span class="" id="basic-addon1"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></span>
        </div>
        <select class="form-control" id="dataplanloader" required>
          <option>--Select Plan--</option>
        </select>
      </div>

      <br>

      <div class="input-group mb-3">
        <div class="input-group-text">
          <span class="" id="basic-addon1"><i class="fa fa-pencil-square-o" style="font-size: 25px;"></i></span>
        </div>
        <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
        <input type="tel" class="form-control" placeholder="IUC/Smart No." id="smart_no" required>
      </div>

      <br>

      <small>Forget Pin ? <a href="<?php echo $baseurl; ?>/reset_pin">Reset Here</a></small>
      <div class="input-group mb-3">
        <div class="input-group-text">
          <span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
        </div>
        <input type="password" class="form-control" placeholder="Security PIN" id="security_pin">
      </div>

      <br>

      <button class="btn btn-success btn-block" id="submitTV" style="width: 100%">Verify IUC/SMart No</button>

      <br>
      <br>

    </form>

  </div>
</div>
</div>


</div>
</div>
</div>

<!-- end-->


</div>


<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="myModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body"> </div>

    </div>
  </div>
</div>


</div>
</div>
</div>

<script type="text/javascript">
  $("#service_module").change(function() {
    if ($("#service_module").val() != "") {
      var service_module = $("#service_module").val();
      $.LoadingOverlay("show");
      $.ajax({
        url: 'resources/plans/serviceslists?services=' + service_module + '&level=<?php echo $level; ?>',
        method: 'GET',
        success: function(RES_data) {
          $.LoadingOverlay("hide");
          $("#dataplanloader").html(RES_data);
        }
      });

      $.ajax({
        url: 'resources/plans/discounts?services=' + service_module + '&level=<?php echo $level; ?>',
        method: 'GET',
        success: function(RES_data) {
          $.LoadingOverlay("hide");
          $("#result").html(RES_data);
        }
      })

    }
  })


  $("#submitTV").click(function(event) {
    var formData = {
      service_module: $("#service_module").val(),
      dataplanloader: $("#dataplanloader").val(),
      smart_no: $("#smart_no").val(),
      security_pin: $("#security_pin").val(),
      req_token: $("#req_token").val(),
    };

    $.LoadingOverlay("show");
    $.ajax({
      url: '<?php echo $baseurl; ?>/customer/verify',
      method: 'POST',
      dataType: 'json',
      data: formData,
      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {

          $("#myModal2 .modal-body").html(response_fd.message);
          $("#myModal2").modal("show");

        } else {
          $("#response").html(response_fd.message);
        }
      }
    });

    event.preventDefault();
  });

  ///


  function pay4Tv() {
    var formData = {
      service_module: $("#service_module").val(),
      dataplanloader: $("#dataplanloader").val(),
      smart_no: $("#smart_no").val(),
      security_pin: $("#security_pin").val(),
      req_token: $("#req_token").val(),
    };

    $("#myModal2").modal("hide");
    $.LoadingOverlay("show");
    $.ajax({
      url: '<?php echo $baseurl; ?>/customer/cable',
      method: 'POST',
      dataType: 'json',
      data: formData,
      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response_fd.message);
          setTimeout(function() {
            window.location.reload();
          }, 3000);
        } else {
          $("#response").html(response_fd.message);
        }
      }
    });

  };

  function closeModal() {
    $("#myModal2").modal("hide");
  }
</script>

<?php require("site_footer.php"); ?>