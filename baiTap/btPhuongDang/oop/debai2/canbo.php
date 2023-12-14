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
    abstract class Canbo
    {
        protected $maso, $hoten, $gioitinh, $ngaysinh, $donvicongtac;
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
        public function setgioiTinh($gioitinh)
        {
            $this->gioitinh = $gioitinh;
        }
        public function getgioiTinh()
        {
            return $this->gioitinh;
        }
        public function setngaySinh($ngaysinh)
        {
            $this->ngaysinh = $ngaysinh;
        }
        public function getngaySinh()
        {
            return $this->ngaysinh;
        }
        public function setdonViCongTac($donvicongtac)
        {
            $this->donvicongtac = $donvicongtac;
        }
        public function getdonViCongTac()
        {
            return $this->donvicongtac;
        }
    }
    class Giangvien extends Canbo
    {
        protected $ngayvetruong, $hocvi, $socongtrinh;
        public function setngayVeTruong($ngayvetruong)
        {
            $this->ngayvetruong = $ngayvetruong;
        }
        public function getngayVeTruong()
        {
            return $this->ngayvetruong;
        }
        public function sethocVi($hocvi)
        {
            $this->hocvi = $hocvi;
        }
        public function gethocVi()
        {
            return $this->hocvi;
        }
        public function setsoCongtrinh($socongtrinh)
        {
            $this->socongtrinh = $socongtrinh;
        }
        public function getsoCongTrinh()
        {
            return $this->socongtrinh;
        }
        const dongia = 10000000;
        public function tienthuong()
        {

            if (($this->hocvi == "Thạc sĩ") || ($this->hocvi == "Tiến sĩ") && ($this->socongtrinh == 2) && ($this->socongtrinh < 2)) {
                return self::dongia * $this->socongtrinh;
            }
            if (($this->hocvi == "Phó giáo sư") || ($this->hocvi == "Tiến sĩ") && ($this->socongtrinh == 3) && ($this->socongtrinh > 3)) {
                return self::dongia * $this->socongtrinh * 1.5;
            }
        }
    }
    class Chuyenvien extends Canbo
    {
        protected $chucvu, $sosangkien;
        public function setchucVu($chucvu)
        {
            $this->chucvu = $chucvu;
        }
        public function getchucVu()
        {
            return $this->chucvu;
        }
        public function setsoSangKien($sosangkien)
        {
            $this->sosangkien = $sosangkien;
        }
        public function getsoSangKien()
        {
            return $this->sosangkien;
        }
        const tienthuong = 2000000;
        public function tienthuong()
        {
            if ($this->chucvu == "Trưởng phòng") {
                return self::tienthuong + 500000;
            } elseif ($this->chucvu == "Phó phòng") {
                return self::tienthuong + 300000;
            } else {
                return self::tienthuong + 100000;
            }
        }
    }
    $str = NULL;
    if (isset($_POST['luu'])) {
        if ($_POST['phanloai'] == "Chuyên viên") {
            $cv = new Chuyenvien();
            $cv->setmaSo($_POST['maso']);
            $cv->setHoten($_POST['hoten']);
            $cv->setgioiTinh($_POST['gioitinh']);
            $cv->setngaySinh($_POST['ngaysinh']);
            $cv->setdonViCongTac($_POST['donvicongtac']);
            $cv->setchucVu($_POST['chucvu']);
            $cv->setsoSangKien($_POST['sosangkien']);
            $str = "Mã số chuyên viên:" . $cv->getmaSo() . "\n" .
                "Họ tên chuyên viên: " . $cv->getHoten() . "\n" .
                "Giới tính chuyên viên: " . $cv->getgioiTinh() . "\n" .
                "Ngày sinh của chuyên viên: " . $cv->getngaySinh() . "\n" .
                "Đơn vị công tác: " . $cv->getdonViCongTac() . "\n" .
                "Chức vụ chuyên viên: " . $cv->getchucVu() . "\n" .
                "Số sáng kiến: " . $cv->getsoSangKien() . "\n" .
                "Tiền thưởng: " . $cv->tienthuong();
            $fileName = "chuyenvien.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
        if ($_POST['phanloai'] == "Giảng viên") {
            $gv = new Giangvien();
            $gv->setmaSo($_POST['maso']);
            $gv->setHoten($_POST['hoten']);
            $gv->setgioiTinh($_POST['gioitinh']);
            $gv->setngaySinh($_POST['ngaysinh']);
            $gv->setdonViCongTac($_POST['donvicongtac']);
            $gv->setngayVeTruong($_POST['ngayvetruong']);
            $gv->sethocVi($_POST['hocvi']);
            $gv->setsoCongtrinh($_POST['socongtrinh']);
            $str = "Mã số giảng viên:" . $gv->getmaSo() . "\n" .
                "Họ tên giảng viên: " . $gv->getHoten() . "\n" .
                "Giới tính giảng viên: " . $gv->getgioiTinh() . "\n" .
                "Ngày sinh của giảng viên: " . $gv->getngaySinh() . "\n" .
                "Đơn vị công tác: " . $gv->getdonViCongTac() . "\n" .
                "Ngày về trường: " . $gv->getngayVeTruong() . "\n" .
                "Trình độ giảng viên: " . $gv->gethocVi() . "\n" .
                "Số công trình nghiên cứu:" . $gv->getsoCongTrinh() . "\n" .
                "Tiền thưởng: " . $gv->tienthuong();
            $fileName = "giangvien.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
    }
    if (isset($_POST['hienthi'])) {
        if ($_POST['phanloai'] == "Chuyên viên") {
            $file = 'chuyenvien.txt';
            $str = file_get_contents($file);
        }
    }
    if (isset($_POST['hienthi'])) {
        if ($_POST['phanloai'] == "Giảng viên") {
            $file = 'giangvien.txt';
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
                        <input type="radio" name="phanloai" onclick="hienChuyenVien()" id="" value="Chuyên viên" <?php if (isset($_POST['phanloai']) && ($_POST['phanloai']) == "Chuyên viên") echo 'checked' ?>>Chuyên viên
                        <input type="radio" name="phanloai" onclick="hienGiangVien()" id="" value="Giảng viên" <?php if (isset($_POST['phanloai']) && ($_POST['phanloai']) == "Giảng viên") echo 'checked' ?>>Giảng viên
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
                    <td>Nhập giới tính:</td>
                    <td><input type="radio" name="gioitinh" id="" value="Nam" checked>Nam
                        <input type="radio" name="gioitinh" id="" value="Nữ">Nữ
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="ngaysinh" id="">
                    </td>
                </tr>
                <tr>
                    <td>Đơn vị công tác</td>
                    <td><input type="text" name="donvicongtac" value="<?php if (isset($_POST['donvicongtac'])) echo $_POST['donvicongtac']; ?>" /></td>
                </tr>
            </table>
            <table id="chuyenVien" style="<?php if (isset($_POST['phanloai']) && $_POST['phanloai'] == "Chuyên viên") echo 'display: block';
                                            else echo 'display: none'; ?>">
                <tr>
                    <td>Chức vụ:</td>
                    <td><input id="chucvu" type="text" name="chucvu" value="<?php if (isset($_POST['chucvu'])) echo $_POST['chucvu']; ?>" /></td>
                </tr>
                <tr>
                    <td>Số sáng kiến:</td>
                    <td><input id="sosangkien" type="text" name="sosangkien" value="<?php if (isset($_POST['sosangkien'])) echo $_POST['sosangkien']; ?>" /></td>
                </tr>
            </table>
            <table id="giangVien" style="<?php if (isset($_POST['phanloai']) && $_POST['phanloai'] == "Giảng viên") echo 'display: block';
                                            else echo 'display: none'; ?>">
                <tr>
                    <td>Ngày về trường</td>
                    <td>
                        <input type="date" name="ngayvetruong" id="">
                    </td>
                </tr>
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
                    <td>Số công trình</td>
                    <td>
                        <input type="text" name="socongtrinh" id="" value="<?php if (isset($_POST['socongtrinh'])) echo $_POST['socongtrinh']; ?>">
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
        function hienChuyenVien() {
            var giangVien = document.getElementById("giangVien");
            giangVien.style.display = "none";
            var chuyenVien = document.getElementById("chuyenVien");
            chuyenVien.style.display = "block";
        }

        function hienGiangVien() {
            var giangVien = document.getElementById("giangVien");
            giangVien.style.display = "block";
            var chuyenVien = document.getElementById("chuyenVien");
            chuyenVien.style.display = "none";
        }
    </script>
    của văn phòng
public function tinhTienThuong()
            {
                if($this->xepLoai=="A"){
                    if($this->chucVu=="Trưởng phòng"){
                        return self::mucThuongCB*2*2;
                    }
                    elseif($this->chucVu=="Phó phòng")
                        return self::mucThuongCB*2*1.5;
                    else
                        return self::mucThuongCB*2*1;
                }
                elseif($this->xepLoai=="B"){
                    if($this->chucVu=="Trưởng phòng"){
                        return self::mucThuongCB*1.5*2;
                    }
                    elseif($this->chucVu=="Phó phòng")
                        return self::mucThuongCB*1.5*1.5;
                    else
                        return self::mucThuongCB*1.5*1;
                }
                else{
                    if($this->chucVu=="Trưởng phòng"){
                        return self::mucThuongCB*1*2;
                    }
                    elseif($this->chucVu=="Phó phòng")
                        return self::mucThuongCB*1*1.5;
                    else
                        return self::mucThuongCB*1*1;
                }
            }
của thí nghiệm
public function tinhTienThuong(){
                return self::mucThuongCB+$this->soSanPham*2000000+$this->soSangKien*3000000;
            }

</body>

</html>