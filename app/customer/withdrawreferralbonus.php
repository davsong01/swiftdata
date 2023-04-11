<?php

require("session_controller.php");
require("../../functions/web_config.php");

error_reporting(0);

if (!empty($id)) {
    $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT `cashback`,`wallets` FROM users WHERE id='$id'"));
    $amount = $data_query[0];
    $pWallet = $data_query[1];
    $time = date('Y-m-d h:i:s');
    $topUp = $amount + $pWallet;

    // echo json_encode($getUser, $pWallet, $id);
    if ($amount > 0) {
        mysqli_query($con, "UPDATE users SET wallets='$topUp' WHERE id='$id' AND username ='$username'");
        mysqli_query($con, "UPDATE users SET cashback=0 WHERE id='$id' AND username ='$username'");
    }

    $insert = mysqli_query($con, "INSERT INTO `earn_transactions` (`id`, `user_id`, `ref_code`, `amount`, `type`,`description`,`created_at`) VALUES (NULL, '$id','', '$amount','debit','Withdrawal to Wallet','$time')");
    
    $response = array(
        'status' => 'success',
        'status_code' => '100',
        'message' => '<div class="alert alert-success text-left">Withdrawal of ₦'.number_format($amount, 2). ' is successful!!!</div>',
    );
    echo json_encode($response);
    exit;
}
?>