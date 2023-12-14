<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tính tiền điện</title>
  <style>
    form {
      background-color: #f0f0f0;
      width: 500px;
      margin: 0 auto;
      background: #FFCC70;
      padding-bottom: 15px;
    }

    form h1 {
      text-align: center;
      margin: 0;
      margin-bottom: 10px;
      padding: 5px;
      text-transform: uppercase;
      font-size: 25px;
      font-style: italic;
      color: red;
      background: #E9B824;
    }

    label {
      min-width: 150px;
    }

    .gr-ip:not(:last-child) {
      padding-left: 60px;
      display: flex;
      align-items: center;
    }

    .gr-ip p {
      margin-left: 20px;
    }

    .gr-ip input[id="sotienthanhtoan"] {
      background: #FCAEAE;
    }

    .gr-ip:last-child {
      margin-left: auto;
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php
  $sotienthanhtoan = 0;
  $chisocu = 0;
  $chisomoi = 0;

  if (isset($_POST["thanhtoan"])) {
    // Lấy giá trị từ form
    $tenchuho = $_POST["tenchuho"];
    $chisocu = $_POST["chisocu"];
    $chisomoi = $_POST["chisomoi"];
    $dongia = $_POST["dongia"];

    // Kiểm tra giá trị hợp lệ
    if (!is_numeric($chisocu) || !is_numeric($chisomoi)) {
      echo '<script>alert("Chỉ số cũ và chỉ số mới phải là số.");</script>';
    } else {
      // Thực hiện tính tiền điện
      $sotienthanhtoan = ($chisomoi - $chisocu) * $dongia;
    }
  }
  ?>

  <form method="post" action="">
    <h1>thanh toán tiền điện</h1>
    <div class="gr-ip">
      <label for="tenchuho">Tên chủ hộ:</label>
      <input type="text" id="tenchuho" name="tenchuho" required>
      <p></p>
    </div>
    <div class=" gr-ip">
      <label for="chisocu">Chỉ số cũ:</label>
      <input type="text" id="chisocu" name="chisocu" required value="<?php echo isset($chisocu) ? $chisocu : ''; ?>">
      <p>(Kw)</p>
    </div>
    <div class=" gr-ip">
      <label for="chisomoi">Chỉ số mới:</label>
      <input type="text" id="chisomoi" name="chisomoi" required value="<?php echo isset($chisomoi) ? $chisomoi : ''; ?>">
      <p>(Kw)</p>
    </div>
    <div class=" gr-ip">
      <label for="dongia">Đơn giá:</label>
      <input type="text" id="dongia" name="dongia" required value="20000">
      <p>(VNĐ)</p>
    </div>
    <div class="gr-ip">
      <label for="sotienthanhtoan">Số tiền thanh toán:</label>
      <input disabled type="text" id="sotienthanhtoan" name="sotienthanhtoan" value="<?php echo $sotienthanhtoan; ?>" required>
      <p>(VNĐ)</p>
    </div>
    <div class="gr-ip">
      <button type="submit" name="thanhtoan">Tính</button>
    </div>
  </form>
</body>

</html>