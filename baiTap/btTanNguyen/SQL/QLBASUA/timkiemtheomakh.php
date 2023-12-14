<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Tim kiem sua</title>

</head>

<body>

<form action="" method="get">

<table bgcolor="#eeeeee" align="center" width="70%" border="1" 

	   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">

<tr>

	<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN HÓA ĐƠN VÀ KHÁCH HÀNG</h3></font></td>

</tr>

<tr>

	<td align="center">MÃ KHÁCH HÀNG: <input type="text" name="tensua" size="30" 

				value="<?php if(isset($_GET['tensua'])) echo $_GET['tensua'];?>">

			<input type="submit" name="tim" value="Tìm kiếm"></td>

</tr>

</table>

</form>

<?php 

if($_SERVER['REQUEST_METHOD']=='GET')

{

	if(empty($_GET['tensua'])) echo "<p align='center'>Vui lòng nhập mã khách hàng</p>";

	else

	{

		$tensua=$_GET['tensua'];	

		require('connect.php');

		$query = "SELECT hd.*, kh.Ten_khach_hang, kh.Email, kh.Dia_chi, kh.phai, kh.Dien_thoai,hd.Tri_gia,hd.Ngay_HD
          FROM hoa_don hd
          INNER JOIN khach_hang kh ON hd.Ma_khach_hang = kh.Ma_khach_hang
          WHERE hd.Ma_khach_hang = '$tensua'";

		$result=mysqli_query($conn,$query);		

	
		if (mysqli_num_rows($result) <> 0) {
			$rows = mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows sản phẩm được tìm thấy.</b></div>";
		
			// Hiển thị thông tin khách hàng trong một bảng
			echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
					<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['Ma_khach_hang'] .  '</h3></td></tr>';
			echo '<tr><td><i><b>Tên khách hàng :</i></b><br />' . $row['Ten_khach_hang'] . '<br />';
			echo '<i><b>Giới tính:</b></i>' . $row['phai'] . '<br />';
			echo '<i><b>Địa chỉ: </b></i>' . $row['Dia_chi'] . ' gr - <i><b>Điện thoại: </b></i>' . $row['Dien_thoai'];
			echo '<i><b>Email:</b></i>' . $row['Email'] . '<br />';
			echo '</td></tr></table>';
		
			// Hiển thị danh sách hóa đơn trong một bảng
			echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
					<tr bgcolor="#eeeeee"><th>Mã hóa đơn</th><th>Ngày hóa đơn</th><th>Trị giá</th></tr>';
		
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr><td>' . $row['So_hoa_don'] . '</td><td>' . $row['Ngay_HD'] . '</td><td>' . $row['Tri_gia'] . ' VND</td></tr>';
			}
		
			echo '</table>';
		} else {
			echo"không tìm thấy";
		}
}}



?>

</body>

</html> 