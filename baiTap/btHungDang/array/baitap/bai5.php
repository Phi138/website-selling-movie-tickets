<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bai5.css">
</head>

<body>
  <?php
  function taoMang($arr, $n)
  {
    for ($i = 0; $i < $n; $i++) {
      $arr[$i] = rand(0, 20);
    }
    return $arr;
  }

  function inMang($arr)
  {
    foreach ($arr as $element) {
      echo $element . " ";
    }
  }


  if (isset($_POST["submit"])) {
    $n = $_POST["n"];
    $arr = [];
    if (!is_numeric($n) || $n <= 0 || $n != intval($n)) {
      echo "<script>alert('Vui lòng nhập số nguyên dương')</script>";
    } else {
      // tạo mảng
      $arr = taoMang($arr, $n);
      //Min
      $min = min($arr);
      //Max
      $max = max($arr);
      //sum
      $sum = array_sum($arr);
    }
  }
  ?>

  <div class="container">
    <h2>Phát sinh mảng và tính toán</h2>
    <form action="" method="post">
      <div class="gr-ip">
        <label for="dayso">Nhập số phần tử:</label>
        <input type="text" name="n" value="<?php echo isset($n) ? $n : 0 ?>">
      </div>
      <div class=" gr-ip">
        <label for=""></label>
        <input type="submit" name="submit" value="Phát sinh và tính toán">
      </div>
      <div class="gr-ip">
        <label for="dayso">Mảng:</label>
        <input type="text" class="content" value="<?php echo isset($arr) ? inMang($arr) : 0;
                                                  ?>">
      </div>
      <div class="gr-ip">
        <label for="dayso">MIN:</label>
        <input type="text" readonly class="content" value="<?php echo isset($arr) ? $min : 0 ?>">
      </div>
      <div class="gr-ip">
        <label for="dayso">MAX:</label>
        <input type="text" readonly class="content" value="<?php echo isset($arr) ? $max : 0 ?>">
      </div>
      <div class="gr-ip">
        <label for="dayso">Tổng mảng:</label>
        <input type="text" readonly class="content" value="<?php echo isset($sum) ? $sum : 0 ?>">
      </div>
      <p>(<span>Ghi chú:</span> Các phần tử trong mảng có giá trị từ 0 đến 20)</p>
    </form>
  </div>
</body>

</html>