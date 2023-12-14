<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 400px;
            background-color: #EEEDED;
            margin: 0 auto; /* Căn giữa bảng theo chiều ngang */
            margin-bottom: 10px;
            border: 1px solid #3085C3;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #3085C3;
            color: white;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
        }
        input[type="submit"] {
            background-color: white;
            color: #3085C3;
            border: 1px solid #3085C3;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #3085C3;
            color: white;
        }
        .muc{
            color: #3085C3;
        }
    </style>
</head>
<body>
    <?php
        // Kết nối vào cơ sở dữ liệu MySQL
        require("connect.php");

        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Truy vấn để lấy danh sách loại sữa từ bảng "loại sữa"
        $sql = "SELECT * FROM loai_sua";
        $result = mysqli_query($conn, $sql);

        // Tạo danh sách/menu loại sữa
        $loaiSuaList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loaiSuaList[$row['Ma_loai_sua']] = $row["Ten_loai"];
            }
        }
        $sql = "SELECT * FROM hang_sua";
        $result = mysqli_query($conn, $sql);

        // Tạo danh sách/menu loại sữa
        $hangSuaList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $hangSuaList[$row['Ma_hang_sua']] = $row["Ten_hang_sua"];
            }
        }

        if(isset($_POST['them'])){
            //Code thêm sửa mới
            $maSua = $_POST['maSua'];
            $tenSua = $_POST['tenSua'];
            $maHangSua = $_POST['hangSua'];
            $maLoaiSua = $_POST['loaiSua'];
            $trongLuong = $_POST['trongLuong'];
            $donGia = $_POST['donGia'];
            $tpDinhDuong = $_POST['tpDinhDuong'];
            $loiIch = $_POST['loiIch'];
            $hinhAnh = $_FILES['hinhAnh']['name'];

            // Kiểm tra xem mã sữa đã tồn tại trong cơ sở dữ liệu chưa
            $checkSql = "SELECT Ma_sua FROM sua WHERE Ma_sua = '$maSua'";
            $result = mysqli_query($conn, $checkSql);
            if (mysqli_num_rows($result) > 0) {
                // Mã sữa đã tồn tại, hiển thị thông báo
                echo "Mã sữa đã tồn tại trong cơ sở dữ liệu.";
            } else {
                // Thực hiện truy vấn để thêm thể loại vào cơ sở dữ liệu
                $sql = "INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh) VALUES
                ('$maSua', '$tenSua', '$maHangSua', '$maLoaiSua', '$trongLuong', '$donGia', '$tpDinhDuong', '$loiIch', '$hinhAnh')";
                if (mysqli_query($conn, $sql)) {
                    echo "Thêm sửa thành công!";

                    // // Chuyển hướng về trang danh sách thể loại sau khi thêm thành công
                    // header("Location: sua_phanTrang.php");
                    // exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }

        // Đóng kết nối
        mysqli_close($conn);



        if(isset($_FILES['hinhAnh'])!=NULL){
            $errors= array();
            $file_name = $_FILES['hinhAnh']['name'];
            $file_size =$_FILES['hinhAnh']['size'];
            $file_tmp =$_FILES['hinhAnh']['tmp_name'];
            $file_type=$_FILES['hinhAnh']['type'];
            $file_ext=@strtolower(end(explode('.',$_FILES['hinhAnh']['name'])));
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$expensions)=== false){
               $errors[]="Don't accept hinhAnh files with this extension, please choose JPEG or PNG.";
            }
            if($file_size > 2097152){
               $errors[]='File size should be 2MB';
              }
              if(empty($errors)==true){
                move_uploaded_file($file_tmp,"./Hinh_sua/".$file_name);
                echo "Upload File successfully!!!";
             }
            else{
               print_r($errors);
            }
         }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <thead><th colspan="2" align="center">THÊM SỮA MỚI</th></thead>
            <tr>
                <td>Mã sửa:</td>
                <td><input type="text" name="maSua" id="" ></td>
            </tr>
            <tr>
                <td>Tên sửa:</td>
                <td><input type="text" name="tenSua" id="" ></td>
            </tr>
            <tr>
                <td>Hãng sửa:</td>
                <td>
                    <select name="hangSua" id="">
                        <?php
                        foreach ($hangSuaList as $maHangSua => $tenHangSua) {
                            echo "<option value='$maHangSua'>$tenHangSua</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Loại sửa:</td>
                <td>
                    <select name="loaiSua" id="">
                        <?php
                        foreach ($loaiSuaList as $maLoaiSua => $tenLoaiSua) {
                            echo "<option value='$maLoaiSua'>$tenLoaiSua</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Trọng lượng:</td>
                <td><input type="text" name="trongLuong" id="" ></td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" name="donGia" id="" ></td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng:</td>
                <td><input type="text" name="tpDinhDuong" id="" ></td>
            </tr>
            <tr>
                <td>Lợi ích:</td>
                <td><input type="text" name="loiIch" id="" ></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td><input type="file" name="hinhAnh" id="" required></td>
            </tr>
            <tr><td colspan="2" align="center"><input name="them" type="submit" value="Thêm mới"></td></tr>
        </table>
    </form>
</body>
</html>