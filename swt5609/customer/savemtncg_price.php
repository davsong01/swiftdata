<?php
  require("session_controller.php");
  $level=mysqli_real_escape_string($con, $_POST['level']);

  if($api_gift == 'easy_access_data.php'){
      $easy_access125=mysqli_real_escape_string($con, $_POST['easy_access125']);
      $easy_access126=mysqli_real_escape_string($con, $_POST['easy_access126']);
      $easy_access127=mysqli_real_escape_string($con, $_POST['easy_access127']);
      $easy_access45=mysqli_real_escape_string($con, $_POST['easy_access45']);
      $easy_access46=mysqli_real_escape_string($con, $_POST['easy_access46']);
      $easy_access47=mysqli_real_escape_string($con, $_POST['easy_access47']);
      $easy_access48=mysqli_real_escape_string($con, $_POST['easy_access48']);
      $easy_access49=mysqli_real_escape_string($con, $_POST['easy_access49']);
      $easy_access88=mysqli_real_escape_string($con, $_POST['easy_access88']);
      $easy_access89=mysqli_real_escape_string($con, $_POST['easy_access89']);
      $easy_access90=mysqli_real_escape_string($con, $_POST['easy_access90']);
      $easy_access141=mysqli_real_escape_string($con, $_POST['easy_access141']);
      $easy_access142=mysqli_real_escape_string($con, $_POST['easy_access142']);
      $easy_access143=mysqli_real_escape_string($con, $_POST['easy_access143']);
      $easy_access144=mysqli_real_escape_string($con, $_POST['easy_access144']);
      $easy_access145=mysqli_real_escape_string($con, $_POST['easy_access145']);
      $easy_access146=mysqli_real_escape_string($con, $_POST['easy_access146']);
      $easy_access147=mysqli_real_escape_string($con, $_POST['easy_access147']);
      $easy_access148=mysqli_real_escape_string($con, $_POST['easy_access148']);
      $easy_access149=mysqli_real_escape_string($con, $_POST['easy_access149']);
      $easy_access150=mysqli_real_escape_string($con, $_POST['easy_access150']);
      $easy_access151=mysqli_real_escape_string($con, $_POST['easy_access151']);

      try{
          $update = mysqli_query($con, "UPDATE mtncgdata_plan SET 
          easy_access125='$easy_access125', easy_access126='$easy_access126', easy_access127='$easy_access127', easy_access45='$easy_access45',easy_access46='$easy_access46', easy_access47='$easy_access47', easy_access48='$easy_access48', easy_access49='$easy_access49', easy_access88='$easy_access88', easy_access89='$easy_access89', easy_access90='$easy_access90', easy_access141='$easy_access141', easy_access142='$easy_access142',easy_access143='$easy_access143', easy_access144='$easy_access144', easy_access145='$easy_access145',easy_access146='$easy_access146', easy_access147='$easy_access147', easy_access148='$easy_access148',easy_access149='$easy_access149', easy_access150='$easy_access150', easy_access151='$easy_access151'
          
          WHERE id='$level'");
      }catch(\Exception $e){
          var_dump($e->getMessage());
          exit();
      }

      if ($update){
        $response=array(
            'status'=>'success',
            'message' => 'Your mtn-cg prices has been successfully updated !!!',
          );
          echo json_encode($response);
          exit();
      }else{

      }
}
if (!empty($_POST['mtncg_500']) &&  !empty($_POST['mtncg_1']) &&  !empty($_POST['mtncg_2']) &&  !empty($_POST['mtncg_3']) &&  !empty($_POST['mtncg_5']) &&  !empty($_POST['mtncg_10']) && !empty($_POST['level'])){

    $mtncg_500=mysqli_real_escape_string($con, $_POST['mtncg_500']);
    $mtncg_1=mysqli_real_escape_string($con, $_POST['mtncg_1']);
    $mtncg_2=mysqli_real_escape_string($con, $_POST['mtncg_2']);
    $mtncg_3=mysqli_real_escape_string($con, $_POST['mtncg_3']);
    $mtncg_5=mysqli_real_escape_string($con, $_POST['mtncg_5']);
    $mtncg_10=mysqli_real_escape_string($con, $_POST['mtncg_10']);
    $level=mysqli_real_escape_string($con, $_POST['level']);

    $update=mysqli_query($con, "UPDATE mtncgdata_plan SET mtncg_500='$mtncg_500', mtncg_1='$mtncg_1', mtncg_2='$mtncg_2', mtncg_3='$mtncg_3', mtncg_5='$mtncg_5', mtncg_10='$mtncg_10' WHERE id='$level'");

    if ($update){
        $response=array(
          'status'=>'success',
          'message' => 'Your mtn-cg prices has been successfully updated !!!',
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

}else{

   $response=array(
    'status'=>'fail',
    'message' => 'Please fill all form !!!',
  );
  echo json_encode($response);
  exit();
}

?>