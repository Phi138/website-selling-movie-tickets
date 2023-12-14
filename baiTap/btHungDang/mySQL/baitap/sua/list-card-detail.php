<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./detail.css">
</head>

<body>
  <?php
  require_once("../../sql/connection.php");

  if (isset($_GET['Ma_sua'])) {
    $maSua = $_GET['Ma_sua'];
    $querySELECT = "SELECT * FROM sua WHERE Ma_sua = '$maSua'";
    $result = mysqli_query($conn, $querySELECT);

    if (mysqli_num_rows($result) > 0) {
      $rows = mysqli_fetch_assoc($result);
      $maHangSua = $rows['Ma_hang_sua'];
      $maLoaiSua = $rows['Ma_loai_sua'];
      $tpDinhDuong = $rows['TP_Dinh_Duong'];
      $loiIch = $rows['Loi_ich'];
      $tenSua = $rows['Ten_sua'];
      $trongLuong = $rows['Trong_luong'];
      $donGia = $rows['Don_gia'];
      $hinh = $rows['Hinh'];

      $queryHangSua = "SELECT * FROM hang_sua WHERE Ma_hang_sua = '$maHangSua'";
      $resultHangSua = mysqli_query($conn, $queryHangSua);
      $queryLoaiSua = "SELECT * FROM loai_sua WHERE Ma_loai_sua = '$maLoaiSua'";
      $resultLoaiSua = mysqli_query($conn, $queryLoaiSua);
      if (mysqli_num_rows($resultHangSua) > 0 || mysqli_num_rows($resultLoaiSua) > 0) {
        $rowHS = mysqli_fetch_assoc($resultHangSua);
        $rowLS = mysqli_fetch_assoc($resultLoaiSua);
        $tenHangSua = $rowHS['Ten_hang_sua'];
        $tenLoaiSua = $rowLS['Ten_loai'];
      }
  ?>
      <div class="container-detail">
        <div class="imgs">
          <img src="../../img/<?php echo $hinh; ?>" alt="">
        </div>
        <div class="content">
          <h1 class="title"><?php echo $tenSua . " - " .  $trongLuong; ?> gr</h1>
          <h2 class="cost"><?php echo $donGia; ?> VNĐ</h2>
          <p><span>Hãng sữa: </span><?php echo $tenHangSua; ?></p>
          <p><span>Loại sữa: </span><?php echo $tenLoaiSua; ?></p>
          <p><span>Thành phần dinh dưỡng: </span><?php echo $tpDinhDuong; ?></p>
          <p><span>Lợi ích: </span><?php echo $loiIch; ?></p>
          <a class="prev" href="./list-card.php">Trở về</a>
        </div>
      </div>
  <?php
    }
  }
  ?>
</body>

</html>