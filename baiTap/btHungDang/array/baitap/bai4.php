<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bai 4</title>
  <link rel="stylesheet" href="../css/bai4.css">
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
      $tong = array_sum($daySoArr);
      //Đọc file
      $file_data = file_get_contents("data.txt");
      //Chuyển mảng về chuỗi để ghi vào file
      $file_data .= "\n" . implode(", ", $daySoArr);
      // ghi file
      file_put_contents("data.txt", $file_data);
    }
  }
  ?>

  <div class="container">
    <h2>nhập và tính trên dãy số</h2>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="dayso">Nhập dãy số:</label>
        <input type="text" name="dayso" value="<?php echo isset($dayso) ? $dayso : 0 ?>">
        <span>(*)</span>
      </div>
      <div class=" gr-ip">
        <label for=""></label>
        <input type="submit" name="tongdayso" value="Tổng dãy số">
        <span>(*)</span>

      </div>
      <div class="gr-ip">
        <label for="dayso">Tổng dãy số:</label>
        <input type="text" readonly id="content" value="<?php echo isset($tong) ? $tong : 0 ?>">
        <span>(*)</span>
      </div>
      <p><span>(*)</span> Các dãy số được nhập cách nhau bằng dấu ","</p>
    </form>
  </div>

</body>

</html>