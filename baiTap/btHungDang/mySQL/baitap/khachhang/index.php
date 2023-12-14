<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  require_once("../../sql/connection.php");
  if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
  }
  $sql = "SELECT * FROM khach_hang";
  $result = mysqli_query($conn, $sql);
  echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";
  echo "<table align='center' width='1100' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
  echo '<tr>
    <th width="100">Mã KH</th>
    <th width=250">Tên KH</th>
    <th width="150">Giới tính</th>
    <th width="500">Địa chỉ</th>
    <th width="200">Số điện thoại</th>
    <th width="200">Email</th>
    <th width="100">Sửa</th>
    <th width="100">Xóa</th>
</tr>';
  if (mysqli_num_rows($result) != 0) {
    while ($rows = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td align='center'>$rows[0]</td>";
      echo "<td align='center'>$rows[1]</td>";
      if ($rows[2] == 0) {
        echo "<td align='center'>Nam</td>";
      } else if ($rows[2] == 1) {
        echo "<td align='center'>Nữ</td>";
      }
      echo "<td align='center'>$rows[3]</td>";
      echo "<td align='center'>$rows[4]</td>";
      echo "<td align='center'>$rows[5]</td>";
      echo "<td align='center'><a href='./sua.php?Ma_KH=$rows[0]'>Sửa</a></td>";
      echo "<td align='center'><a href='./xoa.php?Ma_KH=$rows[0]'>Xóa</a></td>";
      echo "</tr>";
    }
  }

  echo "</table>";
  session_start();
  if (isset($_SESSION['success_message_edit'])) {
    $message = $_SESSION['success_message_edit'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['success_message_edit']);
  } elseif (isset($_SESSION['success_message_delete'])) {
    $message = $_SESSION['success_message_delete'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['success_message_delete']);
  }
  ?>
  <style>
    th {
      color: red;
    }

    tr:nth-child(odd) {
      background: #5522;
    }
  </style>
</body>

</html>