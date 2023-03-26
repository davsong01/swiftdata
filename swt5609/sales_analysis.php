<?php require("site_header.php"); ?>
<?php 
if ($manage_history==1){
?>
<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>WELCOME</h4>
        </div>
                
</div>
</div>

<div class="col-xl-12">
<div class="alert" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">

        <div id="response" style="text-align: left;">
          <span>All Users Balance 
            <span style="float: right;"></span>
          </span>
          <br/>

          <?php

          $seltw=mysqli_query($con, "SELECT SUM(wallets) AS twallet FROM users");
          $rows=mysqli_fetch_array($seltw, MYSQLI_ASSOC);
          $total=$rows['twallet'];

          ?>

           <span style="color: red;font-weight: bold;font-size: 39px;">₦ <?php echo number_format($total,2); ?></span>
         
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
<div class="mb-3">
  <input type="text" id="query_email" class="form-control" placeholder="Email Address">
</div>
<button class="btn btn-block btn-success" onclick="querSearch()">Search A Users</button>
<button class="btn btn-block btn-success" onclick="querSearch2()">Search A Date</button>
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
    url:'customer/sales?cday='+cday1+'&cmonth='+cmonth1+'&cyear='+cyear1,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").html(transactionsRes.message);
      }
        });
  });

    function querSearch(){
    var cday = $("#cday").val();
    var cmonth = $("#cmonth").val();
    var cyear = $("#cyear").val();
    var query_email = $("#query_email").val();
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/sales2?cday='+cday+'&cmonth='+cmonth+'&cyear='+cyear+'&email='+query_email,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").css("color", "green");
    $("#transactionsDiv").html(transactionsRes.message);
            }
        });
    }

    function querSearch2(){
    var cday = $("#cday").val();
    var cmonth = $("#cmonth").val();
    var cyear = $("#cyear").val();
    $.LoadingOverlay("show");
    $.ajax({
    url:'customer/sales3?cday='+cday+'&cmonth='+cmonth+'&cyear='+cyear+'&email='+query_email,
    dataType:'json',
    success:function(transactionsRes){   
    $.LoadingOverlay("hide");
    $("#transactionsDiv").css("color", "red");
    $("#transactionsDiv").html(transactionsRes.message);
            }
        });
    }

</script>

<?php
}
else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>
<?php require("site_footer.php"); ?>
