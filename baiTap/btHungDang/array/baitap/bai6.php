<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 6</title>
  <link rel="stylesheet" href="../css/bai6.css">
</head>

<body>
  <?php
  function timKiem($soCanTim, $mangs)
  {
    $viTri = array_search($soCanTim, $mangs);
    return $viTri;
  }
  $bieuThuc = '/[!@#$%^&*();.?":{}|<>]/';
  if (isset($_POST["submit"])) {
    $daySo = trim($_POST["daySo"]);
    if (empty($daySo)) {
      echo "<script>
      alert('Vui lòng nhập dãy số');
    </script>";
    } else if (preg_match($bieuThuc, $daySo)) {
      echo "<script>
      alert('Dãy số không được chứa ký tự đặc biệt');
    </script>";
    } else if (!strpos($daySo, ", ") === true) {
      echo "<script>
      alert('Dãy số phải ngắn cách bằng dấu ,');
    </script>";
    } else {
      $mangs = [];
      $mangs = explode(", ", $daySo);
      $soCanTim = $_POST["soCanTim"];
      $viTri = timKiem($soCanTim, $mangs);
    }
  }
  ?>

  <div class="container">
    <h2>tìm kiếm</h2>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="mang">Nhập mảng: </label>
        <input type="text" name="daySo" value="<?php echo isset($daySo) ? $daySo : 0 ?>">
      </div>
      <div class="gr-ip">
        <label for="dayso">Nhập số cần tìm:</label>
        <input type="text" name="soCanTim" value="<?php echo isset($soCanTim) ? $soCanTim : 0 ?>">
      </div>
      <div class=" gr-ip">
        <label for=""></label>
        <input type="submit" name="submit" value="Tìm kiếm">
      </div>
      <div class="gr-ip">
        <label for="dayso">Mảng:</label>
        <input type="text" class="content" value="<?php echo isset($daySo) ? $daySo : 0;
                                                  ?>">
      </div>

      <div class="gr-ip">
        <label for="dayso">Kết quả tìm kiếm:</label>
        <input type="text" readonly class="content" value="<?php
                                                            if (isset($viTri)) {
                                                              if ($viTri !== false) {
                                                                echo "Tìm thấy $soCanTim tại vị trí thứ " . $viTri + 1;
                                                              }
                                                            } else {
                                                              echo "Không có kết quả";
                                                            }

                                                            ?>">
      </div>
      <p>(<span>Ghi chú:</span> Các phần tử trong mảng cách nhau bằng dấu "," )</p>
    </form>
  </div>
</body>

</html>