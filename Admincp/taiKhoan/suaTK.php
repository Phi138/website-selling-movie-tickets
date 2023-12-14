<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA NGƯỜI DÙNG</title>
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

            // Lấy dữ liệu bảng nhân viên
            $sql = "SELECT * FROM nhanvien";
            $result = mysqli_query($conn, $sql);
            $NhanVienList = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $NhanVienList[$row['MaNhanVien']] = $row["TenNhanVien"];
                }
            }

            // Kiểm tra xem có ID được truyền vào không
            if (isset($_GET['username'])) {
                // Lấy ID từ tham số URL
                $username = $_GET['username'];
                // Truy vấn CSDL để lấy thông tin username tương ứng
                $sql = "SELECT * FROM nguoidung WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                // Kiểm tra xem có dòng dữ liệu trả về không
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $usernameCu = $row['username'];
                    $password = $row['password'];
                    $email = $row['email'];
                    if (isset($_POST['save'])) {
                        $usernameMoi = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $maNV = $_POST['tenNV'];
                        if (isset($_POST['loaiNguoiDung'])) {
                            if ($_POST['loaiNguoiDung'] == 'Nhân viên') {
                                $role = 0;
                            } else {
                                $role = 1;
                            }
                        } else {
                            // Xử lý khi không có lựa chọn nào được chọn
                            // Ví dụ: Gán giá trị mặc định cho biến $role
                            $role = 0;
                        }
                        // Cập nhật dữ liệu thể loại trong CSDL
                        $updateSql = "UPDATE nguoidung SET username = '$usernameMoi', password = '$password', email='$email', role=$role, MaNhanVien='$maNV' WHERE username = '$usernameCu'";
                        $updateResult = mysqli_query($conn, $updateSql);
                        if ($updateResult) {
                            echo '<script>
                                    alert("Chỉnh sửa người dùng thành công. Vui lòng bấm OK!!!");
                                    setTimeout(function() {
                                        window.location.href = "./hienThiTK.php";
                                    }, 500);
                                </script>';
                        } else {
                            echo "<p align='center'>Cập nhật thất bại. Vui lòng thử lại!</p>";
                        }
                    }
            ?>
                    <form action="" method="POST">
                        <table>
                            <thead>
                                <th colspan="2" align="center">CẬP NHẬT NGƯỜI DÙNG</th>
                            </thead>
                            <tr>
                                <td>Tên tài khoản:</td>
                                <td><input type="text" name="username" id="" value='<?php echo $username ?>'></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu:</td>
                                <td><input type="text" name="password" id="" style="width:300px" value='<?php echo $password ?>'>
                                </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" id="" value='<?php echo $email ?>'></td>
                            </tr>
                            <tr>
                                <td>Tên nhân viên:</td>
                                <td>
                                    <select name="tenNV" id="">
                                        <?php
                                        foreach ($NhanVienList as $maNhanVien => $tenNhanVien) {
                                            echo "<option value='$maNhanVien'>$tenNhanVien</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Loại người dùng:</td>
                                <td><input type="radio" name="loaiNguoiDung" id="" value="Admin">Admin
                                    <input type="radio" name="loaiNguoiDung" id="" value="Nhân viên">Nhân viên
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input name="save" type="submit" value="Lưu"></td>
                            </tr>
                        </table>
                    </form>
            <?php
                } else {
                    echo "<p align='center'>Không tìm thấy người dùng.</p>";
                }
            } else {
                echo "<p align='center'>Vui lòng cung cấp ID người dùng để sửa.</p>";
            }
            ?>
            <p>
                <a href="hienThitk.php">Quay lại danh sách người dùng</a>
            </p>
        </div>
    </div>
</body>

</html>