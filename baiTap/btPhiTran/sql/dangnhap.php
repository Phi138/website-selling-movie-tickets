<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
        $taikhoan="";
        $matkhau="";
        // Kiểm tra xem người dùng đã nhấp vào nút "Đăng nhập" hay chưa
        if (isset($_POST['dangnhap'])) {
            $taikhoan = $_POST['taikhoan']; // Lấy giá trị tài khoản từ người dùng
            $matkhau = $_POST['matkhau']; // Lấy giá trị mật khẩu từ người dùng
        }
        
        // Kết nối CSDL
        require("connect.php");
        session_start(); // Bắt đầu phiên làm việc

        // Kiểm tra xem người dùng đã nhấp vào nút "Đăng nhập" hay chưa
        if (isset($_POST['dangnhap'])) {
            $taikhoan = $_POST['taikhoan']; // Lấy giá trị tài khoản từ người dùng
            $matkhau = $_POST['matkhau']; // Lấy giá trị mật khẩu từ người dùng

            // Truy vấn SQL để kiểm tra tài khoản và mật khẩu
            $sql = "SELECT * FROM tai_khoan WHERE id = '$taikhoan' AND matkhau = '$matkhau'";
            $result = $conn->query($sql);

            // Kiểm tra kết quả trả về từ truy vấn
            if ($result->num_rows > 0) {
                // Tài khoản và mật khẩu hợp lệ, thực hiện các hành động mong muốn
                // Ví dụ: chuyển hướng người dùng đến trang chính sau khi đăng nhập thành công
                header("Location: sua_phanTrang.php");
                exit();
            } else {
                // Tài khoản hoặc mật khẩu không hợp lệ, hiển thị thông báo lỗi
                echo "<script>alert('Tài khoản hoặc mật khẩu không đúng!');</script>";
            }
        }

        $conn->close(); // Đóng kết nối đến cơ sở dữ liệu
    ?>
    <form action="" method="post">
        <table>
            <thead><th colspan='2'>Đăng nhập</th></thead>
            <tr>
                <td>Tài khoản:</td>
                <td><input type="text" name="taikhoan" id="" value="<?php echo $taikhoan ?>" required></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="text" name="matkhau" id="" value="<?php echo $matkhau ?>" required></td>
            </tr>
            <tr><td colspan='2' align='center'><input type="submit" value="Đăng nhập" name="dangnhap"></td></tr>
        </table>
        <div>
            <p>Chưa có tài khoản <a href="dangky.php">Đăng ký</a></p>
        </div>
    </form>
</body>
</html>