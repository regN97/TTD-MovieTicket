<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        $targetFile = $folder . '/' . time() . '-' . $file["name"];

        if (move_uploaded_file($file["tmp_name"], PATH_ASSETS_UPLOADS . $targetFile)) {
            return $targetFile;
        }

        throw new Exception('Upload file không thành công!');
    }
}

if (!function_exists('sendMail')) {
    function sendMail($to, $subject, $content)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'trung09112003@gmail.com';                     //SMTP username
            $mail->Password   = 'jpenjhvbgemrdxbd';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('trung09112003@gmail.com', 'TTDMovieTicket');
            $mail->addAddress($to);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;

            $mail->send();
            echo 'Gửi mail thành công';
        } catch (Exception $e) {
            echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
