<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Chỉnh sửa thông tin khách hàng</title>
    <style>
        body {
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
            background-color: #B6FFFA;
            color: white;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: left;
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
    // Kiểm tra xem đã nhận được tham số Ma_khach_hang từ URL hay chưa
    if (isset($_GET['Ma_khach_hang'])) {
        // Lấy giá trị Ma_khach_hang từ URL
        $maKhachHang = $_GET['Ma_khach_hang'];

        // Kết nối CSDL
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
            or die('Could not connect to MySQL: ' . mysqli_connect_error());



        // Truy vấn thông tin khách hàng dựa trên Ma_khach_hang
        $sql = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$maKhachHang'";

        $result = mysqli_query($conn, $sql);

        // Kiểm tra xem có dữ liệu trả về hay không
        if (mysqli_num_rows($result) > 0) {
            // Lấy thông tin khách hàng từ kết quả truy vấn
            $rows = mysqli_fetch_assoc($result);

            // Lưu thông tin vào các biến tương ứng
            $tenKhachHang = $rows['Ten_khach_hang'];
            $gioiTinh = $rows['Phai'];
            $diaChi = $rows['Dia_chi'];
            $dienThoai = $rows['Dien_thoai'];
            $email = $rows['Email'];

            // Hiển thị biểu mẫu chỉnh sửa thông tin khách hàng
            echo '
            
            <form action="" method="post">
            <h1>Chỉnh sửa thông tin khách hàng</h1>
            <table>
            <input type="hidden" name="Ma_khach_hang" value="' . $maKhachHang . '">
                <tr>
                    <td for="ten_khach_hang">Tên khách hàng:</td>
                    <td><input type="text" name="ten_khach_hang" id="ten_khach_hang" value="' . $tenKhachHang . '"></td>
                    </tr>
                <tr>
                    <td for="phai">Giới tính:</td>
                    <td><input type="radio" name="phai" id="nam" value="nam" ' . ($gioiTinh == 'nam' ? 'checked' : '') . '> Nam
                    <input type="radio" name="phai" id="nu" value="nu" ' . ($gioiTinh == 'nu' ? 'checked' : '') . '> Nữ</td>
                </tr>
                <tr >
                    <td for="dia_chi">Địa chỉ:</td>
<td>                    <input style="width:200px" type="text" name="dia_chi" id="dia_chi" value="' . $diaChi . '"></td>
                </tr>
                <tr>
                    <td for="dien_thoai">Số điện thoại:</td>
                    <td><input type="text" name="dien_thoai" id="dien_thoai" value="' . $dienThoai . '"></td>
                </tr>
                <tr>
                    <td for="email">Email:</td>
                 <td>   <input type="email" name="email" id="email" value="' . $email . '"></td>
                </tr>
                <tr>
                <td colspan="2" style="padding-left:150px" ><input name="submit" type="submit"></input></td>
                </tr>
            </table>
                
            </form>';

            // Xử lý khi người dùng nhấn nút "Lưu"
            if (isset($_POST['submit'])) {


                //chỉnh sửa 
                $updateSql = "UPDATE 'khach_hang' SET 'T  en_khach_hang'='$_POST[ten_khach_hang]','Phai'='$_POST[phai]','Dia_chi'='$_POST[dia_chi]', 
'Dien_thoai'='$_POST[dien_thoai]','Email'='$_POST[email]'";
                $updateResult = mysqli_query($conn, $updateSql);

                if ($updateResult) {
                    echo "<p align='center'>Cập nhật thành công!</p>";

                    // Chuyển hướng về trang danh sách thể loại sau khi cập nhật thành công
                    header("Location: qlkhachhang.php");
                    exit();

                    // // Hiển thị dữ liệu đã cập nhật
                    // $maTheLoai = $newMaTheLoai;
                    // $tenTheLoai = $newTenTheLoai;
                } else {
                    echo "<p align='center'>Cập nhật thất bại. Vui lòng thử lại!</p>";
                }
            }
        } else {
            echo "Không tìm thấy thông tin khách hàng.";
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
    } else {
        echo "Lỗi: Không có thông tin khách hàng để chỉnh sửa.";
    }


    ?>

</body>

</html>