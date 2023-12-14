<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="Bai3.1.php" method="post">
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    Chọn phép tính:
    <input type="radio" name="pheptinh" value="Cộng" checked> Cộng
    <input type="radio" name="pheptinh" value="Trừ"> Trừ
    <input type="radio" name="pheptinh" value="Nhân"> Nhân
    <input type="radio" name="pheptinh" value="Chia"> Chia
    <br>
    Số thứ nhất:
    <input type="text" name="st1" required>
    <br>
    Số thứ nhì:
    <input type="text" name="st2" required>
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>

</html>