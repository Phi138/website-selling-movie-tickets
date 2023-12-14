<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA THỂ LOẠI</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h2{
            color: blue;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 300px;
            background-color: #EEEDED;
            margin: 0 auto; /* Căn giữa bảng theo chiều ngang */
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
        td{
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
        .muc{
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

        // Kiểm tra xem có ID được truyền vào không
        if(isset($_GET['id'])) {
            // Lấy ID từ tham số URL
            $id = $_GET['id'];

            // Truy vấn CSDL để lấy thông tin thể loại với ID tương ứng
            $sql = "SELECT * FROM theloai WHERE MaTL = '$id'";
            $result = mysqli_query($conn, $sql);

            // Kiểm tra xem có dòng dữ liệu trả về không
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $maTheLoai = $row['MaTL'];
                $tenTheLoai = $row['TenTL'];

                // Xử lý khi người dùng nhấn nút "Lưu"
                if(isset($_POST['save'])) {
                    $newMaTheLoai = $_POST['maTheLoai'];
                    $newTenTheLoai = $_POST['tenTheLoai'];

                    // Cập nhật dữ liệu thể loại trong CSDL
                    $updateSql = "UPDATE theloai SET MaTL = '$newMaTheLoai', TenTL = '$newTenTheLoai' WHERE MaTL = '$id'";
                    $updateResult = mysqli_query($conn, $updateSql);

                    if($updateResult) {
                        echo "<p align='center'>Cập nhật thành công!</p>";

                        // Chuyển hướng về trang danh sách thể loại sau khi cập nhật thành công
                        header("Location: theLoai.php");
                        exit();

                        // // Hiển thị dữ liệu đã cập nhật
                        // $maTheLoai = $newMaTheLoai;
                        // $tenTheLoai = $newTenTheLoai;
                    } else {
                        echo "<p align='center'>Cập nhật thất bại. Vui lòng thử lại!</p>";
                    }
                }
    ?>

                <form align="center" method="POST">
                    <table>
                        <thead><th colspan="2" align="center">SỬA THỂ LOẠI</th></thead>
                        <tr>
                            <td class="muc">Mã thể loại:</td>
                            <td><input disabled type="text" name="maTheLoai" id="maTheLoai" value="<?php echo $maTheLoai; ?>"></td>
                        </tr>
                        <tr>
                            <td class="muc">Tên thể loại:</td>
                            <td><input type="text" name="tenTheLoai" id="tenTheLoai" value="<?php echo $tenTheLoai; ?>"></td>
                        </tr>
                    </table>
                    <input type="submit" name="save" value="Lưu">
                </form>
    <?php
            } else {
                echo "<p align='center'>Không tìm thấy thể loại.</p>";
            }
        } else {
            echo "<p align='center'>Vui lòng cung cấp ID thể loại để sửa.</p>";
        }
    ?>
        </div>
    </div>
</body>
</html>