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
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        pre {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
    </style>
<body>
<?php 
        class Nguoi {
            protected $maSo;
            protected $hoTen;
            protected $gioiTinh;
            protected $diaChi;

            public function setMaSo($maSo) {
                $this->maSo = $maSo;
            }

            public function getMaSo() {
                return $this->maSo;
            }

            public function setHoTen($hoTen) {
                $this->hoTen = $hoTen;
            }

            public function getHoTen() {
                return $this->hoTen;
            }

            public function setGioiTinh($gioiTinh) {
                $this->gioiTinh = $gioiTinh;
            }

            public function getGioiTinh() {
                return $this->gioiTinh;
            }

            public function setDiaChi($diaChi) {
                $this->diaChi = $diaChi;
            }

            public function getDiaChi() {
                return $this->diaChi;
            }
        }

        class GiangVien extends Nguoi {
            protected $hocVi;
            protected $luongCoBan = 1359999;
            protected $soNamCongTac;

            public function __construct($maSo, $hoTen, $gioiTinh, $diaChi, $hocVi, $soNamCongTac) {
                parent::setMaSo($maSo);
                parent::setHoTen($hoTen);
                parent::setGioiTinh($gioiTinh);
                parent::setDiaChi($diaChi);
                $this->hocVi = $hocVi;
                $this->soNamCongTac = $soNamCongTac;
            }

            public function setHocVi($hocVi) {
                $this->hocVi = $hocVi;
            }

            public function getHocVi() {
                return $this->hocVi;
            }

            public function setSoNamCongTac($soNamCongTac) {
                $this->soNamCongTac = $soNamCongTac;
            }

            public function getSoNamCongTac() {
                return $this->soNamCongTac;
            }

            public function tinhTienLuong() {
                if ($this->hocVi == "Thạc sĩ") {
                    return $this->luongCoBan * $this->soNamCongTac;
                } elseif ($this->hocVi == "Tiến sĩ") {
                    return $this->luongCoBan * $this->soNamCongTac * 1.2;
                } elseif ($this->hocVi == "Phó giáo sư") {
                    return $this->luongCoBan * $this->soNamCongTac * 1.5;
                }
            }
        }

        class SinhVien extends Nguoi {
            protected $lop;
            protected $nganhHoc;
            protected $tienThuongCoBan = 500000;

            public function __construct($maSo, $hoTen, $gioiTinh, $diaChi, $lop, $nganhHoc) {
                parent::setMaSo($maSo);
                parent::setHoTen($hoTen);
                parent::setGioiTinh($gioiTinh);
                parent::setDiaChi($diaChi);
                $this->lop = $lop;
                $this->nganhHoc = $nganhHoc;
            }

            public function setLop($lop) {
                $this->lop = $lop;
            }

            public function getLop() {
                return $this->lop;
            }

            public function setNganhHoc($nganhHoc) {
                $this->nganhHoc = $nganhHoc;
            }

            public function getNganhHoc() {
                return $this->nganhHoc;
            }

            public function tinhTienThuong() {
                if ($this->nganhHoc == "xây dựng") {
                    return $this->tienThuongCoBan;
                } elseif ($this->nganhHoc == "CNTT") {
                    return $this->tienThuongCoBan * 2;
                } else {
                    return $this->tienThuongCoBan * 1.5;
                }
            }
        }

        if (isset($_POST['luuThongTin'])) {
            $loaiDoiTuong = $_POST['loaiDoiTuong'];
            $maSo = $_POST['maSo'];
            $hoTen = $_POST['hoTen'];
            $gioiTinh = $_POST['gioiTinh'];
            $diaChi = $_POST['diaChi'];

            if ($loaiDoiTuong == 'giangVien') {
                $hocVi = $_POST['hocVi'];
                $soNamCongTac = $_POST['soNamCongTac'];

                $giangVien = new GiangVien($maSo, $hoTen, $gioiTinh, $diaChi, $hocVi, $soNamCongTac);

                $thongTin = "Loại đối tượng: Giảng viên" . PHP_EOL;
                $thongTin .= "Mã số: " . $giangVien->getMaSo() . PHP_EOL;
                $thongTin .= "Họ tên: " . $giangVien->getHoTen() . PHP_EOL;
                $thongTin .= "Giới tính: " . $giangVien->getGioiTinh() . PHP_EOL;
                $thongTin .= "Địa chỉ: " . $giangVien->getDiaChi() . PHP_EOL;
                $thongTin .= "Học vị: " . $giangVien->getHocVi() . PHP_EOL;
                $thongTin .= "Số năm công tác: " . $giangVien->getSoNamCongTac() . PHP_EOL;
                $thongTin .= "Tiền lương: " . $giangVien->tinhTienLuong() ."VND". PHP_EOL;
                $thongTin .= "------------------------" . PHP_EOL;

                file_put_contents("thongtin.txt", $thongTin, FILE_APPEND);
            } elseif ($loaiDoiTuong == 'sinhVien') {
                $lop = $_POST['lop'];
                $nganhHoc = $_POST['nganhHoc'];

                $sinhVien = new SinhVien($maSo, $hoTen, $gioiTinh, $diaChi, $lop, $nganhHoc);

                $thongTin = "Loại đối tượng: Sinh viên" . PHP_EOL;
                $thongTin .= "Mã số: " . $sinhVien->getMaSo() . PHP_EOL;
                $thongTin .= "Họ tên: " . $sinhVien->getHoTen() . PHP_EOL;
                $thongTin .= "Giới tính: " . $sinhVien->getGioiTinh() . PHP_EOL;
                $thongTin .= "Địa chỉ: " . $sinhVien->getDiaChi() . PHP_EOL;
                $thongTin .= "Lớp: " . $sinhVien->getLop() . PHP_EOL;
                $thongTin .= "Ngành học: " . $sinhVien->getNganhHoc() . PHP_EOL;
                $thongTin .= "Tiền thưởng: " . $sinhVien->tinhTienThuong() . PHP_EOL;
                $thongTin .= "------------------------" . PHP_EOL;

                file_put_contents("thongtin.txt", $thongTin, FILE_APPEND);
            }
        }

        if (isset($_POST['hienThiDanhSach'])) {
            $thongTin = file_get_contents("thongtin.txt");
            $danhSach = explode("------------------------", $thongTin);
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>Loại đối tượng</th>
                        <th>Mã số</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Thông tin khác</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            foreach ($danhSach as $item) {
                $item = trim($item);
                if (!empty($item)) {
                    $thongTinChiTiet = explode(PHP_EOL, $item);
                    echo "<tr>";
                    foreach ($thongTinChiTiet as $chiTiet) {
                        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $chiTiet . "</td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";
        }
    ?>
    <form action="" method="post">
    <fieldset>
        <legend></legend>
        <label for="loaiDoiTuong">Loại đối tượng:</label>
        <input type="radio" name="loaiDoiTuong" value="giangVien" onclick="showFields('giangVien')"> Giảng viên
        <input type="radio" name="loaiDoiTuong" value="sinhVien" onclick="showFields('sinhVien')"> Sinh viên
        <br>
        <label for="maSo">Mã số:</label>
        <input type="text" name="maSo" id="maSo">
        <br>
        <label for="hoTen">Họ tên:</label>
        <input type="text" name="hoTen" id="hoTen">
        <br>
        <label for="gioiTinh">Giới tính:</label>
        <input type="radio" name="gioiTinh" value="Nam"> Nam
        <input type="radio" name="gioiTinh" value="Nữ"> Nữ
        <br>
        <label for="diaChi">Địa chỉ:</label>
        <input type="text" name="diaChi" id="diaChi">
        <br>
        <div id="giangVienFields" style="display: none;">
            <label for="hocVi">Học vị:</label>
            <select name="hocVi" id="hocVi">
                <option value="Thạc sĩ">Thạc sĩ</option>
                <option value="Tiến sĩ">Tiến sĩ</option>
                <option value="Phó giáo sư">Phó giáo sư</option>
            </select>
            <br>
            <label for="soNamCongTac">Số năm công tác:</label>
            <input type="number" name="soNamCongTac" id="soNamCongTac">
            <br>
        </div>
        <div id="sinhVienFields" style="display: none;">
            <label for="lop">Lớp:</label>
            <input type="text" name="lop" id="lop">
            <br>
            <label for="nganhHoc">Ngành học:</label>
            <input type="text" name="nganhHoc" id="nganhHoc">
            <br>
        </div>
        <input type="submit" name="luuThongTin" value="Lưu thông tin">
        <input type="submit" name="hienThiDanhSach" value="Hiển thị danh sách">
    </fieldset>
</form>

<script>
    function showFields(loaiDoiTuong) {
        var giangVienFields = document.getElementById("giangVienFields");
        var sinhVienFields = document.getElementById("sinhVienFields");

        if (loaiDoiTuong === "giangVien") {
            giangVienFields.style.display = "block";
            sinhVienFields.style.display = "none";
        } else if (loaiDoiTuong === "sinhVien") {
            sinhVienFields.style.display = "block";
            giangVienFields.style.display = "none";
        }
    }
</script>
</body>
</html>