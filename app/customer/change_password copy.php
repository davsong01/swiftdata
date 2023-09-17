<?php
  require("session_controller.php");
  $old_password = mysqli_real_escape_string($con, $_POST['old_password']);
  $req_token = mysqli_real_escape_string($con, $_POST['req_token']);

  if ($_SESSION['csrftoken'] != $_POST['req_token'] || empty($_POST['old_password'])) {
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Please fill all input !!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  if (md5($old_password) != $password){
    $response = array(
      'status' => 'fail',
      'message' => '<div class="alert alert-danger text-left">Incorrect password !!!</div>',
    );
    echo json_encode($response);
    exit();
  }

  $response = array(
    'title' => 'COMPLETED',
    'icon' => 'success',
    'status' => 'success',
    'message' => 'Please check your email for a password reset link!!!',
  );
  echo json_encode($response);
  exit();

  // if ($_SESSION['csrftoken'] == $_POST['req_token']){
  // // if (!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['retype_password']) && !empty($_POST['req_token'])){
      if (!empty($_POST['old_password']) && !empty($_POST['req_token'])){
       

        if (md5($old_password) == $password){
          if (strlen($new_password)> 4){

            if ($new_password != $retype_password){


            $response=array(
                'status'=>'fail',
                'message' => '<div class="alert alert-danger text-left">Password entered not match !!!</div>',
              );
              echo json_encode($response);
              exit();
            }else{
              $new_hashPassword=md5($new_password);
              mysqli_query($con, "UPDATE users SET password='$new_hashPassword' WHERE id='$id' AND email='$email'");

              $response=array(
                'title' => 'COMPLETED',
                'icon' => 'success',
                  'status'=>'success',
                  'message' => 'Password was successfully reset !!!',
                );
                echo json_encode($response);
                exit();

            }


          }else{
            $response=array(
              'status'=>'fail',
              'message' => '<div class="alert alert-danger text-left">Please use a strong password !!!</div>',
            );
            echo json_encode($response);
            exit();
          }
        }else{
          $response=array(
            'status'=>'fail',
            'message' => '<div class="alert alert-danger text-left">Incorrect old password !!!</div>',
          );
          echo json_encode($response);
          exit();

        }
      }else{
        $response=array(
          'status'=>'fail',
          'message' => '<div class="alert alert-danger text-left">Please fill all form !!!</div>',
        );
        echo json_encode($response);
        exit();

      }
    }else{

    $response=array(
        'status'=>'fail',
        'message' => '<div class="alert alert-danger text-left">Something went wrong...</div>',
      );
      echo json_encode($response);
      exit();
    }
