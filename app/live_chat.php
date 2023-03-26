<?php require("site_header.php"); ?>

<div class="alert">
<div class="col-xl-12">
<div class="alert" style="background-color: #fff;color: blue;">

        <div id="response" style="text-align: center;">
          <h4>Our Live Chat</h4>
        </div>
                
</div>
</div>


<div class="alert" style="background-color: #fff; border-radius: 0px 0px 0px 0px;">

<!-- start -->

<div id="response">
                
                <script>
                $(document).ready(function sendRequest(){
                $.ajax({
                url:"<?php echo $baseurl; ?>/customer/get-chat?load_id=0",
                dataType:"Json",
                success:function(livedata){   
                $("#response").html(livedata.message);
                setTimeout(function(){
                sendRequest();
                  }, 1000);
                    }
                      })
                        })
                </script>
              </div>


<small id="hint-msg-danger" style="color:red;float: right;"></small>
<small id="hint-msg-success" style="color:green;float: right;"></small>
<input type="hidden"  id="req_token" value="<?php echo $_SESSION['csrftoken']; ?>">

<textarea class="form-control" id="message_content" rows="3" placeholder="Typing..."></textarea>

<br>

<button class="btn btn-success btn-block"  id="sendMessage" style="width: 20%">Send</button>

<br>
<br>
<br>

</div>
</div>
</div>


</div>
</div>
</div>

<!-- end-->


</div>




</div>
</div>
</div>

<script type="text/javascript">

$("#sendMessage").click(function () {
var formData ={
message_content : $("#message_content").val(),
req_token :$("#req_token").val(),
};
$("#sendMessage").text("Sending...");
$.ajax({
  url:"<?php echo $baseurl; ?>/customer/live-chat",
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

<?php require("site_footer.php"); ?>
