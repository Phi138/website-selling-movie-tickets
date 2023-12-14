<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phim</title>
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
            // Kiểm tra kết nối
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }
            // Lấy dữ liệu bảng Quốc gia
            $sql = "SELECT * FROM quocgia";
            $result = mysqli_query($conn, $sql);
            $quocGiaList = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $quocGiaList[$row['MaQuocgia']] = $row["TenQuocGia"];
                }
            }
            // Lấy dữ liệu bảng Thể loại
            $sql = "SELECT * FROM theloai";
            $result = mysqli_query($conn, $sql);
            $theLoaiList = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $theLoaiList[$row['MaTL']] = $row["TenTL"];
                }
            }
            //Tăng mã phim tự động
            $query = "SELECT MaPhim FROM phim ORDER BY MaPhim DESC LIMIT 1";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $lastMaPhim = $row['MaPhim'];

                // Trích xuất phần số từ mã hiện có
                $numericPart = intval(substr($lastMaPhim, 2));

                // Tăng giá trị số lên 1
                $numericPart++;

                // Tạo mã mới dựa trên giá trị số đã tăng
                $newMaPhim = "P" . str_pad($numericPart, 3, '0', STR_PAD_LEFT);
            } else {
                $newMaPhim = "P001";
            }
            // Xử lý khi nhấn nút thêm phim
            if (isset($_POST['them'])) {
                $maPhim = $newMaPhim;
                $tenPhim = $_POST['tenPhim'];
                $matheLoai = $_POST['theLoai'];
                $maquocGia = $_POST['quocGia'];
                $moTa = $_POST['moTa'];
                $ngayKhoiChieu = $_POST['ngayKhoiChieu'];
                $thoiLuong = $_POST['thoiLuong'];
                $hinhAnh = $_FILES['hinhAnh']['name'];
                $banner = $_FILES['banner']['name'];
                $trailer = $_FILES['trailer']['name'];
                // Kiểm tra xem mã phim đã tồn tại trong cơ sở dữ liệu chưa
                $checkSql = "SELECT MaPhim FROM phim WHERE MaPhim = '$maPhim'";
                $result = mysqli_query($conn, $checkSql);
                if (mysqli_num_rows($result) > 0) {
                    // Mã sữa đã tồn tại, hiển thị thông báo
                    echo "Mã phim đã tồn tại trong cơ sở dữ liệu.\n";
                } else {
                    // Thực hiện truy vấn để thêm thể loại vào cơ sở dữ liệu
                    $sql = "INSERT INTO phim (MaPhim, TenPhim, MaTL, MaQuocGia, Mota, ngaykhoichieu, thoiluong, banner, Anh, Trailer) VALUES
                        ('$maPhim', '$tenPhim', '$matheLoai', '$maquocGia', '$moTa', '$ngayKhoiChieu', '$thoiLuong', '$banner', '$hinhAnh', '$trailer')";
                    if (mysqli_query($conn, $sql)) {
                        $quayLai = true;
                    } else {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
                }
            }
            // Đóng kết nối
            mysqli_close($conn);
            // Upload Hình ảnh
            if (isset($_FILES['hinhAnh']) != NULL) {
                $errors = array();
                $file_name = $_FILES['hinhAnh']['name'];
                $file_size = $_FILES['hinhAnh']['size'];
                $file_tmp = $_FILES['hinhAnh']['tmp_name'];
                $file_type = $_FILES['hinhAnh']['type'];
                $duoifile = explode('.', $_FILES['hinhAnh']['name']);
                $file_ext = strtolower(end($duoifile));
                $expensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "Không chấp nhận file Hình Ảnh có đuôi này, vui lòng chọn JPEG hoặc PNG. ";
                }
                if ($file_size > 2097152) {
                    $errors[] = 'Kích thước file nên là 2MB\n';
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "../hinhPhim/" . $file_name);
                    echo "Upload hình ảnh THÀNH CÔNG!!!";
                } else {
                    print_r($errors);
                }
            }
            // Upload Banner
            if (isset($_FILES['banner']) != NULL) {
                $errors = array();
                $file_name = $_FILES['banner']['name'];
                $file_size = $_FILES['banner']['size'];
                $file_tmp = $_FILES['banner']['tmp_name'];
                $file_type = $_FILES['banner']['type'];
                $duoifile = explode('.', $_FILES['banner']['name']);
                $file_ext = strtolower(end($duoifile));
                $expensions = array("jpeg", "jpg", "png");
                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "Không chấp nhận Banner có đuôi này, vui lòng chọn JPEG hoặc PNG. ";
                }
                if ($file_size > 2097152) {
                    $errors[] = 'Kích thước file nên là 2MB\n';
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "../hinhPhim/" . $file_name);
                    echo "Upload banner THÀNH CÔNG!!!";
                } else {
                    print_r($errors);
                }
            }
            // Upload Trailer
            if (isset($_FILES['trailer']) != NULL) {
                $errors = array();
                $file_name = $_FILES['trailer']['name'];
                $file_size = $_FILES['trailer']['size'];
                $file_tmp = $_FILES['trailer']['tmp_name'];
                $file_type = $_FILES['trailer']['type'];
                $duoifile = explode('.', $_FILES['trailer']['name']);
                $file_ext = strtolower(end($duoifile));
                $expensions = array("mp4");
                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "Không chấp nhận file trailer với phần mở rộng này, hãy chọn file có đuôi MP4. ";
                }
                if ($file_size > 30971520) {
                    $errors[] = 'Kích thước file nên là 30MB.\n';
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "../hinhPhim/" . $file_name);
                    echo "Upload trailer THÀNH CÔNG!!!";
                } else {
                    print_r($errors);
                }
            }
            ?>

            <?php if (isset($quayLai) && $quayLai) : ?>
                <p>Phim đã được thêm thành công.</p>
                <p>
                    <a href="phim.php">Quay lại danh sách phim</a>
                </p>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                        <th colspan="2" align="center">THÊM PHIM</th>
                    </thead>
                    <tr>
                        <td>Mã phim:</td>
                        <td><input type="text" name="maPhim" id="" value="<?php echo $newMaPhim ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Tên phim:</td>
                        <td><input type="text" name="tenPhim" id="" style="width:300px"></td>
                    </tr>
                    <tr>
                        <td>Ngày khởi chiếu:</td>
                        <td><input type="date" name="ngayKhoiChieu" id=""></td>
                    </tr>
                    <tr>
                        <td>Mô tả:</td>
                        <td><textarea name="moTa" id="" cols="50" rows="7"></textarea></td>
                    </tr>
                    <tr>
                        <td>Quốc gia:</td>
                        <td>
                            <select name="quocGia" id="">
                                <?php
                                foreach ($quocGiaList as $maQuocGia => $tenQuocGia) {
                                    echo "<option value='$maQuocGia'>$tenQuocGia</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Thể loại:</td>
                        <td>
                            <select name="theLoai" id="">
                                <?php
                                foreach ($theLoaiList as $matheLoai => $tentheLoai) {
                                    echo "<option value='$matheLoai'>$tentheLoai</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Thời lượng:</td>
                        <td><input type="time" name="thoiLuong" id="" style="width:100px"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh:</td>
                        <td><input type="file" name="hinhAnh" id=""></td>
                    </tr>
                    <tr>
                        <td>Banner:</td>
                        <td><input type="file" name="banner" id=""></td>
                    </tr>
                    <tr>
                        <td>Trailer:</td>
                        <td><input type="file" name="trailer" id=""></td>
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