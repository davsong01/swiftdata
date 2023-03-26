<?php require("site_header.php"); ?>

<?php 

if ($manage_rating==1){


echo '<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Live Chat</h3>
</div>

</div>
</div>
</div>

<div class="row ">
<div class="col-xl-12">

<div class="alert">
<br/>

    <div id="resultHandle">
    </div>
    

  <br>
  <br>

              <div class="mb-3">
                  <label>Message Body</label>
                  <small id="hint-msg-danger" style="color:red;float: right;"></small>
                  <small id="hint-msg-success" style="color:green;float: right;"></small>
                  <input type="hidden"  id="req_token" value="'.$_SESSION['csrftoken'].'">
                  <input type="hidden"  id="userid" value="'.$_GET['id'].'">
                  <textarea class="form-control" id="message_content" rows="3" placeholder="Typing..."></textarea>
                </div>
    
                <div>
                  <button class="btn btn-success" style="width: 20%; color:#fff; height: 50px;" id="sendMessage">Send</button>
                </div>
  <br/>
</div>

</div>



</div>
</div>
</div>';
}

else{

require ("admin_pushfail.php"); 
echo $admin_pushfail;

}

?>


    <script type="text/javascript">

    $(document).ready(function sendRequest() {
    $.ajax({
      url:'customer/get_chat.php?load_id=0&id=<?php echo $_GET['id']; ?>',
      success:function(response_fd){
     $.LoadingOverlay("hide");
    $("#resultHandle").html(response_fd);
    setTimeout(function(){
                sendRequest();
                  }, 1000);
   }
    });

     });
  </script>

  <script type="text/javascript">

$("#sendMessage").click(function () {
var formData ={
message_content : $("#message_content").val(),
userid : $("#userid").val(),
req_token: $("#req_token").val(),
};
$("#sendMessage").text("Sending...");
$.ajax({
  url:"customer/send_chat",
  method:"POST",
  dataType:"Json",
  data:formData,
  success:function(response){
  $("#sendMessage").text("Send");
  if (response.status=='success'){
  $("#message_content").val("");
  $("#hint-msg-success").text(response.message);
      setTimeout(function() {
                $("#hint-msg-success").text("");
                    }, 2000);
  }
else {
    $("#hint-msg-danger").text(response.message);
    setTimeout(function() {
                $("#hint-msg-danger").text("");
                    }, 2000);
  }
}
})
})
 </script> 

 <script type="text/javascript">
      function DelReply(id) {
        $.LoadingOverlay("show");
        $.ajax({
  url:"customer/delete_chat?data="+id,
  dataType:"Json",
  success:function(response){
    if (response.status=='success'){
        alert(response.message);
    }
    else {
      alert(response.message);
    }
  }

})
        
      }
  </script>

<?php require("site_footer.php"); ?>
