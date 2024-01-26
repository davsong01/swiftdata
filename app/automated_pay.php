<?php require("site_header.php"); ?>
<div class="alert">
  <div class="col-xl-12">
    <div class="alert" style="background-color: #fff;color: blue;">

      <div id="response" style="text-align: center;">
        <h4>Add Money</h4>
        <p style="color: red;font-weight: bold;">Transfer money into one of the reserved account below and your wallet will be automatically credited.</p>
      </div>

    </div>
  </div>

  <div class="col-xl-12">
    <div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
      <div id="response" style="text-align: left;">
        <span>Available Balance
          <span style="float: right;"></span>
        </span>
        <br />

        <span style="color: #940798;font-weight: bold;font-size: 25px;">₦ <?php echo number_format($Account_Balance, 2); ?></span>

      </div>

    </div>
  </div>


  <div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

    <!-- start -->
    <?php
    // if ($kyc_status == 1 ) {
    if (empty($bvn) && empty($nin)) {
      echo '<div class="row"><div class="col-md-12 alert alert-primary" style="background-color: #94079803;color:black;font-size: 15px;border-color: #940798;">
              <h6>You are required to update your virtual account with either your BVN or NIN, please click the button below to update. Thank you</h6>
              <a href="' . $baseurl . '/kyc_register" class="btn btn-success">Update Account Details</a>
            </div></div>';
    ?>
    <?php } else { ?>
    <div class="row">
      <div class="col-md-12">
        <p style="color:black; margin-bottom:20px">Deposit/Transfer Money using any of the automated transfer payment options below.</p>
      </div>
      <?php
      if ($payvessel_mode == 'ON') {
        $payve = !empty($payvessel_reserved_account) ? json_decode($payvessel_reserved_account, true) : [];
        $bankinfos1[] = $payve['banks'];
        $message1 = '<div class="row">';
        foreach ($bankinfos1 as $bank) {
          foreach ($bank as $info) {
            $message1 .= '<div class="col-md-6" style="margin-bottom: 20px;"><p style="color:#940798;font-weight: 500;"><strong>Bank: </strong>' .  $info['bankName']  . '<br><strong>Acct Number: </strong>' . $info['accountNumber']  . '<br><strong>Acct Name: </strong>' . $info['accountName'] . '</p></div>';
          }
        }
        $message1 .= '</div>'
      ?>

        <div class="col-md-6 alert alert-primary" style="background-color: #94079803;color:black;font-size: 15px;border-color: #940798;">
          <h6>Automated Payment 1</h2>
            <p style="color:red"><i class="fa fa-info-circle"></i> #30 charges is incurred on transfer made to this/these bank/banks. We advise you to make use of this payment option if you are funding any amount above #5,000.</p>
            <?php
            echo $message1;

            ?>

        </div>
      <?php } ?>
      <?php
      if ($monnify_mode == 'ON') {
        $json_decoded = json_decode($reserved_account, true);
        $bankinfos[] = $json_decoded['responseBody']["accounts"];

        $message = '<div class="row">';
        foreach ($bankinfos as $bank) {
          foreach ($bank as $info) {
            $message .= '<div class="col-md-6" style="margin-bottom: 20px;"><p style="color:#940798;font-weight: 500;"><strong>Bank: </strong>' .  $info['bankName']  . '<br><strong>Acct Number: </strong>' . $info['accountNumber']  . '<br><strong>Acct Name: </strong>' . $info['accountName'] . '</p></div>';
          }
        }
        $message .= '</div>'
      ?>

        <div class="col-md-6 alert alert-primary" style="background-color: #94079803;color:black;font-size: 15px;border-color: #940798;">
          <h6>Automated Payment 2</h2>
            <p style="color:red"><i class="fa fa-info-circle"></i> Transfer money into one of the reserved account(s) below and your wallet will be automatically credited. Though moniepoint is fast. Note that 1% charge is incurred on every funding.</p>
            <?php
            echo $message;

            ?>

        </div>
      <?php } ?>

    </div>

    <?php } ?>
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
</div>


<?php require("site_footer.php"); ?>