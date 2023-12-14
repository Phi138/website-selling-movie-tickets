<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA GIÁ VÉ</title>
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
                // Lấy dữ liệu bảng Loại vé
                $sql = "SELECT * FROM loaive";
                $result = mysqli_query($conn, $sql);
                $loaiVeList = array();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $loaiVeList[$row['Maloaive']] = $row["Tenloaive"];
                    }
                }
                // Kiểm tra xem có ID được truyền vào không
                if(isset($_GET['MaGiaVe'])) {
                    // Lấy ID từ tham số URL
                    $MaPhim = $_GET['MaGiaVe'];
                    // Truy vấn CSDL để lấy thông tin thể loại với MaPhim tương ứng
                    $sql = "SELECT * FROM giave WHERE MaGiaVe = '$MaPhim'";
                    $result = mysqli_query($conn, $sql);
                    // Kiểm tra xem có dòng dữ liệu trả về không
                    if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $maGV = $row['MaGiaVe'];
                        $giaVe = $row['GiaVe'];
                        if(isset($_POST['save'])) {
                            $giaVe=$_POST['giaVe'];
                            $maLV=$_POST['loaiVe'];
                            // Cập nhật dữ liệu thể loại trong CSDL
                            $updateSql = "UPDATE giave SET GiaVe = '$giaVe', MaLoaiVe = '$maLV' WHERE MaGiaVe = '$maGV'";
                            $updateResult = mysqli_query($conn, $updateSql);
                            if($updateResult) {
                                echo '<script>
    alert("Chỉnh sửa giá vé thành công. Vui lòng bấm OK!!!");
    setTimeout(function() {
        window.location.href = "./hienThiGV.php";
    }, 500);
</script>';
                            } else {
                                echo "<p align='center'>Cập nhật thất bại. Vui lòng thử lại!</p>";
                            }
                        }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <thead><th colspan="2" align="center">SỬA GIÁ VÉ</th></thead>
                    <tr>
                        <td>Mã giá vé:</td>
                        <td><input disabled type="text" name="maGV" id="" value="<?php echo $maGV; ?>"></td>
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
                        <td><input type="text" name="giaVe" id="" value="<?php echo $giaVe; ?>"></td>
                    </tr>
                    <tr><td colspan="2" align="center"><input name="save" type="submit" value="Lưu"></td></tr>
                </table>
            </form>
            <?php
                    } else {
                        echo "<p align='center'>Không tìm thấy giá vé.</p>";
                    }
                } else {
                    echo "<p align='center'>Vui lòng cung cấp ID giá vé để sửa.</p>";
                }
            ?>
            <p>
                <a href="hienThiGV.php">Quay lại danh sách giá vé</a>
            </p>
        </div>
    </div>
</body>
</html>