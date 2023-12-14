<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thông tin khách hàng</title>

</head>

<body>

    <?php



    // Ket noi CSDL

    //require("connect.php");

    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')

        or die('Could not connect to MySQL: ' . mysqli_connect_error());

    $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';

    $result = mysqli_query($conn, $sql);



    echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";

    echo "<table align='center' width='900' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

    echo '<tr>

    <th width="50">MaKH</th>

     <th width="300">Ten khach hang</th>

    <th width="80">Gioi tinh</th>

    <th width="500">Dia chi</th>
    <th width="150">SĐT</th>
    <th width="150">Email</th>
    <th width="150">Sửa</th>
    <th width="150">Xóa</th>


</tr>';



    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;

        while ($rows = mysqli_fetch_row($result)) {
            if ($stt % 2 == 0) {
                echo "<tr style='background-color:#B6FFFA'>";

                echo "<td>$rows[0]</td>";

                echo "<td>$rows[1]</td>";
                if ($rows[2] == 1) {
                    echo "<td align='center'><img src='./img/nam.png' width=40px></td>";
                } else {
                    echo "<td align='center'><img src='./img/nu.png'width=40px></td>";
                }

                echo "<td>$rows[3]</td>";

                echo "<td>$rows[4]</td>";
                echo "<td>$rows[5]</td>";
                echo "<td><a href='chinh_sua.php?Ma_khach_hang=" . $rows[0] . "'>Sửa</a></td>";
                echo "<td><a href='delete.php?Ma_khach_hang=" . $rows[0] . "'>Xóa</a></td>";

                echo "</tr>";

                $stt += 1;
            } else {
                echo "<tr>";

                echo "<td>$rows[0]</td>";

                echo "<td>$rows[1]</td>";
                if ($rows[2] == 1) {
                    echo "<td align='center'><img src='./img/nam.png' width=40px></td>";
                } else {
                    echo "<td align='center'><img src='./img/nu.png'width=40px></td>";
                }

                echo "<td>$rows[3]</td>";

                echo "<td>$rows[4]</td>";
                echo "<td>$rows[5]</td>";
                echo "<td><a href='chinh_sua.php?Ma_khach_hang=" . $rows[0] . "'>Sửa</a></td>";
                echo "<td><a href='delete.php?Ma_khach_hang=" . $rows[0] . "'>Xóa</a></td>";

                echo "</tr>";

                $stt += 1;
            }
        }
    }

    echo "</table>";

    ?>

</body>

</html>