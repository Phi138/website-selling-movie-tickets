<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA THỂ LOẠI</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    h2 {
        color: blue;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 500px;
        background-color: #EEEDED;
        margin: 0 auto;
        /* Căn giữa bảng theo chiều ngang */
        margin-bottom: 10px;
        border: 1px solid #FF2A2A;
    }

    /* Áp dụng kiểu cho tiêu đề bảng */
    th {
        background-color: #FF2A2A;
        color: white;
        padding: 10px;
    }

    /* Áp dụng kiểu cho các ô dữ liệu */
    td {
        padding: 10px;
    }

    input[type="submit"] {
        background-color: white;
        color: #FF2A2A;
        border: 1px solid #FF2A2A;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #FF2A2A;
        color: white;
    }

    .muc {
        color: #FF2A2A;
    }

    button {
        width: 200px;
        color: #FF2A2A;
        background-color: #FFFF;
        border-radius: 5px;
        border-color: #FF2A2A;
    }

    button:hover {
        background-color: #FF2A2A;
        color: #ffff;
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
    require("../connect.php");

    // Kiểm tra xem có ID được truyền vào không
    if (isset($_GET['MaNhanVien'])) {
        // Lấy ID từ tham số URL
        $id = $_GET['MaNhanVien'];

        // Truy vấn CSDL để lấy thông tin thể loại với ID tương ứng
        $sql = "SELECT * FROM nhanvien WHERE MaNhanVien = '$id'";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra xem có dòng dữ liệu trả về không
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $maNhanVien = $row['MaNhanVien'];
            $tenNhanVien = $row['TenNhanVien'];
            $soDienThoai = $row['SoDienThoai'];
            $diaChi = $row['DiaChi'];
            $ngaySinh = $row['ngaysinh'];

            // Xử lý khi người dùng nhấn nút "Lưu"
            if (isset($_POST['luu'])) {
                $newMaNhanVien = $_POST['maNhanVien'];
                $newTenNhanVien = $_POST['tenNhanVien'];
                $newSoDienThoai = $_POST['soDienThoai'];
                $newDiaChi = $_POST['diaChi'];
                $newNgaySinh = $_POST['ngaySinh'];
                if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nam') {
                    $newGioiTinh = 1;
                } else $newGioiTinh = 0;

                // Cập nhật dữ liệu thể loại trong CSDL
                $updateSql = "UPDATE nhanvien SET MaNhanVien = '$newMaNhanVien', TenNhanVien = '$newTenNhanVien',
                 SoDienThoai = '$newSoDienThoai', DiaChi = '$newDiaChi', gioitinh = '$newGioiTinh', ngaysinh = '$newNgaySinh'  WHERE MaNhanVien = '$id'";
                $updateResult = mysqli_query($conn, $updateSql);

                if ($updateResult) {
                    echo "<script>alert('Cập nhật thành công!');</script>";

                    // // Hiển thị dữ liệu đã cập nhật
                    // $MaNhanVien = $newMaNhanVien;
                    // $tennhanvien = $newTennhanvien;
                } else {
                    echo "<p align='center'>Cập nhật thất bại. Vui lòng thử lại!</p>";
                }
            }
    ?>
            <a href='hienthinv.php'>
                <button>Quay lại trang danh sách</button>
            </a>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                        <th colspan="2" align="center">SỬA NHÂN VIÊN</th>
                    </thead>
                    <tr>
                        <td>Mã nhân viên:</td>
                        <td><input readonly type="text" name="maNhanVien" id="" value="<?php echo $maNhanVien; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tên nhân viên:</td>
                        <td><input type="text" name="tenNhanVien" id="" style="width:300px"
                                value="<?php echo $tenNhanVien; ?>"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><input type="text" name="soDienThoai" id="" value="<?php echo $soDienThoai; ?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><textarea name="diaChi" id="" cols="45" rows="2"><?php echo $diaChi; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Giới tính:</td>
                        <td><input type="radio" name="gioiTinh" id="" value="Nam" checked>Nam
                            <input type="radio" name="gioiTinh" id="" value="Nữ">Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh:</td>
                        <td>
                            <input type="date" name="ngaySinh" id="" value="<?php echo $ngaySinh; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input name="luu" type="submit" value="Lưu"></td>
                    </tr>
                </table>
            </form>
            <?php
        } else {
            echo "<p align='center'>Không tìm thấy nhân viên.</p>";
        }
    } else {
        echo "<p align='center'>Vui lòng cung cấp ID nhân viên để sửa.</p>";
    }
    ?>
        </div>
    </div>
</body>

</html>