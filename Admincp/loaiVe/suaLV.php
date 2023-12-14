<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA LOẠI VÉ</title>
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
    // Kết nối csdl
    require("../connect.php");

    // Kiểm tra xem có ID được truyền vào không
    if (isset($_GET['Maloaive'])) {
        // Lấy ID từ tham số URL
        $id = $_GET['Maloaive'];

        // Truy vấn CSDL để lấy thông tin loại vé với ID tương ứng
        $sql = "SELECT * FROM loaive WHERE Maloaive = '$id'";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra xem có dòng dữ liệu trả về không
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $maLoaiVe = $row['Maloaive'];
            $tenLoaiVe = $row['Tenloaive'];

            // Xử lý khi người dùng nhấn nút "Lưu"
            if (isset($_POST['luu'])) {
                $newMaLoaiVe = $_POST['maLoaiVe'];
                $newTenLoaiVe = $_POST['tenLoaiVe'];

                // Cập nhật dữ liệu thể loại trong CSDL
                $updateSql = "UPDATE loaive SET Maloaive = '$newMaLoaiVe', Tenloaive = '$newTenLoaiVe'
                  WHERE Maloaive = '$id'";
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

            <a href='hienthiLV.php'>
                <button>Quay lại trang danh sách</button>
            </a>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                        <th colspan="2" align="center">SỬA LOẠI VÉ</th>
                    </thead>
                    <tr>
                        <td>Mã loại vé:</td>
                        <td><input readonly type="text" name="maLoaiVe" id="" value="<?php echo $maLoaiVe; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tên loại vé:</td>
                        <td><input type="text" name="tenLoaiVe" id="" style="width:150px"
                                value="<?php echo $tenLoaiVe; ?>"></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><input name="luu" type="submit" value="Lưu"></td>
                    </tr>
                </table>
            </form>
            <?php
        } else {
            echo "<p align='center'>Không tìm thấy loại vé.</p>";
        }
    } else {
        echo "<p align='center'>Vui lòng cung cấp ID loại vé để sửa.</p>";
    }
    ?>
        </div>
    </div>
</body>

</html>