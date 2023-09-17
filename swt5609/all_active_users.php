<?php require("site_header.php");
$getUser = mysqli_query($con, "SELECT * FROM users WHERE status='1' AND level=1 ORDER BY id DESC");
$getUser2 = mysqli_query($con, "SELECT * FROM users WHERE status='1' AND level=2 ORDER BY id DESC");
$getUser3 = mysqli_query($con, "SELECT * FROM users WHERE status='1' AND level=3 ORDER BY id DESC");
$getUser4 = mysqli_query($con, "SELECT * FROM users WHERE status='1' AND level=4 ORDER BY id DESC");
$count = 1;
$count2 = 1;
$count3 = 1;
$count4 = 1;
if ($manage_users == 1) {
?>
  <div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left">
              <h3 class="f_s_25 f_w_700 dark_text">All Active Users</h3>
              <ol class="breadcrumb page_bradcam mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                <li class="breadcrumb-item active">Default</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="alert white_card card_height_100 mb_30 social_media_card" style="background-color:#fff;">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="level1-tab" data-bs-toggle="pill" data-bs-target="#level1" type="button" role="tab" aria-controls="level1" aria-selected="true">Level 1 Users</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="level2-tab" data-bs-toggle="pill" data-bs-target="#level2" type="button" role="tab" aria-controls="level2" aria-selected="false">Level 2 Users</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="level3-tab" data-bs-toggle="pill" data-bs-target="#level3" type="button" role="tab" aria-controls="level3" aria-selected="false">Level 3 Users</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="level4-tab" data-bs-toggle="pill" data-bs-target="#level4" type="button" role="tab" aria-controls="level4" aria-selected="false">Level 4 Users</button>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="level1" role="tabpanel" aria-labelledby="level1-tab">
                <div class="table-responsive">
                  <table id="example" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($viewUsers = mysqli_fetch_array($getUser, MYSQLI_ASSOC)) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $count++ ?>
                          </td>
                          <td>
                            <strong>Full Name:</strong> <?php echo $viewUsers['full_name'] . ' ' . $viewUsers['middle_name'] . ' ' . $viewUsers['last_name']; ?> <strong>(Level <?php echo $viewUsers['level']; ?>)</strong><br />
                            <strong>Reg. Date: </strong><?php echo $viewUsers['reg_date'] ?><br />
                            <strong>Email : </strong><?php echo $viewUsers['email'] ?><br />
                            <strong>Phone : </strong><?php echo $viewUsers['mobile'] ?><br />
                            <strong>Username : </strong><?php echo $viewUsers['username'] ?><br />
                            <strong>Wallet Bal. :</strong> <?php echo $viewUsers['wallets'] ?><br />
                            <strong>Cashback Bal. : </strong><?php echo $viewUsers['cashback'] ?><br />
                            <strong>Last Seen. : </strong><?php echo $viewUsers['last_login'] ?><br /><br />
                            <?php if ($viewUsers['block'] == 1) { ?>
                              <button class="btn btn-success btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="unblockUser(this.id)">Unblock</button>
                            <?php } else { ?>

                              <button class="btn btn-warning btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="blockUser(this.id)">Block</button>
                            <?php } ?>
                          </td>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="level2" role="tabpanel" aria-labelledby="level2-tab">
                <div class="table-responsive">
                  <table id="example2" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($viewUsers = mysqli_fetch_array($getUser2, MYSQLI_ASSOC)) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $count2++ ?>
                          </td>
                          <td>
                            <strong>Full Name:</strong> <?php echo $viewUsers['full_name'] . ' ' . $viewUsers['middle_name'] . ' ' . $viewUsers['last_name']; ?> <strong>(Level <?php echo $viewUsers['level']; ?>)</strong> <br />
                            <strong>Reg. Date: </strong><?php echo $viewUsers['reg_date'] ?><br />
                            <strong>Email : </strong><?php echo $viewUsers['email'] ?><br />
                            <strong>Phone : </strong><?php echo $viewUsers['mobile'] ?><br />
                            <strong>Username : </strong><?php echo $viewUsers['username'] ?><br />
                            <strong>Wallet Bal. :</strong> <?php echo $viewUsers['wallets'] ?><br />
                            <strong>Cashback Bal. : </strong><?php echo $viewUsers['cashback'] ?><br />
                            <strong>Last Seen. : </strong><?php echo $viewUsers['last_login'] ?><br /><br />
                            <?php if ($viewUsers['block'] == 1) { ?>
                              <button class="btn btn-success btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="unblockUser(this.id)">Unblock</button>
                            <?php } else { ?>

                              <button class="btn btn-warning btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="blockUser(this.id)">Block</button>
                            <?php } ?>
                          </td>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="level3" role="tabpanel" aria-labelledby="level3-tab">
                <div class="table-responsive">
                  <table id="example3" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($viewUsers = mysqli_fetch_array($getUser3, MYSQLI_ASSOC)) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $count3++ ?>
                          </td>
                          <td>
                            <strong>Full Name:</strong> <?php echo $viewUsers['full_name'] . ' ' . $viewUsers['middle_name'] . ' ' . $viewUsers['last_name']; ?> <strong>(Level <?php echo $viewUsers['level']; ?>)</strong><br />
                            <strong>Reg. Date: </strong><?php echo $viewUsers['reg_date'] ?><br />
                            <strong>Email : </strong><?php echo $viewUsers['email'] ?><br />
                            <strong>Phone : </strong><?php echo $viewUsers['mobile'] ?><br />
                            <strong>Username : </strong><?php echo $viewUsers['username'] ?><br />
                            <strong>Wallet Bal. :</strong> <?php echo $viewUsers['wallets'] ?><br />
                            <strong>Cashback Bal. : </strong><?php echo $viewUsers['cashback'] ?><br />
                            <strong>Last Seen. : </strong><?php echo $viewUsers['last_login'] ?><br /><br />
                            <?php if ($viewUsers['block'] == 1) { ?>
                              <button class="btn btn-success btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="unblockUser(this.id)">Unblock</button>
                            <?php } else { ?>

                              <button class="btn btn-warning btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="blockUser(this.id)">Block</button>
                            <?php } ?>
                          </td>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="level4" role="tabpanel" aria-labelledby="level4-tab">
                <div class="table-responsive">
                  <table id="example4" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($viewUsers = mysqli_fetch_array($getUser4, MYSQLI_ASSOC)) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $count4++ ?>
                          </td>
                          <td>
                            <strong>Full Name:</strong> <?php echo $viewUsers['full_name'] . ' ' . $viewUsers['middle_name'] . ' ' . $viewUsers['last_name']; ?> <strong>(Level <?php echo $viewUsers['level']; ?>)</strong><br />
                            <strong>Reg. Date: </strong><?php echo $viewUsers['reg_date'] ?><br />
                            <strong>Email : </strong><?php echo $viewUsers['email'] ?><br />
                            <strong>Phone : </strong><?php echo $viewUsers['mobile'] ?><br />
                            <strong>Username : </strong><?php echo $viewUsers['username'] ?><br />
                            <strong>Wallet Bal. :</strong> <?php echo $viewUsers['wallets'] ?><br />
                            <strong>Cashback Bal. : </strong><?php echo $viewUsers['cashback'] ?><br />
                            <strong>Last Seen. : </strong><?php echo $viewUsers['last_login'] ?><br /><br />
                            <?php if ($viewUsers['block'] == 1) { ?>
                              <button class="btn btn-success btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="unblockUser(this.id)">Unblock</button>
                            <?php } else { ?>

                              <button class="btn btn-warning btn-sm" id="<?php echo $viewUsers['id'] ?>" onclick="blockUser(this.id)">Block</button>
                            <?php } ?>
                          </td>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
<?php } else {
  require("admin_pushfail.php");
  echo $admin_pushfail;
}
?>
<script type="text/javascript">
  function blockUser(id) {
    $.LoadingOverlay("show");
    $.ajax({
      url: 'customer/block_user?data=' + id,
      dataType: "Json",
      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response_fd.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(response_fd.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        }
      }
    })
  }

  function unblockUser(id) {
    $.LoadingOverlay("show");
    $.ajax({
      url: 'customer/unblock_user?data=' + id,
      dataType: "Json",
      success: function(response_fd) {
        $.LoadingOverlay("hide");
        if (response_fd.status == 'success') {
          $("#successModal").modal("show");
          $("#successModal .modal-body").html(response_fd.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        } else {
          $("#errorModal").modal("show");
          $("#errorModal .modal-body").html(response_fd.message);
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        }
      }
    })
  }
</script>


<?php
require("site_footer.php");
?>