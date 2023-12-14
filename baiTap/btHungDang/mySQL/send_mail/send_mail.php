<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';

class Mailer_Helper
{
  public function sendMail($title, $content, $tenKH)
  {
    $mail = new PHPMailer(true);
    try {
      $mail->isSMTP();
      $mail->SMTPDebug = 0;
      $mail->CharSet = 'UTF-8';
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'hung.dd.62cntt@ntu.edu.vn';
      $mail->Password   = 'dwzotdgotwlgvlyn';
      // 465 ssl
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;


      $mail->setFrom('hung.dd.62cntt@ntu.edu.vn', 'Lotte Cinema'); // Hiển thị thông tin người gửi 
      //  người nhận - có thể gửi nhiều người
      $mail->addAddress('tn90820@gmail.com', $tenKH); // emal người nhận
      $mail->addReplyTo('hung.dd.62cntt@ntu.edu.vn', 'You reply'); // khi người dùng phản hồi, sẽ gửi đến email này
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // Đính kèm khi gửi mai - có thể dính kèm nhiều files
      // $mail->addAttachment('hoadon.txt');

      //Nội dung

      $mail->isHTML(true);
      $mail->Subject = $title; // tiêu đề email
      $mail->Body = $content; // Nội dung của email
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Gửi mail thành công';
    } catch (Exception $e) {
      echo "Có lỗi khi gửi mail {$mail->ErrorInfo}";
    }
  }
}
