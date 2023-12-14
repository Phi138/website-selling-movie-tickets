<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tim kiem sua</title>

</head>

<body>

    <form action="" method="get">

        <table bgcolor="#eeeeee" align="center" width="70%" border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse;">

            <tr>

                <td align="center">
                    <font color="blue">
                        <h3>TÌM KIẾM THÔNG TIN KHÁCH HÀNG</h3>
                    </font>
                </td>

            </tr>

            <tr>

                <td align="center">Mã khách hàng: <input type="text" name="maKH" size="30" value="<?php if (isset($_GET['maKH'])) echo $_GET['maKH']; ?>">

                    <input type="submit" name="tim" value="Tìm kiếm">
                </td>

            </tr>

        </table>

    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (empty($_GET['maKH'])) echo "<p align='center'>Vui lòng nhập mã khách hàng</p>";

        else {

            $maKH = $_GET['maKH'];

            require('connect.php');

            $query = "Select khach_hang.*, So_hoa_don,Tri_gia

		      from khach_hang,hoa_don

		      WHERE khach_hang.Ma_khach_hang=hoa_don.Ma_khach_hang

					AND khach_hang.Ma_khach_hang like '$maKH'";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) <> 0) {
                $rows = mysqli_num_rows($result);

                echo "<div align='center'><b>Có $rows mã khách hàng được tìm thấy.</b></div>";

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">

					<tr bgcolor="#eeeeee" colspan="1" align="center"><h3>' .

                        '<th>Mã khách hàng</th>' .
                        '<th>Tên khách hàng</th>' .
                        '<th>Phái</th>' .
                        '<th>Địa chỉ</th>' .
                        '<th>Điện thoại</th>' .
                        '<th>Email</th></h3></tr>';

                    echo '<tr>';
                    echo  '<td> ' . $row['Ma_khach_hang'] . '</td>';
                    echo '<td>' . $row['Ten_khach_hang'] . '</td>';
                    echo '<td>' . $row['Phai'] . '</td>';
                    echo '<td>' . $row['Dia_chi'] . '</td>';
                    echo '<td>' . $row['Dien_thoai'] . '</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    '</tr>';
                    echo '</td></tr></table>';
                }
            } else echo "<div><b>Không tìm thấy khách hàng này.</b></div>";
        }
    }

    ?>

</body>

</html>