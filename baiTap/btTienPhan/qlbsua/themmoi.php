<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            background-color: #CE5A67;
            display:block;
            border: 1px solid black;
            text-align: center;
            color: #fff;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #F875AA;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #CE5A67;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #F4BF96;
        }
    </style>
<body>
<?php
require('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masua = $_POST['masua'];
    $tensua = $_POST['tensua'];
    $mahangsua = $_POST['mahangsua'];
    $tenloai = $_POST['tenloai'];
    $trongluong = $_POST['trongluong'];
    $dongia = $_POST['dongia'];
    $thanhphandinhduong = $_POST['thanhphandinhduong'];
    $loiich = $_POST['loiich'];
    if (isset($_FILES['hinhanh']) != NULL) {
        $errors = array();
        $file_name = $_FILES['hinhanh']['name'];
        $file_size = $_FILES['hinhanh']['size'];
        $file_tmp = $_FILES['hinhanh']['tmp_name'];
        $file_type = $_FILES['hinhanh']['type'];
        $file_ext = @strtolower(end(explode('.', $_FILES['hinhanh']['name'])));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Không chấp nhận các tệp hình ảnh với phần mở rộng này, vui lòng chọn JPEG hoặc PNG.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'Kích thước tệp nên là 2MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "C:/xampp/htdocs/qlbsua/Hinh_sua/" . $file_name);
            echo "Thêm ảnh thành công";
        } else {
            print_r($errors);
        }
    }
    
    // Kiểm tra xem mã hãng sữa tồn tại trong bảng hang_sua hay không
    $queryHangSua = "SELECT Ma_hang_sua FROM hang_sua WHERE Ma_hang_sua = '$mahangsua'";
    $resultHangSua = mysqli_query($conn, $queryHangSua);
    if (mysqli_num_rows($resultHangSua) == 0) {
        echo "Mã hãng sữa không tồn tại.";
        exit;
    }
    
    // Kiểm tra xem tên loại sữa tồn tại trong bảng loai_sua hay không
    $queryLoaiSua = "SELECT Ma_loai_sua FROM loai_sua WHERE Ma_loai_sua = '$tenloai'";
    $resultLoaiSua = mysqli_query($conn, $queryLoaiSua);
    if (mysqli_num_rows($resultLoaiSua) == 0) {
        echo "Tên loại sữa không tồn tại.";
        exit;
    }
    
    // Thực hiện câu truy vấn INSERT vào bảng sua
    $query = "INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh)
              VALUES ('$masua', '$tensua', '$mahangsua', '$tenloai', '$trongluong', '$dongia', '$thanhphandinhduong', '$loiich', '$file_name')";
              
    if (mysqli_query($conn, $query)) {
        echo "Thêm sữa mới thành công.";
    } else {
        echo "Có lỗi xảy ra khi thêm sữa mới: " . mysqli_error($conn);
    }
}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <h1>Thêm sữa mới</h1>
    <label for="masua">Mã sữa:</label>
    <input type="text" name="masua" value="" required><br><br>
    <label for="tensua">Tên sữa:</label>
    <input type="text" id="tensua" name="tensua" value="" required><br><br>
    <label for="mahangsua">Hãng Sữa:</label>
    <select name="mahangsua">
        <option value="AB">Abbott</option>
        <option value="DL">Dutch Lady</option>
        <option value="DM">Dumex</option>
        <option value="DS">Daisy</option>
        <option value="MJ">Mead Jonhson</option>
        <option value="MJ">Nutifoodc</option>
        <option value="VNM">Vinamilk</option>
    </select>
    <br><br>
    <label for="maloaisua">Loại sữa:</label>
    <select name="tenloai">
        <option value="SB">Sữa bột</option>
        <option value="SC">Sữa chua</option>
        <option value="SD">Sữa đặc</option>
        <option value="ST">Sữa tươi</option>
    </select>
    <br><br>
    <label for="trongluong">Trọng lượng:</label>
    <input type="text" id="trongluong" name="trongluong" required><br><br>
    <label for="dongia">Đơn giá:</label>
    <input type="text" id="dongia" name="dongia" required><br><br>
    <label for="thanhphandinhduong">Thành phần dinh dưỡng:</label>
    <textarea id="thanhphandinhduong" name="thanhphandinhduong" required></textarea><br><br>
    <label for="loiich">Lợi ích:</label>
    <textarea id="loiich" name="loiich" required></textarea><br><br>
    <label for="hinhanh">Hình ảnh:</label>
    <input type="file" id="hinhanh" name="hinhanh" required><br><br>
    <input type="submit" name="submit" value="Thêm">
</form>
</body>
</html>