<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Thông tin sữa</title>

</head>

<body>

<?php

 

  // Ket noi CSDL

require("connect.php");

// $conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 

// 		OR die ('Không thể kết nối tới database: ' . mysqli_connect_error() );

$sql = 'select Ma_khach_hang,ten_khach_hang,phai,dia_chi,dien_thoai from khach_hang';

$result = mysqli_query($conn, $sql);



echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";

 echo "<table align='center' width='900' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '<tr>

    <th width="100">STT</th>

     <th width="350">Mã khách hàng</th>

    <th width="500">Tên khách hàng</th>

    <th width="250">Giới tính</th>
    <th width="800">Địa chỉ</th>
    <th width="250">Số điện thoại</th>


</tr>';



 if(mysqli_num_rows($result)<>0)

 {	 $stt=1;

	while($rows=mysqli_fetch_row($result))

	{          
        if($stt%2==0){
            echo '<tr style="background-color: #B6FFFA" >';

		     echo "<td>$stt</td>";

		     echo "<td>$rows[0]</td>";

		     echo "<td>$rows[1]</td>";
             if($rows[2]==1){
                echo '<td style="text-align: center;"><img src="nam.png" style="width: 40%;"></td>';
             }
             else{
                echo '<td style="text-align: center;"><img src="nu.png" style="width: 40%;"></td>';
             }

		     echo "<td>$rows[3]</td>";
             

		     echo "<td>$rows[4]</td>";

		     echo "</tr>";

	             $stt+=1;
        }
        else{
            echo '<tr  style="background-color: #80B3FF">';

		     echo "<td>$stt</td>";

		     echo "<td>$rows[0]</td>";

		     echo "<td>$rows[1]</td>";
             if($rows[2]==1){
                echo '<td style="text-align: center;"><img src="nam.png" style="width: 40%;"></td>';
             }
             else{
                echo '<td style="text-align: center;"><img src="nu.png" style="width: 40%;"></td>';
             }

		     echo "<td>$rows[3]</td>";
             

		     echo "<td>$rows[4]</td>";

		     echo "</tr>";

	             $stt+=1;
        }
	}

 }

echo"</table>";

?>

</body>

</html>