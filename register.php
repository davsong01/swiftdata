<?php 
require("functions/web_config.php");
require("functions/csrf_token.php"); 
if (isset($_REQUEST['referral'])){
$myrefferal=$_REQUEST['referral'];
}
else{
$myrefferal="ADMIN";
}
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

    <title><?php echo $sitename; ?> | Register</title>

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
            <h3>Enjoy - <strong><?php echo strtoupper($sitename); ?></strong></h3>
            <p class="mb-4">Provide your valid creditials and sign in.</p>

            <div id="response"></div>
            <form id="form-data">


                <div class="mb-3">
                  <label for="email" class="form-label">First Name</label>
                  <input type="hidden" id="myrefferal" value="<?php echo $myrefferal; ?>">
                  <input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
                  <input
                    type="text"
                    class="form-control"
                    id="full_name"
                    placeholder="Enter your full name"
                    autofocus
                  />
                </div>


                <div class="mb-3">
                  <label for="email" class="form-label">Telephone</label>
                  <input
                    type="tel"
                    class="form-control"
                    id="mobile_no"
                    placeholder="Enter your mobile no."
                    autofocus
                  />
                </div>


                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email_address"
                    placeholder="Enter your email"
                    autofocus
                  />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>

                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" checked/>
                    <label class="form-check-label" for="remember-me"> I agree to terms and conditions </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" id="submitBtn">Sign Up</button>
                </div>
        
</form>
              <p class="text-center">
                <span>Already a member?</span>
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
      full_name: $("#full_name").val(),
      mobile_no: $("#mobile_no").val(),
      username: $("#username").val(),
      email_address: $("#email_address").val(),
      password: $("#password").val(),
      myrefferal: $("#myrefferal").val(),
      req_token: $("#req_token").val(),
    };
    $.ajax({
      url:'app/resources/register',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
     if (response_fd.status == 'success'){

    $('#submitBtn').html('Sign Up');
    $("#response").html(response_fd.message);
    $("#full_name").val("");
    $("#username").val("");$("#email_address").val("");
    $("#password").val("");$("#mobile_no").val("");
     }
    else {
   $("#submitBtn").html('Sign Up');
   $("#response").html(response_fd.message);
    }
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
