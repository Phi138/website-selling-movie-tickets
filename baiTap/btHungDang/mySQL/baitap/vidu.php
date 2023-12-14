<?php
require_once("../sql/connection.php");
if (!$conn) {
  die("Connection failed" . mysqli_connect_error());
}
$sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM khach_hang";
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";
echo "<table align='center' width='1100' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>
    <th width="200">Mã khách hàng</th>
    <th width=200">Tên khách hàng</th>
    <th width="100">Giới tính</th>
    <th width="500">Địa chỉ</th>
    <th width="200">Số điện thoại</th>
</tr>';
if (mysqli_num_rows($result) != 0) {
  while ($rows = mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td>$rows[0]</td>";
    echo "<td>$rows[1]</td>";
    if ($rows[2] == 1) {
      echo "<td align = 'center'><img src='../img/nam.jpg' alt='Nam' width='50' height='50'></td>";
    } else if ($rows[2] == 0) {
      echo "<td align = 'center'><img src='../img/nu.png' alt='Nữ' width='50' height='50'></td>";
    }
    echo "<td>$rows[3]</td>";
    echo "<td>$rows[4]</td>";
    echo "</tr>";
  }
}
echo "</table>";
?>
<style>
  th {
    color: red;
  }

  tr:nth-child(odd) {
    background: #5522;
  }
</style>