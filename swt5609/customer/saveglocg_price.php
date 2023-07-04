<?php
    require("session_controller.php");
    $level = mysqli_real_escape_string($con, $_POST['level']);

    if ($api_glocg == 'easy_access_data.php') {
      $easy_access158 = mysqli_real_escape_string($con, $_POST['easy_access158']);
      $easy_access159 = mysqli_real_escape_string($con, $_POST['easy_access159']);
      $easy_access160 = mysqli_real_escape_string($con, $_POST['easy_access160']);
      $easy_access161 = mysqli_real_escape_string($con, $_POST['easy_access161']);
      $easy_access162 = mysqli_real_escape_string($con, $_POST['easy_access162']);
      $easy_access163 = mysqli_real_escape_string($con, $_POST['easy_access163']);
      $easy_access164 = mysqli_real_escape_string($con, $_POST['easy_access164']);


      $update = mysqli_query($con, "UPDATE glocgdata_plan SET easy_access158='$easy_access158', easy_access159='$easy_access159', easy_access160='$easy_access160', easy_access161='$easy_access161', easy_access162='$easy_access162', easy_access163='$easy_access163', easy_access164='$easy_access164' WHERE id='$level'");

      if ($update) {

        $response = array(
          'status' => 'success',
          'message' => 'Your glo-cg prices for Level ' . $level . ' has been successfully updated!!!',
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

    }else if ($api_glocg == 'gongzo.php') {

      $gongzo_data321 = mysqli_real_escape_string($con, $_POST['gongzo_data321']);
      $gongzo_data322 = mysqli_real_escape_string($con, $_POST['gongzo_data322']);
      $gongzo_data323 = mysqli_real_escape_string($con, $_POST['gongzo_data323']);
      $gongzo_data324 = mysqli_real_escape_string($con, $_POST['gongzo_data324']);
      $gongzo_data325 = mysqli_real_escape_string($con, $_POST['gongzo_data325']);
      $gongzo_data326 = mysqli_real_escape_string($con, $_POST['gongzo_data326']);
      $gongzo_data327 = mysqli_real_escape_string($con, $_POST['gongzo_data327']);
      $gongzo_data337 = mysqli_real_escape_string($con, $_POST['gongzo_data337']);

      $update = mysqli_query($con, "UPDATE glocgdata_plan SET gongzo_data321='$gongzo_data321', gongzo_data322='$gongzo_data322', gongzo_data323='$gongzo_data323', gongzo_data324='$gongzo_data324', gongzo_data325='$gongzo_data325', gongzo_data326='$gongzo_data326', gongzo_data327='$gongzo_data327', gongzo_data337='$gongzo_data337' WHERE id='$level'");

      if ($update) {

        $response = array(
          'status' => 'success',
          'message' => 'Your glo-cg prices for Level ' . $level . ' has been successfully updated!!!',
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
    }else {
        if (!empty($_POST['glocg_200']) && !empty($_POST['glocg_500']) && !empty($_POST['glocg_1']) && !empty($_POST['glocg_2']) && !empty($_POST['glocg_5']) && !empty($_POST['glocg_10']) && !empty($_POST['level'])) {
          $glocg_200 = mysqli_real_escape_string($con, $_POST['glocg_200']);
          $glocg_500 = mysqli_real_escape_string($con, $_POST['glocg_500']);
          $glocg_1 = mysqli_real_escape_string($con, $_POST['glocg_1']);
          $glocg_2 = mysqli_real_escape_string($con, $_POST['glocg_2']);
          $glocg_3 = mysqli_real_escape_string($con, $_POST['glocg_3']);
          $glocg_5 = mysqli_real_escape_string($con, $_POST['glocg_5']);
          $glocg_10 = mysqli_real_escape_string($con, $_POST['glocg_10']);

          $update = mysqli_query($con, "UPDATE glocgdata_plan SET glocg_200='$glocg_200', glocg_500='$glocg_500', glocg_1='$glocg_1', glocg_2='$glocg_2', glocg_3='$glocg_3', glocg_5='$glocg_5', glocg_10='$glocg_10' WHERE id='$level'");

          if ($update) {

            $response = array(
              'status' => 'success',
              'message' => 'Your glo-cg prices has been successfully updated !!!',
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

        } else {
            $response = array(
              'status' => 'fail',
              'message' => 'Please fill all form !!!',
            );
            echo json_encode($response);
            exit();
        }
    }

?>