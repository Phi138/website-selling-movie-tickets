<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA PHIM</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h2{
            color: blue;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 600px;
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
                // Kiểm tra xem có ID được truyền vào không
                if(isset($_GET['MaPhim'])) {
                    // Lấy ID từ tham số URL
                    $MaPhim = $_GET['MaPhim'];
                    // Truy vấn CSDL để lấy thông tin thể loại với MaPhim tương ứng
                    $sql = "SELECT * FROM phim WHERE MaPhim = '$MaPhim'";
                    $result = mysqli_query($conn, $sql);
                    // Kiểm tra xem có dòng dữ liệu trả về không
                    if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $maPhim = $row['MaPhim'];
                        $tenPhim = $row['TenPhim'];
                        $thoiLuong=$row['thoiluong'];
                        $ngayKhoiChieu = $row['ngaykhoichieu'];
                        $moTa= $row['Mota'];
                        // $hinhAnh= $row['Anh'];
                        // $banner= $row['banner'];
                        // $trailer= $row['Trailer'];
                        // Xử lý khi người dùng nhấn nút "Lưu"
                        if(isset($_POST['save'])) {
                            $tenPhim = $_POST['tenPhim'];
                            $thoiLuong=$_POST['thoiLuong'];
                            $ngayKhoiChieu = $_POST['ngayKhoiChieu'];
                            $moTa= $_POST['moTa'];
                            $quocGia=$_POST['quocGia'];
                            $theLoai=$_POST['theLoai'];
                            // Cập nhật dữ liệu thể loại trong CSDL
                            $updateSql = "UPDATE phim SET TenPhim = '$tenPhim', thoiluong = '$thoiLuong',
                            ngaykhoichieu='$ngayKhoiChieu', Mota='$moTa', MaQuocGia='$quocGia',
                            MaTL='$theLoai' WHERE MaPhim = '$maPhim'";
                            $updateResult = mysqli_query($conn, $updateSql);
                            if($updateResult) {
                                echo '<script>
    alert("Chỉnh sửa phim thành công. Vui lòng bấm OK!!!");
    setTimeout(function() {
        window.location.href = "./phim.php";
    }, 500);
</script>';
                            } else {
                                echo "<p align='center'>Cập nhật thất bại. Vui lòng thử lại!</p>";
                            }
                        }
            ?>
            <form align="" method="POST">
                <table>
                    <thead><th colspan="2" align="center">CHỈNH SỬA PHIM</th></thead>
                    <tr>
                        <td>Mã phim:</td>
                        <td><input disabled type="text" name="maPhim" id="" value="<?php echo $maPhim; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tên phim:</td>
                        <td><input type="text" name="tenPhim" id="" style="width:300px" value="<?php echo $tenPhim; ?>"></td>
                    </tr>
                    <tr>
                        <td>Ngày khởi chiếu:</td>
                        <td><input type="date" name="ngayKhoiChieu" id="" value="<?php echo $ngayKhoiChieu; ?>"></td>
                    </tr>
                    <tr>
                        <td>Mô tả:</td>
                        <td><textarea name="moTa" id="" cols="50" rows="7"><?php echo $moTa; ?></textarea></td>
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
                        <td><input type="time" name="thoiLuong" id=""  style="width:100px" value="<?php echo $thoiLuong;?>"></td>
                    </tr>
                    <!-- <tr>
                        <td>Hình ảnh:</td>
                        <td><input type="file" name="hinhAnh" id="" value="<?php echo $hinhAnh;?>"></td>
                    </tr>
                    <tr>
                        <td>Banner:</td>
                        <td><input type="file" name="banner" id="" value="<?php echo $banner;?>"></td>
                    </tr>  
                    <tr>
                        <td>Trailer:</td>
                        <td><input type="file" name="trailer" id="" value="<?php echo $trailer;?>"></td>
                    </tr> -->
                    <tr><td colspan="2" align="center"><input name="save" type="submit" value="Lưu"></td></tr>
                </table>
            </form>
            <?php
                    } else {
                        echo "<p align='center'>Không tìm thấy thể loại.</p>";
                    }
                } else {
                    echo "<p align='center'>Vui lòng cung cấp ID thể loại để sửa.</p>";
                }
            ?>
            <p>
                <a href="phim.php">Quay lại danh sách phim</a>
            </p>
        </div>
    </div>
</body>
</html>