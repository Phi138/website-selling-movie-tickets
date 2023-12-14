<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giá vé</title>
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
                // Kiểm tra kết nối
                if (!$conn) {
                    die("Kết nối thất bại: " . mysqli_connect_error());
                }
                // Lấy dữ liệu bảng Loại vé
                $sql = "SELECT * FROM loaive";
                $result = mysqli_query($conn, $sql);
                $loaiVeList = array();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $loaiVeList[$row['Maloaive']] = $row["Tenloaive"];
                    }
                }
                // Xử lý khi nhấn nút thêm phim
                if(isset($_POST['them'])){
                    $maGV = $_POST['maGV'];
                    $giaVe = $_POST['giaVe'];
                    $maLoaiVe = $_POST['loaiVe'];
                    $err = ($giaVe < 0 ||  $giaVe > 420000 ) ? "Giá vé phải lớn hơn 0 và bé hơn 420000 nghìn đồng" : "";
                    // Kiểm tra xem mã phim đã tồn tại trong cơ sở dữ liệu chưa
                    $checkSql = "SELECT MaGiaVe FROM giave WHERE MaGiaVe = '$maGV'";
                    $result = mysqli_query($conn, $checkSql);
                    if (mysqli_num_rows($result) > 0) {
                        // Mã sữa đã tồn tại, hiển thị thông báo
                        echo "Mã giá vé đã tồn tại trong cơ sở dữ liệu.\n";
                     }else if(empty($err)) {
                        // Thực hiện truy vấn để thêm thể loại vào cơ sở dữ liệu
                        $sql = "INSERT INTO giave (MaGiaVe, MaLoaiVe, GiaVe) VALUES
                        ('$maGV', '$maLoaiVe', '$giaVe')";
                        if (mysqli_query($conn, $sql)) {
                            $quayLai=true;
                        } else {
                            echo "Lỗi: " . mysqli_error($conn);
                        }
                     }
                }
                // Đóng kết nối
                mysqli_close($conn);
            ?>
        
            <?php if (isset($quayLai) && $quayLai) : ?>
                <p>Giá vé đã được thêm thành công.</p>
                <p>
                    <a href="hienThiGV.php">Quay lại danh sách giá vé</a>
                </p>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead><th colspan="2" align="center">THÊM GIÁ VÉ</th></thead>
                    <tr>
                        <td>Mã giá vé:</td>
                        <td><input type="text" name="maGV" id="" ></td>
                    </tr>
                    <tr>
                        <td>Tên loại vé:</td>
                        <td>
                            <select name="loaiVe" id="">
                                <?php
                                foreach ($loaiVeList as $maLoaiVe => $tenLoaiVe) {
                                    echo "<option value='$maLoaiVe'>$tenLoaiVe</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Giá vé:</td>
                        <td><input type="text" name="giaVe" id="" ></td>
                        <p>
                            <?php
                            echo isset($err) ? $err :"";
                            ?>
                        </p>
                    </tr>
                    <tr><td colspan="2" align="center"><input name="them" type="submit" value="Thêm mới"></td></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>