<?php
require("session_controller.php");
$level = mysqli_real_escape_string($con, $_POST['level']);

if($api_glo == 'easy_access_data.php'){
  $easy_access59 = intval($_POST['easy_access59']);
  $easy_access60 = intval($_POST['easy_access60']);
  $easy_access87 = intval($_POST['easy_access87']);
  $easy_access61 = intval($_POST['easy_access61']);
  $easy_access62 = intval($_POST['easy_access62']);
  $easy_access63 = intval($_POST['easy_access63']);
  $easy_access64 = intval($_POST['easy_access64']);
  $easy_access92 = intval($_POST['easy_access92']);
  $easy_access93 = intval($_POST['easy_access93']);
  $easy_access94 = intval($_POST['easy_access94']);
  $easy_access100 = intval($_POST['easy_access100']);
  $easy_access101 = intval($_POST['easy_access101']);
  $easy_access102 = intval($_POST['easy_access102']);

  $update = mysqli_query($con, "UPDATE glodata_plan SET easy_access59='$easy_access59', easy_access60='$easy_access60', easy_access87='$easy_access87', easy_access61='$easy_access61', easy_access62='$easy_access62', easy_access63='$easy_access63', easy_access64='$easy_access64', easy_access92='$easy_access92', easy_access93='$easy_access93', easy_access94='$easy_access94', easy_access100='$easy_access100', easy_access101='$easy_access101',easy_access102='$easy_access102' WHERE id='$level'");


}else{
  $glo_105=intval($_POST['glo_105']);
  $glo_29=intval($_POST['glo_29']);
  $glo_41=intval($_POST['glo_41']);
  $glo_58=intval($_POST['glo_58']);
  $glo_77=intval($_POST['glo_77']);
  $glo_10=intval($_POST['glo_10']);
  $glo_1325=intval($_POST['glo_1325']);
  $glo_1825=intval($_POST['glo_1825']);
  $glo_295=intval($_POST['glo_295']);
  $glo_50=intval($_POST['glo_50']);
  $glo_93=intval($_POST['glo_93']);
  $level=intval($_POST['level']);

  $update=mysqli_query($con, "UPDATE glodata_plan SET glo_105='$glo_105', glo_29='$glo_29', glo_41='$glo_41', glo_58='$glo_58', glo_77='$glo_77', glo_10='$glo_10', glo_1325='$glo_1325', glo_1825='$glo_1825', glo_295='$glo_295', glo_50='$glo_50', glo_93='$glo_93' WHERE id='$level'");
}

if ($update){
  $response=array(
    'status'=>'success',
    'message' => 'Your glo prices has been successfully updated !!!',
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
?>