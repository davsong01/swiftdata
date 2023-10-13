<?php
  require("session_controller.php");
  $type = $_POST['type'];

  if($type == 'payment_gateway'){
    $selected = $_POST['selected'];

    $update = mysqli_query($con, "UPDATE web_settings SET api_payment_gateway='$selected' WHERE id=1");  
  }


  if ($update) {
    $response = array(
      'status' => 'success',
      'message' => 'Operation successful !!!',
    );
    echo json_encode($response);
    exit();
  } else {
    $response = array(
      'status' => 'fail',
      'message' => 'Critical error occur when updating website settings !!!',
    );
    echo json_encode($response);
    exit();
  }

?>