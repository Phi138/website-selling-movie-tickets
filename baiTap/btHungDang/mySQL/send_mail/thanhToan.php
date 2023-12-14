<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  require_once("./send_mail.php");
  require_once("../sql/connection.php");
  $maKH = 'kh001';
  $querySELECT = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$maKH'";
  $result = mysqli_query($conn, $querySELECT);

  if (mysqli_num_rows($result) > 0) {
    echo "<div>";
    while ($rows = mysqli_fetch_assoc($result)) {
      $maKH = $rows['Ma_khach_hang'];
      $tenKH = $rows['Ten_khach_hang'];
      $dienThoai = $rows['Dien_thoai'];
      $phongChieu = 'PC01';
      $choNgoi = 'E25, E26';
    }
    echo "</div>";
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["payment"])) {
    $title = "Hóa đơn thanh toán";
    $maKH = '12345';
    $content = "
  <p>
    Lotte Cinema thông báo <br>
    Chào quý khách $tenKH đã mua 2 vé xem phim tổng giá trị 90 nghìn đồng
    Phòng chiếu: $phongChieu
    Vị trí ghế: $choNgoi
  </p>
  ";
    $mailer = new Mailer_Helper();
    $mailer->sendMail($title, $content, $tenKH);
  }


  ?>
  <form action="" method="post">
    <button type="submit" name="payment">Thanh Toán</button>
  </form>
</body>

</html>