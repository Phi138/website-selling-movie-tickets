<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h2 {
            color: blue;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 600px;
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
            color: #3085C3;
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
            // Kết nối csdl
            require("../connect.php");

            //Tăng mã nhân viên tự động
            $query = "SELECT MaNhanVien FROM nhanvien ORDER BY MaNhanVien DESC LIMIT 1";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $lastMaNhanVien = $row['MaNhanVien'];

                // Trích xuất phần số từ mã hiện có
                $numericPart = intval(substr($lastMaNhanVien, 3));

                // Tăng giá trị số lên 1
                $numericPart++;

                // Tạo mã mới dựa trên giá trị số đã tăng
                $newMaNhanVien = "NV" . str_pad($numericPart, 3, '0', STR_PAD_LEFT);
            } else {
                $newMaNhanVien = "NV001";
            }
            // Xử lý khi nhấn nút thêm nhân viên
            if (isset($_POST['them'])) {
                $maNV = $newMaNhanVien;
                $tenNV = $_POST['tenNV'];
                $sdt = $_POST['sdt'];
                $diaChi = $_POST['diaChi'];
                if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nam') {
                    $gioiTinh = 1;
                } else $gioiTinh = 0;
                $ngaysinh = $_POST['ngaysinh'];
                // Kiểm tra xem mã phim đã tồn tại trong cơ sở dữ liệu chưa
                $checkSql = "SELECT MaNhanVien FROM nhanvien WHERE MaNhanVien = '$maNV'";
                $result = mysqli_query($conn, $checkSql);
                if (mysqli_num_rows($result) > 0) {
                    // Mã sữa đã tồn tại, hiển thị thông báo
                    echo "Mã nhân viên đã tồn tại trong cơ sở dữ liệu.\n";
                } else {
                    // Thực hiện truy vấn để thêm thể loại vào cơ sở dữ liệu
                    $sql = "INSERT INTO nhanvien (MaNhanVien, TenNhanVien, SoDienThoai, DiaChi, gioitinh, ngaysinh) VALUES
                ('$maNV', '$tenNV', '$sdt', '$diaChi', '$gioiTinh', '$ngaysinh')";
                    if (mysqli_query($conn, $sql)) {
                        $quayLai = true;
                    } else {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
                }
            }
            // Đóng kết nối
            mysqli_close($conn);
            ?>

            <?php if (isset($quayLai) && $quayLai) : ?>
                <p>Nhân viên đã được thêm thành công.</p>
                <p>
                    <a href="hienthinv.php">Quay lại danh sách nhân viên</a>
                </p>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                        <th colspan="2" align="center">THÊM NHÂN VIÊN</th>
                    </thead>
                    <tr>
                        <td>Mã nhân viên:</td>
                        <td><input type="text" name="maNV" id="" value="<?php echo $newMaNhanVien ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Tên nhân viên:</td>
                        <td><input type="text" name="tenNV" id="" style="width:300px"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><input type="text" name="sdt" id=""></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><textarea name="diaChi" id="" cols="45" rows="2"></textarea></td>
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
                            <input type="date" name="ngaysinh" id="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input name="them" type="submit" value="Thêm mới"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>