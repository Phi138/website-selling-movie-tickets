<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #9EDDFF;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #793FDF;
            color: white;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #fff;
            color: #007bff;
            border: 1px solid blue;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
        $taikhoan='';
        $matkhau='';
        // Kết nối CSDL
        require("connect.php");
        session_start(); // Bắt đầu phiên làm việc

        // Kiểm tra xem người dùng đã nhấp vào nút "Đăng ký" hay chưa
        if (isset($_POST['dangky'])) {
            $taikhoan = $_POST['taikhoan']; // Lấy giá trị tài khoản từ người dùng
            $matkhau = $_POST['matkhau']; // Lấy giá trị mật khẩu từ người dùng

            // Truy vấn SQL để kiểm tra xem tài khoản đã tồn tại hay chưa
            $checkQuery = "SELECT * FROM tai_khoan WHERE id = '$taikhoan'";
            $checkResult = $conn->query($checkQuery);

            if ($checkResult->num_rows > 0) {
                // Tài khoản đã tồn tại, hiển thị thông báo lỗi
                echo "<script>alert('Tài khoản đã tồn tại!');</script>";
            } else {
                // Tài khoản chưa tồn tại, thực hiện thêm tài khoản mới vào cơ sở dữ liệu
                $insertQuery = "INSERT INTO tai_khoan (id, matkhau) VALUES ('$taikhoan', '$matkhau')";
                if ($conn->query($insertQuery) === TRUE) {
                    // Đăng ký thành công, hiển thị thông báo thành công hoặc chuyển hướng đến trang đăng nhập
                    header("Location: dangnhap.php"); // Chuyển hướng đến trang đăng nhập
                    exit();
                } else {
                    // Đăng ký thất bại, hiển thị thông báo lỗi
                    echo "Đăng ký thất bại: " . $conn->error;
                }
            }
        }

        $conn->close(); // Đóng kết nối đến cơ sở dữ liệu
    ?>
    <form action="" method="post">
        <table>
            <thead><th colspan='2'>Đăng ký</th></thead>
            <tr>
                <td>Tài khoản:</td>
                <td><input type="text" name="taikhoan" id="" value="<?php echo $taikhoan ?>" required></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="text" name="matkhau" id="" value="<?php echo $matkhau ?>" required></td>
            </tr>
            <tr><td colspan='2' align='center'><input type="submit" value="Đăng ký" name="dangky"></td></tr>
        </table>
        <div>
            <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
        </div>
    </form>
</body>
</html>