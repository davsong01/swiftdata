<?php require("site_header.php"); ?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Sales Summary</h4>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>Available Balance 
            <span style="float: right;"></span>
          </span>
          <br/>

           <span style="color: #940798;font-weight: bold;font-size: 25px;">₦ <?php echo number_format($Account_Balance,2); ?></span>
         
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->

<div>
  <select id="cday">
    <?php
    for ($start=1; $start <=31; $start++){
      echo '<option value="'.$start.'">'.$start.'</option>';
    }
    ?>
  </select>

    <select id="cmonth">
    <option value="Jan">January</option>
    <option value="Feb">Febuary</option>
    <option value="Mar">March</option>
    <option value="Apr">April</option>
    <option value="May">May</option>
    <option value="Jun">June</option>
    <option value="Jul">July</option>
    <option value="Aug">August</option>
    <option value="Sep">September</option>
    <option value="Oct">October</option>
    <option value="Nov">November</option>
    <option value="Dec">December</option>
  
    ?>
  </select>

  <select id="cyear">
    <?php
    for ($i=22; $i <=30; $i++){
      echo '<option value="'.$i.'">20'.$i.'</option>';
    }
    ?>
  </select>
  <hr/>

<button class="btn btn-block btn-success" onclick="querSearch()" style="width: 100%">Search</button>
<?php
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y");
?>
<input type="hidden" id="cday1" value="<?php echo $dateTime->format("d"); ?>">
<input type="hidden" id="cmonth1" value="<?php echo $dateTime->format("M"); ?>">
<input type="hidden" id="cyear1" value="<?php echo $dateTime->format("y"); ?>">
</div>
<br>
<br>

<div id="transactionsDiv"></div>

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

<script type="text/javascript">
    $(document).ready(function () {
    var cday1 = $("#cday1").val();
    var cmonth1 = $("#cmonth1").val();
    var cyear1 = $("#cyear1").val();
    $.LoadingOverlay("show");
    $.ajax({
    url:'<?php echo $baseurl; ?>/customer/sales?cday='+cday1+'&cmonth='+cmonth1+'&cyear='+cyear1,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
      }
        });
  });

    function querSearch(id){
    var cday = $("#cday").val();
    var cmonth = $("#cmonth").val();
    var cyear = $("#cyear").val();
    $.LoadingOverlay("show");
    $.ajax({
    url:'<?php echo $baseurl; ?>/customer/sales?cday='+cday+'&cmonth='+cmonth+'&cyear='+cyear,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").css("color", "red");
    $("#transactionsDiv").html(transactionsRes.message);
            }
        });
    }

</script>
<?php require("site_footer.php"); ?>
