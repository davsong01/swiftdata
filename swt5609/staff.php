<?php require("../functions/web_config.php"); ?>
<?php require("../functions/csrf_token.php"); ?>
<?php
if (isset($_GET['token']) && !empty($_GET['token'])){
$access_token=$_GET['token'];
}
else{
$access_token='0th000';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Login - <?php echo $sitename; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="access/css/style.css">
	<link rel="icon" type="image/png" href="access/images/favicon.png">
    <style>
      @keyframes spinner {
        0% {
          transform: translate3d(-50%, -50%, 0) rotate(0deg);
        }
        100% {
          transform: translate3d(-50%, -50%, 0) rotate(360deg);
        }
      }
      .spin::before {
        animation: 1.5s linear infinite spinner;
        animation-play-state: inherit;
        border: solid 5px #cfd0d1;
        border-bottom-color: #1c87c9;
        border-radius: 50%;
        margin-bottom: 15px;
        content: "";
        height: 40px;
        width: 40px;
        text-align: center;
        position: absolute;
        top: 10%;
        left: 10%;
        transform: translate3d(-50%, -50%, 0);
        will-change: transform;
      }
    </style>
	</head>
	<body class="img js-fullheight" style="background-image: url(access/images/bg3.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-3">
					<h2 class="heading-section">STAFF - LOGIN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<p class="mb-4">Provide your passcode and sign in:</p>

		      	<div id="response"></div>
		      	<form id="form-data" class="signin-form">
	            <div class="form-group">
                <input type="hidden" id="username" value="<?php echo $access_token; ?>">
                <input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" id="submitBtn" class="form-control btn btn-primary submit px-3">ACCESS</button>
	            	<div class="spin" id="submitLoader" style="display: none;"></div>
	            </div>

	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="access/js/jquery.min.js"></script>
  <script src="access/js/popper.js"></script>
  <script src="access/js/bootstrap.min.js"></script>
  <script src="access/js/main.js"></script>
    <script type="text/javascript">

     $("#form-data").submit(function (event) {
     $("#submitBtn").html('Please wait...');
     var formData = {
      username: $("#username").val(),
      password: $("#password-field").val(),
      req_token: $("#req_token").val(),
    };
    $.ajax({
      url:'resources/stafflogin',
      method:'POST',
      dataType:'json',
      data:formData,
      success:function(response_fd){
     if (response_fd.status == 'success'){

    $('#submitBtn').html('Redirecting...');
                    setTimeout(function() {
                        window.location.href = response_fd.redirect;
                    }, 1000);
     }
    else {
   $("#submitBtn").html('ACCESS');
   $("#response").html(response_fd.message);
    }
}
    });

      event.preventDefault();
     });
  </script>
	</body>
</html>

