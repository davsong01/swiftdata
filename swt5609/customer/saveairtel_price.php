<?php
  require("session_controller.php");
  
  $level=mysqli_real_escape_string($con, $_POST['level']);

  // Get provider
  if($api_airtel == 'gongzo_data.php'){
      $gongzo_data40 = intval($_POST['gongzo_data40']);
      $gongzo_data45 = intval($_POST['gongzo_data45']);
      $gongzo_data46 = intval($_POST['gongzo_data46']);
      $gongzo_data47 = intval($_POST['gongzo_data47']);
      $gongzo_data48 = intval($_POST['gongzo_data48']);
      $gongzo_data144 = intval($_POST['gongzo_data144']);
      $gongzo_data145 = intval($_POST['gongzo_data145']);
      $gongzo_data146 = intval($_POST['gongzo_data146']);
      $gongzo_data296 = intval($_POST['gongzo_data296']);
      $gongzo_data297 = intval($_POST['gongzo_data297']);
      $gongzo_data298 = intval($_POST['gongzo_data298']);

      $update=mysqli_query($con, "UPDATE airteldata_plan SET gongzo_data40='$gongzo_data40', gongzo_data45='$gongzo_data45', gongzo_data46='$gongzo_data46', gongzo_data47='$gongzo_data47', gongzo_data48='$gongzo_data48', gongzo_data144='$gongzo_data144', gongzo_data145='$gongzo_data145', gongzo_data146='$gongzo_data146', gongzo_data296='$gongzo_data296', gongzo_data297='$gongzo_data297', gongzo_data298='$gongzo_data298' WHERE id='$level'");

  }elseif($api_airtel == 'easy_access_data.php'){
    $easy_access66 = intval($_POST['easy_access66']);
    $easy_access67 = intval($_POST['easy_access67']);
    $easy_access68 = intval($_POST['easy_access68']);
    $easy_access69 = intval($_POST['easy_access69']);
    $easy_access70 = intval($_POST['easy_access70']);
    $easy_access71 = intval($_POST['easy_access71']);
    $easy_access72 = intval($_POST['easy_access72']);
    $easy_access74 = intval($_POST['easy_access74']);
    $easy_access96 = intval($_POST['easy_access96']);
    $easy_access97 = intval($_POST['easy_access97']);
    $easy_access157 = intval($_POST['easy_access157']);

    $update=mysqli_query($con, "UPDATE airteldata_plan SET easy_access66='$easy_access66', easy_access67='$easy_access67', easy_access68='$easy_access68', easy_access69='$easy_access69', easy_access70='$easy_access70', easy_access71='$easy_access71', easy_access72='$easy_access72', easy_access74='$easy_access74', easy_access96='$easy_access96', easy_access97='$easy_access97', easy_access157='$easy_access157' WHERE id='$level'");
   
  }else{
    $airtel_750=mysqli_real_escape_string($con, $_POST['airtel_750']);
    $airtel_15=mysqli_real_escape_string($con, $_POST['airtel_15']);
    $airtel_2=mysqli_real_escape_string($con, $_POST['airtel_2']);
    $airtel_3=mysqli_real_escape_string($con, $_POST['airtel_3']);
    $airtel_45=mysqli_real_escape_string($con, $_POST['airtel_45']);
    $airtel_6=mysqli_real_escape_string($con, $_POST['airtel_6']);
    $airtel_10=mysqli_real_escape_string($con, $_POST['airtel_10']);
    $airtel_11=mysqli_real_escape_string($con, $_POST['airtel_11']);
    $airtel_20=mysqli_real_escape_string($con, $_POST['airtel_20']);
    $airtel_40=mysqli_real_escape_string($con, $_POST['airtel_40']);
    $airtel_75=mysqli_real_escape_string($con, $_POST['airtel_75']);
    $airtel_120=mysqli_real_escape_string($con, $_POST['airtel_120']);

    $update=mysqli_query($con, "UPDATE airteldata_plan SET airtel_750='$airtel_750', airtel_15='$airtel_15', airtel_2='$airtel_2', airtel_3='$airtel_3', airtel_45='$airtel_45', airtel_6='$airtel_6', airtel_10='$airtel_10', airtel_11='$airtel_11', airtel_20='$airtel_20', airtel_40='$airtel_40', airtel_75='$airtel_75', airtel_120='$airtel_120' WHERE id='$level'");
  }

  if ($update){
    $response=array(
      'status'=>'success',
      'message' => 'Your airtel prices has been successfully updated !!!',
    );
    echo json_encode($response);
    exit();
  }else{
    $response=array(
      'status'=>'fail',
      'message' => 'Critical error occur when updating price !!!',
    );
    echo json_encode($response);
    exit();
  }
// }else{
//   $response=array(
//     'status'=>'fail',
//     'message' => 'Please fill all form !!!',
//   );
//   echo json_encode($response);
//   exit();
// }

?>