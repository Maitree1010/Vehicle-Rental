
<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function send_mail($name,$receiver_email,$subject,$msg) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        $mail->Username   = 'drivemydream1023@gmail.com';
        $mail->Password   = 'piro suaj nztx vwzy';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('drivemydream1023@gmail.com', $name);
        $mail->addAddress($receiver_email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $msg;

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
