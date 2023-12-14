<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
        }

        li a {
            display: block;
            color: #FF2A2A;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #FF2A2A;
            color: white;
        }

        .header table {
            border: 2px solid #FF2A2A;
            width: 100%;
        }

        .header td {
            text-align: left;
        }

        .container {
            display: flex;
        }

        .menu {
            flex: 0 0 200px;
        }

        .noiDung {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    <body>
        <div class="header">
            <table>
                <tr>
                    <td style="text-align: center;"><img src="./hinhPhim/favicon.svg" alt=""></td>
                </tr>
                <tr>
                    <?php
                    session_start();
                    if (isset($_SESSION["username"])) {
                        $username = $_SESSION["username"];
                        echo "Xin chào, " . $username . "! ";
                        echo '<form method="post" action="./logout.php">';
                        echo '<input type="submit"  name = "dangxuat" value="Đăng xuất">';
                        echo '</form>';
                    } else {
                        echo '<td>Xin chào em</td>';
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div class="container">
            <!-- Menu bên trái -->
            <ul>
                <li><a href="./phim/phim.php">Quản lý Phim</a></li>
                <li><a href="./theLoai/theLoai.php">Quản lý Thể Loại</a></li>
                <li><a href="./phong/room_list.php">Quản lý Phòng Chiếu</a></li>
                <li><a href="./quocGia/details.php">Quản lý Quốc Gia</a></li>
                <li><a href="./nhanVien/hienthinv.php">Quản lý Nhân Viên</a></li>
                <li><a href="./thongKeDoanhThu/detail_thongke.php">Thống Kê Doanh Thu</a></li>
                <li><a href="./lichChieuPhim/detail_lichchieuphim.php">Quản lý Lịch Chiếu Phim</a></li>
                <li><a href="./loaiVe/hienthiLV.php">Quản lý Loại Vé</a></li>
                <li><a href="./lichChieu/detail_lichchieu.php">Quản lý Lịch Chiếu</a></li>
                <li><a href="./thongtindatve/detail_thongtindatve.php">Quản lý Đặt Vé</a></li>
                <li><a href="./giaVe/hienThiGV.php">Quản lý Giá Vé</a></li>
                <li><a href="./suKien/hienthi.php">Quản lý Sự Kiện</a></li>
                <li><a href="./taiKhoan/hienThiTK.php">Quản lý Người Dùng</a></li>
            </ul>
            <div class="noiDung">
                <h2>Chào mừng bạn đến với LOTTE CINEMA, hãy chỉnh sửa những gì bạn muốn!!!</h2>
            </div>
        </div>
    </body>
</body>

</html>