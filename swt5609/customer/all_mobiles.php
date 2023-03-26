<?php
require("session_controller.php");

$mobiles="";

$mobiles="";
$get_mo1=mysqli_query($con, "SELECT mobile FROM users WHERE id BETWEEN 1 AND 3000 AND block='0'");
while ($rdata=mysqli_fetch_array($get_mo1, MYSQLI_ASSOC)){
 $mobiles .= $rdata['mobile'].',';   
}


 $response=array(
 'message' => $mobiles,
 'status' => 'success',
 );

echo json_encode($response);
exit();

?>