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
      $admb = $level2_adminch;
      $amount = $level2_charge;
      $refb = $level2_charge - $level2_adminch;
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

      $refinfo = mysqli_fetch_array(mysqli_query($con, "SELECT cashback, wallets, username, email, level, mobile FROM users WHERE username='" . $username . "'"));

      $ref_ini_bonus = $refinfo[0];
      $ref_ini_mallu = $refinfo[1];
      $ref_username = $refinfo[2];
      $ref_email = $refinfo[3];
      $ref_level = $refinfo[4];
      $ref_mobile = $refinfo[5];

      $adinfo = mysqli_fetch_array(mysqli_query($con, "SELECT cashback, wallets, username, email, level, mobile FROM users WHERE username='ADMIN'"));

      $ad_ini_bonus = $adinfo[0];
      $ad_ini_mallu = $adinfo[1];
      $ad_username = $adinfo[2];
      $ad_email = $adinfo[3];
      $ad_level = $adinfo[4];
      $ad_mobile = $adinfo[5];

      $newbal = $Account_Balance - $amount;
      mysqli_query($con, "UPDATE users SET level='$package', wallets='" . $newbal . "' WHERE email='" . $email . "'");

      $setbonus1 = mysqli_query($con, "UPDATE users SET cashback=cashback+$refb WHERE username='" . $username . "'");
      $setbonus2 = mysqli_query($con, "UPDATE users SET cashback=cashback+$admb WHERE username='ADMIN'");

      $descr1 = 'Activation of level ' . $package . ' was successful';
      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$mobile', '$email', '$username', 'UPGRADE', '$amount', '$Account_Balance', '$newbal', '$descr1', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$package', '$reference', '$reference2', 'GOOD', '0', '0', '0')");

      $descr2 = 'Referral bonus of N' . $refb . ' landed from ' . $username;
      $new_ref_bonus = $ref_ini_bonus + $refb;
      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$ref_mobile', '$ref_email', '$ref_username', 'EARNING', '$refb', '$ref_ini_mallu', '$new_ref_bonus', '$descr2', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$ref_level', '$reference3', '$reference4', 'GOOD', '0', '0', '0')");

      $descr3 = 'Admin bonus of N' . $admb . ' landed from ' . $username;
      $new_ad_bonus = $ad_ini_bonus + $admb;

      mysqli_query($con, "INSERT INTO `final_transactions` (`id`, `mobile_number`, `buyer_email`, `buyer_username`, `buyer_service`, `buyer_amount`, `buyer_prebal`, `buyer_postbal`, `buyer_descr`, `buyer_status`, `buyer_date`, `timestring`, `charge_from`, `user_type`, `sys_ref`, `api_ref`, `api_report`, `src_price`, `profit`, `databyte`) VALUES (NULL, '$ad_mobile', '$ad_email', '$ad_username', 'EARNING', '$admb', '$ad_ini_mallu', '$new_ad_bonus', '$descr3', 'SUCCESSFUL', '$time', '$timestring', 'CASHBACK', '$ad_level', '$reference5', '$reference6', 'GOOD', '0', '0', '0')");

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