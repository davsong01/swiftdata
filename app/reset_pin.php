<?php require("site_header.php"); ?>

<div class="alert">
  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff;color: blue;">

      <div id="response" style="text-align: center;">
        <h4>Reset PIN</h4>
      </div>

    </div>
  </div>

  <div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

    <!-- start -->
    <div id="response"></div>

    <form id="form-data">

      <div class="input-group mb-3">
        <div class="input-group-text">
          <span class="" id="basic-addon1"><i class="fa fa-unlock-alt" style="font-size: 25px;"></i></span>
        </div>
        <input type="password" class="form-control" placeholder="Enter your password" id="old_pin" required>
      </div>
      <br>
      <input type="hidden" id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">

      <button class="btn btn-success btn-block" style="width: 100%">SUBMIT</button>
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
</div>
</div>

<!-- end-->


</div>




</div>
</div>
</div>

<script type="text/javascript">
  $("#form-data").submit(function(event) {
    var formData = {
      old_pin: $("#old_pin").val(),
      // new_pin: $("#new_pin").val(),
      // retype_pin: $("#retype_pin").val(),
      req_token: $("#req_token").val(),
    };

    $.LoadingOverlay("show");
    $.ajax({
      url: '<?php echo $baseurl; ?>/customer/reset_pin',
      method: 'POST',
      dataType: 'json',
      data: formData,
      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response_fd.message);
          // setTimeout(function() {
          //   window.location.reload();
          // }, 10000);
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