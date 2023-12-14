<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

        #sinhVien {
            padding-left: 120px;
        }

        #giangVien {
            padding-left: 120px;
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
        protected $maso, $hoten, $diachi, $gioitinh;
        public function setmaSo($maso)
        {
            $this->maso = $maso;
        }
        public function getmaSo()
        {
            return $this->maso;
        }
        public function setHoten($hoten)
        {
            $this->hoten = $hoten;
        }
        public function getHoten()
        {
            return $this->hoten;
        }
        public function setdiaChi($diachi)
        {
            $this->diachi = $diachi;
        }
        public function getdiaChi()
        {
            return $this->diachi;
        }
        public function setgioiTinh($gioitinh)
        {
            $this->gioitinh = $gioitinh;
        }
        public function getgioiTinh()
        {
            return $this->gioitinh;
        }
    }
    class Sinhvien extends Nguoi
    {
        protected $lophoc, $nganhhoc;
        public function setlopHoc($lophoc)
        {
            $this->lophoc = $lophoc;
        }
        public function getlopHoc()
        {
            return $this->lophoc;
        }
        public function setnganhHoc($nganhhoc)
        {
            $this->nganhhoc = $nganhhoc;
        }
        public function getnganhHoc()
        {
            return $this->nganhhoc;
        }
        const tienthuong = 500000;
        public function tienthuong()
        {
            if ($this->nganhhoc == "Xây dựng") {
                return self::tienthuong;
            } elseif ($this->nganhhoc == "CNTT") {
                return self::tienthuong * 2;
            } else {
                return self::tienthuong * 1.5;
            }
        }
    }
    class Giangvien extends Nguoi
    {
        protected $hocvi, $sonamcongtac;
        public function sethocVi($hocvi)
        {
            $this->hocvi = $hocvi;
        }
        public function gethocVi()
        {
            return $this->hocvi;
        }
        public function setnamCongTac($sonamcongtac)
        {
            $this->sonamcongtac = $sonamcongtac;
        }
        public function getnamCongTac()
        {
            return $this->sonamcongtac;
        }
        const luongcoban = 1350000;
        public function tinhluong()
        {

            if ($this->hocvi == "Thạc sĩ") {
                return self::luongcoban * $this->sonamcongtac;
            }
            if ($this->hocvi == "Tiến sĩ") {
                return self::luongcoban * $this->sonamcongtac * 1.2;
            }
            if ($this->hocvi == "Phó giáo sư") {
                return self::luongcoban * $this->sonamcongtac * 1.5;
            }
        }
    }
    $str = NULL;
    if (isset($_POST['luu'])) {
        if ($_POST['chucvu'] == "Sinh viên") {
            $sv = new Sinhvien();
            $sv->setmaSo($_POST['maso']);
            $sv->setHoten($_POST['hoten']);
            $sv->setdiaChi($_POST['diachi']);
            $sv->setgioiTinh($_POST['gioitinh']);
            $sv->setlopHoc($_POST['lophoc']);
            $sv->setnganhHoc($_POST['nganhhoc']);
            $str = "Mã số sinh viên:" . $sv->getmaSo() . "\n" .
                "Họ tên sinh viên: " . $sv->getHoten() . "\n" .
                "Địa chỉ sinh viên: " . $sv->getdiaChi() . "\n" .
                "Giới tính sinh viên: " . $sv->getgioiTinh() . "\n" .
                "Lớp học của sinh viên: " . $sv->getlopHoc() . "\n" .
                "Ngành học của sinh viên: " . $sv->getnganhHoc() . "\n" .
                "Tiền thưởng: " . $sv->tienthuong();
            $fileName = "sinhvien.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
        if ($_POST['chucvu'] == "Giảng viên") {
            $gv = new Giangvien();
            $gv->setmaSo($_POST['maso']);
            $gv->setHoten($_POST['hoten']);
            $gv->setdiaChi($_POST['diachi']);
            $gv->setgioiTinh($_POST['gioitinh']);
            $gv->sethocVi($_POST['hocvi']);
            $gv->setnamCongTac($_POST['namcongtac']);
            $str = "Mã số giảng viên:" . $gv->getmaSo() . "\n" .
                "Họ tên giảng viên: " . $gv->getHoten() . "\n" .
                "Địa chỉ giảng viên: " . $gv->getdiaChi() . "\n" .
                "Giới tính giảng viên: " . $gv->getgioiTinh() . "\n" .
                "Trình độ giảng viên: " . $gv->gethocVi() . "\n" .
                "Năm công tác của giảng viên:" . $gv->getnamCongTac() . "\n" .
                "Lương: " . $gv->tinhluong();
            $fileName = "giangvien.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
    }
    if (isset($_POST['hienthi'])) {
        if ($_POST['chucvu'] == "Giảng viên") {
            $file = 'giangvien.txt';
            $str = file_get_contents($file);
        }
    }
    if (isset($_POST['hienthi'])) {
        if ($_POST['chucvu'] == "Sinh viên") {
            $file = 'sinhvien.txt';
            $str = file_get_contents($file);
        }
    }

    ?>
    <form action="" method="post">

        <fieldset>

            <table border='0'>
                <tr>

                    <td>Chọn chức vụ</td>

                    <td>
                        <input type="radio" name="chucvu" onclick="hienSinhVien()" id="" value="Sinh viên" <?php if (isset($_POST['chucvu']) && ($_POST['chucvu']) == "Sinh viên") echo 'checked' ?>>Sinh viên
                        <input type="radio" name="chucvu" onclick="hienGiangVien()" id="" value="Giảng viên" <?php if (isset($_POST['chucvu']) && ($_POST['chucvu']) == "Giảng viên") echo 'checked' ?>>Giảng viên
                    </td>

                </tr>
                <tr>
                    <td>Nhập mã số:</td>
                    <td><input type="text" name="maso" id="" value="<?php if (isset($_POST['maso'])) echo $_POST['maso']; ?>"></td>
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
            </table>
            <table id="sinhVien" style="<?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Sinh viên") echo 'display: block';
                                        else echo 'display: none'; ?>">
                <tr>
                    <td>Nhập lớp học:</td>
                    <td><input id="lophoc" type="text" name="lophoc" value="<?php if (isset($_POST['lophoc'])) echo $_POST['lophoc']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập ngành học:</td>
                    <td><input id="nganhhoc" type="text" name="nganhhoc" value="<?php if (isset($_POST['nganhhoc'])) echo $_POST['nganhhoc']; ?>" /></td>
                </tr>
            </table>
            <table id="giangVien" style="<?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Giảng viên") echo 'display: block';
                                            else echo 'display: none'; ?>">
                <tr>
                    <td>Học vị</td>
                    <td>
                        <select name="hocvi" id="hocvi">
                            <option value="Thạc sĩ" <?php if (isset($_POST['hocvi']) && $_POST['hocvi'] == "Cử nhân") echo "selected" ?>>Thạc sĩ</option>
                            <option value="Tiến sĩ" <?php if (isset($_POST['hocvi']) && $_POST['hocvi'] == "Thạc sĩ") echo "selected" ?>>Tiến sĩ</option>
                            <option value="Phó giáo sư" <?php if (isset($_POST['hocvi']) && $_POST['hocvi'] == "Tiến sĩ") echo "selected" ?>>Phó giáo sư</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Năm công tác</td>
                    <td>
                        <input type="text" name="namcongtac" id="" value="<?php if (isset($_POST['namcongtac'])) echo $_POST['namcongtac']; ?>">
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="2"><input type="submit" name="luu" value="Lưu" />
                        <input type="submit" name="hienthi" value="Hiển thị" />
                    </td>

                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="10" disabled="disabled"><?php echo $str; ?></textarea></td>
                </tr>
            </table>


        </fieldset>

    </form>
    <script>
        function hienGiangVien() {
            var giangVien = document.getElementById("giangVien");
            giangVien.style.display = "block";
            var sinhVien = document.getElementById("sinhVien");
            sinhVien.style.display = "none";
        }

        function hienSinhVien() {
            var giangVien = document.getElementById("giangVien");
            giangVien.style.display = "none";
            var sinhVien = document.getElementById("sinhVien");
            sinhVien.style.display = "block";
        }
    </script>

</body>

</html>