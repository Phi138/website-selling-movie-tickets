<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm khách hàng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 500px;
            background-color: #EEEDED;
        }

        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #0D1282;
            color: #F0DE36;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: left;
            padding: 5px;
        }
    </style>
</head>
<body>
<form action="" method="get">
<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
	   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
<tr>
	<td style="text-align: center;"><font color="blue"><h3>TÌM KIẾM THÔNG TIN KHÁCH HÀNG</h3></font></td>
</tr>
<tr>
	<td align="center">Mã khách hàng: <input type="text" name="maKhachHang" size="30" 
				value="<?php if(isset($_GET['maKhachHang'])) echo $_GET['maKhachHang'];?>">
			<input type="submit" name="tim" value="Tìm kiếm"></td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(empty($_GET['maKhachHang'])) echo "<p align='center'>Vui lòng nhập tên sản phẩm</p>";
	else
	{
		$maKhachHang=$_GET['maKhachHang'];	
		require('connect.php');
		$query="Select khach_hang.*, So_hoa_don, Tri_gia
		      from khach_hang,hoa_don
		      WHERE khach_hang.Ma_khach_hang=hoa_don.Ma_khach_hang
					AND khach_hang.Ma_khach_hang like '$maKhachHang'";
		$result=mysqli_query($conn,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows khách hàng được tìm thấy.</b></div>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{

				// echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">

				// 	<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.

				// 		$row['Ma_khach_hang'].'</h3></td></tr>';

				// //echo '<tr><td width="200" align="center"><img src="Hinh_sua/'.$row['Hinh'].'"/></td>';
                // echo '<td><i><b>Tên khách hàng:</i></b><br />'.$row['Ten_khach_hang'].'<br />';
                // echo '<td><i><b>Phái:</i></b><br />'.$row['Phai'].'<br />';

				// echo '<td><i><b>Địa chỉ:</i></b><br />'.$row['Dia_chi'].'<br />';

				// echo '<i><b>Điện thoại:</b></i>'.$row['Dien_thoai'].'<br />';

                // echo '<td><i><b>Email:</i></b><br />'.$row['Email'].'<br />';
				
				// echo '</td></tr></table>';

                echo "<table>
                <thead><th colspan='2' align='center'>Thông tin KH</th></thead>
                <tr>
                    <td>Mã khách hàng:</td>
                    <td>".$row['Ten_khach_hang']."</td>
                </tr>
                <tr>
                    <td>Phái:</td>
                    <td>".$row['Phai']."</td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>".$row['Dia_chi']."</td>
                </tr>
                <tr>
                    <td>Điện thoại:</td>
                    <td>".$row['Dien_thoai']."</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>".$row['Email']."</td>
                </tr>
            </table>";

			}

		}

		else echo "<div><b>Không tìm thấy khách hàng này.</b></div>";

	}

}

?>
    
</body>

</html>