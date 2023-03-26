<?php require("site_header.php"); ?>

<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="" style="text-align: center;">
          <h4>Payment Option(s)</h4>
          <p style="color: red;font-weight: bold;">When you selected your payment options, our system will redirect you automatically.</p>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
         <span>Available Balance 
            <span style="float: right;"><button class="btn btn-dark" onclick="FundWallet()" style="font-size:10px">Fund Wallet</button></span>
          </span>
          <br/>

           <span style="color: #940798;font-weight: bold;font-size: 25px;">₦<?php echo number_format($Account_Balance,2); ?></span>
         
        </div>
                
</div>
</div>

<div class="col-xl-12">
    
    <div class="alert" onclick="autoFund()" style="background-color: #fff;color: blue;cursor: pointer;">

        <div id="" style="text-align: center;">
          <h4>AUTOMATED TRANSFER</h4>
        </div>
                
</div>

<hr/>

<div class="alert" onclick="bankFund()" style="background-color: #fff;color: blue;cursor: pointer;">

        <div id="" style="text-align: center;">
          <h4>BANK DEPOSIT/TRANSFER</h4>
        </div>
                
</div>
 
</div>


</div>
</div>

<script type="text/javascript">
  function  autoFund() {
  $.LoadingOverlay("show");
  window.location.href="automated_pay";
  }
  function  atmFund() {
  $.LoadingOverlay("show");
  window.location.href="card_payment";
  }
  function  bankFund() {
  $.LoadingOverlay("show");
  window.location.href="deposit_payment";
  }
</script>
<?php require("site_footer.php"); ?>
