<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diện tích hình chữ nhật</title>
  <style>
    form {
      background-color: #f0f0f0;
      width: 400px;
      margin: 0 auto;
      border: 5px solid violet;
      background: #E9B824;
    }

    form h1 {
      text-align: center;
      margin: 0;
      margin-bottom: 10px;
      padding: 5px;
      text-transform: uppercase;
      font-size: 25px;
      color: red;
      background: yellow;
    }

    label {
      min-width: 90px;
    }

    .gr-ip {
      display: flex;
      justify-content: center;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <?php
  $dienTich = 0;
  $chieuDai = 0;
  $chieuRong = 0;
  if (isset($_POST["tinhDienTich"])) {
    $chieuDai = $_POST["chieuDai"];
    $chieuRong = $_POST["chieuRong"];

    $dienTich = $chieuDai * $chieuRong;
  }
  ?>

  <form method="post" action="">
    <h1>Diện tích hình chữ nhật</h1>
    <div class="gr-ip">
      <label for="chieuDai">Chiều Dài:</label>
      <input type="text" id="chieuDai" name="chieuDai" required value="<?php echo isset($chieuDai) ? $chieuDai : ' '; ?>">
    </div>
    <div class=" gr-ip">
      <label for="chieuRong">Chiều Rộng:</label>
      <input type="text" id="chieuRong" name="chieuRong" required value="<?php echo isset($chieuRong) ? $chieuRong : ' '; ?>">
    </div>
    <div class="gr-ip">
      <label for="dienTich">Diện tích:</label>
      <input disabled type="text" id="dienTich" name="dienTich" value="<?php echo isset($dienTich) ? $dienTich : ''; ?>" required>
    </div>
    <div class="gr-ip">
      <button type="submit" name="tinhDienTich">Tính </button>
    </div>
  </form>


</body>

</html>