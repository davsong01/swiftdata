<?php
require("functions/web_config.php");

if($_GET['email'] && $_GET['hashtoken']){

$email=strtolower(mysqli_real_escape_string($con, $_GET['email']));
$hash=mysqli_real_escape_string($con, $_GET['hashtoken']);

$check_details=mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND users_sid='$hash'");

if (mysqli_num_rows($check_details)>0){

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?php echo $sitename; ?> | Reset Your Password </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="<?php echo $mainpage; ?>
                "class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="assets/img/favicon/favicon.png" height="30px">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder"><?php echo strtoupper($sitename); ?></span>
                </a>
              </div>
              <!-- /Logo -->
              <h3>Reset on <strong><?php echo strtoupper($sitename); ?></strong></h3>
            <p class="mb-4">Welcome Back :(</p>

            <div id="response"></div>
            <form id="form-data">

                <div class="mb-3">
                  <label for="email" class="form-label">New Password</label>
                  <input
                    type="text"
                    class="form-control"
                    id="password1"
                    placeholder="Enter your new password"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Confirm Password</label>
                    <input
                      type="password"
                      id="password2"
                      class="form-control"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                </div>
              
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" id="submitBtn">Reset Login</button>
                </div>
        
</form>
              <p class="text-center">
                <span>My account?</span>
                <a href="<?php echo $mainpage; ?>/login">
                  <span>Sign In</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <script type="text/javascript">
     $("#form-data").submit(function (event) {
     $("#submitBtn").html('Please wait...');
     var formData = {
      password1: $("#password1").val(),
      password2: $("#password2").val(),
      email: '<?php echo $email; ?>',
      hash: '<?php echo $hash; ?>',
    };
    $.ajax({
      url:'app/resources/resetpassword',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
      $('#submitBtn').html('Reset Login');
      $("#response").html(response_fd.message);
      $("#password1").val("");
      $("#password2").val("");
}
    });

      event.preventDefault();
     });
  </script>

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
<?php

}

else{

die("The link might has expired or invalid !!!");
}

}
else{
//

}
?>