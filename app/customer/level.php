<?php
require("session_controller.php");

if ($_SESSION['csrftoken'] == $_POST['req_token']) {

  if (!empty($_POST['level']) && !empty($_POST['req_token'])) {

    $level = mysqli_real_escape_string($con, $_POST['level']);
    $req_token = mysqli_real_escape_string($con, $_POST['req_token']);

    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos'));
    $time = $dateTime->format("d-M-y  h:i A");
    $timestring = time();
    $reference = strtoupper(time() . rand(1000, 9000) . rand(20000000, 90000000));
    $reference2 = strtoupper(rand(1000, 9000) . rand(200000, 900000) . uniqid());
    $reference3 = strtoupper(time() . rand(1000, 9000) . rand(20000000, 90000000));
    $reference4 = strtoupper(rand(1000, 9000) . rand(20000000, 90000000) . time());
    $reference5 = strtoupper(rand(20000000, 90000000) . time() . rand(1000, 9000));
    $reference6 = strtoupper(uniqid() . rand(20000000, 90000000) . time());

    if ($level == "2") {
      $amount = $level2_charge;
      $refb = $level2_charge - $level2_adminch;
      $admb = $level2_adminch;
      $package = 2;
    }

    if ($level == "3") {
      $admb = $level3_adminch;
      $amount = $level3_charge;
      $refb = $level3_charge - $level3_adminch;
      $package = 3;
    }

    if ($level == "4") {
      $admb = $level4_adminch;
      $amount = $level4_charge;
      $refb = $level4_charge - $level4_adminch;
      $package = 4;
    }


    if ($Account_Balance > $amount && $amount > 0) {

      // Get user that is upgrading
      $refinfo = mysqli_fetch_array(mysqli_query($con, "SELECT cashback, wallets, username, email, level, mobile,id,ref_by FROM users WHERE username='" . $username . "'"));

      $ref_ini_bonus = $refinfo[0];
      $ref_ini_mallu = $refinfo[1];
      $ref_username = $refinfo[2];
      $ref_email = $refinfo[3];
      $ref_level = $refinfo[4];
      $ref_mobile = $refinfo[5];
      $ref_id = $refinfo[6];
      $upline = $refinfo[7];

      // Get admin to credit
      $adinfo = mysqli_fetch_array(mysqli_query($con, "SELECT cashback, wallets, username, email, level, mobile,id,ref_code FROM users WHERE username='ADMIN'"));

      $ad_ini_bonus = $adinfo[0];
      $ad_ini_mallu = $adinfo[1];
      $ad_username = $adinfo[2];
      $ad_email = $adinfo[3];
      $ad_level = $adinfo[4];
      $ad_mobile = $adinfo[5];
      $ad_id = $adinfo[6];
      $ref_code = $adinfo[7];
      $time = date('Y-m-d h:i:s');

      // Update user wallet and balance
      $newbal = $Account_Balance - $amount;
      mysqli_query($con, "UPDATE users SET level='$package', wallets='" . $newbal . "' WHERE email='" . $email . "'");

      // Add bonus to admin
      $setbonus2 = mysqli_query($con, "UPDATE users SET cashback=cashback+$admb WHERE username='ADMIN'");
      // Insert admin earnings
      $descr3 = 'Admin bonus of N' . $admb . ' landed from ' . $username;
      $new_ad_bonus = $ad_ini_mallu + $admb;
      $descr1 = 'Activation of level ' . $package . ' was successful';

      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$ad_mobile', '$ad_email', '$ad_username', 'EARNING', '$admb', '$ad_ini_mallu', '$new_ad_bonus', '$descr3', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$ad_level', '$reference5', '$reference6', 'GOOD', '0', '0', '0')");

      $insert = mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `user_id`, `ref_code`, `amount`, `type`,`description`,`created_at`) VALUES (NULL, '$ad_id','$ref_code', '$refb','credit','$descr3','$time')");

      // DEBIT User earnings

      // Credit refferal
      if($upline != 'ADMIN'){
        $uplineDetails =  mysqli_fetch_array(mysqli_query($con, "SELECT cashback, wallets, username, email, level, mobile,id,ref_by FROM users WHERE ref_code='$upline'"));

        if($uplineDetails){
          $setbonus1 = mysqli_query($con, "UPDATE users SET cashback=cashback+$refb WHERE username='" . $upline . "'");
          $descr2 = 'Referral bonus of N' . $refb . ' landed from ' . $username;
          
          $upline_pcashback = $uplineDetails[0];
          $upline_pwallet = $uplineDetails[1];
          $upline_username = $uplineDetails[2];
          $upline_email = $uplineDetails[3];
          $upline_level = $uplineDetails[4];
          $upline_mobile = $uplineDetails[5];
          $upline_id = $uplineDetails[6];

          // $upline_new_cashback = $level2_charge - $level2_adminch;
          $new_ref_bonus = $upline_pwallet + $refb;
          $insert1 = mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$upline_mobile', '$upline_email', '$upline_username', 'EARNING', '$refb', '$upline_pwallet', '$new_ref_bonus', '$descr2', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$upline_level', '$reference3', '$reference4', 'GOOD', '0', '0', '0')");
          
          $insert2 = mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `user_id`, `ref_code`, `amount`, `type`,`description`,`created_at`) VALUES (NULL, '$upline_id','$upline', '$refb','credit','$descr2','$time')");
        }
        // $response = array(
        //     'status' => 'fail',
        //     'message' => '<div class="alert alert-warning text-left">'. addslashes(mysqli_error($con)).'</div>',
        // );
        // echo json_encode($response);
        // exit();
      }
      // set bonuses
         // User upgrade transaction history
      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$email', '$username', 'UPGRADE', '$amount', '$Account_Balance', '$newbal', '$descr1', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$package', '$reference', '$reference2', 'GOOD', '0', '0', '0')");

      // mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$email', '$username', 'UPGRADE', '$amount', '$Account_Balance', '$newbal', '$descr1', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$package', '$reference', '$reference2', 'GOOD', '0', '0', '0')");

      // $insert = mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `user_id`, `ref_code`, `amount`, `type`,`description`,`created_at`) VALUES (NULL, '$ref_id','$ref_username', '$amount','credit','$descr1','$time')");

      

      // $insert = mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `user_id`, `ref_code`, `amount`, `type`,`description`,`created_at`) VALUES (NULL, '$ref_id','$ref_code', '$refb','credit','$descr2','$time')");

      // $descr3 = 'Admin bonus of N' . $admb . ' landed from ' . $username;
      // $new_ad_bonus = $ad_ini_bonus + $admb;

      // mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$ad_mobile', '$ad_email', '$ad_username', 'EARNING', '$admb', '$ad_ini_mallu', '$new_ad_bonus', '$descr3', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$ad_level', '$reference5', '$reference6', 'GOOD', '0', '0', '0')");

      // $insert = mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `user_id`, `ref_code`, `amount`, `type`,`description`,`created_at`) VALUES (NULL, '$ad_id','$ref_code', '$refb','credit','$descr3','$time')");

      $response = array(
        'status' => 'success',
        'message' => $descr1,
      );
      echo json_encode($response);
      exit();

    } else {

      $response = array(
        'status' => 'fail',
        'message' => 'You did not have enough balance to upgrade !!!',
      );
      echo json_encode($response);
      exit();
    }


  } else {

    $response = array(
      'status' => 'fail',
      'message' => 'Please select your desire level !!!',
    );
    echo json_encode($response);
    exit();

  }

} else {

  $response = array(
    'status' => 'fail',
    'message' => 'Something went wrong...',
  );
  echo json_encode($response);
  exit();
}

?>