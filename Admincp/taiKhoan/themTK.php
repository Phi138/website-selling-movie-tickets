<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $account = "web_cinema";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $account);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "";
            // Kiểm tra kết nối
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }

            // Lấy dữ liệu bảng nhân viên
            $sql = "SELECT * FROM nhanvien";
            $result = mysqli_query($conn, $sql);
            $NhanVienList = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $NhanVienList[$row['MaNhanVien']] = $row["TenNhanVien"];
                }
            }

            // Xử lý khi nhấn nút thêm tài khoản
            if (isset($_POST['them'])) {
                $tenTK = $_POST['tenTK'];
                $matKhau = $_POST['matKhau'];
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
                // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu chưa
                $checkSql = "SELECT username FROM nguoidung WHERE username = '$tenTK'";
                $result = mysqli_query($conn, $checkSql);
                if (mysqli_num_rows($result) > 0) {
                    // Tên người dùng đã tồn tại, hiển thị thông báo
                    echo "Tên người dùng đã tồn tại trong cơ sở dữ liệu.\n";
                } else {
                    // Thực hiện truy vấn để thêm thể loại vào cơ sở dữ liệu
                    $sql = "INSERT INTO nguoidung (username, password, email, role, MaNhanVien) VALUES
                ('$tenTK', '$matKhau', '$email', $role, '$maNV')";
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
                <p>Tài khoản đã được thêm thành công.</p>
                <p>
                    <a href="hienThiTK.php">Quay lại danh sách tài khoản</a>
                </p>
            <?php endif; ?>

            <form action="" method="POST">
                <table>
                    <thead>
                        <th colspan="2" align="center">THÊM TÀI KHOẢN</th>
                    </thead>
                    <tr>
                        <td>Tên tài khoản:</td>
                        <td><input type="text" name="tenTK" id=""></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu:</td>
                        <td><input type="text" name="matKhau" id="" style="width:300px"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" id=""></td>
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
                        <td colspan="2" align="center"><input name="them" type="submit" value="Thêm mới"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>