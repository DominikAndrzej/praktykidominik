<?php

use PHPMailer\PHPMailer\PHPMailer;

//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include '../../vendor/phpmailer/phpmailer/src/Exception.php';
include '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $emails = [];
    $succesMessage = "choose Recipients";

    if (!empty($_POST['emails'])) {
        foreach ($_POST['emails'] as $selected) {
            $emails[] = $selected;
        }
    }

    foreach ($emails as $recipientEmail) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            //$mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'mail.dominik.geninhost.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'praktykidominik@dominik.geninhost.com';                     //SMTP username
            $mail->Password = 'WFqA3YxHSDTHgFfmpARQ';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('andrzej@dominik.geninhost.com', 'Andrzej');

            $mail->addAddress($recipientEmail);     //Add a recipient

            $mail->addReplyTo('andrzej@dominik.geninhost.com', 'Andrzej');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->send()) {
                $succesMessage = urlencode("message has been sent successfully");
            }

        } catch (Exception $e) {
            $failureMessage = urlencode("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            header("Location: send_email_main.php?Message=" . $failureMessage);
            exit();
        }
    }
    header("Location: send_email_main.php?Message=" . $succesMessage);
    exit();
}
?>



