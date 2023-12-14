<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer_Helper
{
  public function sendMail($title, $maPhong, $maghe, $tenPhim, $maDatVe, $ngay, $giochieu, $tenKH, $ngaychieu, $thoigianketthuc, $email)
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
      $mail->addAddress($email, $tenKH); // emal người nhận
      $mail->addReplyTo('hung.dd.62cntt@ntu.edu.vn', 'You reply'); // khi người dùng phản hồi, sẽ gửi đến email này
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // Đính kèm khi gửi mai - có thể dính kèm nhiều files
      // $mail->addAttachment('hoadon.txt');

      //Nội dung

      $mail->isHTML(true);
      $mail->Subject = $title; // tiêu đề email
      $mail->Body = '<html>
      <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body,
        html {
            height: 100vh;
            display: grid;
            font-family: "Staatliches", cursive;
            background: #d83565;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
        }
        .ticket {
            margin: auto;
            display: flex;
            background: white;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }
        .left {
            display: flex;
        }
        .image {
            height: 250px;
            width: 250px;
            background-image: url("https://scontent.xx.fbcdn.net/v/t1.15752-9/371454025_346845911088035_7542209033759062519_n.png?_nc_cat=102&ccb=1-7&_nc_sid=510075&_nc_ohc=KbeB2XJmtG8AX_y3tMW&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdT-plkB8h9xByrZDoajiGqosx6EfX6earW1g5hbgtvUzQ&oe=65701C0B");
            background-size: contain;
            opacity: 0.85;
        }
        .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            display: flex;
            text-align: center;
            justify-content: space-around;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
        }
        .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }
        .left .ticket-number {
            height: 250px;
            width: 250px;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            padding: 5px;
        }
        .ticket-info {
            padding: 10px 30px;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }
        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .date span {
            width: 100px;
        }
        .date span:first-child {
            text-align: left;
        }
        .date span:last-child {
            text-align: right;
        }
        .date .june-29 {
            color: #d83565;
            font-size: 20px;
        }
        .show-name {
            font-size: 32px;
            font-family: "Nanum Pen Script", cursive;
            color: #d83565;
        }
        .show-name h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #4a437e;
        }
        .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-weight: 700;
        }
        .time span {
            font-weight: 400;
            color: gray;
        }
        .left .time {
            font-size: 16px;
        }
        .location {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            padding-top: 8px;
            border-top: 1px solid gray;
        }
        .location .separator {
            font-size: 20px;
        }
        .right {
            width: 180px;
            border-left: 1px dashed #404040;
        }
        .right .admit-one {
            color: darkgray;
        }
        .right .admit-one span:nth-child(2) {
            color: gray;
        }
        .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }
        .right .show-name h1 {
            font-size: 18px;
        }
        .barcode {
            height: 100px;
        }
        .barcode img {
            height: 100%;
        }
        .right .ticket-number {
            color: gray;
        }

        /* Responsive CSS */
        @media (max-width: 768px) {
            .ticket {
                flex-direction: column;
            }
            .left {
                flex-direction: column;
            }
            .right {
                width: 100%;
                border-left: none;
                border-top: 1px dashed #404040;
                margin-top: 20px;
                padding-top: 20px;
            }
            .right .right-info-container {
                padding-left: 10px;
            }
        }
    </style>
</head>
      <body>
      <div class="ticket">
	<div class="left">
		<div class="image">
			<p class="admit-one">
				<span>5thWonder</span>
				<span>5thWonder</span>
				<span>5thWonder</span>
			</p>
			<div class="ticket-number">
				<p>
        ' . $maDatVe . ' Tên khách hàng: ' . $tenKH . '
				</p>
			</div>
		</div>
		<div class="ticket-info">
			<p class="date">
				
				<span class="june-29">' . $ngaychieu . '</span>
        <span class="june-29">' . $ngay . '</span>
			</p>
			<div class="show-name">
				<h1>5thWonder</h1>
				<h2>' . $tenPhim . '</h2>
			</div>
			<div class="time">
				<p>' . $giochieu . ' <span>TO</span>' . $thoigianketthuc . '</p>
				<p>' . $maPhong . ' </p>
			</div>
			<p class="location"><span>Số ghế: ' . $maghe . '</span>
				<span class="separator"><i class="far fa-smile"></i></span><span>78 Trần Phú Nha Trang</span>
			</p>
		</div>
	</div>
	<div class="right">
		<p class="admit-one">
			<span>5thWonder</span>
			<span>5thWonder</span>
			<span>5thWonder</span>
		</p>
		<div class="right-info-container">
			<div class="show-name">
				<h1>5thWonder</h1>
			</div>
			<div class="time">
      <p>' . $giochieu . ' <span>TO</span>' . $thoigianketthuc . '</p>
      <p>' . $maPhong . ' </p>
			</div>
			
			<p class="ticket-number">

      ' . $maDatVe . '
			</p>
		</div>
	</div>
</div>
      </body>
      </html>
     '; // Nội dung của email
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Gửi mail thành công';
    } catch (Exception $e) {
      echo "Có lỗi khi gửi mail {$mail->ErrorInfo}";
    }
  }
}
