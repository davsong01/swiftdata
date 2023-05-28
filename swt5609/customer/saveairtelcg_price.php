<?php
  require("session_controller.php");
  $level=mysqli_real_escape_string($con, $_POST['level']);

  if ($api_airtelcg == 'easy_access_data.php') {
      $easy_access104=mysqli_real_escape_string($con, $_POST['easy_access104']);
      $easy_access105=mysqli_real_escape_string($con, $_POST['easy_access105']);
      $easy_access106=mysqli_real_escape_string($con, $_POST['easy_access106']);
      $easy_access107=mysqli_real_escape_string($con, $_POST['easy_access107']);
      $easy_access108=mysqli_real_escape_string($con, $_POST['easy_access108']);
      $easy_access109=mysqli_real_escape_string($con, $_POST['easy_access109']);
      $easy_access124=mysqli_real_escape_string($con, $_POST['easy_access124']);
      $easy_access139=mysqli_real_escape_string($con, $_POST['easy_access139']);
      $easy_access140=mysqli_real_escape_string($con, $_POST['easy_access140']);
      
      $update = mysqli_query($con, "UPDATE airtelcgdata_plan SET 
          easy_access104='$easy_access104', easy_access105='$easy_access105', easy_access106='$easy_access106', easy_access107='$easy_access107',easy_access108='$easy_access108', easy_access109='$easy_access109', easy_access124='$easy_access124', easy_access139='$easy_access139', easy_access140='$easy_access140'
          
          WHERE id='$level'");
      if ($update){
        $response=array(
          'status'=>'success',
          'message' => 'Your airtel-cg prices for Level '. $level.' has been successfully updated!!!',
        );
      }else{
        $response=array(
          'status'=>'fail',
          'message' => 'A database error occured!'. addslashes(mysqli_error($con)),
        );
      }

      echo json_encode($response);
      exit();
    } else if ($api_airtelcg == 'gongzo_data.php') { 
      $gongzo_data312 = mysqli_real_escape_string($con, $_POST['gongzo_data312']);
      $gongzo_data313 = mysqli_real_escape_string($con, $_POST['gongzo_data313']);
      $gongzo_data314 = mysqli_real_escape_string($con, $_POST['gongzo_data314']);
      $gongzo_data315 = mysqli_real_escape_string($con, $_POST['gongzo_data315']);
      $gongzo_data317 = mysqli_real_escape_string($con, $_POST['gongzo_data317']);
      $gongzo_data318 = mysqli_real_escape_string($con, $_POST['gongzo_data318']);
      $gongzo_data319 = mysqli_real_escape_string($con, $_POST['gongzo_data319']);
     
      $update = mysqli_query($con, "UPDATE airtelcgdata_plan SET 
            gongzo_data312='$gongzo_data312', gongzo_data313='$gongzo_data313', gongzo_data314='$gongzo_data314', gongzo_data315='$gongzo_data315',gongzo_data317='$gongzo_data317', gongzo_data318='$gongzo_data318', gongzo_data319='$gongzo_data319'
  
            WHERE id='$level'");
            if ($update) {
              $response = array(
                'status' => 'success',
                'message' => 'Your airtel-cg prices for Level ' . $level . ' has been successfully updated!!!',
              );
            } else {
              $response = array(
                'status' => 'fail',
                'message' => 'A database error occured!' . addslashes(mysqli_error($con)),
              );
            }

            echo json_encode($response);
            exit();
  }else{
      if (!empty($_POST['airtelcg_100']) &&  !empty($_POST['airtelcg_300']) &&  !empty($_POST['airtelcg_500']) &&  !empty($_POST['airtelcg_1']) &&  !empty($_POST['airtelcg_2']) &&  !empty($_POST['airtelcg_5']) && !empty($_POST['level'])){

          $airtelcg_100=mysqli_real_escape_string($con, $_POST['airtelcg_100']);
          $airtelcg_300=mysqli_real_escape_string($con, $_POST['airtelcg_300']);
          $airtelcg_500=mysqli_real_escape_string($con, $_POST['airtelcg_500']);
          $airtelcg_1=mysqli_real_escape_string($con, $_POST['airtelcg_1']);
          $airtelcg_2=mysqli_real_escape_string($con, $_POST['airtelcg_2']);
          $airtelcg_5=mysqli_real_escape_string($con, $_POST['airtelcg_5']);
          $level=mysqli_real_escape_string($con, $_POST['level']);

          $update=mysqli_query($con, "UPDATE airtelcgdata_plan SET airtelcg_100='$airtelcg_100', airtelcg_300='$airtelcg_300', airtelcg_500='$airtelcg_500', airtelcg_1='$airtelcg_1', airtelcg_2='$airtelcg_2', airtelcg_5='$airtelcg_5' WHERE id='$level'");

          if ($update){

              $response=array(
                'status'=>'success',
                'message' => 'Your airtel-cg prices has been successfully updated !!!',
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

  }

?>