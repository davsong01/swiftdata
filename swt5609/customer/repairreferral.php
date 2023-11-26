<?php
require("session_controller.php");

try {
  // $update = mysqli_query($con, "UPDATE users SET block='1' WHERE id='$data_id'");
  $sql = "SELECT * FROM users";
  $result = mysqli_query($con, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);


  foreach($data as $user){
    $id = $user['id'];
    $ref_code = $user['ref_code'];
    $username = str_replace(' ', '_', $user['username']);

    // if(empty($user['old_ref_code'])){
    //   mysqli_query($con, "UPDATE users SET old_ref_code=ref_code WHERE id='$id'");
    // }

    // if (empty($user['old_ref_by'])) {
    //   mysqli_query($con, "UPDATE users SET old_ref_by=ref_by WHERE id='$id'");
    // }

    // if (empty($user['username'])) {
    //   mysqli_query($con, "UPDATE users SET old_username=username WHERE id='$id'");
    // }

    // get where ref_by = ref_code
    
    $sql2 = "SELECT * FROM users WHERE ref_by='$ref_code' AND id != $id";
    $result2 = mysqli_query($con, $sql2);
    $return_info = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    // mysqli_free_result($result2);

    // update such with username
    if($return_info){
      foreach($return_info as $child){
        $c_id = $child['id'];
        mysqli_query($con, "UPDATE users SET ref_by='$username' WHERE id='$c_id'");
      }
    }

    // mysqli_query($con, "UPDATE users SET ref_code='$username' WHERE id='$id'");

  }

  // set username

  // $sql3 = "SELECT * FROM users";
  // $result3 = mysqli_query($con, $sql3);
  // $data3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
  // mysqli_free_result($result3);


  // foreach ($data3 as $user3) {
  //   $u_id = $user3['id'];
  //   $username3 = $user3['username'] != $username3 ? str_replace(' ', '_', $user3['username']) :  $user3['username'];

    
  //   // if ($user3['username'] != $username3) {
  //     mysqli_query($con, "UPDATE users SET ref_code='$username3' WHERE id='$u_id'");
  //   // }

  // }

} catch (\Throwable $th) {
  $response = array(
    'status' => 'fail',
    'message' => $th->getMessage().$th->getLine(),
  );
  echo json_encode($response);
  exit();
}

$response = array(
  'status' => 'success',
  'message' => 'Database repair successful !!!',
);
echo json_encode($response);
exit();
