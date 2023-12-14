<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Danh sách tài khoản</title>
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

            $sql = 'select username, password, email, role, TenNhanVien
                    from nhanvien nv, nguoidung nd
                    where nd.MaNhanVien = nv.MaNhanVien';

            $result = mysqli_query($conn, $sql);

            echo "<p align='center'><font size='5' color='#FF2A2A'>DANH SÁCH NGƯỜI DÙNG</font></P>";
            echo "<a href='themTK.php'>
    <button>Thêm mới</button>
  </a>";
            echo "<table align='center' width='' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

            echo '<tr>
            <th width="50">STT</th>
    <th width="150">Tên tài khoản</th>
    <th width="150">Mật khẩu</th>
    <th width="300">Email</th>
    <th width="250">Tên nhân viên</th>
    <th width="190">Loại người dùng</th>
    <th width="130">Thao tác</th>
</tr>';

            if (mysqli_num_rows($result) <> 0) {
                $stt = 1;
                while ($rows = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    echo "<td>$stt</td>";
                    echo "<td>$rows[0]</td>";
                    echo "<td>$rows[1]</td>";
                    echo "<td>$rows[2]</td>";
                    echo "<td>$rows[4]</td>";
                    if ($rows[3] == 1) {
                        echo "<td>Admin</td>";
                    } else {
                        echo "<td>Nhân viên</td>";
                    }
                    echo "<td>
                        <a href='suaTK.php?username=" . $rows[0] . "'>Sửa</a>
                        <a href='xoaTK.php?username=" . $rows[0] . "'>Xóa</a>
                        </td>";
                    echo "</tr>";
                    $stt += 1;
                }
            }
            echo "</table>";
            ?>
        </div>
    </div>
</body>

</html>