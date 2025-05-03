
<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function send_mail($receiver_email,$otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        $mail->Username   = 'myexport1205@gmail.com';
        $mail->Password   = 'eftx hhhb wsvp izxe';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('myexport1205@gmail.com', 'Import-Export');
        $mail->addAddress($receiver_email);
        $mail->isHTML(true);
      $mail->Subject = 'your otp is !';
        $mail->Body    = ' your otp is '.$otp.'
   ';

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo 'Error sending OTP: ' . $e->getMessage();
        return false;
    }
}
?>
