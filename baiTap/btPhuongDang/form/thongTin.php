<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $monHoc = "";
    if (isset($_POST['php']))
        $monHoc .= "PHP & MySQL, ";
    if (isset($_POST['c']))
        $monHoc .= "C#, ";
    if (isset($_POST['XML']))
        $monHoc .= "XML, ";
    if (isset($_POST['python']))
        $monHoc .= "Python";
    ?>
    <h3>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h3>
    <p>Họ tên: <?php echo $_POST['hoten']; ?></p>
    <p>Giới tính: <?php echo $_POST['gioitinh']; ?></p>
    <p>Địa chỉ: <?php echo $_POST['diachi']; ?></p>
    <p>Điện thoại: <?php echo $_POST['sdt']; ?></p>
    <p>Quốc tịch: <?php echo $_POST['quoctich']; ?></p>
    <p>Môn học: <?php echo $monHoc; ?></p>
    <p>Ghi chú: <?php echo $_POST['ghichu']; ?></p>
    <tr>
        <td><a href="javascript:window.history.back(-1);">Tro ve trang truoc</a></td>
    </tr>
</body>

</html>