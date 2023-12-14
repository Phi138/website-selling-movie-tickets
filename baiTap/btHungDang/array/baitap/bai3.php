<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 3</title>
  <link rel="stylesheet" href="../css/bai3.css">
</head>

<body>

  <?php
  $canArr = ["Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm"];
  $chiArr = ["Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"];
  $hinhArr = [
    "../images/hoi.jpg",
    "../images/chuot.jpg",
    "../images/suu.jpg",
    "../images/dan.jpg",
    "../images/meo.jpg",
    "../images/thin.jpg",
    "../images/ran.jpg",
    "../images/ngo.jpg",
    "../images/mui.jpg",
    "../images/than.jpg",
    "../images/dau.jpg",
    "../images/tuat.jpg",
  ];

  $amlich = "";
  $hinhAnh = "";
  $duonglich = "";
  if (isset($_POST["submit"])) {
    $duonglich = $_POST["duonglich"];
    if ($duonglich > 0) {
      $canIndex = ($duonglich - 3) % 10;
      $chiIndex = ($duonglich - 3)  % 12;
      $amlich = $canArr[$canIndex] . " " . $chiArr[$chiIndex];

      $hinhAnh = $hinhArr[$chiIndex];
    }
  }
  ?>

  <div class="container">
    <h2>tính năm âm lịch</h2>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="">Năm dương lịch</label>
        <input type="text" name="duonglich" value="<?php echo $duonglich; ?>">
      </div>
      <input value="=>" type="submit" name="submit" style="margin: 0 17px; padding: 3px 7px" />
      <div class="gr-ip">
        <label for="">Năm âm lịch</label>
        <input readonly type="text" name="amlich" value="<?php echo $amlich; ?>">
      </div>
    </form>
    <div class="imgs">
      <img src="<?php echo $hinhAnh; ?>" alt="Hình ảnh">
    </div>
  </div>
</body>

</html>