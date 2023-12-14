<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin nhân viên</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    button {
        width: 100px;
        color: #FF2A2A;
        background-color: #FFFF;
        border-radius: 5px;
        border-color: #FF2A2A;
    }

    button:hover {
        background-color: #FF2A2A;
        color: #ffff;
    }

    th {
        color: #FF2A2A;
    }

    td {
        text-align: center;
    }
    </style>
</head>

<body>
    <?php
        include("../adminHeader.php");
    ?>
    <div class="container">
        <?php
            include("../adminMenu.php");
        ?>
        <div class="noiDung">
            <?php
    // Ket noi CSDL
    require("../connect.php");

    $sql = 'select MaNhanVien,TenNhanVien,SoDienThoai,DiaChi,gioitinh,ngaysinh from nhanvien';

    $result = mysqli_query($conn, $sql);



    echo "<p align='center'><font size='5' color='#FF2A2A'> THÔNG TIN NHÂN VIÊN</font></P>";
    echo "<a href='themNhanVien.php'>
    <button>Thêm mới</button>
  </a>";
    echo "<table align='center' width='' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

    echo '<tr>

    <th width="120">Mã nhân viên</th>

     <th width="300">Tên nhân viên</th>

    <th width="150">Số điện thoại</th>

    <th width="430">Địa chỉ</th>

    <th width="120">Giới tính</th>

    <th width="130">Ngày sinh</th>
</tr>';



    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;

        while ($rows = mysqli_fetch_row($result)) {
            if ($stt % 2 == 0) {
                echo "<tr>";

                echo "<td>$rows[0]</td>";

                echo "<td>$rows[1]</td>";

                echo "<td>$rows[2]</td>";
                echo "<td>$rows[3]</td>";

                if ($rows[4] == 1) {
                    echo "<td align='center'><img src='../hinhPhim/nam.png' width=40px></td>";
                } else {
                    echo "<td align='center'><img src='../hinhPhim/nu.png'width=40px></td>";
                }
                echo "<td>$rows[5]</td>";
                echo "<td><a href='suaNhanVien.php?MaNhanVien=" . $rows[0] . "'>Sửa</a></td>";
                echo "<td><a href='xoaNhanVien.php?MaNhanVien=" . $rows[0] . "'>Xóa</a></td>";

                echo "</tr>";

                $stt += 1;
            } else {
                echo "<tr>";

                echo "<td>$rows[0]</td>";

                echo "<td>$rows[1]</td>";

                echo "<td>$rows[2]</td>";
                echo "<td>$rows[3]</td>";

                if ($rows[4] == 1) {
                    echo "<td align='center'><img src='../hinhPhim/nam.png' width=40px></td>";
                } else {
                    echo "<td align='center'><img src='../hinhPhim/nu.png'width=40px></td>";
                }
                echo "<td>$rows[5]</td>";
                echo "<td><a href='suaNhanVien.php?MaNhanVien=" . $rows[0] . "'>Sửa</a></td>";
                echo "<td><a href='xoaNhanVien.php?MaNhanVien=" . $rows[0] . "'>Xóa</a></td>";

                echo "</tr>";

                $stt += 1;
            }
        }
    }
    echo "</table>";
    ?>
        </div>
    </div>
</body>

</html>