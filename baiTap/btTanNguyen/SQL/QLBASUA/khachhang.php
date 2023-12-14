<?php
// Kết nối CSDL
require("connect.php");
$sql = 'select Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai from khach_hang';
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>
    <th width="100">Mã Khách Hàng</th>
    <th width="200">Tên khách hàng</th>
    <th width="150">Giới tính</th>
    <th width="200">Địa chỉ</th>
    <th width="200">Số điện thoại</th>
</tr>';
if(mysqli_num_rows($result) <> 0) {
    while($rows = mysqli_fetch_row($result)) {
        echo "<tr";
        if ($rows[2] == 0) {
            echo " style='background-color: #C0C0C0	;'";
        }
        else{
            echo " style='background-color: #808080	;'";}
        echo ">";
        echo "<td>$rows[0]</td>";
        echo "<td>$rows[1]</td>";
        if ($rows[2] == 0) {
            echo "<td><img width='50' height='50' src='./IMG/gender/male.png'</td>";
        } else if ($rows[2] == 1) {
            echo "<td ><img width='50' height='50' src='./IMG/gender/female.png'</td>";
        }
        echo "<td>$rows[3]</td>";
        echo "<td>$rows[4]</td>";
        echo "</tr>";
    }
}
mysqli_free_result($result);
mysqli_close($conn);
echo "</table>";
?>