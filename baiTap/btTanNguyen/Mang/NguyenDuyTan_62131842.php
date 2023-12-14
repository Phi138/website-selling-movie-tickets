<?php
session_start();
if (!isset($_SESSION['SinhVien'])) {
    $_SESSION['SinhVien'] = array();
}
if (isset($_POST['them_sv'])) {
    $ma_lop = $_POST['ma_lop'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $ma_sv = $_POST['ma_sv'];
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    if ($ma_lop == "" || $gioi_tinh == "" || $ma_sv == "" || $ho_ten == "" || $ngay_sinh == "") {
        echo "Vui lòng nhập đầy đủ thông tin";
    } else {
        // Kiểm tra định dạng ngày sinh
        if (!DateTime::createFromFormat('Y-m-d', $ngay_sinh)) {
            echo "Ngày sinh không hợp lệ. Vui lòng nhập theo định dạng yyyy-mm-dd";
        } else {
            $sinh_vien = array($ma_lop, $gioi_tinh, $ma_sv, $ho_ten, $ngay_sinh);
            array_push($_SESSION['SinhVien'], $sinh_vien);
            echo "Thêm sinh viên thành công";
        }
    }
}
if (isset($_POST['luu_sv'])) {
    $file_name = "NguyenDuyTan_62131842.dat";
    $file_content = '';
    foreach ($_SESSION['SinhVien'] as $sinh_vien) {
        $file_content .= implode(",", $sinh_vien) . "\n";
    }
    if (file_put_contents($file_name, $file_content) === false) {
        echo "Lỗi khi lưu sinh viên vào file";
    } else {
        echo "Lưu danh sách sinh viên vào file thành công";
    }
    $daLuu = true;
}
if (isset($_POST['xoa_sv'])) {
    $index = $_POST['index'];
    if (isset($_SESSION['SinhVien'][$index])) {
        unset($_SESSION['SinhVien'][$index]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form nhập thông tin sinh viên</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
    }
    h1 {
        text-align: center;
        color: #333;
        padding-top: 20px;
    }
    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }
    label {
        display: block;
        margin-bottom: 10px;
        color: #555;
    }
    input[type="text"],
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="radio"] {
        margin-right: 5px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<p>Bài tập của em <br> Khi thêm sinh viên hết vào tất cả danh sách rồi <br>thì sẻ cần phải nhập thông tin một người nửa rồi nhấn <br> lưu file nhưng mà sẻ không bị ghi thêm sinh viên cuối vào đó vì trên php có lệnh if không để trống</p>

    <h1>Form nhập thông tin sinh viên</h1>
    <form method="POST" action="">
        <label for="ma_lop">Mã lớp:</label>
        <select id="ma_lop" name="ma_lop">
            <option value="62.CNTT-1">62.CNTT-1</option>
            <option value="62.CNTT-2">62.CNTT-2</option>
            <option value="62.CNTT-3">62.CNTT-3</option>
        </select>
        <br><br>
        <label for="gioi_tinh">Giới tính:</label>
        <input type="radio" id="gioi_tinh" name="gioi_tinh" value="Nam"> Nam
        <input type="radio" id="gioi_tinh" name="gioi_tinh" value="Nữ"> Nữ
        <br><br>
        <label for="ma_sv">Mã sinh viên:</label>
        <input type="text" id="ma_sv" name="ma_sv" required>
        <br><br>
        <label for="ho_ten">Họ tên sinh viên:</label>
        <input type="text" id="ho_ten" name="ho_ten" required>
        <br><br>
        <label for="ngay_sinh">Ngày sinh:</label>
        <input type="text" id="ngay_sinh" name="ngay_sinh" placeholder="yyyy-mm-dd" required>
        <br><br>
        <input type="submit" name="them_sv" value="Thêm SV">
        <input type="submit" name="luu_sv" value="Lưu SV vào file">
    </form>
    <h2>Danh sách sinh viên:</h2>
    <table>
        <tr>
            <th>Mã lớp</th>
            <th>Giới tính</th>
            <th>Mã sinh viên</th>
            <th>Họ tên sinh viên</th>
            <th>Ngày sinh</th>
            <th>Xóa</th>
        </tr>
        <?php
        foreach ($_SESSION['SinhVien'] as $index => $sinh_vien) {
            echo "<tr>";
            echo "<td>".$sinh_vien[0]."</td>";
            echo "<td>".$sinh_vien[1]."</td>";
            echo "<td>".$sinh_vien[2]."</td>";
            echo "<td>".$sinh_vien[3]."</td>";
            echo "<td>".$sinh_vien[4]."</td>";
            echo "<td>
                <form method='POST' action=''>
                    <input type='hidden' name='index' value='".$index."'>
                    <input type='submit' name='xoa_sv' value='Xóa'>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>alert('Thêm sinh viên thành công');</script>

</body>
</html>