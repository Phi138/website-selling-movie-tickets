<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $st1 = 0;
  $st2 = 0;
  $kq = 0;
  if (isset($_POST["submit"])) {
    $st1 = $_POST["st1"];
    $st2 = $_POST["st2"];
    $pt = $_POST["pheptinh"];
    if (!is_numeric($st1) && !is_numeric($st2)) {
      echo "Vui lòng nhập số";
    } else {
      switch ($pt) {
        case "Cộng":
          $kq = $st1 + $st2;
          break;
        case "Trừ":
          $kq = $st1 - $st2;
          break;
        case "Nhân":
          $kq = $st1 * $st2;
          break;
        case "Chia":
          if ($st2 != 0) {
            $kq = $st1 / $st2;
          } else {
            echo "Không thể chia cho 0";
          }
          break;
        default:
          echo "Chưa nhập phép tính";
      }
    }
  }
  ?>
  <form action="">
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    Chọn phép tính: <?php
                    if (isset($_POST['pheptinh'])) {
                      echo $_POST["pheptinh"];
                    }
                    ?>
    <br>
    Số thứ nhất:
    <input type="text" name="st1" value="<?php echo isset($st1) ? $st1 : ' '; ?>">
    <br>
    Số thứ nhì:
    <input type="text" name="st2" value="<?php echo isset($st2) ? $st2 : ' '; ?>">
    <br>
    Kết quả:
    <input readonly type="text" name="kq" value="<?php echo isset($kq) ? $kq : ' '; ?>">
    <br>
    <a href="./Bai3.php">Quay lại trang trước</a>
  </form>
</body>

</html>