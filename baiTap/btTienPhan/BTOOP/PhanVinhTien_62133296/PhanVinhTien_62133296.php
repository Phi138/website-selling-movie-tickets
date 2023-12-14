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
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <?php 
        $SinhVien = array(
            array("Mã SV" => "6213341", "Họ tên" => "Nguyễn Minh Anh", "Ngày sinh" => "2002-08-09", "Mã lớp" => "62.CNTT-1", "Giới tính" => "Nữ"),
            array("Mã SV" => "6210123", "Họ tên" => "Trần Anh Tú", "Ngày sinh" => "2002-05-21", "Mã lớp" => "62.CNTT-1", "Giới tính" => "Nam"),
            array("Mã SV" => "6211012", "Họ tên" => "Nguyễn Ngọc Thanh", "Ngày sinh" => "2002-02-30", "Mã lớp" => "62.CNTT-2", "Giới tính" => "Nam"),
            array("Mã SV" => "6210123", "Họ tên" => "Lê Phương Thảo", "Ngày sinh" => "2001-10-15", "Mã lớp" => "62.CNTT-2", "Giới tính" => "Nữ"),
            
        );
        function luusv($SinhVien) {
            $file = fopen("PhanVinhTien_62133296.dat", "w");
            if ($file) {
                foreach ($SinhVien as $sv) {
                    fputcsv($file, $sv);
                }
                fclose($file);
                echo "Lưu sinh viên vào file thành công!";
            } else {
                echo "Không thể mở tệp để lưu dữ liệu.";
            }
        }
        if(isset($_POST['themsv'])) {
            $malop = $_POST['malop'];
            $gioitinh = $_POST['gioitinh'];
            $masv = $_POST['masv'];
            $hoten = $_POST['hoten'];
            $ngaysinh = $_POST['ngaysinh'];
            
            if(empty($malop) || empty($gioitinh) || empty($masv) || empty($hoten) || empty($ngaysinh)) {
                echo "Vui lòng nhập đầy đủ thông tin của sinh viên!";
            } else {
                if(!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $ngaysinh)) {
                    echo "Ngày sinh không đúng định dạng yyyy-mm-dd!";
                } else {
                    $sv = array("Mã SV" => $masv, "Họ tên" => $hoten, "Ngày sinh" => $ngaysinh, "Mã lớp" => $malop, "Giới tính" => $gioitinh);
                    array_push($SinhVien, $sv);
                    echo "Thêm sinh viên thành công!";
                }
            }
        }
        if (isset($_POST["luusv"])) {
            $maLop = $_POST["malop"];
            $maSV = $_POST["masv"];
            $hoTenSV = $_POST["hoten"];
            $gioiTinh = $_POST["gioitinh"];
            $ngaySinh = $_POST["ngaysinh"];
            $fileName = "PhanVinhTien_62133296.dat";
            $file = fopen($fileName, "a");
            if (!$file) {
              echo "<script>alert('Không thể mở hoặc tạo tệp');</script>";
            } else {
              // Tạo dòng dữ liệu mới chứa thông tin sinh viên
              $newStudentData = "$maLop, $maSV, $hoTenSV, $gioiTinh, $ngaySinh";
        
              // Ghi dòng dữ liệu vào tệp
              fwrite($file, $newStudentData . PHP_EOL);
        
              // Đóng tệp
              fclose($file);
        
              echo "<script>alert('Lưu sinh viên vào file thành công');</script>";
            }
          }
        function hienthiSV($students) {
            echo '<h2>Danh sách sinh viên</h2>';
            echo '<table border="1">';
            echo '<tr><th>Mã SV</th><th>Họ tên</th><th>Ngày sinh</th><th>Mã lớp</th><th>Giới tính</th></tr>';
            foreach ($students as $student) {
                echo '<tr>';
                echo '<td>' . $student["Mã SV"] . '</td>';
                echo '<td>' . $student["Họ tên"] . '</td>';
                echo '<td>' . $student["Ngày sinh"] . '</td>';
                echo '<td>' . $student["Mã lớp"] . '</td>';
                echo '<td>' . $student["Giới tính"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        if (!empty($SinhVien)) {
            hienthiSV($SinhVien);
        }

    ?>
    <form method="POST" action="">
        <h2>Thông tin sinh viên</h2>
        <table border = '0'>
            <tr>
                <td>Mã lớp</td>
                <td>
                <select name="malop" value="malop">
                    <option value="62.CNTT-1"<?php if(isset($_POST['malop']) && $_POST['malop'] == "62.CNTT1") ?>>62.CNTT-1</option>
                    <option value="62.CNTT-2"<?php if(isset($_POST['malop']) && $_POST['malop'] == "62.CNTT2") ?>>62.CNTT-2</option>
                    <option value="62.CNTT-3"<?php if(isset($_POST['malop']) && $_POST['malop'] == "62.CNTT3") ?>>62.CNTT-3</option>
                </select>
                </td>
            </tr>
            <tr>
                    <td>Mã SV </td>
                    <td><input type="text" name="masv" value="<?php if(isset($_POST['masv'])) echo $_POST['masv'];?>"/></td>
            </tr>
            <tr>
                    <td>Họ Tên:</td>
                    <td><input type="text" name="hoten" value="<?php if(isset($_POST['hoten'])) echo $_POST['hoten'];?>"/></td>
            </tr>
            <tr>
                    <td>Giới tính:</td>
                    <td>
                    <input type="radio" name="gioitinh" value="Nam" <?php if(isset($_POST['gioitinh']) && $_POST['gioitinh'] == "Nam") echo 'checked'?>/>Nam
                    <input type="radio" name="gioitinh" value="Nữ" <?php if(isset($_POST['gioitinh']) && $_POST['gioitinh'] == "Nữ") echo 'checked'?>/>Nữ
                    </td>
                    
            </tr>
            <tr>
                    <td>Ngày sinh:</td>
                    <td><input type="text" name="ngaysinh" value="<?php if(isset($_POST['ngaysinh'])) echo $_POST['ngaysinh'];?>"/></td>
            </tr>
        </table>
            
            <input type="submit" name="luusv" value="Lưu SV vào file">
            <input type="submit" name="themsv" value="Thêm SV">
    </form>
</body>
</html>