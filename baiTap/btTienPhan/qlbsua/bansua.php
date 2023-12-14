<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thông tin sữa</title>
<style>
  tr:nth-child(even) {
    background-color: #FFF8C9;
  }
  tr:nth-child(odd) {
    background-color: #F4DFB6;
  }
  td.image-column {
    text-align: center;
  }
</style>
</head>
<body>
<?php
  // Ket noi CSDL
require("connect.php");
echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";
 echo "<table align='center' width='1200' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
 echo '<tr>
    <th width="50">STT</th>
    <th width="150">Mã KH</th>
    <th width="520">Tên Khách Hàng</th>
    <th width="270">Giới Tính</th>
    <th width="500">Địa chỉ</th>
    <th width="300">Số điện thoại</th>
    <th width="200">Email</th>
    <th width="100">Sửa</th>
    <th width="100">Xóa</th>
</tr>';
 if(mysqli_num_rows($result)<>0)
 {   $stt=1;
    while($rows=mysqli_fetch_row($result))
    {          echo '<tr>';
             echo "<td>$stt</td>";
             echo "<td>$rows[0]</td>";
             echo "<td>$rows[1]</td>";
             echo '<td class="image-column"><img src="' . ($rows[2] == "0" ? '1.png' : '2.png') . '" width="50" height="50"></td>';
             echo "<td>$rows[3]</td>";
             echo "<td>$rows[4]</td>";
             echo "<td>$rows[5]</td>";
             echo "<td><a href='editcus.php?id=$rows[0]'>Sửa</a></td>";
             echo "<td><a href='deletecus.php?id=$rows[0]'>Xóa</a></td>";
             echo "</tr>";
                 $stt+=1;
    }
 }
echo"</table>";
?>
</body>
</html>