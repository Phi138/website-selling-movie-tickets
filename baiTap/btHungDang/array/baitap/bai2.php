<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bai 2</title>
  <link rel="stylesheet" href="../css/bai2.css">
</head>

<body>
  <?php
  $nambe2000 = isset($_POST["nambe2000"]) ? $_POST["nambe2000"] : "";
  $namlon2000 = isset($_POST["namlon2000"]) ? $_POST["namlon2000"] : "";

  //Tìm năm nhuận
  function namNhuan($nam)
  {
    if (($nam % 4 == 0 && $nam % 100 != 0) || ($nam % 400 == 0)) {
      return 1;
    } else {
      return 0;
    }
  }
  function timNamNhuanBe2000($nambe2000)
  {
    $kq = [];
    foreach (range(2000, $nambe2000) as $nam) {
      if (namNhuan($nam))
        $kq[] = $nam;
    }
    return $kq;
  }
  function timNamNhuanLon2000($namlon2000)
  {
    $kq = [];
    foreach (range(2001, $namlon2000) as $nam) {
      if (namNhuan($nam))
        $kq[] = $nam;
    }
    return $kq;
  }
  ?>
  <div class="container">
    <h2>Hãy nhập vào năm nhỏ hơn 2000</h2>
    <h3>tìm năm nhuận</h3>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="nambe2000">Năm:</label>
        <input type="text" name="nambe2000" id="nambe2000" value="<?php echo $nambe2000; ?>">
      </div>
      <div class="content" name="content">
        <?php
        if ($nambe2000 !== "") {
          $kq = timNamNhuanBe2000($nambe2000);
          echo implode(", ", $kq);
        } else {
          echo "<p>Không có kết quả</p>";
        }
        ?>
      </div>
      <input type="submit" name="submit" value="Tìm năm nhuận">
    </form>
  </div>

  <div class="container">
    <h2>Hãy nhập vào năm lớn hơn 2000</h2>
    <h3>tìm năm nhuận</h3>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="nambatdau">Năm:</label>
        <input type="text" name="namlon2000" id="namlon2000" value="<?php echo $namlon2000; ?>">
      </div>
      <div class="content" name="content">
        <?php
        if ($namlon2000 !== "") {
          $kq = timNamNhuanLon2000($namlon2000);
          echo implode(", ", $kq);
        } else {
          echo "<p>Không có kết quả</p>";
        }
        ?>
      </div>
      <input type="submit" name="submit" value="Tìm năm nhuận">
    </form>
  </div>
</body>

</html>