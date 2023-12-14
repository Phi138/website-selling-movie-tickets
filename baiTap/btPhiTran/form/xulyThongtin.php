<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XU LY THONG TIN</title>
    <style>
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        $monHoc="";
        if(isset($_POST['php']))
            $monHoc.="PHP & MySQL, ";
        if(isset($_POST['c']))
        $monHoc.="C#, ";
        if(isset($_POST['XML']))
        $monHoc.="XML, ";
        if(isset($_POST['python']))
            $monHoc.="Python";
    ?>
    <h3>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h3>
    <p>Họ tên: <?php echo $_POST['hoTen']; ?></p>
    <p>Giới tính: <?php echo $_POST['rdGioiTinh']; ?></p>
    <p>Địa chỉ: <?php echo $_POST['diaChi']; ?></p>
    <p>Điện thoại: <?php echo $_POST['sdt']; ?> </p>
    <p>Quốc tịch: <?php echo $_POST['quocTich']; ?> </p>
    <p>Môn học: <?php echo $monHoc ?></p>
    <p>Ghi chú: <?php echo $_POST['ghiChu'] ?></p>
    <p><a href="javascript:window.history.back(-1);">Trở về trang trước</a></p>
</body>
</html>