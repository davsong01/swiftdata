<?php
    require("session_controller.php");
    $level = mysqli_real_escape_string($con, $_POST['level']);

    if ($api_spectranet == 'vtpass_data.php') {
      $spectranet1 = mysqli_real_escape_string($con, $_POST['spectranet1']);
      $spectranet2 = mysqli_real_escape_string($con, $_POST['spectranet2']);
      $spectranet3 = mysqli_real_escape_string($con, $_POST['spectranet3']);
      // $spectranet4 = mysqli_real_escape_string($con, $_POST['spectranet4']);
      
      // $response = array(
      //   'status' => 'success',
      //   'message' => 'Your glo-cg prices for Level ' . $spectranet1 . $spectranet2 . $spectranet3 . $spectranet4 . ' has been successfully updated!!!',
      // );
      // echo json_encode($response);
      // exit();
      
      $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT spectranet1,spectranet2,spectranet3 FROM spectranetdata_plan WHERE id='$level'"));
        
      $update = mysqli_query($con, "UPDATE spectranetdata_plan SET spectranet1='$spectranet1', spectranet2='$spectranet2', spectranet3='$spectranet3' WHERE id='$level'");

      if ($update) {

        $response = array(
          'status' => 'success',
          'message' => 'Your spectranet prices for Level ' . $level . ' has been successfully updated!!!',
        );
        echo json_encode($response);
        exit();

      } else {

        $response = array(
          'status' => 'fail',
          'message' => 'Critical error occur when updating price !!!',
        );
        echo json_encode($response);
        exit();

      }

    }

?>