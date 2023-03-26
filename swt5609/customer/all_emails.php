<?php
require("session_controller.php");

$emails="";

$emails="";
$get_mal=mysqli_query($con, "SELECT email FROM users WHERE id BETWEEN 1 AND 3000 AND block='0'");
while ($rdata=mysqli_fetch_array($get_mal, MYSQLI_ASSOC)){
 $emails .= $rdata['email'].',';   
}


 $response=array(
 'message' => $emails,
 'status' => 'success',
 );

echo json_encode($response);
exit();

?>