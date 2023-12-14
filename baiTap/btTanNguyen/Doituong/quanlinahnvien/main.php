<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân Viên</title>
    <style>
        /* Định nghĩa các quy tắc CSS */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"], input[type="submit"] {
            padding: 6px;
            border: none;
        }
        /* Các quy tắc CSS khác */
    </style>
</head>
<body>
    <?php 
    require_once 'NhanVien.php';
    require_once 'Nhanviensanxuat.php';
    require_once 'Nhanvienvanphong.php';
    if (isset($_POST['submit'])) {
        $hoTen = $_POST['hoten'];
        $gioiTinh = $_POST['gtinh'];
        $ngayVaoLam = $_POST['ngayvaolam'];
        $heSoLuong =intval( $_POST['hesoluong']);
        $soCon = intval($_POST['socon']);
    
        if ($_POST['loainv'] == "Văn phòng") {
            $soNgayVang = $_POST['songayvang'];
    
            $nhanVien = new Nhanvienvaphong($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $soNgayVang);
    
            $tienLuong = $nhanVien->tinhTienLuong();
            $troCap = $nhanVien->tinhtrocap();
            $tienThuong = $nhanVien->tinhTienThuong();
            $tienPhat = $nhanVien->tinhtienphat();
            $thucLinh = $tienLuong + $troCap + $tienThuong - $tienPhat;
        } else {
            $soSanPham = $_POST['sosp'];
    
            $nhanVien = new NhanVienSanXuat($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $soSanPham);
    
            $tienLuong = $nhanVien->tinhTienLuong();
            $troCap = $nhanVien->tinhtrocap();
            $tienThuong = $nhanVien->tinhTienThuong();
            
            $thucLinh = $tienLuong + $troCap + $tienThuong ;
        }
    }
    
    



    ?>

<form action="" method="post">
        <table>
            <thead>
                <th colspan="4">Quản lý nhân viên</th>
            </thead>
            <tr>
                <td>Họ và tên</td>
                <td>
                    <input type="text" name="hoten" id="" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>">
                </td>
                <td>Số con</td>
                <td>
                    <input type="text" name="socon" id="" value="<?php if (isset($_POST['socon'])) echo $_POST['socon']; ?>">
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>
                    <input type="text" name="ngaysinh" id="" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh']; ?>">
                </td>
                <td>Số ngày vào làm</td>
                <td>
                    <input type="text" name="ngayvaolam" id="" value="<?php if (isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam']; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập giới tính:</td>
                <td>
                    <input type="radio" name="gtinh" id="" value="Nam" <?php if (isset($_POST['gtinh']) && $_POST['gtinh'] == "Nam") echo "checked"; ?> checked>Nam
                    <input type="radio" name="gtinh" id="" value="Nữ" <?php if (isset($_POST['gtinh']) && $_POST['gtinh'] == "Nữ") echo "checked"; ?>>Nữ
                </td>
                <td>Hệ số lương</td>
                <td>
                    <input type="text" name="hesoluong" id="" value="<?php if (isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?>">
                </td>
            </tr>
            <tr>
                <td>Loại nhân viên</td>

                <td><input type="radio" name="loainv" id="" value="Văn phòng" <?php if (isset($_POST['loainv']) && $_POST['loainv'] == "Văn phòng") echo "checked"; ?> checked>Văn phòng
                </td>
                <td><input type="radio" name="loainv" id="" value="Sản xuất" <?php if (isset($_POST['loainv']) && $_POST['loainv'] == "Sản xuất") echo "checked"; ?>>Sản xuất</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    Số ngày vắng:<input type="text" name="songayvang" id="" value="<?php if (isset($_POST['songayvang'])) echo $_POST['songayvang']; ?>">
                </td>
                <td>
                    Số sản phẩm:<input type="text" name="sosp" id="" value="<?php if (isset($_POST['sosp'])) echo $_POST['sosp']; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="submit" name="submit" value="Tính lương">
                </td>
            </tr>
            <tr>
                <td>Tiền lương:</td>
                <td>
                <input type="text" name="tienluong" id="" disabled="disabled" value="<?php echo isset($tienLuong) ? $tienLuong . ' VND' : ''; ?>">
                </td>
                <td>Trợ cấp:</td>
                <td>
                    <input type="text" name="trocap" id="" disabled="disabled" value="<?php echo isset($troCap) ? $troCap . ' VND' : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>Tiền thưởng:</td>
                <td>
                    <input type="text" name="tienthuong" id="" disabled="disabled" value="<?php echo isset($tienThuong) ? $tienThuong . ' VND' : ''; ?>">
                </td>
                <td>Tiền phạt:</td>
                <td>
                    <input type="text" name="tienphat" id="" disabled="disabled" value="<?php echo isset($tienPhat) ? $tienPhat . ' VND' : '';?>">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Thực lĩnh:<input type="text" name="thuclinh" id="" disabled="disabled" value="<?php echo isset($thucLinh) ? $thucLinh . ' VND' : '';?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>