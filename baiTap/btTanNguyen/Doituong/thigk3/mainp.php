<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền thưởng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        form {
            background-color: purple;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            font-weight: bold;
            background-color: purple;
            color: black;
        }

        table td {
            padding: 10px;
            border: 1px solid #ccc;
            color: #fff;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .thread {
            width: 1000px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .thread h2 {
            text-align: center;
            color: #4CAF50;
        }

        .thread table {
            margin-top: 20px;
        }

        .thread table td {
            border: none;
            padding: 5px;
        }

        .thread input[type="submit"] {
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <?php
    require_once "nguoi.php";
    require_once "giangvien.php";
    require_once "sinhvien.php";
    $tienthuong = "";
    $hoten = "";
    $checked_sv = "";
    $nganh = "";
    $checked_gv = "";
    $hocvi = "";
    $ma = "";
    $gioitinh = "";
    $diachi = "";
    $lop = "";
    $sonct = "";
    if (isset($_POST['tinh'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoten = $_POST['hoten'];
            $ma = $_POST['maso'];
            $gioitinh = $_POST['gioitinh'];
            $diachi = $_POST['diachi'];

            $loai = isset($_POST['loaicb']) ? $_POST['loaicb'] : "";
            $checked_gv = ($loai == 'giảng viên') ? 'checked' : '';
            $checked_sv = ($loai == 'sinh viên') ? 'checked' : '';
            if (isset($_POST['loaicb']) && $_POST['loaicb'] == "giảng viên") {
                $hocvi = isset($_POST['hocvi']) ? $_POST['hocvi'] : "";
                $snct = isset($_POST['snct']) ? $_POST['snct'] : "";
                $giangvien = new Giangvien($ma, $hoten, $gioitinh, $diachi, $hocvi, $snct);
                $tienthuong = $giangvien->tinhthuong();
            }
            if (isset($_POST['loaicb']) && $_POST['loaicb'] == "sinh viên") {
                $lop = isset($_POST['lop']) ? $_POST['lop'] : "";
                $nganh = isset($_POST['nganh']) ? $_POST['nganh'] : "";
                $sinhvien = new sinhvien($ma, $hoten, $gioitinh, $diachi, $lop, $nganh);
                $tienthuong = $sinhvien->tinhthuong();
            }
        }
    }
    $str = NULL;
    if (isset($_POST['luu'])) {
        if ($_POST['loaicb'] == "sinh viên") {
            $sv = new sinhvien($ma, $hoten, $gioitinh, $diachi, $lop, $nganh);
            $sv->setmaSo($_POST['maso']);
            $sv->setHoten($_POST['hoten']);
            $sv->setdiaChi($_POST['diachi']);
            $sv->setgioiTinh($_POST['gioitinh']);
            $sv->setlop($_POST['lop']);
            $sv->setnganhoc($_POST['nganh']);
            $str = "Mã số sinh viên:" . $sv->getmaSo() . "\n" .
                "Họ tên sinh viên: " . $sv->getHoten() . "\n" .
                "Địa chỉ sinh viên: " . $sv->getdiaChi() . "\n" .
                "Giới tính sinh viên: " . $sv->getgioiTinh() . "\n" .
                "Lớp học của sinh viên: " . $sv->getlop() . "\n" .
                "Ngành học của sinh viên: " . $sv->getnganhHoc() . "\n" .
                "Tiền thưởng: " . $sv->tinhthuong();
            $fileName = "sinhvien.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
        if ($_POST['loaicb'] == "giảng viên") {
            $gv = new giangvien($ma, $hoten, $gioitinh, $diachi, $hocvi, $sonct);
            $gv->setmaSo($_POST['maso']);
            $gv->setHoten($_POST['hoten']);
            $gv->setdiaChi($_POST['diachi']);
            $gv->setgioiTinh($_POST['gioitinh']);
            $gv->setHocVi($_POST['hocvi']);
            $gv->setSonamct($_POST['snct']);
            $str = "Mã số sinh viên:" . $gv->getmaSo() . "\n" .
                "Họ tên sinh viên: " . $gv->getHoten() . "\n" .
                "Địa chỉ sinh viên: " . $gv->getdiaChi() . "\n" .
                "Giới tính sinh viên: " . $gv->getgioiTinh() . "\n" .
                "Học vị của giảng viên: " . $gv->getHocvi() . "\n" .
                "Số năm công tác của giảng viên: " . $gv->getSonamct() . "\n" .
                "Tiền thưởng: " . $gv->tinhthuong();
            $fileName = "giangvien.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
    }

    if (isset($_POST['hienthi'])) {
        $checked_gv = ($_POST['loaicb'] == 'giảng viên') ? 'checked' : '';
        $checked_sv = ($_POST['loaicb'] == 'sinh viên') ? 'checked' : '';
        $loaicb = $_POST['loaicb'];
        $gvInfo = file_get_contents("giangvien.txt");
        $svInfo = file_get_contents("sinhvien.txt");
    }

    ?>
    <div class="center">
        <div class="thread">
            <h2>Tính tiền lương và thưởng</h2>
            <form action="" method="post">
                <table>

                    <tr>
                        <td>Mã số</td>
                        <td><input type="text" name="maso" id="" value="<?php if (isset($_POST['maso'])) echo $_POST['maso']; ?>"></td>
                        <td>Họ và tên :</td>
                        <td><input type="text" name="hoten" id="" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>"></td>
                        <td>Giới tính</td>
                        <td><input type="text" name="gioitinh" id="" value="<?php if (isset($_POST['gioitinh'])) echo $_POST['gioitinh'] ?>"></td>

                        <td>Địa chỉ </td>
                        <td><input type="text" name="diachi" id="" value="<?php if (isset($_POST['diachi'])) echo $_POST['diachi'] ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="loaicb" id="" value="giảng viên" onclick="toggleFields()" <?php echo $checked_gv; ?>>giảng viên</td>
                        <td><input type="radio" name="loaicb" id="" value="sinh viên" onclick="toggleFields()" <?php echo $checked_sv; ?>>sinh viên</td>
                    </tr>
                    <tr>
                        <td>Học vị </td>
                        <td>
                            <select name="hocvi" id="hocvi">
                                <option value="Thạc sĩ" <?php if ($hocvi == "Thạc sĩ") echo "selected"; ?>>Thạc sĩ</option>
                                <option value="Tiến sĩ" <?php if ($hocvi == "Tiến sĩ") echo "selected"; ?>>Tiến sĩ</option>
                                <option value="Phó giáo sư" <?php if ($hocvi == "Phó giáo sư") echo "selected"; ?>>Phó giáo sư</option>
                            </select>
                        </td>

                        <td>Số năm công tác </td>
                        <td><input type="text" name="snct" id="snct" value="<?php if (isset($_POST['snct'])) echo $_POST['snct'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Lớp :</td>
                        <td><input type="text" name="lop" id="lop" value="<?php if (isset($_POST['lop'])) echo $_POST['lop'] ?>"></td>

                        <td>Ngành </td>
                        <td>
                            <select name="nganh" id="nganh">
                                <option value="Xây dựng" <?php if ($nganh == "Xây dựng") echo "selected"; ?>>Xây dựng</option>
                                <option value="CNTT" <?php if ($nganh == "CNTT") echo "selected"; ?>>CNTT</option>
                                <option value="Khác" <?php if ($nganh == "Khác") echo "selected"; ?>>Khác</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>TIỀN NHẬN ĐƯỢC :</td>
                        <td><input type="text" name="tienthuong" id="" value="<?php echo $tienthuong ?>"></td>
                    </tr>
                    <tr>
                        <td>Kết quả:</td>
                        <td><textarea name="ketqua" cols="70" rows="10" disabled="disabled"><?php if ($loaicb == "giảng viên") {
                                                                                                echo "Thông tin giảng viên:";
                                                                                                echo ($gvInfo);
                                                                                            } elseif ($loaicb == "sinh viên") {
                                                                                                echo "Thông tin sinh viên:";
                                                                                                echo ($svInfo);
                                                                                            } ?></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="Tính " name="tinh">
                <input type="submit" value="Lưu" name="luu">
                <input type="submit" value="Hiển thị" name="hienthi">
            </form>
        </div>
    </div>

    <script>
        function toggleFields() {
            var loai = document.querySelector('input[name="loaicb"]:checked').value;
            var hocviInput = document.getElementById("hocvi");
            var nganhInput = document.getElementById("nganh");
            var snctInput = document.getElementById("snct");
            var lopInput = document.getElementById("lop");


            if (loai === "giảng viên") {
                hocviInput.disabled = false;
                snctInput.disabled = false;
                lopInput.disabled = true;
                nganhInput.disabled = true;



            } else if (loai === "sinh viên") {
                hocviInput.disabled = true;
                snctInput.disabled = true;
                lopInput.disabled = false;
                nganhInput.disabled = false;


            }
        }
    </script>
</body>

</html>