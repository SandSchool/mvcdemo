<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';


class Mailer
{
    public static function sendMail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->CharSet = 'UTF-8';

            $mail->isHTML(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'trantruong7826@gmail.com';         // 👉 Gmail của bạn
            $mail->Password   = 'wxvy wgrj otcr nivf';           // 👉 App Password 16 ký tự (không phải pass Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('no-reply@shopdientutop1.com', 'Dien Tu Top 1');
            $mail->addAddress($to);     // Người nhận

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}
