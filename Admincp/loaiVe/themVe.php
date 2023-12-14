<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại vé</title>
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

    // Xử lý khi nhấn nút thêm vé
    if (isset($_POST['them'])) {
        $maLV = $_POST['maLV'];
        $tenLV = $_POST['tenLV'];
        // Kiểm tra xem mã loại vé đã tồn tại trong cơ sở dữ liệu chưa
        $checkSql = "SELECT Maloaive FROM loaive WHERE Maloaive = '$maLV'";
        $result = mysqli_query($conn, $checkSql);
        if (mysqli_num_rows($result) > 0) {
            // Mã loại vé đã tồn tại, hiển thị thông báo
            echo "Mã loại vé đã tồn tại trong cơ sở dữ liệu.\n";
        } else {
            // Thực hiện truy vấn để thêm loại vé vào cơ sở dữ liệu
            $sql = "INSERT INTO loaive (Maloaive, Tenloaive) VALUES
                ('$maLV', '$tenLV')";
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
            <p>Vé đã được thêm thành công.</p>
            <p>
                <a href="hienthiLV.php">Quay lại danh sách loại vé</a>
            </p>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                        <th colspan="2" align="center">THÊM LOẠI VÉ</th>
                    </thead>
                    <tr>
                        <td>Mã loại vé:</td>
                        <td><input type="text" name="maLV" id=""></td>
                    </tr>
                    <tr>
                        <td>Tên loại vé:</td>
                        <td><input type="text" name="tenLV" id="" style="width:300px"></td>
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