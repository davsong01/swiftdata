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
<h3 class="f_s_25 f_w_700 dark_text">Reset User Password</h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
<li class="breadcrumb-item active">Default</li>
</ol>
</div>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 social_media_card" style="background-color:#fff;">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0"><?php echo strtoupper($domain); ?> 
</span>
</h3>
<p>Welcome <?php echo $fullname; ?></p>
</div>
</div>

    
<?php


$message="";

if (isset($_POST['reset'])){

$user_id=trim($_POST['user_id']);
$new_password=$_POST['new_password'];

$getUser=mysqli_query($con, "SELECT * FROM users WHERE email='$user_id' ORDER BY id DESC LIMIT 1");

if (mysqli_num_rows($getUser)<1){

$message = '
<div class="alert alert-danger">
<h4>Users Account Not Found !!!</h4>
</div>';

}

else if (strlen($new_password)<5){

$message = '
<div class="alert alert-danger">
<h4>Password should be more than 4chars !!!</h4>
</div>';

}

else{

$hashpassword = md5($new_password);
$update=mysqli_query($con, "UPDATE users SET password='$hashpassword' WHERE email='$user_id'");

if ($update){

$message = '
<div class="alert alert-success">
<h4>This account password has been successfully reset !!!</h4>
</div>';

}

else {

$message = '
<div class="alert alert-danger">
<h4>Error occur while updating user account !!!</h4>
</div>';
}

}
}

?>
<div class="alert">
<br/>


  <?php echo $message; ?>
  <div id="resultHandle">


    <form action="" method="POST">
      
      <div>
        <label>Email Address</label>
        <input type="text" name="user_id" class="form-control" required>
        <br>

        <label>New Password</label>
        <input type="text" name="new_password" class="form-control" required>
        <br/>

        <button class="btn btn-danger" type="submit" name="reset" style="width: 100%">RESET PASSWORD</button>
      </div>
    </form>

  </div>
    

  <br>
  <br>
  <br/>
</div>


</div>
</div>



</div>
</div>
</div>;

<?php
}

else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>

<?php require("site_footer.php"); ?>
