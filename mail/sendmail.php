<?php
// include "PHPMailer/src/PHPMailer.php";
// include "PHPMailer/src/Exception.php";
// include "PHPMailer/src/OAuth.php";
// include "PHPMailer/src/POP3.php";
// include "PHPMailer/src/SMTP.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// require 'PHPMailer/src/OAuth.php';
// require 'PHPMailer/src/POP3.php';

class Mailer{
    public function sendMessage($mailKH,$message){
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';                             
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'dbmanagerteam@gmail.com';                 
    $mail->Password = 'cljdxrbkasgcpgxp';                           
    $mail->SMTPSecure = 'tls';                         
    $mail->Port = 587;                             
 
    //Recipients
    $mail->setFrom('dbmanagerteam@gmail.com', 'HKT\'s Website');

    $mail->addAddress($mailKH, 'User'); 
 
    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');        
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = "Phản hồi yêu cầu";
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
    }
}

?>