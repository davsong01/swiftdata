<?php
    require("session_controller.php");
    $level = mysqli_real_escape_string($con, $_POST['level']);

    if ($api_smile == 'vtpass_data.php') {
      $smile1 = mysqli_real_escape_string($con, $_POST['smile1'] ?? 0);
      $smile2 = mysqli_real_escape_string($con, $_POST['smile2'] ?? 0);
      $smile3 = mysqli_real_escape_string($con, $_POST['smile3'] ?? 0);
      $smile4 = mysqli_real_escape_string($con, $_POST['smile4'] ?? 0);
      $smile5 = mysqli_real_escape_string($con, $_POST['smile5'] ?? 0);
      $smile6 = mysqli_real_escape_string($con, $_POST['smile6'] ?? NULL);
      $smile7 = mysqli_real_escape_string($con, $_POST['smile7'] ?? NULL);
      $smile8 = mysqli_real_escape_string($con, $_POST['smile8'] ?? NULL);
      $smile9 = mysqli_real_escape_string($con, $_POST['smile9'] ?? NULL);
      $smile10 = mysqli_real_escape_string($con, $_POST['smile10'] ?? NULL);
      $smile11 = mysqli_real_escape_string($con, $_POST['smile11'] ?? NULL);
      $smile12 = mysqli_real_escape_string($con, $_POST['smile12'] ?? NULL);
      $smile13 = mysqli_real_escape_string($con, $_POST['smile13'] ?? NULL);
      $smile14 = mysqli_real_escape_string($con, $_POST['smile14'] ?? NULL);
      $smile15 = mysqli_real_escape_string($con, $_POST['smile15'] ?? NULL);
      $smile16 = mysqli_real_escape_string($con, $_POST['smile16'] ?? NULL);
      $smile17 = mysqli_real_escape_string($con, $_POST['smile17'] ?? NULL);
      $smile18 = mysqli_real_escape_string($con, $_POST['smile18'] ?? NULL);
      $smile19 = mysqli_real_escape_string($con, $_POST['smile19'] ?? NULL);
      $smile20 = mysqli_real_escape_string($con, $_POST['smile20'] ?? NULL);
      $smile21 = mysqli_real_escape_string($con, $_POST['smile21'] ?? NULL);
      $smile22 = mysqli_real_escape_string($con, $_POST['smile22'] ?? NULL);
      $smile23 = mysqli_real_escape_string($con, $_POST['smile23'] ?? NULL);
      $smile24 = mysqli_real_escape_string($con, $_POST['smile24'] ?? NULL);
      $smile25 = mysqli_real_escape_string($con, $_POST['smile25'] ?? NULL);
      $smile26 = mysqli_real_escape_string($con, $_POST['smile26'] ?? NULL);
      $smile27 = mysqli_real_escape_string($con, $_POST['smile27'] ?? NULL);
      $smile28 = mysqli_real_escape_string($con, $_POST['smile28'] ?? NULL);
      $smile29 = mysqli_real_escape_string($con, $_POST['smile29'] ?? NULL);
      $smile30 = mysqli_real_escape_string($con, $_POST['smile30'] ?? NULL);
      $smile31 = mysqli_real_escape_string($con, $_POST['smile31'] ?? NULL);
      $smile32 = mysqli_real_escape_string($con, $_POST['smile32'] ?? NULL);
      $smile33 = mysqli_real_escape_string($con, $_POST['smile33'] ?? NULL);
      $smile34 = mysqli_real_escape_string($con, $_POST['smile34'] ?? NULL);
      $smile35 = mysqli_real_escape_string($con, $_POST['smile35'] ?? NULL);
      $smile36 = mysqli_real_escape_string($con, $_POST['smile36'] ?? NULL);
      $smile37 = mysqli_real_escape_string($con, $_POST['smile37'] ?? NULL);
      $smile38 = mysqli_real_escape_string($con, $_POST['smile38'] ?? NULL);
      $smile39 = mysqli_real_escape_string($con, $_POST['smile39'] ?? NULL);
      $smile40 = mysqli_real_escape_string($con, $_POST['smile40'] ?? NULL);
      $smile41 = mysqli_real_escape_string($con, $_POST['smile41'] ?? NULL);
      $smile42 = mysqli_real_escape_string($con, $_POST['smile42'] ?? NULL);
      $smile43 = mysqli_real_escape_string($con, $_POST['smile43'] ?? NULL);
      $smile44 = mysqli_real_escape_string($con, $_POST['smile44'] ?? NULL);
      $smile45 = mysqli_real_escape_string($con, $_POST['smile45'] ?? NULL);
      $smile46 = mysqli_real_escape_string($con, $_POST['smile46'] ?? NULL);
      $smile46 = mysqli_real_escape_string($con, $_POST['smile46'] ?? NULL);
      $smile47 = mysqli_real_escape_string($con, $_POST['smile47'] ?? NULL);
      $smile48 = mysqli_real_escape_string($con, $_POST['smile48'] ?? NULL);
      $smile49 = mysqli_real_escape_string($con, $_POST['smile49'] ?? NULL);

    

      $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT 
      smile1,smile2,smile3,smile4,smile5,smile6,smile7,smile8,smile9,smile10,smile11,smile12,smile13,smile14,smile15,smile16,smile17,smile18,smile19,smile20,smile21,smile22,smile23,smile24,smile25,smile26,smile27,smile28,smile29,smile30,smile31,smile32,smile33,smile34,smile35,smile36,smile37,smile38,smile39,smile40,smile41,smile42,smile43,smile44,smile45,smile46,smile47,smile48,smile49 FROM smiledata_plan WHERE id='$level'"));

      $update = mysqli_query($con, "UPDATE smiledata_plan SET  smile1='$smile1',smile2='$smile2',smile3='$smile3',smile4='$smile4',smile5='$smile5',smile6='$smile6',smile7='$smile7',smile8='$smile8',smile9='$smile9',smile10='$smile10',smile11='$smile11',smile12='$smile12',smile13='$smile13',smile14='$smile14',smile15='$smile15',smile16='$smile16',smile17='$smile17',smile18='$smile18',smile19='$smile19',smile20='$smile20',smile21='$smile21',smile22='$smile22',smile23='$smile23',smile24='$smile24',smile25='$smile25',smile26='$smile26',smile27='$smile27',smile28='$smile28',smile29='$smile29',smile30='$smile30',smile31='$smile31',smile32='$smile32',smile33='$smile33',smile34='$smile34',smile35='$smile35',smile36='$smile36',smile37='$smile37',smile38='$smile38',smile39='$smile39',smile40='$smile40',smile41='$smile41',smile42='$smile42',smile43='$smile43',smile44='$smile44',smile45='$smile45',smile46='$smile46',smile47='$smile47',smile48='$smile48',smile49='$smile49' WHERE id='$level'");

      if ($update) {

        $response = array(
          'status' => 'success',
          'message' => 'Your smile prices for Level ' . $level . ' has been successfully updated!!!',
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