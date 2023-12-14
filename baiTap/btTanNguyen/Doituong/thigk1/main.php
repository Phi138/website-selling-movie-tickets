<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền thưởng cán bộ</title>
</head>

<body>
    <?php
    require_once "Canbo.php";
    require_once "giangvien.php";
    require_once "chuyenvien.php";
    $tienthuong = "";
    $hoten = "";
    $checked_cv = "";
    $chucvu = "";
    $checked_gv = "";
    if (isset($_POST['tinh'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoten = $_POST['hoten'];
            $ma = $_POST['macanbo'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['Ngaysinh'];
            $donvict = $_POST['Donvict'];
            $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : ""; // Lấy giá trị chức vụ từ form
            $sosangkien = isset($_POST['Soskct']) ? $_POST['Soskct'] : "";
            $loaicanbo = isset($_POST['loaicanbo']) ? $_POST['loaicanbo'] : "";
            $checked_gv = ($loaicanbo == 'giảng viên') ? 'checked' : '';
            $checked_cv = ($loaicanbo == 'chuyên viên') ? 'checked' : '';
            if (isset($_POST['loaicanbo']) && $_POST['loaicanbo'] == "giảng viên") {
                $ngayvetruong = $_POST['ngayvetruong'];
                $hocvi = $_POST['hocvi'];
                $soct = $_POST['sctnc'];
                $giangvien = new Giangvien($ma, $hoten, $ngaysinh, $gioitinh, $donvict, $ngayvetruong, $hocvi, $soct);
                $tienthuong = $giangvien->tinhthuong();
            }
            if (isset($_POST['loaicanbo']) && $_POST['loaicanbo'] == "chuyên viên") {
                $chucvu = $_POST['chucvu'];
                $sosangkien =  $_POST['Soskct'];
                $chuyenvien = new Chuyenvien($ma, $hoten, $ngaysinh, $gioitinh, $donvict, $chucvu, $sosangkien);
                $tienthuong = $chuyenvien->tinhthuong();
            }
        }
    }

    ?>
    <form action="" method="post">
        <table>
            <th>Tính tiền thưởng cho cán bộ</th>
            <tr>
                <td>Mã cán bộ</td>
                <td><input type="text" name="macanbo" id="" value="<?php if (isset($_POST['macanbo'])) echo $_POST['macanbo']; ?>"></td>
                <td>Tên cán bộ</td>
                <td><input type="text" name="hoten" id="" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>"></td>
                <td>Giới tính</td>
                <td><input type="text" name="gioitinh" id="" value="<?php if (isset($_POST['gioitinh'])) echo $_POST['gioitinh'] ?>"></td>
                <td>Ngày sinh</td>
                <td><input type="date" name="Ngaysinh" id="" value="<?php if (isset($_POST['Ngaysinh'])) echo $_POST['Ngaysinh'] ?>"></td>
                <td>Đơn vị công tác </td>
                <td><input type="text" name="Donvict" id="" value="<?php if (isset($_POST['Donvict'])) echo $_POST['Donvict'] ?>"></td>
            </tr>
            <tr>
                <td><input type="radio" name="loaicanbo" id="" value="giảng viên" <?php echo $checked_gv; ?>>giảng viên</td>
                <td><input type="radio" name="loaicanbo" id="" value="chuyên viên" <?php echo $checked_cv; ?>>chuyên viên</td>
            </tr>
            <tr>
                <td>Ngày về trường</td>
                <td><input type="date" name="ngayvetruong" id="" value="<?php if (isset($_POST['ngayvetruong'])) echo $_POST['ngayvetruong'] ?>"></td>
                <td>Học vị</td>
                <td><input type="text" name="hocvi" id="" value="<?php if (isset($_POST['hocvi'])) echo $_POST['hocvi'] ?>"></td>
                <td>Số công trình nghiên cứu</td>
                <td><input type="text" name="sctnc" id="" value="<?php if (isset($_POST['sctnc'])) echo $_POST['sctnc'] ?>"></td>
            </tr>
            <tr>
                <td>Chức vụ </td>
                <td>
                    <select name="chucvu" id="chucvu">
                        <option value="Trưởng phòng" <?php if ($chucvu == "Trưởng phòng") echo "selected"; ?>>Trưởng phòng</option>
                        <option value="Phó phòng" <?php if ($chucvu == "Phó phòng") echo "selected"; ?>>Phó phòng</option>
                        <option value="Thư ký" <?php if ($chucvu == "Thư ký") echo "selected"; ?>>Thư ký</option>
                    </select>
                </td>
                <td>Số sáng kiến cải tiến :</td>
                <td><input type="number" name="Soskct" id="" value="<?php if (isset($_POST['Soskct'])) echo $_POST['Soskct'] ?>"></td>

            </tr>
            <tr>
                <td>TIỀN THƯỞNG CÁN BỘ NHẬN ĐƯỢC :</td>
                <td><input type="text" name="tienthuong" id="" value="<?php echo $tienthuong ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Tính " name="tinh">
        <input type="submit" value="Lưu" name="luu">
        <input type="submit" value="Hiển thị" name="hienthi">
    </form>
</body>

</html>