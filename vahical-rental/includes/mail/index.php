<?php 

  
include 'includes/mail/function.php';
  

if (isset($_POST['btn'])) {
    # code...
    extract($_POST);
           $mail_sent = send_mail($name,$g,$subject,$msg);
  
              if ($mail_sent) {
  
                  echo "<script>
                  alert('send success');
                  </script>";
              } else {
                  $errorMsgLogin = "Failed to send OTP. Please try again later.";
              }
  }
   ?>
 

