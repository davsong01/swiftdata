<?php
require("session_controller.php");

$load_id=$_GET['load_id'];
$load_amount=$load_id+200;
$load_next=$load_amount;

$nextbtn="";
$chat="";

mysqli_query($con, "UPDATE vtuapp_livechat SET chat_read='1' WHERE user_id='$id' AND chat_mode='ADMIN'");

$getAllChat=mysqli_query($con, "SELECT COUNT(*) FROM vtuapp_livechat WHERE user_id='$id'");
$aa=mysqli_fetch_array($getAllChat);
$returnall=$aa[0];

if ($returnall > 200 && $returnall > $load_next){$nextbtn='<button class="btn btn-primary" id="'.$load_next.'"  onclick="showMore(this.id)">Load More Chat >>> </button>';}
else {$nextbtn='';}

 $lettr= mysqli_query($con, "SELECT * FROM vtuapp_livechat WHERE user_id='$id' ORDER BY id ASC LIMIT $load_amount");
if (mysqli_num_rows($lettr)<1){

    $chat='<div class="alert alert-warning">
              
                 Welcome '.$fullname.' !!! Send your chat for the first time.
             
                </div>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>';
 }

 else{

while ($data = mysqli_fetch_array($lettr, MYSQLI_ASSOC)){ 

      $cid=$data['id'];
      $chat_userid=$data['user_id'];
      $chat_msg=$data['chat_msg'];
      $chat_date=$data['chat_date'];
      $chat_read=$data['chat_read'];
      $chat_mode=$data['chat_mode'];

      if ($chat_read=="1" && $chat_mode=="USER"){$seenmode="Read";$ttx="Mode:";}
      else if ($chat_read=="1" && $chat_mode=="ADMIN"){$seenmode="";$ttx="";}
      else if ($chat_read=="0" && $chat_mode=="ADMIN"){$seenmode="";$ttx="";}
      else {$seenmode="User/Sent";$ttx="Mode:";}

      if ($chat_mode=="USER"){$actmode="background-color: #199263";}
      else {$actmode="background-color: #DB1A22";}

      $chat.='<div class="alert" style="'.$actmode.';color:#fff;font-size:10px;cursor:pointer;" id="'.$cid.'">

       <span style="float:left">'.$chat_msg.'</span><br/>
       <span style="float:left">'.$ttx.' '.$seenmode.'</span><br/>
       <span style="float:left">Date: '.$chat_date.'</span><br/>
    </div>';
   

  }
  

 }


 $response=array(
 'message' => $chat,
 'status' => 'success',
 'ctrlButton' => $nextbtn,
 );

echo json_encode($response);
exit();

?>