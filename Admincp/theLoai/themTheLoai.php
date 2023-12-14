<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thể loại</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    h2 {
        color: blue;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 300px;
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

            //Tăng mã thể loại tự động
            $query = "SELECT MaTL FROM theloai ORDER BY MaTL DESC LIMIT 1";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $lastMaTL = $row['MaTL'];

                // Trích xuất phần số từ mã hiện có
                $numericPart = intval(substr($lastMaTL, 2));

                // Tăng giá trị số lên 1
                $numericPart++;

                // Tạo mã mới dựa trên giá trị số đã tăng
                $newMaTL = "TL" . str_pad($numericPart, 2, '0', STR_PAD_LEFT);
            } else {
                $newMaTL = "TL01";
            }
            $maTheLoai = $newMaTL;

            // Thực hiện truy vấn để thêm thể loại vào cơ sở dữ liệu
            if (isset($_POST['them'])) {
                $tenTheLoai = $_POST['tenTheLoai'];
                $sql = "INSERT INTO theloai (MaTL, TenTL) VALUES ('$maTheLoai', '$tenTheLoai')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>
                        alert("Thêm thể loại thành công. Vui lòng bấm OK!!!");
                        setTimeout(function() {
                            window.location.href = "./theLoai.php";
                        }, 500);
                    </script>';
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }

            // Đóng kết nối
            mysqli_close($conn);

            ?>

            <form method="POST" align="center">
                <table>
                    <thead>
                        <th colspan="2" align="center">THÊM THỂ LOẠI</th>
                    </thead>
                    <tr>
                        <td class="muc">Mã thể loại:</td>
                        <td><input type="text" name="maTheLoai" id="maTheLoai" value="<?php echo $maTheLoai ?>"
                                disabled>
                        </td>
                    </tr>
                    <tr>
                        <td class="muc">Tên thể loại:</td>
                        <td><input type="text" name="tenTheLoai" id="tenTheLoai" required></td>
                    </tr>
                </table>
                <input type="submit" value="Thêm" name='them'>
            </form>
        </div>
    </div>
</body>

</html>