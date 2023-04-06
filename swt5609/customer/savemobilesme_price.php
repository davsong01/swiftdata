<?php
    require("session_controller.php");
    $level = mysqli_real_escape_string($con, $_POST['level']);

    // Save 9mobile SME
    if ($api_mobilesme == 'easy_access_data.php') {
      $easy_access166 = mysqli_real_escape_string($con, $_POST['easy_access166']);
      $easy_access167 = mysqli_real_escape_string($con, $_POST['easy_access167']);
      $easy_access168 = mysqli_real_escape_string($con, $_POST['easy_access168']);
      $easy_access128 = mysqli_real_escape_string($con, $_POST['easy_access128']);
      $easy_access129 = mysqli_real_escape_string($con, $_POST['easy_access129']);
      $easy_access130 = mysqli_real_escape_string($con, $_POST['easy_access130']);
      $easy_access131 = mysqli_real_escape_string($con, $_POST['easy_access131']);
      $easy_access132 = mysqli_real_escape_string($con, $_POST['easy_access132']);
      $easy_access169 = mysqli_real_escape_string($con, $_POST['easy_access169']);
      $easy_access134 = mysqli_real_escape_string($con, $_POST['easy_access134']);
      $easy_access135 = mysqli_real_escape_string($con, $_POST['easy_access135']);
      $easy_access170 = mysqli_real_escape_string($con, $_POST['easy_access170']);
      $easy_access136 = mysqli_real_escape_string($con, $_POST['easy_access136']);
      $easy_access171 = mysqli_real_escape_string($con, $_POST['easy_access171']);
      $easy_access137 = mysqli_real_escape_string($con, $_POST['easy_access137']);
      $easy_access138 = mysqli_real_escape_string($con, $_POST['easy_access138']);
      $easy_access172 = mysqli_real_escape_string($con, $_POST['easy_access172']);
      $easy_access173 = mysqli_real_escape_string($con, $_POST['easy_access173']);
      $easy_access174 = mysqli_real_escape_string($con, $_POST['easy_access174']);
      $easy_access175 = mysqli_real_escape_string($con, $_POST['easy_access175']);
      $easy_access176 = mysqli_real_escape_string($con, $_POST['easy_access176']);

      $update = mysqli_query($con, "UPDATE mobilesmedata_plan SET 
      easy_access166='$easy_access166', easy_access167='$easy_access167', easy_access168='$easy_access168', easy_access128='$easy_access128', easy_access129='$easy_access129', easy_access130='$easy_access130', easy_access131='$easy_access131', easy_access132='$easy_access132', easy_access169='$easy_access169', easy_access134='$easy_access134', easy_access135='$easy_access135', easy_access170='$easy_access170', easy_access136='$easy_access136', easy_access171='$easy_access171', easy_access137='$easy_access137', easy_access138='$easy_access138', easy_access172='$easy_access172', easy_access173='$easy_access173', easy_access174='$easy_access174', easy_access175='$easy_access175', easy_access176='$easy_access176' 
      WHERE id='$level'");

      if ($update) {
        $response = array(
          'status' => 'success',
          'message' => 'Your 9Mobile SME prices has been successfully updated !!!',
        );
        echo json_encode($response);
        exit();
      } else {
        $response = array(
          'status' => 'fail',
          'message' => 'There was an error saving prices !!!',
        );
        echo json_encode($response);
        exit();
      }
    }

?>