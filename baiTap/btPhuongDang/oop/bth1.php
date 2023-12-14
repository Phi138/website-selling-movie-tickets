<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function toggleTrinhDo() {
            var chucVu = document.getElementById("chucvu").value;
            var trinhDoSelect = document.getElementById("trinhdo");
            var lop = document.getElementById("lophoc");
            var nganh = document.getElementById("nganhhoc");
            if (chucVu == "Sinh viên") {
                trinhDoSelect.disabled = true;
                nganh.disabled = false;
                lop.disabled = false;
            } else {
                trinhDoSelect.disabled = false;
                nganh.disabled = true;
                lop.disabled = true;
            }

        }
        window.addEventListener('DOMContentLoaded', function() {
            toggleTrinhDo();
        });
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #9EDDFF;
        }

        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #B6FFFA;
            color: white;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
            padding: 10px;
        }

        input[type="submit"] {
            background-color: #fff;
            color: #007bff;
            border: 1px solid blue;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
    abstract class Nguoi
    {
        public $hoten, $diachi, $gioitinh;
    }
    class Sinhvien extends Nguoi
    {
        public $lophoc, $nganhhoc;
        public function diemthuong($nganhhoc)
        {
            if ($nganhhoc == "CNTT") {
                return 1;
            }
            if ($nganhhoc == "Kinh tế") {
                return 1.5;
            }
            return 0;
        }
    }
    class Giangvien extends Nguoi
    {
        public $trinhdo;
        const luongcoban = 1500000;
        public function tinhluong($trinhdo)
        {
            if ($trinhdo == "Cử nhân") {
                return self::luongcoban * 2.34;
            }
            if ($trinhdo == "Thạc sĩ") {
                return self::luongcoban * 3.67;
            }
            if ($trinhdo == "Tiến sĩ") {
                return self::luongcoban * 5.66;
            }
        }
    }
    $str = NULL;
    if (isset($_POST['submit'])) {
        if ($_POST['chucvu'] == "Sinh viên") {
            $sv = new Sinhvien();
            $sv->hoten = $_POST['hoten'];
            $sv->diachi = $_POST['diachi'];
            $sv->gioitinh = $_POST['gioitinh'];
            $sv->lophoc = $_POST['lophoc'];
            $sv->nganhhoc = $_POST['nganhhoc'];
            $str = "Họ tên sinh viên: " . $sv->hoten . "\n" .
                "Địa chỉ sinh viên: " . $sv->diachi . "\n" .
                "Giới tính sinh viên: " . $sv->gioitinh . "\n" .
                "Lớp học của sinh viên: " . $sv->lophoc . "\n" .
                "Ngành học của sinh viên: " . $sv->nganhhoc . "\n" .
                "Điểm thưởng: " . $sv->diemthuong($sv->nganhhoc);
        }
        if ($_POST['chucvu'] == "Giảng viên") {
            $gv = new Giangvien();
            $gv->hoten = $_POST['hoten'];
            $gv->diachi = $_POST['diachi'];
            $gv->gioitinh = $_POST['gioitinh'];
            $gv->trinhdo = $_POST['trinhdo'];
            $str = "Họ tên giảng viên: " . $gv->hoten . "\n" .
                "Địa chỉ giảng viên: " . $gv->diachi . "\n" .
                "Giới tính giảng viên: " . $gv->gioitinh . "\n" .
                "Trình độ giảng viên: " . $gv->trinhdo . "\n" .
                "Lương: " . $gv->tinhluong($gv->trinhdo);
        }
    }

    ?>
    <form action="" method="post">

        <fieldset>

            <legend>Tạo các lớp đơn giản</legend>

            <table border='0'>
                <tr>

                    <td>Chọn chức vụ</td>

                    <td>
                        <select name="chucvu" id="chucvu" onchange="toggleTrinhDo()">
                            <option value="Sinh viên" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Sinh viên") echo "selected" ?>>Sinh viên</option>
                            <option value="Giảng viên" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Giảng viên") echo "selected" ?>>Giảng viên</option>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Nhập họ tên:</td>
                    <td><input type="text" name="hoten" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập địa chỉ:</td>
                    <td><input type="text" name="diachi" value="<?php if (isset($_POST['diachi'])) echo $_POST['diachi']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập giới tính:</td>
                    <td><input type="radio" name="gioitinh" id="" value="Nam" checked>Nam
                        <input type="radio" name="gioitinh" id="" value="Nữ">Nữ
                    </td>
                </tr>
                <tr>
                    <td>Nhập lớp học:</td>
                    <td><input id="lophoc" type="text" name="lophoc" value="<?php if (isset($_POST['lophoc'])) echo $_POST['lophoc']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập ngành học:</td>
                    <td><input id="nganhhoc" type="text" name="nganhhoc" value="<?php if (isset($_POST['nganhhoc'])) echo $_POST['nganhhoc']; ?>" /></td>
                </tr>
                <tr>
                    <td>Trình độ</td>
                    <td>
                        <select name="trinhdo" id="trinhdo">
                            <option value="Cử nhân" <?php if (isset($_POST['trinhdo']) && $_POST['trinhdo'] == "Cử nhân") echo "selected" ?>>Cử nhân</option>
                            <option value="Thạc sĩ" <?php if (isset($_POST['trinhdo']) && $_POST['trinhdo'] == "Thạc sĩ") echo "selected" ?>>Thạc sĩ</option>
                            <option value="Tiến sĩ" <?php if (isset($_POST['trinhdo']) && $_POST['trinhdo'] == "Tiến sĩ") echo "selected" ?>>Tiến sĩ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="10" disabled="disabled"><?php echo $str; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" /></td>
                </tr>
            </table>
        </fieldset>

    </form>

</body>

</html>