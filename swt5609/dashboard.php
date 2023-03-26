<?php require("site_header.php"); ?>
<?php 
if ($manage_users==1){
?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Dashboard</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
<li class="breadcrumb-item active">Default</li>
</ol>
</div>

<?php
$seltw=mysqli_query($con, "SELECT SUM(wallets) AS twallet FROM users");
$rows=mysqli_fetch_array($seltw, MYSQLI_ASSOC);
$total=$rows['twallet'];
///////////
?>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 social_media_card">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0"><?php echo strtoupper($domain); ?></h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>

<div class="media_thumb ml_25">
    <center>
        <h3 style="font-weight: bold;font-size: 20px;">₦ <?php echo number_format($total,2); ?></h3>
        <span>Total Users Balance</span>
    </center>
    <br>
    <br>
</div>

</div>
</div>






<br>
</div>
</div>
</div>

<?php
}
else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>

<?php require("site_footer.php"); ?>
