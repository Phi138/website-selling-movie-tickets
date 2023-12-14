<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bai 4</title>
  <link rel="stylesheet" href="../css/bai8.css">
</head>

<body>
  <?php
  $bieuThuc = '/[!@#$%^&*();.?":{}|<>]/';
  if (isset($_POST["tongdayso"])) {
    $dayso = trim($_POST["dayso"]);
    if (empty($dayso)) {
      echo "<script>
      alert('Vui lòng nhập dãy số');
    </script>";
    } else if (preg_match($bieuThuc, $dayso)) {
      echo "<script>
      alert('Dãy số không được chứa ký tự đặc biệt');
    </script>";
    } else if (!strpos($dayso, ',') === true) {
      echo "<script>
      alert('Dãy số phải ngắn cách bằng dấu ,');
    </script>";
    } else {
      $daySoArr = [];
      $daySoArr = explode(", ", $dayso);
      sort($daySoArr); // Sắp xếp mảng tăng dần
      $sxt = implode(", ", $daySoArr);

      rsort($daySoArr); // Sắp xếp mảng giảm dần
      $sxg = implode(", ", $daySoArr);

      // $file_data = file_get_contents("data.txt");
      // //Chuyển mảng về chuỗi để ghi vào file
      // $file_data .= "\n" . implode(", ", $daySoArr);
      // // ghi file
      // file_put_contents("data.txt", $file_data);
    }
  }
  ?>

  <div class="container">
    <h2>sắp xếp mảng</h2>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="dayso">Nhập mảng:</label>
        <input type="text" name="dayso" value="<?php echo isset($dayso) ? $dayso : 0 ?>">
        <span>(*)</span>
      </div>
      <div class=" gr-ip">
        <label for=""></label>
        <input type="submit" name="tongdayso" value="Sắp xếp">
        <span>(*)</span>

      </div>
      <div class="gr-ip">
        <label for="dayso">Tăng dần:</label>
        <input type="text" readonly id="content" value="<?php echo isset($sxt) ? $sxt : 0 ?>">
        <span>(*)</span>
      </div>
      <div class="gr-ip">
        <label for="dayso">Giảm dần:</label>
        <input type="text" readonly id="content" value="<?php echo isset($sxg) ? $sxg : 0 ?>">
        <span>(*)</span>
      </div>
      <p><span>(*)</span> Các số được nhập cách nhau bằng dấu ","</p>
    </form>
  </div>

</body>

</html>